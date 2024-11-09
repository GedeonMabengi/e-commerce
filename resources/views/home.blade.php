<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    {{-- <!-- Produits -->
    <section class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center mb-6">Nos Produits</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    <h3 class="text-xl font-semibold mt-2">{{ $product->name }}</h3>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <p class="text-lg font-bold">€{{ number_format($product->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    </section> --}}

    <!-- Hero Section -->
    <div class="bg-cover bg-center h-96 relative" style="background-image: url('https://example.com/hero-image.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
          <h1 class="text-4xl font-bold">Shop the Latest Deals</h1>
          <p class="mt-4 text-lg">Get amazing discounts on your favorite products.</p>
          <a href="#" class="mt-6 bg-blue-500 hover:bg-blue-700 py-2 px-6 rounded text-white">
            Shop Now
          </a>
        </div>
      </div>
    
      <!-- Categories Section -->
      <section class="py-12">
        <div class="container mx-auto px-6">
          <h2 class="text-2xl font-bold mb-6">Shop by Category</h2>
          <div class="grid grid-cols-4 gap-6">
            <!-- Example Category Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <img 
                src="https://example.com/category-image.jpg" 
                alt="Category" 
                class="w-full h-48 object-cover"
              />
              <div class="p-4 text-center">
                <h3 class="text-lg font-semibold">Electronics</h3>
                <a href="#" class="text-blue-500 hover:underline">Shop Now</a>
              </div>
            </div>
            <!-- Repeat for other categories -->
          </div>
        </div>
      </section>
    
      <!-- Product Section -->
      <section class="py-12 bg-gray-200">
        <div class="container mx-auto px-6">
          <h2 class="text-2xl font-bold mb-6">Featured Products</h2>
          <div class="grid grid-cols-4 gap-6">
            <!-- Example Product Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <img 
                src="https://example.com/product-image.jpg" 
                alt="Product" 
                class="w-full h-48 object-cover"
              />
              <div class="p-4">
                <h3 class="text-lg font-semibold">Smartphone</h3>
                <p class="text-gray-600 mt-2">$499.99</p>
                <a href="#" class="mt-4 block bg-blue-500 hover:bg-blue-700 text-center py-2 text-white rounded">
                  Add to Cart
                </a>
              </div>
            </div>
            <!-- Repeat for other products -->
          </div>
        </div>
      </section>
    </div>
@endsection