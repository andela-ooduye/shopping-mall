@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <img height="300px" width="300px" style="padding-right: 20px;" class="card-img-top pull-left" src="/images/{{ $product->image }}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title"><strong>{{ $product->name }}</strong></h4>
                <p><bold>{{ $product->category }}</bold></p>
                <p class="card-text">{{ $product->description }}</p>
                <p><bold>{{ $product->price }}</bold></p>
                <a href="#" class="btn btn-primary">Buy</a>
            </div>
        </div>
    </div>
@endsection
