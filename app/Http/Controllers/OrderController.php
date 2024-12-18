<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    private function generateHeader()
    {
        $timestamp = now()->toIso8601String();
        $signature = hash_hmac('sha256', $timestamp, env('WINPAY_SECRET'));

        return [
            'X-Winpay-Timestamp' => $timestamp,
            'X-Winpay-Signature' => $signature,
            'X-Winpay-Key' => env('WINPAY_KEY'),
            'Content-Type' => 'application/json',
        ];
    }

    public function __invoke(Request $request)
    {
        $tickets = json_decode($request->input('tickets'), true);

        $products = array_map(function ($ticket) {
            return [
                'name' => $ticket['name'],
                'price' => $ticket['price'],
                'qty' => $ticket['qty'],
            ];
        }, $tickets);

        $customer = Auth::user();

        $invoiceRef = uniqid();

        $transaction = Transaction::create([
            'user_id' => $customer->id,
            'invoice_ref' => $invoiceRef,
            'total' => 0
        ]);

        $orders = [];
        foreach ($tickets as $key => $ticket) {
            $orders[$key] = Order::create([
                'quantity' => $ticket['qty'],
                'ticket_id' => $ticket['ticket_id'],
                'transaction_id' => $transaction->id,
            ]);

            // $ticketModel = Ticket::find($ticket['id']);
            // $ticketModel->stock -= $ticket['qty'];
            // $ticketModel->save();
        }

        $res = Http::withHeaders($this->generateHeader())->post(env('WINPAY_BASE_URL') . '/api/create', [
            'customer' => [
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
            ],
            'invoice' => [
                'ref' => $invoiceRef,
                'products' => $products,
            ],
            'back_url' => route('event.index'),
            'interval' => 10,
        ]);

        return redirect($res['responseData']['redirect_url']);
    }
}
