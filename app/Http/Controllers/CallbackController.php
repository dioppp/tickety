<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        $transaction = Transaction::where('invoice_ref', $data['invoice']['ref']);
        $transaction->update([
            'status' => 1,
        ]);

        foreach ($data['products'] as $product) {
            $ticket = Ticket::where('ticket_name', $product['name'])->first();

            if ($ticket) {
                $ticket->update([
                    'stock' => $ticket->stock - $product['qty'],
                ]);
            }
        }

        return 'ACCEPTED';
    }
}
