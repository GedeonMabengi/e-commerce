<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Récupérer tous les produits
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            'stock' => 'required|integer',
        ]);

        // Enregistrer le produit
        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Stocker le chemin de l'image
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin_products.index')->with('success', 'Produit ajouté avec succès.');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'image' => 'required|string',
    //         'stock' => 'required|integer',
    //     ]);

    //     // Enregistrer le produit
    //     $imagePath = $request->file('image')->store('images', 'public');

    //     Product::create($request->all());
    //     return redirect()->route('admin_products.index')->with('success', 'Produit ajout� avec succ�s.');
    // }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprim� avec succ�s.');
    }
}