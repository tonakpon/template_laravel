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
<h4>Ajouter une nouvelle matière</h4>
    <form action="{{ route('classes.store') }}" method="post">  
        @csrf
        <br>
        
            <div class="col-md-10 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Libelle<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="" name="libelle" placeholder="Exemple: Lience 1" required>
        </div>
        <div class="col-md-10 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Description</strong></label>
            <textarea name="description" id="" cols="10" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 text-center">
        <button class="btn btn-primary" type="submit">Enregistrer</button> <a class="btn btn-secondary" href="{{ route('classes.index')}}">Annuler</a> <br><br><br>
        </div>
    </form>
@endsection