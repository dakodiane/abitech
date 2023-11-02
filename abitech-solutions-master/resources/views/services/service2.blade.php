@extends('landing-page.layouts.template')

@section('content')
    <div class="bg-light page-header">
        <div class="container text-center">
            <h1 class="animated zoomIn mb-3">Ingénierie conseil</h1>
            
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
         <img class="img-fluid" src="{{asset('img/Ing.JPG')}}" alt=" photo ingenierie conseil " >
        </div>
         <div class="col-md-6">
           <div class="card-body">
            
             <p class="card-text  fs-3 "  style="text-align: justify; font-family:'Times New Roman', Times, serif;">Nous disposons d’une plage d’expert dans tout domaine pour vous apporter le conseil adéquat pour votre business, vos choix de matériels, assistance technique à distance et autre !</p>
           </div>
         </div>
       </div>
     </div>

 </div>
</div>
</div>
    </div>
    <div class="py-6" style="margin-top: -10rem;">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h2 class="mb-5">Avez vous besoins d'un conseil, n'hésitez pas à nous faire part de vos préoccupations.</h2>
            </div>
            <div class="row justify-content-center" >
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    @if(session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade  show" style="background: green !important; color: white" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                        </div>
                    @endif
                    <form method="post" action="{{route('send.contact.mail')}}" >
                        @method('POST')
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Votre nom" name="name" required>
                                    <label for="name">Nom & Prénoms</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Votre addresse email" name="email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Objet " name="object" required>
                                    <label for="subject">Objet</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here"  name="message" required id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyer <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
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
