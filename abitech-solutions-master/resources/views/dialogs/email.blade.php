<div class="modal fade" id="{{$email ? 'update'.$email->id : 'create'}}" tabindex="-1" role="dialog" aria-labelledby="{{$email ? 'update'.$email->id : 'create'}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">{{$email ? 'Modifier' : 'Ajouter'}}</h5>
                <i type="button" class="fa fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>

            <div class="modal-body">
                <form class="form"  action="{{route('categories.create')}}" method="post">
                    @csrf
                    @if($email)
                        <input type="hidden" name="email_uuid" value="{{$email->id}}" readonly>
                    @endif
                    <div class="form-group">
                        <label for="subject" class="form-control-label">Object</label>
                        <input type="text" class="form-control @if($errors->has('subject')) border-danger @endif" id="subject" name="subject" placeholder="Nom de la catégorie" required
                        @if($email) value="{{$email->subject}}" @endif
                        >
                        @if($errors->has('subject'))
                            <span class="text-danger">L'objet est obligatoire</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-control-label">Contenu</label>
                        <textarea class="form-control @if($errors->has('message')) border-danger @endif"
                                  id="message" name="message" placeholder="Contenu" required>@if($email) {{$email->message}} @endif</textarea>
                        @if($errors->has('message'))
                            <span class="text-danger">Le contenu est obligatoire</span>
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
