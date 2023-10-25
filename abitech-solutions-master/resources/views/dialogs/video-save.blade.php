<div class="modal fade" id="{{$video ? 'update'.$video->id : 'create'}}" tabindex="-1" role="dialog" aria-labelledby="{{$video ? 'update'.$video->id : 'create'}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">{{$video ? 'Modifier' : 'Ajouter'}}</h5>
                <i type="button" class="fa fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>

            <div class="modal-body">
                <form class="form"  action="{{ $video ? route('videos.update', $video->id) : route('videos.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($video)
                        <input type="hidden" name="id" value="{{$video->id}}" readonly>
                    @endif
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nom</label>
                        <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name" name="name" placeholder="Nom de la vidéo" required
                        @if($video) value="{{$video->name}}" @endif
                        >
                        @if($errors->has('name'))
                            <span class="text-danger">Le nom  est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea class="form-control @if($errors->has('description')) border-danger @endif"
                                  id="description" name="description" placeholder="Description de la vidéo" required>@if($video) {{$video->description}} @endif</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">La description  est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="video" class="form-control-label">Selectionner la vidéo</label>
                        <input type="file" accept="video/*" class="form-control @if($errors->has('video')) border-danger @endif" id="video" name="video" placeholder="Durée" >
                        @if($errors->has('video'))
                            <span class="text-danger">La durée de la catégorie est obligatoire</span>
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
