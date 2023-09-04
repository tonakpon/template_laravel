@extends('include.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Détail sur la classe</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Retour</a>
            </div>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $classe->libelle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $classe->description }}
            </div>
        </div>
    </div>
@endsection