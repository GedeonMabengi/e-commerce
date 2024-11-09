{{-- `resources/views/admin/users/index.blade.php`. --}}

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Gestion des Utilisateurs</h2>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Utilisateur</a>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 text-left">Nom</th>
                    <th class="py-2 text-left">Email</th>
                    <th class="py-2 text-left">R�le</th>
                    <th class="py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2">{{ $user->name }}</td>
                        <td class="py-2">{{ $user->email }}</td>
                        <td class="py-2">{{ $user->is_admin ? 'Administrateur' : 'Utilisateur' }}</td>
                        <td class="py-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
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