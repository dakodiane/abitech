<div style="height: 120px;"></div>

<div class="container-xl container-offer">
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <section id="hero" class="d-flex align-items-center" style="position: relative; overflow: hidden;">
                <div id="hero-carousel" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($offres as $key => $offre)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <h2 class="fs-4" style="color: white;">{{ $offre->nom }}</h2>
                            <a href="{{ route('detailoffre', ['id' => $offre->id]) }}" class="btn btn-danger rounded-pill border-2 py-3 px-5 animated slideInRight">Détails</a>
                        </div>
                        @endforeach
                    </div>
                </div>



            </section>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const heroCarousel = document.getElementById('hero-carousel');
                    const carousel = new bootstrap.Carousel(heroCarousel, {
                        interval: 3000,
                        pause: 'hover'
                    });
                });
            </script>
        </div>
    </div>
</div>