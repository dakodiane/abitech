<div style="height: 80px;"></div>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner" >
  <div class="carousel-item active" style="background: url('{{ asset('img/programme1.jpeg') }}') center center / cover no-repeat; height: 75vh;">
    <div class="mask flex-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-12 order-md-1 order-2" style="padding-top: 30vh;">
                    <h4>Abitech Solution à 10.000 Codeurs</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#">Lire l'article</a>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="carousel-item" style="background: url('{{ asset('img/programme2.jpeg') }}') center center / cover no-repeat; height: 75vh;">
          <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2 " style="padding-top: 30vh;">
              <h4>Abitech Solution à 10.000 Codeurs</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#">Lire l'article</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item"  style="background: url('{{ asset('img/programme3.jpeg') }}') center center/ cover no-repeat; height: 75vh;">
      <div class="mask flex-center">
        <div class="container">
          <div class= "row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2" style="padding-top: 30vh;">
              <h4>Abitech Solution à 10.000 Codeurs</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#">Lire l'article</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </a>
</div>

<script>
    $('#myCarousel').carousel({
        interval: 2000,
    });
</script>
