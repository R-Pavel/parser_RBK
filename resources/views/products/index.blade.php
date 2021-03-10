@extends('layouts.app')
@section('content')
<h1>List of Products</h1>

<a class="btn btn-success mb-3" href="{{route('products.create')}}">Create</a>
@empty($products)
    <div class="alert alert-warning">We don't have a products</div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Proce</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        <a class="btn btn-link" href="{{ route('products.show',['product' => $product->id]) }}">Show</a>
                        <a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection('content')
