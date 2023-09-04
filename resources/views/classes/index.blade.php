@extends('include.master')

@section('content')

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h4>Affichage des classes enregistrées</h4>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('classes.create')}}">Ajouter</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la classe</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($classes as $item)
                    <tr>
                        <td>{{ $rowNumber++ }}</td>
                        <td>{{ $item->libelle }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <form action="{{ route('classes.destroy',$item->id) }}" method="post">
                                <a class="btn btn-primary" href="{{ route('classes.show',$item->id) }}"><i class="bi bi-ticket-detailed"></i></a>
                                  &nbsp
                                <a class="btn btn-primary" href="{{ route('classes.edit',$item->id) }}"><i class="bi bi-pencil-square"></i></a>
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit" class="btn btn-danger">Supprimer</button> -->
                                &nbsp
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$item->id}}">
    <i class="bi bi-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel_{{$item->id}}">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       êtes vous sûrs de vouloir supprimer la matière {{$item->libelle}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="submit" class="btn btn-danger">Oui</button> 
      </div>
    </div>
  </div>
</div>
                            </form> 
                      </td>
                    </tr  >

                   <!-- Button trigger modal -->

                    @endforeach
                    </tbody>
                </table>
@endsection
