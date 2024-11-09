<!-- resources/views/user/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Mon Espace Utilisateur</h2>
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <p><strong>Nom :</strong> {{ $user->name }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <a href="{{ route('user.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Modifier mon profil</a>
    </div>
@endsection