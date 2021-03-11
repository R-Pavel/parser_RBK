<?php

namespace App\Http\Controllers;

use App\Product;

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
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function store()
    {
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];
        request()->validate($rules);
        if (request()->stock == 0 && request()->status == 'available') {
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('The product must have stock');
        }
        $product = Product::create(request()->all());
        session()->flash('success',"NEW product with id {$product->id} was created");
        return redirect()->route('products.index')
            ->withSuccess("New product with id {$product->id} was created");
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with(['product' => $product]);
    }

    public function update(Product $product)
    {
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];
        request()->validate($rules);
        $product->update(request()->all());
        return redirect()->route('products.index')
            ->withSuccess("The product with id {$product->id} was updated");

    }

    public function destroy(Product $product)
    {
        $product->delete($product);
        return $product;
    }



}
