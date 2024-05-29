@extends('layouts.user_type.auth')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                @if($errors)
                    {{--            errors in french --}}
                    @foreach ($errors->all() as $error)
                        <div
                            class="alert alert-danger alert-dismissible d-flex align-items-center justify-content-between fade show bg-gradient-danger "
                            role="alert">
                            <div class="text-white">{{$error}}</div>
                            <i class="fa fa-times cursor-pointer text-white" data-bs-dismiss="alert"
                               aria-label="Close"></i>
                        </div>
                    @endforeach
                @endif
                <div class="col-12">
                    
                    <div class="card mb-4">
                        <div class="card-body p-2 pb-5">
                            <div class="container">
                        
                                <div class="mt-5">
                                    <h5 class="mb-0">Nom de l'offre</h5> <hr>
                                    {{$offre->nom}}
                                </div>
                                <div class="mt-5">
                                    <h5 class="mb-0">Description</h5> <hr>
                                    {{$offre->description}}
                                </div>
                                <div class="mt-5">
                                    <h5 class="mb-0">Nom du bouton</h5> <hr>
                                    {{$offre->button_name}}
                                </div>
                                <div class="mt-5">
                                    <h5 class="mb-0">Lien du bouton</h5> <hr>
                                    {{$offre->lien}}
                                </div>
                                @if($offre->photo)
                                        <img src="{{asset($offre->photo)}}" style="width: 250px;height:250px;" />
                                  
                                @endif
                           
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
