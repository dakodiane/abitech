@extends('landing-page.layouts.template')

@section('content')

        <section class="flat-row section-iconbox" style="background-color:rgba(210,210,210,0.6); position:relative; top: 15vh">

        <div class="container">

            <div class="row">

                <div class="col-lg-5">

                    <div class="title-section style3" >

                        <h1 class="title" style="color: white">Nos Formations</h1>

                    </div>

                </div>


            </div>

            <div class="row">

                <div class="col-lg-4">

                     <div class="iconbox style3">

                        <div class="box-header">

                            <div class="box-icon">

                                <i class="ti-pie-chart"></i>

                            </div>

                        </div>

                        <div class="box-content" style="height: 220px;">

                            <h5  class="box-title">Formation en Duo</h5>  

                            <p>
                                <li style="color: navy">Tout type de formation selon le domaine choisi</li> 
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Côut: varie selon la formation et la durée</li>
                            </p> 

                        </div>

                    </div>     

                </div>

                <div class="col-lg-4">

                     <div class="iconbox style3">

                        <div class="box-header">

                            <div class="box-icon">

                                <i class="ti-bar-chart"></i>

                            </div>

                        </div>

                        <div class="box-content" style="height: 220px;">

                            <h5  class="box-title">Formation à distance</h5>  

                            <p>
                                <li style="color: navy">Tout type de formation selon le domaine choisi</li> 
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Côut: varie selon la formation et la durée</li>
                            </p> 

                        </div>

                    </div>     

                </div> 

                <div class="col-lg-4">

                     <div class="iconbox style3">

                        <div class="box-header">

                            <div class="box-icon">

                                <i class="ti-bell"></i>

                            </div>

                        </div>

                        <div class="box-content" style="height: 220px; font-family:times new roman">

                            <h5  class="box-title">Formation en continue</h5>  
                            <p>
                                <li style="color: navy">Tout type de formation selon le domaine choisi</li> 
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Côut: varie selon la formation et la durée</li>
                            </p> 
                        </div>

                    </div>     

                </div> 

                <div class="col-lg-4">

                     <div class="iconbox style3">

                        <div class="box-header">

                            <div class="box-icon">

                                <i class="ti-microphone"></i>

                            </div>

                        </div>

                        <div class="box-content" style="height: 220px; overflow: auto;">

                            <h5  class="box-title">Formation pour le personnel des entreprises</h5>  

                            <p>
                                <li style="color: navy">Tout type de formation selon le domaine choisi</li> 
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Côut: varie selon la formation et la durée</li>
                            </p> 

                        </p> 

                        </div>

                    </div>     

                </div> 
       

            </div>  

        </div>

    </section>

    <br><br><br><br><br><br><section>
        <p class="text-start"><strong>A ABITECH </strong> nous vous offrons des formations en:</p>
        <ul class="list-group">
            <li class="list-group-item">formation complète à l'utilisation de la suite des logiciels MICROSOFT (Excel, Powerpoint, Access et Power BI)</li>
            <li class="list-group-item">apprentissage à niveau de Linux et des ses distributions</li>
            <li class="list-group-item">formation spéciale et remise à niveau en programmation web</li>
            <li class="list-group-item">formation spéciale et remise à niveau en réseaux informatiques</li>
            <li class="list-group-item">formation spéciale et remise à niveau en bases de données</li>
            <li class="list-group-item">formation complète du personnel d'entreprise à l'utilisation et à la maîtrise des logiciels comptable </li>
            <li class="list-group-item">initiation à la maintenance informatique</li>
            <li class="list-group-item">toute autre formation spéciale ...</li>
        </ul>

        <br><p>Envie de vous faire former ?</p>
        <form>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Votre mail</label>
                        <input type="email" name="mail" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Dites nous comment pouvons-nous vous aider</label>
                        <textarea class="form-control" name="plainte" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                        <button type="button" name="validation" class="btn btn-success">Envoyer</button>
                    </div>
                <form>
    </section> 

    <!-- About End -->
@endsection
