<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $products = Shop::paginate(24);
        return view('/shop.index', compact('products'));
    }
}
