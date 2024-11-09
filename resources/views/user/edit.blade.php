<!-- resources/views/user/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Modifier Mon Profil</h2>
        <form action="{{ route('user.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom :</label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full" value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email :</label>
                <input type="email" id="email" name="email" class="border rounded p-2 w-full" value="{{ $user->email }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Nouveau Mot de Passe :</label>
                <input type="password" id="password" name="password" class="border rounded p-2 w-full" placeholder="Laisser vide pour ne pas changer">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmer le Mot de Passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded p-2 w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre � Jour</button>
        </form>
    </div>
@endsection