<!-- resources/views/payment/checkout.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-6">Checkout</h2>
        <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
            @csrf
            <div class="mb-4">
                <label for="card-element" class="block text-gray-700">Carte de Cr�dit :</label>
                <div id="card-element" class="border rounded p-2"></div>
                <div id="card-errors" role="alert" class="text-red-500 mt-2"></div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Payer</button>
        </form>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        cardElement.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    </script>
@endsection