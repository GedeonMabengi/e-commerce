{{-- `resources/views/admin/products/edit.blade.php`. --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Modifier le Produit</h2>
        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom :</label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full" value="{{ $product->name }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description :</label>
                <textarea id="description" name="description" class="border rounded p-2 w-full">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Prix :</label>
                <input type="number" id="price" name="price" class="border rounded p-2 w-full" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock :</label>
                <input type="number" id="stock" name="stock" class="border rounded p-2 w-full" value="{{ $product->stock }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre � Jour</button>
        </form>
    </div>
@endsection