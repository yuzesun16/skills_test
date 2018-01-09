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

        // load the view and pass the products
        return View::make('products.index')
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
        return response()->json($product);
    }
}
