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

    public function show($id)
    {
        $product = Shop::find($id);
        $relative_products = Shop::where([
                                         ['id', '!=', $id],
                                         ['reposition', '>', 0],
                                         ['category', '=', $product->category]])
                                         ->get()->sortByDesc('release')->random(6);
        return view('/shop.show', compact('product', 'relative_products'));
    }
}
