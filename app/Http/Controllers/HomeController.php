<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home()
    {
        $produits = Produit::all();
        // dd($home);
        return view('pages/home',[
            'produits' => $produits
        ]);
    }
    public function aboutUs()
    {
        return view('pages/aboutUs');
    }
    public function produitShow()
    {
        
    }
}
