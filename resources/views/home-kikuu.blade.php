<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- En-tête -->
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}"><h1 class="text-2xl font-bold">Mon E-commerce</h1></a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-600">Produits</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Contact</a></li>
            </ul>
        </nav>

        @if (Route::has('login'))
          <nav class="-mx-3 flex flex-1 justify-end">
            @auth
              <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
              >
                Dashboard
              </a>
        @else
            <a
              href="{{ route('login') }}"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
            >
              Log in
            </a>

            @if (Route::has('register'))
                <a
                  href="{{ route('register') }}"
                  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                >
                  Register
                </a>
            @endif
            @endauth
            </nav>
        @endif

    </div>
</header>
<div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">Kikuu</div>
        <div class="w-1/2">
          <input 
            type="text" 
            placeholder="Search for products..." 
            class="w-full py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300"
          />
        </div>
        <div class="space-x-6">
          <a href="#" class="text-gray-600 hover:text-blue-500">Login</a>
          <a href="#" class="text-gray-600 hover:text-blue-500">Sign Up</a>
        </div>
      </div>
    </nav>
  
    <!-- Hero Section -->
    <div class="bg-cover bg-center h-96 relative" style="background-image: url('https://example.com/hero-image.jpg');">
      <div class="absolute inset-0 bg-black opacity-50"></div>
      <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
        <h1 class="text-4xl font-bold">Shop the Latest Deals</h1>
        <p class="mt-4 text-lg">Get amazing discounts on your favorite products.</p>
        <a href="#" class="mt-6 bg-blue-500 hover:bg-blue-700 py-2 px-6 rounded text-white">
          Shop Now
        </a>
      </div>
    </div>
  
    <!-- Categories Section -->
    <section class="py-12">
      <div class="container mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6">Shop by Category</h2>
        <div class="grid grid-cols-4 gap-6">
          <!-- Example Category Card -->
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img 
              src="https://example.com/category-image.jpg" 
              alt="Category" 
              class="w-full h-48 object-cover"
            />
            <div class="p-4 text-center">
              <h3 class="text-lg font-semibold">Electronics</h3>
              <a href="#" class="text-blue-500 hover:underline">Shop Now</a>
            </div>
          </div>
          <!-- Repeat for other categories -->
        </div>
      </div>
    </section>
  
    <!-- Product Section -->
    <section class="py-12 bg-gray-200">
      <div class="container mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6">Featured Products</h2>
        <div class="grid grid-cols-4 gap-6">
          <!-- Example Product Card -->
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img 
              src="https://example.com/product-image.jpg" 
              alt="Product" 
              class="w-full h-48 object-cover"
            />
            <div class="p-4">
              <h3 class="text-lg font-semibold">Smartphone</h3>
              <p class="text-gray-600 mt-2">$499.99</p>
              <a href="#" class="mt-4 block bg-blue-500 hover:bg-blue-700 text-center py-2 text-white rounded">
                Add to Cart
              </a>
            </div>
          </div>
          <!-- Repeat for other products -->
        </div>
      </div>
    </section>
<!--

Pour gérer les rôles et les permissions dans votre application Laravel, l'utilisation du package
**Spatie Laravel Permission** est une excellente option. Ce package vous permet de gérer les rôles
et les permissions de manière simple et efficace. Voici comment vous pouvez l'intégrer dans votre application :

### Étape 1 : Installation du Package Spatie

Si vous ne l'avez pas déjà fait, installez le package via Composer :

```bash
composer require spatie/laravel-permission
```

### Étape 2 : Publier la Configuration

Après l'installation, vous devez publier la configuration et les migrations du package :

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### Étape 3 : Exécuter les Migrations

Cela créera les tables nécessaires pour gérer les rôles et les permissions. Exécutez les migrations :

```bash
php artisan migrate
```

### Étape 4 : Ajouter le Trait au Modèle User

Modifiez le modèle `User` pour utiliser le trait `HasRoles` :

```php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    // ... autres propriétés et méthodes
}
```

### Étape 5 : Créer des Rôles et des Permissions

Vous pouvez créer des rôles et des permissions dans votre contrôleur ou dans un seeder. Voici un exemple de seeder :

```bash
php artisan make:seeder RoleAndPermissionSeeder
```

Modifiez le seeder :

```php
// database/seeders/RoleAndPermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer des permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage orders']);

        // Créer des rôles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assigner des permissions aux rôles
        $adminRole->givePermissionTo(['manage users', 'manage products', 'manage orders']);
    }
}
```

Exécutez le seeder :

```bash
php artisan db:seed --class=RoleAndPermissionSeeder
```

### Étape 6 : Assigner des Rôles aux Utilisateurs

Vous pouvez assigner des rôles lors de la création d'un utilisateur dans votre `UserController` :

```php
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'is_admin' => 'boolean',
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

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès.');
}
```

### Étape 7 : Vérifier les Permissions

Pour vérifier les permissions dans vos contrôleurs ou vues, vous pouvez utiliser les méthodes fournies par Spatie :

```php
if (Auth::user()->can('manage users')) {
    // L'utilisateur a la permission
}
```

### Étape 8 : Middleware pour Vérifier les Rôles

Vous pouvez également créer des middlewares pour vérifier les rôles :

```bash
php artisan make:middleware AdminMiddleware
```

Modifiez le middleware :

```php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return redirect('/'); // Rediriger si l'utilisateur n'est pas admin
        }

        return $next($request);
    }
}
```

### Étape 9 : Enregistrer le Middleware

Enregistrez le middleware dans `app/Http/Kernel.php` :

```php
protected $routeMiddleware = [
    // ...
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];
```

### Étape 10 : Utiliser le Middleware dans les Routes

Enfin, utilisez le middleware dans vos routes pour protéger les sections administratives :

```php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/orders', OrderController::class);
});
```

### Résumé

1. Installez et configurez le package Spatie Laravel Permission.
2. Créez les rôles et permissions nécessaires.
3. Modifiez le modèle User pour inclure les rôles.
4. Assignez des rôles lors de la création d'utilisateurs.
5. Utilisez des vérifications de rôle et de permission dans votre application.

Si vous avez d'autres questions ou besoin d'aide supplémentaire, n'hésitez pas à demander !

-->
  </div>
  