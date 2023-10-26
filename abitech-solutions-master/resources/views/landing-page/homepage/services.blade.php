    <!-- ======= Project Section ======= -->
    <section id="portfolio" class="portfolio section-bg">

        <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="mb-5">Nous fournissons des solutions pour votre entreprise</h2>
        </div>
        <div class="container" id="card-group">
          <!-- Portfolio Section Heading-->
          <div class="text-center">
     
          </div>
          <!-- Icon Divider-->
          <div class="divider-custom">
              <div class="divider-custom-line"></div>
              
              <div class="divider-custom-line"></div>
          </div>
          <!-- Portfolio Grid Items-->
          <div class="row justify-content-center"  data-aos="fade-up" data-aos-delay="100">
              <!-- Portfolio Items-->
               
              <div class="col-md-6 col-lg-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">
                  <div class="card mx-auto h-100 service-item  d-flex align-items-center justify-content-center" >
                      
                      <img class="img-fluid" src="{{asset(asset('img/presta.jpeg'))}}" alt="photo prestation de service" >

                      <div class="card-body  ">
                        <h5 class="card-title text-center">Prestations de services informatiques et électroniques</h5>
                        <div class="text-center ">
                        <a href="{{ route('service1') }}" class="btn btn-danger @if(Route::currentRouteName() == 'service1') active @endif">Voir plus</a>
</a>
    
                        </div>
                        </div>
                  </div>
              </div>


              <div class="col-md-6 col-lg-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card mx-auto h-100 service-item  d-flex align-items-center justify-content-center" >
                    
                    <img class="img-fluid" src="{{asset(asset('img/inge.jpeg'))}}" alt=" photo ingenierie conseil " style="height: 220px;">

                    <div class="card-body ">
                      <h5 class="card-title text-center">Ingénierie conseil</h5>
                      <div class="text-center text-center">
                      <a href="{{ route('service2') }}" class="btn btn-danger @if(Route::currentRouteName() == 'service2') active @endif">Voir plus</a>
  
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">
              <div class="card mx-auto h-100 service-item align-items-center justify-content-center" >
                   <img class="img-fluid" src="{{asset(asset('img/Communication.jpeg'))}}" alt=" photo de communication digital" style="height: 220px;">
                  <div class="card-body ">
                    <h5 class="card-title text-center">Communication digitale</h5>
                    <div class="text-center ">
                    <a href="{{ route('service3') }}" class="btn btn-danger @if(Route::currentRouteName() == 'service3') active @endif">Voir plus</a>

                    </div>
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 wow fadeInUp " data-wow-delay="0.2s">
            <div class="card mx-auto h-100 service-item align-items-center justify-content-center" >
                
                <img class="img-fluid" src="{{asset(asset('img/representation.jpeg'))}}" alt=" photo représentation commerciale">
                <div class="card-body ">
                  <h5 class="card-title text-center">Représentation commerciale</h5>
                  <div class="text-center ">
                  <a href="{{ route('service4') }}" class="btn btn-danger @if(Route::currentRouteName() == 'service4') active @endif">Voir plus</a>

                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">
          <div class="card mx-auto h-100 service-item align-items-center justify-content-center" >
              <img class="img-fluid" src="{{asset(asset('img/formation.jpeg'))}}" alt=" photo formation" style="height: 220px;">

              <div class="card-body ">
                <h5 class="card-title text-center">Formation</h5>
                <div class="text-center">
                <a href="{{ route('service5') }}" class="btn btn-danger @if(Route::currentRouteName() == 'service5') active @endif">Voir plus</a>

                </div>
              </div>
          </div>
      </div>
   
          </div>
      </div>
      </div>

        
   

