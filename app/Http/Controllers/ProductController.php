<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        dd($products);
        return view('products.index');
    }

    public function create()
    {
        return 'This is the form to create product From Controller';
    }

    public function show($product)
    {
        $product = Product::findOrFail($product);
        return view('products.show')->with(['product' => $product]);
    }

    public function store()
    {
        //
    }

    public function edit($product)
    {
        return "Edit {$product} Controller";
    }

    public function update($product)
    {
        return "Update {$product} Controller";
    }

    public function destroy($product)
    {
        return "Delete product {$product} Controller";
    }



}
