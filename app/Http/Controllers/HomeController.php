<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Categories;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::all();
        $categories = Categories::getCategories();
        if(Auth::user()->isAdmin()){
            return view('admin', compact('allProducts', 'categories'));
        }

        return view('home', compact('allProducts', 'categories'));
    }
}
