<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('products');
        return view('admin.orders.show', compact('order'));
    }

    public function create()
    {
        // Logique pour cr�er une commande si n�cessaire
    }

    public function store(Request $request)
    {
        // Logique pour stocker une nouvelle commande
    }

    public function update(Request $request, Order $order)
    {
        // Logique pour mettre � jour une commande
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Commande supprim�e avec succ�s.');
    }
}