<div class="bg-danger my-6 pb-5 pt-3 wow fadeInUp" data-wow-delay="0.1s">
    <h2 class="text-center  mb-4 text-white">Nos partenaires</h2>
    <div class="container">
        <div class="owl-carousel client-carousel">
            <a href="https://h-powergroup.com/"><img class="img-fluid " src="{{ asset('img/logohpower.jpg') }}" alt=""></a>
            <a href="" img class="img-fluid "  ><img src="{{ asset('img/yello.jpeg') }}" alt=""></a>
            <a href="" img class="img-fluid "  ><img src="{{ asset('img/repu.jpeg') }}" alt=""></a>

          </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1, 
            loop: true, 
            autoplay: true, 
            autoplayTimeout: 2000,
        });
    });
</script>
