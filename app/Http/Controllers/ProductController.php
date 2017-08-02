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

    public function search(Request $request) {
        $param = $request['param'];
        $searchResult
            = Product::where('name','LIKE','%'.$param.'%')
            ->orWhere('description','LIKE','%'.$param.'%')
            ->orWhere('price','LIKE','%'.$param.'%')
            ->orWhere('category','LIKE','%'.$param.'%')
            ->get();
        if(count($searchResult) > 0) {
            return view('welcome', compact('searchResult', 'param'));
        } else {
            return view ('welcome')->withMessage('No Product found. Try to search again !')->withParam($param);
        }

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
            'category'   => 'required',
            'price' => 'required'
        ]);

        if( $request->hasFile('image') ) {
            $file = $request->file('image');
            $image_name = time()."-".$file->getClientOriginalName();
            $file->move('images', $image_name);
        } else {
            $image_name = 'no-image.jpeg';
        }

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $image_name,
            'category' => $request->input('category'),
            'price' => $request->input('price')
        ]);

        return redirect()->route('home');
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
