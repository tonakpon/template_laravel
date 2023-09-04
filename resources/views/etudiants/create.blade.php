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
<h4>Ajouter un nouveau étudiant maintenant</h4>
    <form action="{{ route('etudiants.store') }}" method="POST">
    @csrf
    <fieldset class="fieldset">
            <br>
            <div class="row">
            <div class="col-md-4 offset-md-1 mb-3">
                <label for="" class="form-label"><strong>Nom<span class="required">*</span></strong></label>
                <input type="text" class="form-control" id="" value="" name="name" placeholder="Nom" required>
            </div>
            <div class="col-md-4 offset-md-1 mb-3">
                <label for="" class="form-label"><strong>Prénoms<span class="required">*</span></strong></label>
                <input type="text" class="form-control" id="" value="" name="fname" placeholder="Prénoms" required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 offset-md-1 mb-3">
                <label for="" class="form-label"><strong>Tel<span class="required">*</span></strong></label>
                <input type="number" class="form-control" id="" value="" name="tel" placeholder="Tel" required>
                    
            </div>
            <div class="col-md-4 offset-md-1 mb-3">
                <label for="" class="form-label"><strong>Date Naiss<span class="required">*</span></strong></label>
                <input type="date" class="form-control" id="" value="" name="date" max="{{$DateLimite}}" required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-9 offset-md-1 mb-3">
            <label for="classe_id"><strong>Classe<span class="required">*</span></strong></label>
                <select name="classe_id" id="classe_id" class="form-select">
                    <option value="">Sélectionner une classe</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-11 text-center">
            <button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp &nbsp<a class="btn btn-secondary" href="{{ route('etudiants.index')}}">Annuler</a> <br><br><br>
            </div>
    </fieldset>
    </form>
    <script src="bootstrap/js/bootstrap.min.css"></script>
@endsection