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
                        <h6>Liste des emails ({{$emails->count()}})</h6>
                        <div class="buttons d-flex align-items-center ">
                            <form class="d-flex align-items-center" method="get" action="{{route('emails')}}">
                                <input type="text" name="search" class="form-control mx-2" placeholder="Rechercher">
                                <button class="btn btn-primary my-0 d-flex me-2" type="submit" role="button"><i class="fa fa-search me-2"></i> Filter </button>
                            </form>
                            <a class="btn btn-success my-0 d-flex" href="{{route('emails.create.view')}}" type="button" role="button">
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
                                            Objet
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Contenu
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Créé le
                                        </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($emails->count() > 0)
                                    @foreach($emails as $email)
                                    <tr class="px-2">
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">{{$email->subject}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{\Illuminate\Support\Str::limit($email->message, 25, $end='...')}}
                                                    <button class="btn p-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="{{$email->description}}">
                                                        <i class="fa fa-book"></i>
                                                    </button>
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p class="text-xs font-weight-bold mb-0">{{$email->created_at}}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="">
                                            Aucun mail n'a été enregistré.
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                            @include('components/pagination', ['paginator'=>$emails])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection