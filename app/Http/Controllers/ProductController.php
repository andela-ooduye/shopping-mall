<?php

namespace App\Http\Controllers;

use App\Http\Categories;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Get all available products
     *
     */
    public function index() {
        $allProducts = Product::all();

        return view('welcome', compact('allProducts'));
    }

    public function create() {
        if ( Auth::check() ) {
            $categories = Categories::getCategories();
            return view('new', compact('categories'));
        }
        return redirect()->route('login');
    }

    /**
     * Store a new product
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|min:3',
            'description'     => 'required|min:3',
            'image'    => 'required|min:3',
            'category'   => 'required',
            'price' => 'required'
        ]);

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'category' => $request->input('category'),
            'price' => $request->input('price')
        ]);

        return redirect()->route('welcome');
    }

    public function show($id) {
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    public function update($id, Request $request) {
        $product = Product::find($id);

        $this->validate($request, [
            'name'     => 'required|min:3',
            'description'     => 'required|min:3',
            'category'   => 'required',
            'price' => 'required'
        ]);

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->category = $request['category'];
        $product->price = $request['price'];
        $product->save();

        return redirect()->back();
    }

    public function destroy($id) {
        Product::destroy($id);

        return redirect()->back();
    }
}
