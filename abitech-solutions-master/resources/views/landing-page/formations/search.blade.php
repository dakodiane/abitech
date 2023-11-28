@extends('landing-page.layouts.template')

@section('content')
    <div class="bg-light hero-header" style="padding-bottom: 30px !important; margin-bottom: 30px">
        <div class="container">
            <div class="row g-5 align-items-center">
                <form class="col-lg-12 col-md-12 text-start text-lg-start" method="get" action="{{route('formation')}}">
                    <div class="form form-group ">
                        <label for="search" style="font-size: 26px"
                               class="font-weight-bolder mb-4 animated zoomIn">Recherchez votre
                            formation</label>
                        <div class="input-group">
                            <input type="text" class="form-control border-0 rounded-0 p-3" placeholder="Recherchez ici"
                                   aria-describedby="basic-addon2" name="search" value="{{request()->query('search')}}">
                            <div class="input-group-append rounded-0">
                                <button class="input-group-text p-3 btn bg-white rounded-0" type="submit"
                                        id="basic-addon2">
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
        <h3> Resultat(s): {{$formations->total()}}</h3>
        <form class="horizontal-scroll">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-3">
                    Filtrer par categorie:
                </div>
                <div class="formation-categories flex-grow-1">
                    @foreach($categories as $category)
                        <a id="{{$category->id}}" class="me-2 p-3 btn formation-category @if(in_array($category->id, request()->query('categories') ?? [])) active @endif"
                           href="{{
                            route('formation', [
                            'search'=>request()->query('search'),
                            'categories'=> (request()->query('$categories') ?? [$category->id])
                            ]
                            )}}"
                        >
                            {{$category->name}}
                        </a>

                    @endforeach
                </div>
                @if(request()->query('search') || request()->query('categories'))
                    <a class="btn"  href="{{route('formation')}}" type="button"  data-toggle="tooltip" data-placement="top" title="Effacer le filtre">
                        <i class="fa fa-times text-danger"  style="font-size: 25px"></i>
                    </a>
                @endif
            </div>
        </form>
        @if(count($formations) == 0)
            <div class="formation-empty d-flex align-items-center justify-content-center">
                Aucune formation disponible
            </div>
        @else
            <div class="formations-results mt-4">
                @foreach($formations as $formation)
                    <a class="formation d-flex align-items-center shadow p-4 my-3"
                       href="{{route('view-formation', ['id'=>$formation->id])}}">
                        <div class="formation-content flex-grow-1  d-flex align-items-center justify-content-start">
                            @if($formation->image)
                                <img class="formation-image rounded-1" src="{{asset($formation->image)}}" alt="" width="50" height="50">
                            @endif
                            <div>
                                <div class="formation-title font-weight-bolder">{{$formation->name}}</div>
                                <div class="formation-description text-muted">{{$formation->description}}</div>
                                <div class="formation-description text-muted"><a href="https://www.abitech-solution.tech/inscription">Inscription</a></div>
                            </div>
                        </div>
                        <div class="formation-follow">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                @endforeach
                @include('components/pagination', ['paginator'=>$formations])
            </div>
        @endif
    </div>
        <div class="container" style="text-align: center;">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('details') }}" class="btn btn-success">Toutes nos formations</a>
            </div>
        </div>

    <!-- About End -->
@endsection
