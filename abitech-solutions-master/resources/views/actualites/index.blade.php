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
                <div class="card mb-4">
                    <div class="card-header pb-0 mb-4 d-flex align-items-center justify-content-between flex-wrap">
                        <h6>Liste des actualites ({{$actualites->total()}})</h6>
                        <div class="buttons d-flex align-items-center ">
                            <form class="d-flex align-items-center" method="get" action="{{route('actualites')}}">
                                <input type="text" name="search" class="form-control mx-2" placeholder="Rechercher">
                                <button class="btn btn-primary my-0 d-flex me-2" type="submit" role="button"><i class="fa fa-search me-2"></i> Filter </button>
                            </form>
                            <a class="btn btn-success my-0 d-flex" href="{{route('actualites.create.view')}}" type="button" role="button">
                                <i class="fa fa-plus me-2"></i>
                                Ajouter
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-2 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nom
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo1
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Photo2
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Photo3
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Photo4
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Photo5
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Créé le
                                        </th>
                                        <th class="text-secondary opacity-7">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($actualites->count() > 0)
                                    @foreach($actualites as $actualite)
                                    <tr class="px-2">
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">{{$actualite->nom}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{\Illuminate\Support\Str::limit($actualite->description, 25, $end='...')}}
                                                    <button class="btn p-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="{{$actualite->description}}">
                                                        <i class="fa fa-book"></i>
                                                    </button>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if($actualite->photo1)
                                            <a href="{{ asset('storage/' . $actualite->photo1) }}" target="_blank">
                                                <span class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif">
                                                    Voir la photo 1
                                                </span>
                                            </a>
                                            @endif
                                        </td>

                                        <td class="align-middle">
                                            @if($actualite->photo2)
                                            <a href="{{ asset('storage/' . $actualite->photo2) }}" target="_blank">
                                                <span class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif">
                                                    Voir la photo 2
                                                </span>
                                            </a>
                                            @endif
                                        </td>

                                        <td class="align-middle">
                                            @if($actualite->photo3)
                                            <a href="{{ asset('storage/' .$actualite->photo3) }}" target="_blank">
                                                <span class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif">
                                                    Voir la photo 3
                                                </span>
                                            </a>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if($actualite->photo4)
                                            <a href="{{ asset('storage/' .$actualite->photo4) }}" target="_blank">
                                                <span class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif">
                                                    Voir la photo 4
                                                </span>
                                            </a>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if($actualite->photo5)
                                            <a href="{{ asset('storage/' .$actualite->photo5) }}" target="_blank">
                                                <span class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif">
                                                    Voir la photo 5
                                                </span>
                                            </a>
                                            @endif
                                        </td>
                                        <td class="align-middle ">
                                                    <span
                                                        class="badge @if($actualite->active) bg-gradient-success @else bg-gradient-danger @endif ">
                                                        {{$actualite->active ? 'Active' : 'Inactive'}}
                                                    </span>
                                                </td>

                                        <td class="align-middle ">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{\Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y')}}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center flex-wrap ">
                                                <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('actualites.details', ['id' => $actualite->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Voir">
                                                    <i class="fa fa-eye text-success cursor-pointer" role="button"></i>
                                                </a>
                                                <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('actualites.edit', ['id' => $actualite->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
                                                    <i class="fa fa-edit text-primary cursor-pointer" role="button"></i>
                                                </a>
                                                <form action="{{ route('actualites.toggle',[ 'id' => $actualite->id ]) }}" method="post">
                                                    @csrf
                                                    @if($actualite->active)
                                                    <button class="btn p-2  d-flex align-items-center me-1 " data-bs-toggle="tooltip" data-bs-placement="top" title="Désactiver">
                                                        <i class="fa fa-times text-danger cursor-pointer"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn p-2 d-flex align-items-center me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer">
                                                        <i class="fa fa-check text-success cursor-pointer"></i>
                                                    </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="">
                                            Aucune actualité n'a été enregistrée.
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                            @include('components/pagination', ['paginator'=>$actualites])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection