@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <img height="300px" width="300px" style="padding-right: 20px;" class="card-img-top pull-left" src="/images/{{ $product->image }}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title"><strong>{{ $product->name }}</strong></h4>
                <p>{{ $product->category }}</p>
                <p class="card-text">{{ $product->description }}</p>
                <p>₦ {{ $product->price }}</p>
                <a href="#" class="btn btn-primary">Buy</a>
            </div>
        </div>
    </div>
@endsection
