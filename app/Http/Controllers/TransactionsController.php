<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Order;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(8);
        return view('/admin.transaction.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        $customer_id = Transaction::find($id)->user_id;
        $orders = Order::where('transaction_id', '=', $id)->get();
        $customer = User::find($customer_id);
        $total = 0;
        foreach ($orders as $order) {
            $subTotal = $order->quantity*$order->price;
            $total += $subTotal;
        }
        return view('/admin.transaction.show', compact('transaction', 'customer_id', 'customer', 'orders', 'total'));
    }
}
