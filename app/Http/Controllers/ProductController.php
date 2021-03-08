<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function show($product)
    {
        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function store()
    {
        return Product::create(request()->all());
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
