   <!-- ======= Team Section ======= -->
   <section id="team" class="team">

       <div class="container" data-aos="fade-up">

           <div class="row gy-4">
               <div class="row">
               <div class="col-lg-12">
    <h2>ACTUALITES</h2>
    <div class="d-flex justify-content-center">
        <a href="{{ route('actualite') }}" class="btn btn-danger">Tous les articles</a>
    </div>
</div>

        
               </div>
               @foreach ($latestActualites as $actualite)
               <div class="col-lg-4 col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                   <div class="member">
                       <div class="member-img">
                           <img src="{{asset($actualite->photo1)}}" class="img-fluid" alt="">
                       </div>
                       <div class="member-info">
                           <h4>{{$actualite->nom}}</h4>
                           <p>{{ \Illuminate\Support\Str::limit($actualite->description, 70) }}...</p>
                           <a href="{{ route('detail', ['id' => $actualite->id]) }}" class="btn btn-danger">Lire l'article</a>
                       </div>
                   </div>
               </div>
               @endforeach

             
           </div>

       </div>

   </section><!-- End Team Section -->