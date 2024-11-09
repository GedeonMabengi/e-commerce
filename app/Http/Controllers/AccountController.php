<?php

// app/Http/Controllers/AccountController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        return view('account.settings', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('account.settings.edit')->with('success', 'Param�tres mis � jour avec succ�s.');
    }
}