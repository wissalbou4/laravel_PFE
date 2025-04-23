<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RendezvousController extends Controller
{
    // Liste des rendez-vous
    public function index()
    {
        try {
            $rendezvous = RendezVous::with('patient')->get();
            return response()->json($rendezvous, 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des rendez-vous: ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la récupération des rendez-vous'], 500);
        }
    }

    // Ajouter un rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'date_heure' => 'required|date',
            'description' => 'nullable|string',
        ]);

        try {
            $rendezvous = RendezVous::create([
                'patient_id' => $request->patient_id,
                'date_heure' => $request->date_heure,
                'motif' => $request->motif,
            ]);

            return response()->json($rendezvous, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'ajout'], 500);
        }
    }


    // Modifier un rendez-vous
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date_heure' => 'required|date',
            'motif' => 'nullable|string|max:255',
        ]);

        try {
            $rendezvous = Rendezvous::findOrFail($id);
            $rendezvous->patient_id = $validated['patient_id'];
            $rendezvous->date_heure = $validated['date_heure'];
            $rendezvous->motif = $validated['motif'];
            $rendezvous->save();

            return response()->json(['message' => 'Rendez-vous modifié avec succès!'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Rendez-vous non trouvé'], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la modification du rendez-vous: ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la modification du rendez-vous'], 500);
        }
    }

    // Supprimer un rendez-vous
    public function destroy($id)
    {
        Log::info('Tentative de suppression du rendez-vous ID: ' . $id);
        
        try {
            $rendezvous = Rendezvous::findOrFail($id);
            $rendezvous->delete();
            
            Log::info('Rendez-vous supprimé avec succès. ID: ' . $id);
            
            return response()->json(['message' => 'Rendez-vous supprimé avec succès'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Rendez-vous non trouvé'], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du rendez-vous: ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression du rendez-vous', 'error' => $e->getMessage()], 500);
        }
    }
}
