<div class="py-6 bg-gray">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            {{-- <div class="d-inline-block border rounded-pill text-danger px-4 mb-3">Catégories</div> --}}
            <h2 class="mb-5">Découvrez nos formations</h2>
        </div>
        <div class="row g-4">
            @foreach($popularFormations as $formation)
                <a class="formation d-flex align-items-center shadow p-4 my-3 wow fadeInUp"
                   href="{{route('view-formation', ['id'=>$formation->id])}}">
                    <div class="formation-content flex-grow-1  d-flex align-items-center justify-content-start">
                        @if($formation->image)
                            <img class="formation-image rounded-1" src="{{asset($formation->image)}}" alt="" width="50" height="50">
                        @endif
                        <div>
                            <div class="formation-title font-weight-bolder">{{$formation->name}}</div>
                            <div class="formation-description text-muted">{{$formation->description}}</div>
                        </div>
                    </div>
                    <div class="formation-follow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center wow fadeInUp">
            <a class="btn btn-danger rounded-pill py-2 px-5 mt-5" href="{{route('formation')}}">Toutes nos formations</a>
        </div>

    </div>
</div>
