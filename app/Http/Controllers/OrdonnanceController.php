<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;


    class OrdonnanceController extends Controller
    {
        public function index()
        {
            return response()->json(Ordonnance::all());
        }
    
        public function store(Request $request)
        {
            $validated = $request->validate([
                'date' => 'required|date',
                'traitement' => 'required|string',
                'note' => 'nullable|string',
                'dousage' => 'required|string',
                'duree' => 'required|string',
                'patient_id' => 'required|exists:patients,id',
            ]);
    
            $ordonnance = Ordonnance::create($validated);
    
            return response()->json($ordonnance, 201);
        }
    
        public function show($id)
        {
            $ordonnance = Ordonnance::findOrFail($id);
            return response()->json($ordonnance);
        }
    
        public function update(Request $request, $id)
        {
            $ordonnance = Ordonnance::findOrFail($id);
    
            $ordonnance->update($request->only([
                'date', 'traitement', 'note', 'dousage', 'duree', 'patient_id'
            ]));
    
            return response()->json($ordonnance);
        }
    
        public function destroy($id)
        {
            $ordonnance = Ordonnance::findOrFail($id);
            $ordonnance->delete();
    
            return response()->json(['message' => 'Ordonnance supprimée']);
        }
}
