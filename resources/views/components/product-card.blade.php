<div class="card" style="max-height: 500px">
    {{--<img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="500">--}}
    <div class="card-body">
        <h4 class = "text-right"><strong>${{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
    </div>
    <form
        class="d-inline"
        method="POST"
        action="{{route('products.carts.store', ['product' => $product->id])}}"
    >
        @csrf
        <button class="btn btn-success" type="submit">+</button>
    </form>
</div>
