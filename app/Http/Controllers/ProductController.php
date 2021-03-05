<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'This is the list of products From Controller';
    }

    public function create()
    {
        return 'This is the form to create product From Controller';
    }

    public function show($product)
    {
        return "Showing product {$product} From Controller";
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
