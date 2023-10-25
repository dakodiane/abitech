<div class="py-6 ">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            {{-- <div class="d-inline-block border rounded-pill text-danger px-4 mb-3">Catégories</div> --}}
            <h2 class="mb-5">Nos catégories de formations</h2>
        </div>
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white rounded h-100">
                        <div class="d-flex justify-content-between">
                            <div class="service-icon">
                                <i class="fa fa-user-tie fa-2x"></i>
                            </div>
                            <a class="service-btn" href="{{ route('formation', ['categories' => [$category->id] ])}}">
                                <i class="fa fa-arrow-right fa-2x"></i>
                            </a>
                        </div>
                        <div class="p-5">
                            <h5 class="mb-3">{{$category->name}}</h5>
                            <span class="formation-description">{{$category->description}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="d-flex justify-content-center wow fadeInUp">
            <a class="btn btn-danger rounded-pill py-2 px-5 mt-5" href="">Voir plus</a>
        </div> --}}

    </div>
</div>
