@extends('landing-page.layouts.template')

@section('content')
    <div class="bg-light page-header">
        <div class="container text-center">
            <h1 class="animated zoomIn mb-3">Formation</h1>
            
            <div class="py-6">
        <div class="container">
    
 <!-- Icon Divider-->
 <div class="divider-custom">
     <div class="divider-custom-line"></div>
     <div class="divider-custom-line"></div>
 </div>
 <!-- Portfolio Grid Items-->
 <div class="row justify-content-center wow fadeInUp"  data-wow-delay="0.1s" >
     <!-- Portfolio Items-->
     <div class="card mb-3" >
       <div class="row g-0">
         <div class="col-md-6">
         <img class="img-fluid" src="{{asset(asset('img/formation.jpeg'))}}" alt=" photo formation" style="height: 220px;">
        </div>
         <div class="col-md-6">
           <div class="card-body">
            
             <p class="card-text  fs-3 "  style="text-align: justify; font-family:'Times New Roman', Times, serif;">Vous avez besoin d’améliorer les compétences de vos employés en entreprise sur les logiciels et applications standards, quel que soit le domaine ; nous disposons des professionnels qualifiés disponibles pour répondre efficacement à vos besoins et vous donner le plein d’astuces pour vous et vos collaborateurs. Laissez-nous un mot sur le type de formation que vous désirez et nous nous chargeons du reste.</p>
           </div>
         </div>
       </div>
     </div>

 </div>
</div><h2 class="animated zoomIn">DISCUTER AVEC QUELQU’UN</h2>
          <div  class="animated zoomIn "style="display: flex; justify-content:center;  ; align-items: center;">
                        <!-- Bouton d'appel téléphonique -->
                        <a href="{{route('formation')}}" class="btn btn-danger @if(Route::currentRouteName() == 'formation') active @endif">Nos formations</a>

                        <form action="tel:+22996395247">
                            <button type="submit" class="btn btn-primary" >
                                <i class="fas fa-phone"></i> Appeler
                            </button>
                        </form>

                          <!-- Espace entre les boutons (par exemple, 20px) -->
                          <div style="width: 20px;"></div>
                      
                        <!-- Bouton WhatsApp -->
                        <form action="https://wa.me/+22996395247">
                            <button type="submit" class="btn btn-success">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </button>
                        </form>
                    </div>
          </div>

        </div>
          </div>
        </div>

    </div>

  
        </div>
    </div>
@endsection
