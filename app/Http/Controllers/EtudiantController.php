<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginRegisterController;

class EtudiantController extends Controller
{
    /*public function index()
    {
        $etudiant = Etudiant::latest()->paginate();
        $long=20;
        $larg=15;
        $rowNumber = 1;     
        return view('index', compact("long","larg","etudiant","rowNumber"));
    }*/
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $etudiant = Etudiant::orderBy('id', 'desc')->get();
        $classes = Classe::all(); 
        $rowNumber = 1;    
        return view('etudiants.index', compact("classes","etudiant","rowNumber"));
    }
    public function create()
    {
        $DateLimite = date('Y-m-d');
        $classes = Classe::all(); 
        return view('etudiants.create', compact('classes','DateLimite'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'tel' => 'required|unique:etudiants|max:20',
            'date' => 'required',
            'classe_id' => 'required',
        ]);
  
            $etudiants = new Etudiant();
            $etudiants->setAttribute('name', $request->name);
            $etudiants->setAttribute('fname', $request->fname);
            $etudiants->setAttribute('tel', $request->tel);
            $etudiants->setAttribute('date', $request->date);
            $etudiants->setAttribute('classe_id', $request->classe_id);
            $etudiants->save();   
        return redirect()->route('etudiants.index')->with('success','Enregistrement reussi avec succès');
    }
    public function show(Etudiant $etudiant) {
        $etudiant=Etudiant::all();
        return view("show", compact("etudiant"));
    }
    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all(); 
        return view('etudiants.edit',compact('etudiant', 'classes'));
    }
    public function update(Request $request, Etudiant $etudiant)
    {   
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'tel' => 'required|unique:etudiants,tel,' . $etudiant->id . '|max:20',
            'date' => 'required',
            'classe_id' => 'required',
        ]);
        
        $etudiant->setAttribute('name', $request->name);
        $etudiant->setAttribute('fname', $request->fname);
        $etudiant->setAttribute('tel', $request->tel);
        $etudiant->setAttribute('date', $request->date);
        $etudiant->setAttribute('classe_id', $request->classe_id);
        $etudiant->update();

        return redirect()->route('etudiants.index')->with('success','Donnée modifiée avec succès');
    }
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success','Suppression reussie avec succès');
    }
    
}
