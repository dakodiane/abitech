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
                    <div class="">
                        <h5 class="modal-title" id="">{{$formation ? 'Modifier' : 'Ajouter'}}</h5>
                        <hr>
                    </div>
                    <div class="card card-body">
                        <form class="form handleSubmit" id="{{$formation ? 'update'.$formation->id : 'addFormation'}}" action="{{ $formation ? route('formations.update', $formation->id) : route('formations.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($formation)<input type="hidden" name="id" value="{{$formation->id}}" readonly> @endif
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nom</label>
                                <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name"
                                       name="name" placeholder="Nom de la formation" required
                                       @if($formation) value="{{$formation->name}}" @endif
                                >
                                @if($errors->has('name'))
                                    <span class="text-danger">Le nom  est obligatoire</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Type de formation</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($formation && $formation->category_id == $category->id) selected @endif>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description</label>
                                <textarea class="form-control @if($errors->has('description')) border-danger @endif"  id="description" name="description" placeholder="Description de la catégorie"
                                          required>@if($formation){{$formation->description}}@endif</textarea>
                                @if($errors->has('description'))
                                    <span class="text-danger">La description  est obligatoire</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Prix</label>
                                <input type="number" class="form-control @if($errors->has('price')) border-danger @endif" id="name"
                                       name="price" placeholder="Prix de la formation" required min="1"
                                       @if($formation) value="{{$formation->price}}" @endif
                                >
                                @if($errors->has('pice'))
                                    <span class="text-danger">Le prix  est obligatoire et doit etre plus grand que 1</span>
                                @endif
                            </div>
                            <div class="row">
                                @if($formation)
                                    <div class="form-group col-md-6">
                                        <label for="name" class="form-control-label">Image de couverture</label>
                                        <input type="file" class="form-control @if($errors->has('image')) border-danger @endif" id="name"
                                               name="image" accept="image/*" placeholder="Image de couverture"
                                        >
                                        @if($errors->has('image'))
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                @endif
                                @if($formation)
                                        <div class="form-group col-md-6">
                                            <label for="name" class="form-control-label">Video de présentation</label>
                                            <input type="file" class="form-control @if($errors->has('video')) border-danger @endif" id="name"
                                                   name="video"  accept="video/*" placeholder="Selectionner une vidéo"
                                            >
                                            @if($errors->has('video'))
                                                <span class="text-danger">{{$errors->first('video')}}</span>
                                            @endif
                                        </div>
                                @endif
                                    @if($formation)
                                        <div class="form-group col-md-6">
                                            <label for="name" class="form-control-label">Joindre un document (PDF)</label>
                                            <input type="file" class="form-control @if($errors->has('video')) border-danger @endif" id="name"
                                                   name="document"  accept="application/pdf*" placeholder="Selectionner un document pdf"
                                            >
                                            @if($errors->has('document'))
                                                <span class="text-danger">{{$errors->first('document')}}</span>
                                            @endif
                                        </div>
                                    @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-muted">
                                    Informations supplémentaires
                                </div>
                                <button class="btn p-2 d-flex align-items-center me-1 addInformation " @if($formation) id="{{$formation->id}}" @endif
                                title="Ajouter une information" type="button">
                                    <i class="fa fa-plus text-primary cursor-pointer" role="button"></i>
                                </button>
                            </div>
                            <div id="additionnalInformationsForm{{$formation->id ?? ''}}">
                                @if($formation && $formation->additional_information)
                                    @foreach(json_decode($formation->additional_information ?? '{}') as $additionalInformation)
                                        <div class="additionnalInformationsForm row align-items-center" id="additionnalInformationsForm{{$loop->index}}">
                                            <div class="col-md-5"><label for="">Libellé</label>
                                                <input type="text" required class="form-control" name="additional_information[label][]" value="{{$additionalInformation->label}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Valeur</label>
                                                <input type="text" class="form-control" name="additional_information[value][]" value="{{$additionalInformation->value}}">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                <i class="fa fa-minus text-danger cursor-pointer" role="button" id="removeInformation" additionnalId="{{$loop->index}}"
                                                   onclick="removeAdditionalForm({{$loop->index}})"></i>
                                            </div>
                                        </div>
                                    @endforeach
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
