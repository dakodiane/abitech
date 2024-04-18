@extends('landing-page.layouts.template')

@section('content')
<div class="bg-light hero-header" style="padding-bottom: 30px !important; margin-bottom: 30px">
    <div class="container">
        <div class="row g-5 align-items-center">
            <form class="col-lg-12 col-md-12 text-start text-lg-start" method="get" action="{{route('meb')}}">
                <div class="form form-group ">
                    <label for="search" style="font-size: 26px" class="font-weight-bolder mb-4 animated zoomIn">Recherchez</label>
                    <div class="input-group">
                        <input type="text" class="form-control border-0 rounded-0 p-3" placeholder="Recherchez ici" aria-describedby="basic-addon2" name="search" value="{{request()->query('search')}}">
                        <div class="input-group-append rounded-0">
                            <button class="input-group-text p-3 btn bg-white rounded-0" type="submit" id="basic-addon2">
                                <i class="fa fa-search"> </i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <h3> Resultat(s): {{$videos->total()}}</h3>

    @if(count($videos) == 0)
    <div class="video-empty d-flex align-items-center justify-content-center">
        Aucune video disponible
    </div>
    @else
    <div class="video-results mt-4 row">
        @foreach($videos as $video)
        <div class="video col-md-3 mb-2 " style="max-height: 250px; height: 250px;margin-left:40px">
            <div>
                <iframe style="max-height: 200px; height: 200px" height="200" src="https://www.youtube.com/embed/{{$video->youtube_url}}" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="footer w-100 p-2 cursor-pointer">
                <div style="font-weight: bolder">{{$video->name}}</div>
                <div class="formation-description">{{$video->description}}</div>
            </div>
        </div>
        @endforeach
        @include('components/pagination', ['paginator'=>$videos])
    </div>
    @endif
</div>

<!-- About End -->
@endsection