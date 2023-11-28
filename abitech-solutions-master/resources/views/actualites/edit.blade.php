@extends('layouts.user_type.auth')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            @if($errors)
            {{-- errors in french --}}
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible d-flex align-items-center justify-content-between fade show bg-gradient-danger " role="alert">
                <div class="text-white">{{$error}}</div>
                <i class="fa fa-times cursor-pointer text-white" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            @endforeach
            @endif
            <div class="col-12">
                <div class="">
                    <h5 class="modal-title" id="">{{$actualite ? 'Modifier' : 'Ajouter'}}</h5>
                    <hr>
                </div>
                <div class="card card-body">
                    <form class="form handleSubmit" id="{{$actualite ? 'update'.$actualite->id : 'addactualite'}}" action="{{ $actualite ? route('actualites.update', $actualite->id) : route('actualites.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($actualite)<input type="hidden" name="actualite_id" value="{{ $actualite->id }}"> @endif
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nom</label>
                            <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name" name="name" placeholder="Nom de l'actualite" required @if($actualite) value="{{$actualite->nom}}" @endif>
                            @if($errors->has('name'))
                            <span class="text-danger">Le nom est obligatoire</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @if($errors->has('description')) border-danger @endif" id="description" name="description" placeholder="Description d'actualité" required>@if($actualite){{$actualite->description}}@endif</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">La description est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo1" class="form-control-label">Photo 1</label>
                            <input type="file" class="form-control" id="photo1" name="photo1">
                        </div>

                        <div class="form-group">
                            <label for="photo2" class="form-control-label">Photo 2</label>
                            <input type="file" class="form-control" id="photo2" name="photo2">
                        </div>

                        <div class="form-group">
                            <label for="photo3" class="form-control-label">Photo 3</label>
                            <input type="file" class="form-control" id="photo3" name="photo3">
                        </div>

                        <div class="form-group">
                            <label for="photo4" class="form-control-label">Photo 4</label>
                            <input type="file" class="form-control" id="photo4" name="photo4">
                        </div>

                        <div class="form-group">
                            <label for="photo5" class="form-control-label">Photo 5</label>
                            <input type="file" class="form-control" id="photo5" name="photo5">
                        </div>

                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection