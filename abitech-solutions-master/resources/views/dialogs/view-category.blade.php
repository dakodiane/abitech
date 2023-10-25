<div class="modal fade" id="{{'view'.$category->id }}" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Détails de la catégorie</h5>
                <i type="button" class="fa fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-6 text-dark">
                        <div class="text-start text-bold">Nom</div>
                        <p class="text-start">{{$category->name}}</p>
                    </div>
                    <div  class="col-md-6 col-6 text-bold">
                        <div class="text-start text-dark">Durée</div>
                        <p class="text-start">{{$category->duration}}</p>
                    </div>
                    <div class="col-md-6 col-6 text-bold text-dark">
                        <div class="text-start">Secteur d'activité</div>
                        <p class="text-start">{{$category->sector}}</p>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="text-start text-bold text-dark">Nombre de formations</div>
                        <p class="text-start">{{$category->relativeFormationsCount() ?? 'Aucune formation dans cette catégorie '}}</p>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="text-start text-bold text-dark">Description</div>
                        <p class="text-start ">
                            {{\Illuminate\Support\Str::limit($category->description, 45, $end='...')}}
                            <button class="btn p-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="{{$category->description}}">
                                <i class="fa fa-book" ></i>
                            </button>
                        </p>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="text-start text-bold text-dark">Statut</div>
                        <p class="text-start">
                            <span class="badge @if($category->active) bg-gradient-success @else bg-gradient-danger @endif ">{{$category->active ? 'Active' : 'Inactive'}}</span>
                        </p>
                    </div>
                    <div class="col-md-6 col-6 text-bold">
                        <div class="text-start text-dark">Dernière modification</div>
                        <p class="text-start">{{\Carbon\Carbon::parse($category->updated_at)->format('d/m/Y H:i')}}</p>
                    </div>
                    <div class="col-md-6 col-6 text-bold">
                        <div class="text-start text-dark">Date de création</div>
                        <p class="text-start">{{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y H:i')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
