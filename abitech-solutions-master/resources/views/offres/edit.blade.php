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
                    <h5 class="modal-title" id="">{{$offre ? 'Modifier' : 'Ajouter'}}</h5>
                    <hr>
                </div>
                <div class="card card-body">
                    <form class="form handleSubmit" id="{{$offre ? 'update'.$offre->id : 'addoffre'}}" action="{{ $offre ? route('offres.update', $offre->id) : route('offres.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($offre)<input type="hidden" name="offre_id" value="{{ $offre->id }}"> @endif
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nom</label>
                            <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name" name="name" placeholder="Nom de l'offre" required @if($offre) value="{{$offre->nom}}" @endif>
                            @if($errors->has('name'))
                            <span class="text-danger">Le nom est obligatoire</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @if($errors->has('description')) border-danger @endif" id="description" name="description" placeholder="Description d'actualité" required>@if($offre){{$offre->description}}@endif</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">La description est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Nom du bouton</label>
                            <textarea class="form-control @if($errors->has('button_name')) border-danger @endif" id="button_name" name="button_name" placeholder="Nom du bouton" required>@if($offre){{$offre->button_name}}@endif</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">Le nom du bouton est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Lien du bouton</label>
                            <textarea class="form-control @if($errors->has('lien')) border-danger @endif" id="lien" name="lien" placeholder="Lien du bouton" required>@if($offre){{$offre->lien}}@endif</textarea>
                            @if($errors->has('lien'))
                            <span class="text-danger">Le lien est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-control-label">Photo </label>
                            <input type="file" class="form-control" id="photo" name="photo">
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