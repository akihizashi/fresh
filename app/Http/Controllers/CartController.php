<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Order;

class CartController extends Controller
{
    //front Controller
    public function index()
    {
      $cartItems = session('cart');
      if ($cartItems !== null) {
        $total = 0;
        foreach ($cartItems as $cartItem) {
          $subTotal = $cartItem['quantity']*$cartItem['price'];
          $total += $subTotal;
        }
      }

      return view('/cart.index', compact('total'));
    }

    public function add(Request $request)
    {

      $cartItems = session('cart');
      $productInfoToCart = array(
        "id" => request('id'),
        "name" => request('name'),
        "code" => request('code'),
        "price" => request('price'),
        "quantity" => 1
      );
      if ($cartItems !== null){
        if (array_search(request('id'), array_column($cartItems, 'id')) !== false) {
          return redirect ('/cart')->with('status', 'Product exists, you can change quantity before payment');
        }
        $request->session()->push('cart', $productInfoToCart);
        $request->session()->flash('status', 'Product added to cart');

        return redirect('/cart');

      }
        $request->session()->push('cart', $productInfoToCart);
        $request->session()->flash('status', 'Product added to cart');

        return redirect('/cart');
    }

    public function remove(Request $request)
    {
        $cartItems = session('cart');
        $key = array_search(request('id'), array_column(session('cart'), 'id'));
        unset($cartItems[$key]);
        $newCartItems = array_values($cartItems);
        session()->put('cart', $newCartItems);

        if(session('cart') == null){
          session()->forget('cart');
        }

        return redirect('/cart')->with('status', 'Item deleted');
    }

    public function update(Request $request)
    {
      $cartItems = session('cart');
       foreach ($cartItems as $key=>$cartItem) {
         if ($cartItem['id'] == request('id')) {
           $cartItems[$key]['quantity'] = request('quantity');
         }

       }
       $request->session()->put('cart', $cartItems);
       return redirect('/cart')->with('status', 'Cart updated');
    }

    public function clear(Request $request)
    {
      $request->session()->forget('cart');

      return redirect('/cart')->with('status', 'Cart cleared');
    }

    public function confirm()
    {
      $cartItems = session('cart');
      if ($cartItems !== null) {
        $total = 0;
        foreach ($cartItems as $cartItem) {
          $subTotal = $cartItem['quantity']*$cartItem['price'];
          $total += $subTotal;
        }
      }
      return view('/cart.confirm', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
      $cartItems = session('cart');
      if (Auth::check()) {
        $transaction = Transaction::create([
          'user_id' => auth()->id(),
          'amount'  => request('amount'),
        ]);
        $transaction_id = $transaction->id;
        foreach ($cartItems as $cartItem) {
          Order::create([
            'user_id'        => auth()->id(),
            'transaction_id' => $transaction_id,
            'name'           => $cartItem['name'],
            'quantity'       => $cartItem['quantity'],
            'price'          => $cartItem['price']
          ]);
        }
        $request->session()->forget('cart');

        return redirect('/cart')->with('status', 'Your order was done');
      } else {
        return redirect('/login')->with('status', 'You have to login to do next step');
      }
    }

}
