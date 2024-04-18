@extends('landing-page.layouts.template')

@section('content')
<div class="hero-formation" style="padding-bottom: 170px !important; margin-bottom: 30px">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 col-md-12 text-start d-flex align-items-center justify-content-between">
                <div class="form form-group d-flex align-items-center ">
                    @if($formation->image)
                    <img class="formation-image rounded-1 bg-white me-3" src="{{asset($formation->image)}}" alt="" width="50" height="50">
                    @endif
                    <div>
                        <h1 style="font-size: 36px; margin-bottom: 10px  !important;color:aliceblue" class="font-weight-bolder mb-4">{{$formation->name}}</h1>
                        <div class="formation-date">Du {{$formation->created_at}}</div>
                    </div>
                </div>
                @if($formation->document)
                <a class="d-flex align-items-center justify-content-center  p-2 rounded-1" download href="{{asset($formation->document)}}">
                    <i class="fa fa-download text-danger"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container" style="min-height: 40vh">
    @if($formation->video)
    <video class="formation-video" controls>
        <source src="{{asset($formation->video)}}" type="video/{{\Str::afterLast($formation->video, '.')}}" />
    </video>
    @endif

    <div class="mt-5">
        <h2>Description</h2>
        <hr>
        {{$formation->description}}
    </div>
    <div class="mt-5" style="text-align: center;">

        <a href="https://www.abitech-solution.tech/inscription" class="btn btn-danger">Inscription</a>

    </div>
    <div class="mt-5">
        <h2>Informations supplémentaires</h2>
        <hr>
        <div class="row">
            @foreach(json_decode($formation->additional_information ?? '{}') as $additionalInformation)
            <div class=" additional-info">
                <div class="additional-info-title">{{$additionalInformation->label}}</div>
                <div class="formation-description">{{$additionalInformation->value}}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection