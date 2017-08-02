@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group" style="padding-bottom: 10px;">
                <input type="text" class="form-control" name="param"
                       placeholder="Search products" value="{{ isset($param) ? $param : '' }}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        Search
                    </button>
                </span>
            </div>
        </form>
        @if(isset($searchResult))
            <div class="row">
                @foreach ($searchResult as $product)
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
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
        @if(isset($allProducts))
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

        {{--@if($allProducts->isEmpty())--}}
            {{--There are currently no available products in this shop--}}
        {{--@endif--}}
    </div>
@endsection
