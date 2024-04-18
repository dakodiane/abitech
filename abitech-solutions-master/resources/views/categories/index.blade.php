@extends('layouts.user_type.auth')

@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                @if($errors)
                    {{--errors in french --}}
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
                            <h6>Types de formations ({{$categories->count()}})</h6>
                            <div class="buttons  d-flex align-items-center ">
                                <form class="d-flex align-items-center" method="get" action="{{ route('categories') }}">
                                    <input type="text" name="search" class="form-control mx-2"
                                           placeholder="Rechercher">
                                    <button class="btn btn-primary my-0 d-flex me-2"  type="submit"
                                       role="button">
                                        <i class="fa fa-search me-2"></i>
                                        Filter
                                    </button>
                                </form>
                                <a class="btn btn-success my-0 d-flex" data-bs-toggle="modal" data-bs-target="#create"
                                   role="button">
                                    <i class="fa fa-plus me-2"></i>
                                    Ajouter
                                </a>
                            </div>
                            @include('dialogs.category-dialog', ['category' => null])
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
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Durée
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Secteur
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
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">{{$category->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{\Illuminate\Support\Str::limit($category->description, 25, $end='...')}}
                                                            <button class="btn p-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="{{$category->description}}">
                                                                <i class="fa fa-book" ></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$category->duration}}</span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$category->sector}}</span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span
                                                        class="badge @if($category->active) bg-gradient-success @else bg-gradient-danger @endif ">
                                                        {{$category->active ? 'Active' : 'Inactive'}}
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                   <span class="text-secondary text-xs font-weight-bold">
                                                       {{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}
                                                   </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <button class="btn p-2 d-flex align-items-center me-1 "
                                                                data-bs-toggle="modal" data-bs-placement="top"
                                                                data-bs-target="#view{{$category->id}}"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </button>
                                                        <button class="btn p-2 d-flex align-items-center me-1 "
                                                                data-bs-toggle="modal" data-bs-placement="top"
                                                                data-bs-target="#update{{$category->id}}"
                                                                title="Modifier">
                                                            <i class="fa fa-edit text-primary cursor-pointer"
                                                               role="button"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('categories.activate',[ 'id' => $category->id ]) }}"
                                                            method="post">
                                                            @csrf
                                                            @if($category->active)
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
                                            @include('dialogs.category-dialog', ['category' => $category])
                                            @include('dialogs.view-category', ['category' => $category])
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="">
                                                Aucune catégorie de formation n'a été enregistrée.
                                            </td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
