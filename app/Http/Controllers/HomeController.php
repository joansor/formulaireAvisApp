<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::all();
        //dd($products);
        return view('pages/home',[
            'products' => $products
        ]);
    }
    public function aboutUs()
    {
        return view('pages/aboutUs');
    }
   
}
