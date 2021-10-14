<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productShow($id)
    {
        $product = Product::find($id);
        //dd($product);
        return view('pages/productShow',[
            'product' => $product
        ]);
    }


}
