<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginRegisterController;

class ClasseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::orderBy('id', 'desc')->get();
        $rowNumber = 1;     
        return view('classes.index', compact("classes","rowNumber"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|unique:classes|max:100',
        ], [
            'libelle.unique' => 'Cette donnée existe déjà.', 
        ]);
  
        $classes = new Classe();
        $classes->setAttribute('libelle', $request->libelle);
        $classes->setAttribute('description', $request->description);
        $classes->save();   
        return redirect()->route('classes.index')->with('success','enregistrement reussi avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe, $id)
    {
        $classe = Classe::find($id);
        return view("classes.show", compact("classe"));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe, $id)
    {
        $classe = Classe::find($id);
        return view('classes.edit',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe, $id)
    {
        $classe = Classe::find($id);
        $request->validate([
            'libelle' => 'required|unique:classes,libelle,' . $classe->id .'|max:20',
        ]);
        
        $classe->setAttribute('libelle', $request->libelle);
        $classe->setAttribute('description', $request->description);
        $classe->update();  

        return redirect()->route('classes.index')->with('success','donnée modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe, $id)
    {
        $classe = Classe::find($id);
        $classe->delete();
        return redirect()->route('classes.index')->with('success','suppression reussie');
    }
}
