<style>
  .scrolling-container {
    white-space: nowrap;
    overflow: hidden;
    margin: 0;
    padding: 0;
    background-color: red;
    color: white;
    position: relative;
  }

  .scrolling-content {
    display: inline-block;
    animation: scroll 25s linear infinite;
  }

  @keyframes scroll {
    0% {
      transform: translateX(100%);
    }

    100% {
      transform: translateX(-100%);
    }
  }
</style>


<div class="hero-header" style="background-image: url('{{ asset('img/BACKGROUND.png') }}');">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class=" mb-4 animated zoomIn" style="color: #ED1C24;"> Explorez de nouvelles opportunités grâce au digital.</h1>
        <p class="text-dark pb-3 animated zoomIn lh-lg" style="color: black; font-size: 16px; font-weight:bold; text-align: justify;">
          Acquérez les compétences essentielles pour réussir dans le monde numérique d'aujourd'hui. Nos vous accompagnons pas à pas pour vous permettre d'atteindre vos objectifs professionnels. Rejoignez notre communauté engagée et faites le premier pas vers votre transformation digitale. Abitech solution, plus qu’une entreprise, c’est une communauté qui vise à accroitre la puissance numérique en Afriques à travers nos innovations et les centres de recherches technologique que nous mettrons en place progressivement pour permettre aux amoureux de la technologie de s’exprimer librement sur leur projet d’apport de solutions technologique pour le bien de tous. Abitech solution, c'est le canal d'expression et de communication de tout porteur projet d'avenir.
        </p>
        <a href="{{ route('actualite') }}" class="btn btn-danger rounded-pill border-2 py-3 px-5 animated slideInRight">Actualités</a>

        <a href="{{ route('equipe') }}" class="btn btn-danger rounded-pill border-2 py-3 px-5 animated slideInRight">Notre Equipe</a>
      </div>
      <div class="col-lg-6">
        <img src="{{asset('img/PHOTO.png')}}" alt="" class="img-fluid" style="height: 400px;width:550px;margin-bottom:20px">
      </div>
    </div>

  </div>
</div>