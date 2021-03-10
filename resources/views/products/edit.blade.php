@extends('layouts.app')
@section('content')
<h1>Edit product</h1>
    <form method="POST" action="{{ route('products.update',['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="{{old('title') ?? $product->title}}">
        </div>
        <div class="form-row">
            <label>Descripton</label>
            <input class="form-control" type="text" name="description" value="{{old('description') ?? $product->description}}">
        </div>
        <div class="form-row">
            <label>Price</label>
            <input class="form-control" type="number" min="1.0" step="0.01"  name="price" value="{{old('price') ?? $product->price}}">
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{old('stock') ?? $product->stock}}">
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="custom-select" name="status" value="{{$product->status}}">
                <option value="available" {{old('stock') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '')}}>Available</option>
                <option value="unavailable" {{old('stock') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '')}}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary bt-lg mt-3" type="submit">Edit product</button>
        </div>
    </form>
@endsection
