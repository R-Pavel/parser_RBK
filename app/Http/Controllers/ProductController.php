<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function show(Product $product)
    {
        return view('products.show')->with(['product' => $product]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()->route('products.index')
            ->withSuccess("New product with id {$product->id} was created");
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with(['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was updated");

    }

    public function destroy(Product $product)
    {
        $product->delete($product);
        return $product;
    }



}
