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
                            <h6>Videos ({{$videos->count()}})</h6>
                            <div class="buttons  d-flex align-items-center ">
                                <form class="d-flex align-items-center" method="get" action="{{ route('videos') }}">
                                    <input type="text" name="search" class="form-control mx-2"
                                           placeholder="Rechercher">
                                    <button class="btn btn-primary my-0 d-flex me-2" type="submit"
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
                            @include('dialogs.video-save', ['video' => null])
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
                                            Vidéos
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
                                    @if($videos->count() > 0)
                                        @foreach($videos as $video)
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">{{$video->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{Str::limit($video->description, 25, $end='...')}}
                                                            <button class="btn p-1" data-bs-toggle="popover"
                                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                                    data-bs-content="{{$video->description}}">
                                                                <i class="fa fa-book"></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-sm">
                                                  <div class="d-flex align-items-center">
                                                      {{--i (eye) click open viiew model--}}
                                                      <button  data-bs-toggle="modal" data-bs-placement="top"
                                                               data-bs-target="#view{{$video->id}}video" title="Voir" >
                                                          Cliquer pour voir
                                                          <i class="fa fa-eye text-success cursor-pointer"></i>
                                                      </button>
                                                      {{--modal to view video--}}
                                                      <div class="modal fade" id="view{{$video->id}}video" tabindex="-1" role="dialog" aria-labelledby="view{{$video->id}}video" aria-hidden="true">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                                              <video class="modal-content" controls height="400" style="max-height: 400px" onfocusout="this.pause();">
                                                                  <source src="{{asset($video->video)}}" type="video/{{\Str::afterLast($video->video, '.')}}" />
                                                                  Your browser does not support the video tag.
                                                              </video>
                                                          </div>
                                                      </div>

                                                  </div>
                                                </td>
                                                <td class="align-middle ">
                                                    <span
                                                        class="badge @if($video->active) bg-gradient-success @else bg-gradient-danger @endif ">
                                                        {{$video->active ? 'Active' : 'Inactive'}}
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                   <span class="text-secondary text-xs font-weight-bold">
                                                       {{$video->created_at->format('d/m/Y')}}
                                                   </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <button class="btn p-2 d-flex align-items-center me-1 "
                                                                data-bs-toggle="modal" data-bs-placement="top"
                                                                data-bs-target="#view{{$video->id}}"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </button>
                                                        <button class="btn p-2 d-flex align-items-center me-1 "
                                                                data-bs-toggle="modal" data-bs-placement="top"
                                                                data-bs-target="#update{{$video->id}}"
                                                                title="Modifier">
                                                            <i class="fa fa-edit text-primary cursor-pointer"
                                                               role="button"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('videos.activate',[ 'id' => $video->id ]) }}"
                                                            method="post">
                                                            @csrf
                                                            @if($video->active)
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
                                            @include('dialogs.video-save', ['video' => $video])

                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class=" text-center">
                                                Aucune vidéo  n'a été enregistrée.
                                            </td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                                @include('components/pagination', ['paginator'=>$videos])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
