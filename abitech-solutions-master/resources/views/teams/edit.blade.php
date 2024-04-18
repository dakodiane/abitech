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
                    <h5 class="modal-title" id="">{{$team ? 'Modifier' : 'Ajouter'}}</h5>
                    <hr>
                </div>
                <div class="card card-body">
                    <form class="form handleSubmit" id="{{$team ? 'update'.$team->id : 'addteam'}}" action="{{ $team ? route('teams.update', $team->id) : route('teams.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($team)<input type="hidden" name="id" value="{{$team->id}}" readonly> @endif
                        <div class="form-group">
                            <label for="nom" class="form-control-label">Nom</label>
                            <input type="text" class="form-control @if($errors->has('nom')) border-danger @endif" id="nom" name="nom" placeholder="Nom complet" required @if($team) value="{{$team->nom}}" @endif>
                            @if($errors->has('nom'))
                            <span class="text-danger">Le nom est obligatoire</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="poste" class="form-control-label">Poste</label>
                            <textarea class="form-control @if($errors->has('poste')) border-danger @endif" id="poste" name="poste" placeholder="Poste" required>@if($team){{$team->poste}}@endif</textarea>
                            @if($errors->has('poste'))
                            <span class="text-danger">La poste est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="linkedin" class="form-control-label">Lien linkedIn</label>
                            <input type="text" class="form-control @if($errors->has('linkedin')) border-danger @endif" id="linkedin" name="linkedin" placeholder="Lien" required @if($team) value="{{$team->linkedin}}" @endif>
                            @if($errors->has('linkedin'))
                            <span class="text-danger">Le lien est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Adresse E-mail</label>
                            <input type="text" class="form-control @if($errors->has('email')) border-danger @endif" id="email" name="email" placeholder="Adresse" required @if($team) value="{{$team->email}}" @endif>
                            @if($errors->has('email'))
                            <span class="text-danger">L'adresse est obligatoire</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="photo" class="form-control-label">Photo du membre</label>
                            <input type="file" class="form-control @if($errors->has('photo')) border-danger @endif" id="photo" name="photo" accept="image/*" placeholder="Photo du membre">
                            @if($errors->has('photo'))
                            <span class="text-danger">{{$errors->first('photo')}}</span>
                            @endif
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