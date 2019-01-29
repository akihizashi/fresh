<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopsController extends Controller
{
    //back Controller
    public function indexAdmin()
    {
//      $all_products = Shop::all()->count();
//      $products = Shop::orderBy('release', 'desc')->paginate(8);
      return view('/admin/shops/index'
//      , compact('products')
    );
    }

    public function search()
    {
        $keyword = request('searchProduct');

        $searchProductResults = Shop::where([
//                            ['user_id', '=', auth()->id()],
                              ['name', 'LIKE', '%' .$keyword. '%']])
                            ->orWhere([
                              ['code', 'LIKE', '%' .$keyword. '%']])
                            ->orWhere([
                              ['category', 'LIKE', '%' .$keyword. '%']])
//                            ->orWhere([
  //                            ['release', 'LIKE', $keyword. '%']])
                            ->orderBy('release', 'desc')
                            ->paginate(8);

        return view('admin/shops/search', compact('searchProductResults', 'keyword'));
    }

    public function create()
    {
      return view('/admin/shops/create');
    }

    public function store()
    {
      $this->validate(request(), [
          'name' => 'required|max:50',
          'code' => 'required|max:8',
          'description' => 'required|min:10',
          'release' => 'required',
          'image' => 'image|nullable|max:1999'
      ]);

      if(request()->hasFile('image')){
        $fileNameWithExt = request()->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = request()->file('image')->storeAs('public/product_images', $fileNameToStore);
      } else {
        $fileNameToStore = 'NoImage.jpg';
      }

      Shop::create([
          'name' => request('name'),
          'code' => request('code'),
          'image' => $fileNameToStore,
          'category' => request('category'),
          'reposition' => request('reposition'),
          'price' => request('price'),
          'release' => request('release'),
          'description' => request('description')
      ]);

      return redirect('/admin/shops')->with('status', 'New product created');
    }

    public function edit($id)
    {
      $product = Shop::find($id);
      return view('admin/shops/edit', compact('product'));
    }

    public function update($id)
    {
      $this->validate(request(), [
          'name' => 'required|max:50',
          'code' => 'required|max:8',
          'description' => 'required|min:10',
          'release' => 'required',
          'image' => 'image|nullable|max:1999'
      ]);

      if(request()->hasFile('image')){
        $fileNameWithExt = request()->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        $path = request()->file('image')->storeAs('public/product_images', $fileNameToStore);
      }

      $product = Shop::find($id);
      $product->name = request('name');
      $product->code = request('code');
      if (request()->hasFile('image')){
        $product->image = $fileNameToStore;
      }
      $product->category = request('category');
      $product->reposition = request('reposition');
      $product->price = request('price');
      $product->release = request('release');
      $product->description = request('description');
      $product->save();

      return redirect('/admin/shops')->with('status', 'Product changed');
    }

    public function delete()
    {
      Shop::where('id', '=', request('post_id'))->delete();
      return back()->with('status', 'Product deleted');
    }

    //Front
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
