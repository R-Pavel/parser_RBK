@extends('layouts.app')
@section('content')
<h1>{{$product->title}}</h1>
<p>Description:{{$product->description}}</p>
<p>Price:{{$product->price}}</p>
<p>stock:{{$product->description}}</p>
<p>status:{{$product->status}}</p>
@endsection
