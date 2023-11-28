<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($news as $key => $article)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $article->photo1 }}" class="d-block w-100" alt="{{ $article->nom }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $article->nom }}</h5>
                                <p>{{ $article->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>
</div>
