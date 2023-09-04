@extends('include.master')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
    </div>
@endif

    <style>
        .required {
            color : red;
        }
    </style>
    
@php
    $DateLimite = date('Y-m-d');
@endphp

    <h4>Modification des informations</h4> 
<form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" enctype="multipart/form-data">
    <fieldset class="fieldset"><br>
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Nom<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="{{ $etudiant->name }}" name="name" placeholder="Nom" required>
        </div>
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Prénoms<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="{{ $etudiant->fname }}" name="fname" placeholder="Prénoms" required>
        </div>
    </div>
        <div class="row">
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Tel<span class="required">*</span></strong></label>
            <input type="number" class="form-control" id="" value="{{ $etudiant->tel }}" name="tel" placeholder="Tel" required>        
        </div>
        <div class="col-md-4 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Date Naiss<span class="required">*</span></strong></label>
            <input type="date" class="form-control" id="" value="{{ $etudiant->date }}" name="date" max="{{$DateLimite}}" required>
        </div>
    </div>
    <div class="row">
            <div class="col-md-9 offset-md-1 mb-3">
            <label for="classe_id"><strong>Classe<span class="required">*</span></strong></label>
                <select name="classe_id" id="classe_id" class="form-select" value="{{ $etudiant->get_classe->classe_id }}">
                    <optgroup label="Valeur par défaut">
                        <option value="{{ $etudiant->classe_id }}"> {{ $etudiant->get_classe->libelle }} </option>
                    </optgroup>
                    <optgroup label="Valeur disponibles">
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-11 text-center">
                <button class="btn btn-primary" type="submit">Enregistrer</button> <a class="btn btn-secondary" href="{{ route('etudiants.index')}}">Annuler</a> <br><br><br>
            </div>
    </div>
    </fieldset>
</form>
@endsection