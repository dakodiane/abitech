@extends('layouts.user_type.auth')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                @if($errors)
                    {{-- errors in french --}}
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
                            <h6>Liste des documents ({{$documents->total()}})</h6>
                            <div class="buttons d-flex align-items-center ">
                                <form class="d-flex align-items-center" method="get" action="{{route('documents')}}">
                                    <input type="text" name="search" class="form-control mx-2"placeholder="Rechercher">
                                    <button class="btn btn-primary my-0 d-flex me-2" type="submit" role="button"><i class="fa fa-search me-2"></i> Filter </button>
                                </form>
                                <a class="btn btn-success my-0 d-flex" href="{{route('document.create.view')}}" type="button" role="button">
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
                                    @if($documents->count() > 0)
                                        @foreach($documents as $document)
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">{{$document->name}}</p>
                                                    </div>
                                                </td>
                                               
                                                <td class="align-middle ">
                                                    <span
                                                        class="badge @if($document->active) bg-gradient-success @else bg-gradient-danger @endif ">
                                                        {{$document->active ? 'Active' : 'Inactive'}}
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                   <span class="text-secondary text-xs font-weight-bold">
                                                       {{\Carbon\Carbon::parse($document->created_at)->format('d/m/Y')}}
                                                   </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('documents.details', ['id' => $document->id])}}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                                        <a class="btn p-2 d-flex align-items-center me-1 " href="{{route('documents.edit', ['id' => $document->id])}}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Modifier">
                                                            <i class="fa fa-edit text-primary cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('documents.toggle',[ 'id' => $document->id ]) }}"
                                                            method="post">
                                                            @csrf
                                                            @if($document->active)
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
                                                Aucun document n'a été enregistré.
                                            </td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                                @include('components/pagination', ['paginator'=>$documents])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
