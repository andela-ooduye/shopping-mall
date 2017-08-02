@extends('layouts.app')

@section('content')
    <div class="container">
        @if($allProducts)
            <div class="row">
            @foreach ($allProducts as $product)
                <div class="col-md-4" style="padding-bottom: 20px; text-align: center">
                    <img height="100px" width="100px" class="card-img-top" src="/images/{{ $product->image }}" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p>Category: {{ $product->category }}</p>
                        <p>₦ {{ $product->price }}</p>

                        <a href="{{ '/products/' . $product->id }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            @endforeach
            </div>
        @endif

        @if($allProducts->isEmpty())
            There are currently no available products in this shop
        @endif
    </div>
@endsection
