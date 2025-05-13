<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\User;

class StatistiqueController extends Controller
{
    public function getDashboardStats()
    {
        try {
            // Counts existants
            $totalPatients = Patient::count();
            $totalRendezvous = RendezVous::count();
           

            // Nouveaux counts des rôles
            $totalMedecins = User::where('role', 'medcin')->count();
            $totalSecretaires = User::where('role', 'secretaire')->count();

            return response()->json([
                'totalPatients' => $totalPatients,
                'totalRendezvous' => $totalRendezvous,
                'totalMedecins' => $totalMedecins,
                'totalSecretaires' => $totalSecretaires,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching statistics.'], 500);
        }
    }
}