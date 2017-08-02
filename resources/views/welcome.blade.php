@extends('layouts.app')

@section('content')
    <div class="container">
        @if($allProducts)
            @foreach ($allProducts as $product)
                <div>
                    <img height="100px" width="100px" src="/images/{{ $product->image }}" />
                    {{ $product->name }}
                    {{ $product->image }}
                    {{ $product->category }}
                    {{ $product->price }}
                </div>
            @endforeach
        @endif

        @if($allProducts->isEmpty())
            There are currently no available products in this shop
        @endif
    </div>
@endsection
