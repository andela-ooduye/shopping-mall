@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a new Product</div>

                    <div style="padding: 20px;">
                        <form class="form-vertical" role="form" method="post" action="{{ route('products.store') }}">
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="control-label">Choose Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value={{ $category }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Product Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?: '' }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">Product Description</label>
                                <textarea name="description" class="form-control" id="description" rows="10" cols="10">{{ old('description') ?: '' }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="image" class="control-label">Product Price</label>
                                <input type="text" name="price" class="form-control" id="price" value="{{ old('price') ?: '' }}">
                                @if ($errors->has('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Create</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
