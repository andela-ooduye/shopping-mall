@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard
                        <a class="pull-right" href="{{ route('products.create') }}">Add new Product</a>
                    </div>
                    <div class="panel-body">
                        You are logged in!

                        @if($allProducts)
                            @foreach ($allProducts as $product)
                                <div class="card" style="padding: 10px; border-bottom: 1px solid black;">
                                    <img height="100px" width="100px" style="padding-right: 20px;" class="card-img-top pull-left" src="/images/{{ $product->image }}" alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <p>{{ $product->category }}</p>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p>₦ {{ $product->price }}</p>
                                    </div>


                                    <div class="">
                                        <a class="btn btn-info" data-toggle="modal" data-target="#editModal-{{ $product->id  }}">Edit</a>

                                        <!-- Edit Modal -->
                                        <div id="editModal-{{ $product->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Edit product</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-vertical" role="form" method="post" action="/products/{{ $product->id }}">
                                                            {{ method_field('put') }}
                                                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                                <label for="category" class="control-label">Choose Category</label>
                                                                <select class="form-control" name="category" id="category">
                                                                    @foreach($categories as $category)
                                                                        <option value={{ $category }}
                                                                                @if ($category === $product->category)
                                                                                select="selected"
                                                                                @endif
                                                                                >{{ $category }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('category'))
                                                                    <span class="help-block">{{ $errors->first('category') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <label for="name" class="control-label">Product Name</label>
                                                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?: $product->name }}">
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                                <label for="description" class="control-label">Product Description</label>
                                                                <textarea name="description" class="form-control" id="description" rows="10" cols="10">{{ old('description') ?: $product->description }}</textarea>
                                                                @if ($errors->has('description'))
                                                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                                <label for="image" class="control-label">Product Price</label>
                                                                <input type="text" name="price" class="form-control" id="price" value="{{ old('price') ?: $product->price }}">
                                                                @if ($errors->has('price'))
                                                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-default">Update</button>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>   <!-- End of Edit Modal -->

                                        <a class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $product->id  }}">
                                            Delete
                                        </a>

                                        <!-- Delete Modal Dialog -->
                                        <div class="modal fade" id="confirmDelete-{{ $product->id }}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Are you sure you want to delete this product?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4><p>{{ $product->name }}</p></h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form class="form-vertical" role="form" method="post" action="/products/{{ $product->id }}">
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-danger pull-right delete-btn">Delete</button>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        </form>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      <!-- End of Delete Modal -->

                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($allProducts->isEmpty())
                            There are currently no available products in this shop
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
