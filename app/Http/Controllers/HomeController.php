<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer tous les produits
        $products = Product::all();

        // Retourner la vue avec les produits
        return view('home', compact('products'));
    }
}
