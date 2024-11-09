{{-- `resources/views/admin/users/create.blade.php`. --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Ajouter un Utilisateur</h2>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom :</label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email :</label>
                <input type="email" id="email" name="email" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de Passe :</label>
                <input type="password" id="password" name="password" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmer le Mot de Passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="is_admin" class="inline-flex items-center">
                    <input type="checkbox" id="is_admin" name="is_admin" class="rounded">
                    <span class="ml-2">Administrateur</span>
                </label>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </form>
    </div>
@endsection