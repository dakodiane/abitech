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
                        <div class="card-header pb-0 mb-4 d-flex align-items-center justify-content-between flex-wrap">
                            <h6>Liste des formations ({{$formations->total()}})</h6>
                            <div class="buttons d-flex align-items-center ">
                                <form class="d-flex align-items-center" method="get" action="{{route('formations')}}">
                                    <input type="text" name="search" class="form-control mx-2"placeholder="Rechercher">
                                    <button class="btn btn-primary my-0 d-flex me-2" type="submit" role="button"><i class="fa fa-search me-2"></i> Filter </button>
                                </form>
                                <a class="btn btn-success my-0 d-flex" href="{{route('formation.create.view')}}" type="button" role="button">
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
                                            Type
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Informations supplémentaires
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
                                    @if($formations->count() > 0)
                                        @foreach($formations as $formation)
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">{{$formation->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{\Illuminate\Support\Str::limit($formation->description, 25, $end='...')}}
                                                            <button class="btn p-1" data-bs-toggle="popover"
                                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                                    data-bs-content="{{$formation->description}}">
                                                                <i class="fa fa-book"></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="align-middle ">
                                                   <span
                                                       class="badge @if($formation->category->active) bg-gradient-primary @else bg-gradient-danger @endif ">
                                                           {{$formation->category->name}}
                                                       </span>
                                                </td>
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{
                                                    $formation->additional_information ? count(json_decode($formation->additional_information) ?? '{}').' éléments' : 'Aucun élément'
                                                    }} </span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span
                                                        class="badge @if($formation->active) bg-gradient-success @else bg-gradient-danger @endif ">
                                                        {{$formation->active ? 'Active' : 'Inactive'}}
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                   <span class="text-secondary text-xs font-weight-bold">
                                                       {{\Carbon\Carbon::parse($formation->created_at)->format('d/m/Y')}}
                                                   </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('formations.details', ['id' => $formation->id])}}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                                        <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('formations.edit', ['id' => $formation->id])}}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Modifier">
                                                            <i class="fa fa-edit text-primary cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('formations.toggle',[ 'id' => $formation->id ]) }}"
                                                            method="post">
                                                            @csrf
                                                            @if($formation->active)
                                                                <button class="btn p-2  d-flex align-items-center me-1 "
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Désactiver">
                                                                    <i class="fa fa-times text-danger cursor-pointer"></i>
                                                                </button>
                                                            @else
                                                                <button class="btn p-2 d-flex align-items-center me-1"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Activer">
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
                                                Aucune formation n'a été enregistrée.
                                            </td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                                @include('components/pagination', ['paginator'=>$formations])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
