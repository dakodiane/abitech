<div class="modal fade" id="{{$category ? 'update'.$category->id : 'create'}}" tabindex="-1" role="dialog" aria-labelledby="{{$category ? 'update'.$category->id : 'create'}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">{{$category ? 'Modifier' : 'Ajouter'}}</h5>
                <i type="button" class="fa fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>

            <div class="modal-body">
                <form class="form"  action="{{ $category ? route('categories.update', $category->id) : route('categories.create')}}" method="post">
                    @csrf
                    @if($category)
                        <input type="hidden" name="category_uuid" value="{{$category->id}}" readonly>
                    @endif
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nom</label>
                        <input type="text" class="form-control @if($errors->has('name')) border-danger @endif" id="name" name="name" placeholder="Nom de la catégorie" required
                        @if($category) value="{{$category->name}}" @endif
                        >
                        @if($errors->has('name'))
                            <span class="text-danger">Le nom de la catégorie est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea class="form-control @if($errors->has('description')) border-danger @endif"
                                  id="description" name="description" placeholder="Description de la catégorie" required>@if($category) {{$category->description}} @endif</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">La description de la catégorie est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="duration" class="form-control-label">Durée</label>
                        <input type="text" class="form-control @if($errors->has('duration')) border-danger @endif" id="duration" name="duration" placeholder="Durée" required @if($category) value="{{$category->duration}}" @endif>
                        @if($errors->has('duration'))
                            <span class="text-danger">La durée de la catégorie est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sector" class="form-control-label">Secteur d'activité</label>
                        <input type="text" class="form-control  @if($errors->has('sector')) border-danger @endif" id="sector" name="sector" placeholder="Secteur d'activité" required  @if($category) value="{{$category->sector}}" @endif>
                        @if($errors->has('sector'))
                            <span class="text-danger">Le secteur d'activité de la catégorie est obligatoire</span>
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
