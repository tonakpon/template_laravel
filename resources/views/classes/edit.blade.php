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
    <h4>Modification de la classe</h4>
<form action="{{ route('classes.update', $classe->id) }}" method="POST" enctype="multipart/form-data">
    <fieldset class="fieldset">
    @csrf
    @method('put')
        <div class="col-md-10 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Libelle de la classe<span class="required">*</span></strong></label>
            <input type="text" class="form-control" id="" value="{{ $classe->libelle }}" name="libelle" placeholder="Exemple : Licence 1" required>
        </div>
        <div class="col-md-10 offset-md-1 mb-3">
            <label for="" class="form-label"><strong>Description</strong></label>
            <textarea name="description" id="" cols="10" rows="5" class="form-control" name="description">{{ $classe->description }}</textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 text-center">
            <button class="btn btn-primary" type="submit">Enregistrer</button>&nbsp &nbsp<a class="btn btn-secondary" href="{{ route('classes.index')}}">Annuler</a> <br><br><br>
        </div>
    </fieldset>
</form>
@endsection