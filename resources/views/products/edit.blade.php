@extends('layouts.master')
@section('content')
<h1>Create new product</h1>
    <form method="POST" action="{{ route('products.update',['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{$product->title}}" required>
        </div>
        <div class="form-row">
            <label>Descripton</label>
            <input class="form-control" type="text" name="description" value="{{$product->description}}">
        </div>
        <div class="form-row">
            <label>Price</label>
            <input class="form-control" type="number" min="1.0" step="0.01"  name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{$product->stock}}">
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="custom-select" name="status" value="{{$product->status}}">
                <option value="available" {{$product->status == 'available' ? 'selected' : ''}}>Available</option>
                <option value="unavailable" {{$product->status == 'unavailable '? 'selected' : ''}}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary bt-lg" type="submit">Create product</button>
        </div>
    </form>
@endsection
