@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <img height="100px" width="100px" src="{{ $product->image }}" />
            {{ $product->name }}
            {{ $product->description }}
            {{ $product->image }}
            {{ $product->category }}
            {{ $product->price }}
        </div>
    </div>
@endsection
