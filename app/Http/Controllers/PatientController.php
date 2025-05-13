<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetch all patients frome the database============
        $patients = Patient::all();
        return response()->json($patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation the requeste data==================
        $request->validate([
            "nom"=> "required|string",
            "prenom"=> "required|string",
            "date_naissance"=>"nullable|date",
            "telephone"=> "nullable|string",
            "email"=>"nullable|email",
            "adresse"=> "nullable|string",
        ]);
        // create new patient================
        $patient =Patient:: create($request->all());
        return response()->json($patient,201);
        //201 : resource created===============
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // find the patient by id or return e 404 error if not fond==============
       $patients = Patient::findOrFail($id);
       return response()->json($patients);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idt)
    {
        //validation the requeste data==================
        $request->validate([
            "nom"=> "sometimes|string",
            "prenom"=> "sometimes|string",
            "date_naissance"=>"nullable|date",
            "telephone"=> "nullable|string",
            "email"=>"nullable|email",
            "adresse"=> "nullable|string",
        ]);
         // find the patient by id or return e 404 error if not fond===
        $patient = Patient::findOrFail($idt);
        // update the patient================
        $patient->update($request->all());
        return response()->json($patient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(null,204);
        // 204:no content==============================
    }
}
