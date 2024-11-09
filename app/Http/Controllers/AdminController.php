<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product; // Assurez-vous d'avoir un mod�le Product
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $productsCount = Product::count();
        return view('admin.dashboard', compact('usersCount', 'productsCount'));
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'is_admin' => 'boolean',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assigner le rôle d'administrateur si nécessaire
        if ($request->is_admin) {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }

        return redirect()->route('dashboard')->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function viewRegister()
    {
        return view('admin_register');
    }
}