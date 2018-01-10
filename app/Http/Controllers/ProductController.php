<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        // get all the Products
        $products = Product::all();

        $products_json = Product::all()->toJson();

        // load the view and pass the products
        return View::make('products.index', compact('products_json'))
            ->with('products', $products);
    }

    public function create()
    {
        // load the create form (app/views/products/create.blade.php)
        return View::make('products.create');
    }

    public function store()
    {

        $product = new Product;
        $product->name       = Input::get('name');
        $product->price      = Input::get('price');
        $product->quantity = Input::get('quantity');
        $product->total_value = $product->price * $product->quantity;
        $product->save();



        // redirect

        return Redirect::to('products');
//        return response()->json($product);
    }

    public function edit($id)
    {
        // get the nerd
        $product = Product::find($id);

        // show the edit form and pass the nerd
        return View::make('products.edit')
            ->with('product', $product);
    }

    public function update($id)
    {
        // store
        $product = Product::find($id);
        $product->name       = Input::get('name');
        $product->price      = Input::get('price');
        $product->quantity = Input::get('quantity');
        $product->total_value = $product->price * $product->quantity;
        $product->save();

        // redirect
        return Redirect::to('products');
    }
}
