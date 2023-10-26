@extends('landing-page.layouts.template')

@section('content')
    <section class="flat-row section-iconbox" style="background-color: white;">

        <br><br><br><br><br>

        <div class="container" style="background-color: rgba(210,210,210);">

            <div class="row">

                <div class="col-lg-5">

                    <div class="title-section style3 left d-flex justify-content-center" >

                        <h1 class="title" style="color: Navy;">Nos Formations</h1><br><br>

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

                            <br><h5  class="box-title">Formation en duo</h5>  

                            <p>
                                <li style="color: navy">Tous types de formations informatiques</li>
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Coût: varie selon la durée et la formation</li> 
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
                                <li style="color: navy">Tous types de formations informatiques</li>
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Coût: varie selon la durée et la formation</li> 
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

                        <div class="box-content" style="height: 220px;">

                            <h5  class="box-title">Formation en continue</h5>  

                            <p>
                                <li style="color: navy">Tous types de formations informatiques</li>
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Coût: varie selon la durée et la formation</li> 
                            </p>

                        </div>

                    </div>     

                </div> 

                

                        <div class="box-content" style="height: 220px;overflow: auto;">

                            <h5  class="box-title">Formation d'entreprise</h5>  

                            <p>
                                <li style="color: navy">Tous types de formations informatiques</li>
                                <li style="color: navy">Durée: varie selon la formation</li>
                                <li style="color: navy">Coût: varie selon la durée et la formation</li> 
                            </p>
                        </div>

                    </div>     

                </div>        

            </div>  

        </div>

    </section>
    <br><br><p class="text-xxl-end"><strong>ABITECH SOLUTION </strong> est une entreprise informatique qui offre des formations selon les besoins des individus et des entreprises.</p>
    <br><h3>Nos domaines d'intervention</h3>
    <br><ul class="list-group">
        <li class="list-group-item">Formation à niveau avec les Logiciels MICROSOFT Excel, Powerpoint, Access, Power BI</li>
        <li class="list-group-item">Formation complète à Linux et ses distributions</li>
        <li class="list-group-item">Apprentissage et maîtrise des Logiciels de gestion pour entreprises et service de Comptabilité</li>
        <li class="list-group-item">Renforcement de capacité en Programmation informatique, Réseaux et Télécommunications</li>
        <li class="list-group-item">Formation complète en administration et gestion de bases de données</li>
        <li class="list-group-item">Formation en photoshop et montage vidéo</li>
        <li class="list-group-item">Formation complète en architechture</li>
        <li class="list-group-item">Toute autre formation, spécifique et spécialisée selon vos besoins.</li> 
    </ul>

    <br><p>Envie d'une formation ?</p>
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Votre adresse email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Choisissez une formation ou laissez-nous un message</label>
            <textarea class="form-control" name="texte" placeholder="comment pouvons-nous vous aider ?" id="exampleFormControlTextarea1" rows="3"></textarea>
            <br><button type="button" name="envoyer" class="btn btn-success">Envoyer</button>
        </div>
    <!-- About End -->
@endsection
