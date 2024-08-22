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
                    <h5 class="modal-title" id="">{{$document ? 'Modifier' : 'Ajouter'}}</h5>
                    <hr>
                </div>
                <div class="card card-body">
                    <form class="form handleSubmit" id="{{$document ? 'update'.$document->id : 'addDocument'}}" action="{{ $document ? route('documents.update', $document->id) : route('documents.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($document)<input type="hidden" name="id" value="{{$document->id}}" readonly> @endif
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nom</label>
                            <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name" name="name" placeholder="Nom du document" required @if($document) value="{{$document->name}}" @endif>
                            @if($errors->has('name'))
                            <span class="text-danger">Le nom est obligatoire</span>
                            @endif
                        </div>

                      
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="document" class="form-control-label">Joindre le document (pdf, docx, excel)</label>
                                <input type="file" class="form-control" id="document" name="document" accept=".pdf,.doc,.docx,.xls,.xlsx" placeholder="Selectionner un document">
                                @if($errors->has('document'))
                                <span class="text-danger">{{$errors->first('document')}}</span>
                                @endif
                            </div>
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