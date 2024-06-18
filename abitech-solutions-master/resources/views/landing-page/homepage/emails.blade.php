<div class="row justify-content-center" id="newsletter">
    <div class="col-lg-12 col-md-12 footer-newsletter text-center">
        <h2 class="text-center">Rejoignez notre newsletter</h2>
        <p>Restez informé des dernières actualités, offres spéciales et bien plus encore en vous abonnant à notre newsletter !</p>
        <form action="{{ route('getmail') }}" method="POST" style="width: 50%; height:60px;" class="mx-auto">
            @csrf
            <input type="email" name="email" class="form-control mb-2 mr-sm-2" placeholder="Votre adresse e-mail">
            <input type="submit" class="btn btn-primary mb-2" style="background-color: #ed1c24;" value="Envoyer">
        </form>
    </div>
</div>
