{{-- resources/views/admin/products/create.blade.php : --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Ajouter un Produit</h2>
        @if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('admin_products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom :</label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description :</label>
                <textarea id="description" name="description" class="border rounded p-2 w-full"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Prix :</label>
                <input type="number" id="price" name="price" class="border rounded p-2 w-full" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock :</label>
                <input type="number" id="stock" name="stock" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" class="border rounded p-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </form>
    </div>
@endsection