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
                <div class="">
                    <h5 class="modal-title" id="">{{$email ? 'Modifier' : 'Ajouter'}}</h5>
                    <hr>
                </div>
                <div class="card card-body">
                    <form class="form handleSubmit" id="{{$email ? 'update'.$email->id : 'addemail'}}" action="{{route('emails.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($email)<input type="hidden" name="id" value="{{$email->id}}" readonly> @endif
                        <div class="form-group">
                            <label for="subject" class="form-control-label">Objet</label>
                            <input type="text" class="form-control @if($errors->has('subject')) border-danger @endif" id="subject" name="subject" placeholder="Objet" required @if($email) value="{{$email->subject}}" @endif>
                            @if($errors->has('subject'))
                            <span class="text-danger">L'objet est obligatoire</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-control-label">Message</label>
                            <textarea class="form-control @if($errors->has('message')) border-danger @endif" id="message" name="message" placeholder="Message" required>@if($email){{$email->message}}@endif</textarea>
                            @if($errors->has('message'))
                            <span class="text-danger">La message est obligatoire</span>
                            @endif
                        </div>
                       


                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection