<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('payment.checkout', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'stripeToken' => 'required',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity * 100; // Convertir en cents
        });

        try {
            $charge = Charge::create([
                'amount' => $totalAmount,
                'currency' => 'eur',
                'description' => 'Achat de produits',
                'source' => $request->stripeToken,
            ]);

            // Vider le panier apr�s le paiement
            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('cart.index')->with('success', 'Paiement effectu� avec succ�s !');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->withErrors('Erreur lors du paiement : ' . $e->getMessage());
        }
    }
}