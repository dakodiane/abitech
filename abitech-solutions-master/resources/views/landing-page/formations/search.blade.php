@extends('landing-page.layouts.template')

@section('content')

        <section class="flat-row section-iconbox" style="background-color:rgba(210,210,210,0.6); position:relative; top: 13vh">

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

                            <h5  class="box-title">FORMATION DE RECYCLAGE</h5>  

                            <p style="text-align: justify">
                                Vous avez déjà des prérequis dans un domaine ou sur un logiciel et vous avez besoin  de metter à jour vos connaissances, nous vous accompagnos sur ce plan et vous donnons les outils nécessaires pour reprendre de plein pied.
                                <li style="color: navy">Durée de la formation: 1 à 3 mois</li>
                                <li style="color: navy">Côut: à définir selon les modlités</li>
                                <li style="color: navy">Commodité: attestation de succès</li>
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

                            <h5  class="box-title">FORMATION A DISTANCE</h5>  

                            <p style="text-align: justify">
                                Nous vous orientons à travers les différents applications de cours en ligne pour vous permettre d'acquérir les connaissances nécessaires et utiles dans votre démarche entrepreneuriale, de recherche de boulot ou d'actualisation de vos performances quant à la formation choisie afin de donner le meilleur de vous-même et, tout ceci sans vous déplacer.
                                <li style="color: navy">Durée de la formation: 1 à 2 semaines</li>
                                <li style="color: navy">Côut: à définir selon les modlités</li>
                                <li style="color: navy">Commodité: attestation de succès</li>
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

                        <div class="box-content" style="height: 220px">

                            <h5  class="box-title">FORMATION EN CONTINUE</h5>  
                            <p style="text-align: justify">
                                Disponible pour les entreprises et les communautés professionnelles dans le cadre d'optimisation des acquis et des performances des ressources humaines pour la professionnalisation des uns et des autres.
                                <li style="color: navy">Durée de la formation: 1 à 3 mois</li>
                                <li style="color: navy">Côut: à définir selon le nombre de participants  les modlités</li>
                                <li style="color: navy">Commodité: attestation de succès</li>
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

                        <br><br><div class="box-content" style="height: 220px; overflow: auto;">

                            <h5  class="box-title">FORMATION PERSONNALISEE</h5>  

                            <p style="text-align: justify">
                                Elle concerne spécifiquement un corps de métier ou des professionnels du domaine évoquant leur insuffisance en matière d'acquis et de connaissances nous organiserons ainsi, en fonction des suggestions, un programme de formation détaillée qui tiendrait compte de toutes le préoccupations des participants afin de leur donner les outils essentiels à l'équilibrqge et aux mises à niveau. 
                                <li style="color: navy">Durée de la formation: selon les notions essentielles à valoriser </li>
                                <li style="color: navy">Côut: en fonction des modlités</li>
                                <li style="color: navy">Commodité: attestation de formation</li>
                            </p> 

                        </p> 

                        </div>

                    </div>     

                </div> 
       

            </div>  

        </div>

    </section>

    <br><br><br><br><br><br><section>
        <p class="text-start" style="margin-left: 50px">A <strong> ABITECH </strong> vous avez:</p>
        <ul class="list-group">
            <li class="list-group-item">la formation complète à l'utilisation de la suite des logiciels MICROSOFT (Excel, Powerpoint, Access et Power BI)</li>
            <li class="list-group-item">l'apprentissage à niveau de Linux et des ses distributions</li>
            <li class="list-group-item">la formation spéciale et remise à niveau en programmation web</li>
            <li class="list-group-item">la formation spéciale et remise à niveau en réseaux informatiques</li>
            <li class="list-group-item">la formation spéciale et remise à niveau en bases de données</li>
            <li class="list-group-item">la formation complète du personnel d'entreprise à l'utilisation et à la maîtrise des logiciels comptable </li>
            <li class="list-group-item">l'initiation à la maintenance informatique</li>
            <li class="list-group-item">toute autre formation spéciale ...</li>
        </ul>

        <br><p style="margin-left: 50px">Envie de vous faire former ?</p>
        <form action="traitement.php" method="post" class="well col-lg-offset-3 col-lg-6" style="margin-left: 15px">
                <div class="form-group id">
                    <label for="identifiant">Votre mail</label><br>  
                    <input type="text" name="identifiant" id="identifiant" class="form-control"><br>
                </div>
                <div class="form-group id">
                    <label for="mdp">Dites-nous comment vous aider </label><br>  
                    <textarea name="mdp" id="txt" class="form-control">
                </div>
                <div class="form-group">
                </div><br>
                <div class="form-group buttons">
                    <input type="submit" class="btn btn-success" value="Envoyer">
                </div>
        </form>
    </section> 

    <!-- About End -->
@endsection
