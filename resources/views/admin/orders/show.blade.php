{{-- `resources/views/admin/orders/show.blade.php`. --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">D�tails de la Commande #{{ $order->id }}</h2>

        <p><strong>Utilisateur :</strong> {{ $order->user->name }}</p>
        <p><strong>Montant Total :</strong> �{{ number_format($order->total_amount, 2) }}</p>
        <p><strong>Statut :</strong> {{ ucfirst($order->status) }}</p>

        <h3 class="text-xl font-semibold mt-4">Produits :</h3>
        <ul class="list-disc pl-5">
            @foreach ($order->products as $product)
                <li>{{ $product->name }} ({{ $product->pivot->quantity }})</li>
            @endforeach
        </ul>
    </div>
@endsection