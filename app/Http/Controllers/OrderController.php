<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        $userId = $request->input('user_id');
        $eventId = $request->input('event_id');

        $products = array_map(function ($ticket) {
            return [
                'name' => $ticket['name'],
                'price' => $ticket['price'],
                'qty' => $ticket['qty'],
            ];
        }, $tickets);

        $customer = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
        ];

        $invoiceRef = uniqid();

        foreach ($tickets as $ticket) {
            $order = Order::create([
                'user_id' => $userId,
                'event_id' => $eventId,
                'ticket_id' => $ticket['id'],
                'quantity' => $ticket['qty'],
                'total' => $ticket['price'] * $ticket['qty'],
            ]);

            $ticketModel = Ticket::find($ticket['id']);
            $ticketModel->stock -= $ticket['qty'];
            $ticketModel->save();

            Transaction::create([
                'user_id' => $userId,
                'order_id' => $order->id,
                'customer_name' => $customer['name'],
                'customer_email' => $customer['email'],
                'customer_phone' => $customer['phone'],
                'invoice_ref' => $invoiceRef,
                'products' => $products,
                'status' => Transaction::STATUS_PENDING,
            ]);
        }

        $res = Http::withHeaders($this->generateHeader())->post(env('WINPAY_BASE_URL') . '/api/create', [
            'customer' => $customer,
            'invoice' => [
                'ref' => $invoiceRef,
                'products' => $products,
            ],
            'back_url' => route('event.index'),
            'interval' => 5,
        ]);

        return redirect($res['responseData']['redirect_url']);
    }
}
