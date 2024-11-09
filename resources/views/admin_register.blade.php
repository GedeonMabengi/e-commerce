@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center">Inscription Administrateur</h1>
        <form action="{{ route('registerAdmin1234567890') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nom</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Mot de passe</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">S'inscrire</button>
        </form>
    </div>
@endsection