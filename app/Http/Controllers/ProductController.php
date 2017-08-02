<?php

namespace App\Http\Controllers;

use App\Http\Categories;
use Illuminate\Http\Request;
use App\Product;

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
        $categories = Categories::getCategories();
        return view('new', compact('categories'));
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

    public function update() {

    }

    public function destroy() {

    }
}
