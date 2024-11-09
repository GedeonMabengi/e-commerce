<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logique pour récupérer les données du tableau de bord (statistiques, etc.)
        // Par exemple, ces données pourraient venir de votre modèle
        $userCount = 100; // Remplacez par une véritable requête
        $salesTotal = 5000; // Remplacez par une véritable requête
        $productCount = 250; // Remplacez par une véritable requête

        return view('dashboard', compact('userCount', 'salesTotal', 'productCount'));
    }
}