{{-- `resources/views/admin/orders/index.blade.php`. --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Gestion des Commandes</h2>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 text-left">Utilisateur</th>
                    <th class="py-2 text-left">Montant Total</th>
                    <th class="py-2 text-left">Statut</th>
                    <th class="py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-2">{{ $order->user->name }}</td>
                        <td class="py-2">�{{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-2">{{ ucfirst($order->status) }}</td>
                        <td class="py-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-500 hover:text-blue-700">Voir</a>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection