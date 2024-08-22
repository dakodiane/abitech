<div class="row justify-content-center" id="newsletter">
    <div class="col-lg-12 col-md-12 col-sm-12 footer-newsletter text-center">
        <h2 class="text-center">Rejoignez notre newsletter</h2>
        <p>Restez informé des dernières actualités, offres spéciales et bien plus encore en vous abonnant à notre newsletter !</p>
        <form action="{{ route('getmail') }}" method="POST" class="newsletter-form mx-auto">
            @csrf
            <input type="email" name="email" class="form-control mb-2" placeholder="Votre adresse e-mail">
            <input type="submit" class="btn btn-primary mb-2" value="Envoyer">
        </form>
    </div>
</div>

<style>
    .newsletter-form {
        width: 100%;
        max-width: 600px; 
    }

    .newsletter-form .form-control {
        width: 100%;
        box-sizing: border-box;
    }

    @media (min-width: 576px) {
        .newsletter-form {
            width: 80%;
        }
    }

    @media (min-width: 768px) {
        .newsletter-form {
            width: 60%;
        }
    }

    @media (min-width: 992px) {
        .newsletter-form {
            width: 50%;
        }
    }

    .btn-primary {
        background-color: #ed1c24;
        border-color: #ed1c24;
    }

    .btn-primary:hover {
        background-color: #d11a22;
        border-color: #d11a22;
    }
</style>
