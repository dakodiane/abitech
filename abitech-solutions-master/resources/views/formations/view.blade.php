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
                    <div class="form form-group d-flex align-items-center ">
                        @if($formation->image)
                            <img class="formation-image rounded-1 bg-white me-3" src="{{asset($formation->image)}}" alt="" width="50" height="50">
                        @endif
                        <div>
                            <h1 style="font-size: 36px; margin-bottom: 10px  !important;"class="font-weight-bolder mb-4">{{$formation->name}}</h1>
                            <div class=" formation-date">Cree le {{$formation->created_at->format('d/m/Y')}}</div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body p-2 pb-5">
                            <div class="container">
                                @if($formation->video)
                                    <video class="formation-video" controls>
                                        <source src="{{asset($formation->video)}}" type="video/{{\Str::afterLast($formation->video, '.')}}"/>
                                    </video>
                                @endif
                                <div class="mt-5">
                                    <h5 class="mb-0">Description</h5> <hr>
                                    {{$formation->description}}
                                </div>
                                <div class="mt-5">
                                    <h5 class="mb-0">Informations supplémentaire</h5>
                                    <hr>
                                    <div class="row">
                                        @foreach(json_decode($formation->additional_information ?? '{}') as $additionalInformation)
                                            <div class=" additional-info col-md-6 ">
                                                <div style="font-weight: bolder">{{$additionalInformation->label}}</div>
                                                <div class="formation-description">{{$additionalInformation->value}}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <br><a href="https://www.abitech-solution.tech/inscription" type="button" class="btn btn-primary">Inscrivez-vous</a>
                                </div>
                            </div>
                            <br><br><br><a href="{{route('details')}}" type="button" class="btn btn-primary">Toutes nos formations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
