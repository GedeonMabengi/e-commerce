@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold">Tableau de Bord</h1>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Statistiques Utilisateur</h2>
                {{-- <p>Nombre d'utilisateurs : {{ $userCount }}</p> --}}
            </div>
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Ventes Totales</h2>
                {{-- <p>Montant total des ventes : €{{ $salesTotal }}</p> --}}
            </div>
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Produits Disponibles</h2>
                {{-- <p>Nombre de produits : {{ $productCount }}</p> --}}
            </div>
        </div>
        <div class="mt-6">
            <h2 class="font-bold">Dernières Transactions</h2>
            <table class="min-w-full bg-white border mt-2">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ID Transaction</th>
                        <th class="py-2 px-4 border">Montant</th>
                        <th class="py-2 px-4 border">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border">1</td>
                        <td class="border">€100</td>
                        <td class="border">2024-10-06</td>
                    </tr>
                    <tr>
                        <td class="border">2</td>
                        <td class="border">€150</td>
                        <td class="border">2024-10-05</td>
                    </tr>
                    <!-- Ajoutez d'autres transactions ici -->
                </tbody>
            </table>
        </div>
    </div>


    {{--  --}}
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold">Tableau de Bord Administrateur</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Produits</h2>
                <p class="mt-1">Gérer les produits de la boutique.</p>
                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Produits</a>
                    <a href="{{ route('products.create') }}" class="inline-block bg-green-500 text-white rounded py-2 px-4 hover:bg-green-600">Ajouter un Produit</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Commandes</h2>
                <p class="mt-1">Gérer les commandes des clients.</p>
                <div class="mt-4">
                    <a href="{{ route('admin_orders.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Commandes</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Utilisateurs</h2>
                <p class="mt-1">Gérer les comptes utilisateurs.</p>
                <div class="mt-4">
                    <a href="{{ route('admin_users.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Utilisateurs</a>
                    <a href="{{ route('admin_users.create') }}" class="inline-block bg-green-500 text-white rounded py-2 px-4 hover:bg-green-600">Ajouter un Utilisateur</a>
                </div>
            </div>
            {{-- <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Promotions</h2>
                <p class="mt-1">Gérer les promotions et les coupons.</p>
                <div class="mt-4">
                    <a href="{{ route('admin.promotions.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Promotions</a>
                    <a href="{{ route('admin.promotions.create') }}" class="inline-block bg-green-500 text-white rounded py-2 px-4 hover:bg-green-600">Ajouter une Promotion</a>
                </div>
            </div> --}}
            {{-- <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Rapports</h2>
                <p class="mt-1">Consulter les rapports de vente et de performance.</p>
                <div class="mt-4">
                    <a href="{{ route('admin.reports.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Rapports</a>
                </div>
            </div> --}}
            {{-- <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="font-bold">Paramètres</h2>
                <p class="mt-1">Gérer les paramètres du site.</p>
                <div class="mt-4">
                    <a href="{{ route('admin.settings.index') }}" class="inline-block bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Voir les Paramètres</a>
                </div>
            </div> --}}
        </div>
    </div>

    {{--  --}}
@endsection