<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FactureController extends Controller
{
    /**
     * Affiche la liste des factures
     */
    public function index()
    {
        try {
            $factures = Facture::with('patient')->get();
            return response()->json([
                'success' => true,
                'data' => $factures
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des factures',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Affiche une facture spécifique
     */
    public function show($id)
    {
        try {
            $facture = Facture::with('patient')->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $facture
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Facture non trouvée',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Crée une nouvelle facture
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_facture' => 'required|date',
            'montant' => 'required|numeric|min:0',
            'status' => ['required', Rule::in(['payée', 'impayée', 'en attente'])],
            'patient_id' => 'required|exists:patients,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $facture = Facture::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $facture,
                'message' => 'Facture créée avec succès'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de la facture',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Met à jour une facture
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'date_facture' => 'sometimes|required|date',
            'montant' => 'sometimes|required|numeric|min:0',
            'status' => ['sometimes', 'required', Rule::in(['payée', 'impayée', 'en attente'])],
            'patient_id' => 'sometimes|required|exists:patients,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $facture = Facture::findOrFail($id);
            $facture->update($request->all());
            return response()->json([
                'success' => true,
                'data' => $facture,
                'message' => 'Facture mise à jour avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de la facture',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprime une facture
     */
    public function destroy($id)
    {
        try {
            $facture = Facture::findOrFail($id);
            $facture->delete();
            return response()->json([
                'success' => true,
                'message' => 'Facture supprimée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de la facture',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Récupère les factures d'un patient
     */
    public function getByPatient($patient_id)
    {
        try {
            if (!Patient::find($patient_id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Patient non trouvé'
                ], 404);
            }

            $factures = Facture::where('patient_id', $patient_id)
                             ->with('patient')
                             ->get();

            return response()->json([
                'success' => true,
                'data' => $factures
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des factures',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}