<!-- resources/views/cart/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Mon Panier</h2>
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($cartItems->isEmpty())
            <p>Votre panier est vide.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 text-left">Produit</th>
                        <th class="py-2 text-left">Prix</th>
                        <th class="py-2 text-left">Quantit�</th>
                        <th class="py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="py-2">{{ $item->product->name }}</td>
                            <td class="py-2">�{{ number_format($item->product->price, 2) }}</td>
                            <td class="py-2">{{ $item->quantity }}</td>
                            <td class="py-2">
                                <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('cart.checkout') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">Proc�der au Paiement</a>
        @endif
    </div>
@endsection