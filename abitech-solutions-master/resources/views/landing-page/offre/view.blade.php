@extends('landing-page.layouts.template')

@section('content')

<div class="bg-light hero-header" style="padding-bottom: 30px !important; margin-bottom: 30px">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="container">
                <center>
                    <h1> Nos Offres</h1>
                </center>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        @foreach($offres as $offre)
        <div class="col-sm-6">
            <div class="card mb-4">
                <img src="{{ asset($offre->photo) }}" class="card-img-top custom-card-image" alt="{{ $offre->nom }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $offre->nom }}</h5>
                    <p class="card-text">{{ $offre->shortDescription }}...</p>
                    <a href="{{ route('detailoffre', ['id' => $offre->id]) }}" class="btn btn-primary">Lire l'article</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>





<style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800);
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
    @import url(https://fonts.googleapis.com/css?family=Bree+Serif);
    @import url(https://fonts.googleapis.com/css?family=Covered+By+Your+Grace);

    /*-----------------------------------------------------------------------------------*/
    /*  2 - BASE
/*-----------------------------------------------------------------------------------*/
.custom-card-image {
        width: 600px;
        /* Largeur souhaitée */
        height: 300px;
        /* Hauteur souhaitée */
        object-fit: cover;
        /* Pour conserver les proportions de l'image */
    }
    body {
        overflow-x: hidden;
        font-family: 'Open Sans', "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #ffffff;
        font-weight: 400;
        line-height: 1.75;
        color: #333;
    }

    .master-wrapper {
        overflow: hidden;
    }

    .heading-font,
    .navbar-default .navbar-brand,
    .navbar-default .nav li a {
        font-family: 'Bree Serif', "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-transform: none;
    }

    .secondary-font {
        font-family: 'Covered By Your Grace', "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-transform: none;
    }

    .text-muted {
        color: #444
    }

    .text-primary {
        color: #333
    }

    p {
        font-size: 14px;
        line-height: 26px;
    }

    p.large {
        font-size: 16px
    }

    a,
    a:hover,
    a:focus,
    a:active,
    a.active {
        outline: 0;
        text-decoration: none
    }

    a {
        color: #333
    }

    a:hover,
    a:focus,
    a:active,
    a.active {
        color: #F22613
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Bree Serif', "Helvetica Neue", Helvetica, Arial, sans-serif;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px
    }

    .img-centered {
        margin: 0 auto
    }

    .gap {
        margin-bottom: 60px
    }

    .mb30 {
        margin-bottom: 30px;
        display: block;
    }

    .mb50 {
        margin-bottom: 50px;
        display: block;
    }

    .mb100 {
        margin-bottom: 100px;
    }

    .nomarginbottom {
        margin-bottom: 0
    }

    .mt20 {
        margin-top: 20px
    }

    .mt30 {
        margin-top: 30px;
    }

    .mt60 {
        margin-top: 60px
    }

    .mt120 {
        margin-top: 120px
    }

    .ptb {
        padding-top: 45px;
        padding-bottom: 45px;
    }

    .nopaddingtop {
        padding-top: 0 !important
    }

    .nopaddingbottom {
        padding-bottom: 0 !important
    }

    .nopadding-lr {
        padding-left: 0 !important;
        padding-right: 0 !important
    }

    .nopadding-l {
        padding-left: 0 !important
    }

    .pad-sides-60 {
        padding-left: 60px !important;
        padding-right: 60px !important;
    }

    .pad-top-bottom-50 {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .thin {
        font-weight: 300
    }

    .btn:focus,
    .btn:active,
    .btn.active,
    .btn:active:focus {
        outline: 0
    }

    ::-moz-selection {
        color: #fff;
        text-shadow: none;
        background: #333
    }

    ::selection {
        color: #fff;
        text-shadow: none;
        background: #333
    }

    .list-unstyled {
        margin-bottom: 0;
    }

    img::selection {
        background: 0 0
    }

    img::-moz-selection {
        background: 0 0
    }

    body {
        webkit-tap-highlight-color: #333
    }

    .img-responsive,
    .thumbnail>img,
    .thumbnail a>img,
    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        width: 100%
    }

    .img-thumbnail {
        border: none
    }

    .smoothie,
    .smoothie:hover {
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .col-md-5th {
        width: 20%
    }

    .thin-hr {
        margin: 30px 0 40px;
        width: 100%;
        clear: both;
        display: block;
        position: relative;
        border: none;
    }

    .thin-hr.bordered {
        margin: 20px 0;
        width: 100%;
        clear: both;
        display: block;
        position: relative;
        border: 1px solid #333;
    }

    .thin-hr:after {
        content: '';
        position: absolute;
        width: 120px;
        height: 2px;
        background-color: #333;
        left: 50%;
        margin-left: -60px;
    }

    .rotate-45 {
        -moz-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .icon-large {
        font-size: 40px;
    }

    .background-cover {
        background-repeat: no-repeat;
        background-size: cover;
    }

    .lead {
        font-size: 18px;
        line-height: 32px;
    }

    .white {
        color: #fff;
    }

    .vertical-center {
        clear: both;
        display: block;
        overflow: hidden;
    }

    .text-uppercase {
        text-transform: uppercase;
    }

    .spacer-180 {
        clear: both;
        height: 180px;
        display: block;
        position: relative;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  3 - BUTTONS
/*-----------------------------------------------------------------------------------*/
    .btn {
        font-family: 'Open Sans', "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .btn:focus,
    .btn:active:focus,
    .btn.active:focus,
    .btn:active,
    .btn.active {
        outline: none;
        box-shadow: none
    }

    .btn-primary {
        border-color: #333;
        border-radius: 0;
        text-transform: uppercase;
        font-weight: 700;
        color: #333;
        background-color: transparent;
        padding: 15px 20px;
        letter-spacing: 1px;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
        border: 2px solid;
    }

    .btn-primary.btn-transparent {
        border-color: transparent !important
    }

    .btn-primary.btn-transparent:hover,
    .btn-primary.btn-transparent:active,
    .btn-primary.btn-transparent:focus,
    .btn-primary.btn-transparent.active {
        color: #fff;
        border-color: transparent #F22613;
        background-color: #F22613;
        !important
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary {
        border-color: #F22613;
        color: #F22613;
        background-color: transparent;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary {
        background-image: none
    }

    .btn-primary.disabled,
    .btn-primary[disabled],
    fieldset[disabled] .btn-primary,
    .btn-primary.disabled:hover,
    .btn-primary[disabled]:hover,
    fieldset[disabled] .btn-primary:hover,
    .btn-primary.disabled:focus,
    .btn-primary[disabled]:focus,
    fieldset[disabled] .btn-primary:focus,
    .btn-primary.disabled:active,
    .btn-primary[disabled]:active,
    fieldset[disabled] .btn-primary:active,
    .btn-primary.disabled.active,
    .btn-primary[disabled].active,
    fieldset[disabled] .btn-primary.active {
        border-color: #333;
        background-color: #333
    }

    .btn-default,
    .btn-default.disabled {
        border-color: transparent
    }

    .btn-white {
        border-color: #f3f3f3;
        color: #f3f3f3;
    }

    .btn-red {
        border-color: #F22613;
        background-color: #F22613;
        color: #fff
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active {
        border-color: #F22613;
        color: #fff;
        background-color: #F22613;
        ;
    }

    .btn-red:hover,
    .btn-red:focus,
    .btn-red:active,
    .btn-red.active {
        border-color: #dd0001;
        color: #fff;
        background-color: #dd0001;
        ;
    }

    .theme-accent-color,
    .navbar-default.navbar-shrink #navbar-social a:hover,
    .navbar-default .nav li a:hover,
    .navbar-default .nav li a:focus {
        color: #F22613 !important;
    }

    .theme-accent-color-bg {
        background-color: #F22613;
    }

    /*-----------------------------------------------------------------------------------*/
    /*   4 NAV
/*-----------------------------------------------------------------------------------*/

    .navbar-default {
        border-color: transparent;
        background-color: #fcfcfc;
    }

    .navbar-default .navbar-brand {
        color: #fff;
        margin-top: 10px;
        letter-spacing: 7px;
        font-size: 24px;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
        font-weight: 900;
    }

    .navbar-default .navbar-brand:hover,
    .navbar-default .navbar-brand:focus,
    .navbar-default .navbar-brand:active,
    .navbar-default .navbar-brand.active {
        color: #333
    }

    .navbar-default .navbar-collapse {
        border-color: rgba(255, 255, 255, .02)
    }

    .navbar-default .navbar-toggle,
    .navbar-default .navbar-toggle:hover,
    .navbar-default .navbar-toggle:focus {
        border-color: transparent;
        background-color: transparent
    }

    .navbar-default .navbar-toggle .icon-bar {
        background-color: #fff
    }

    .caret {
        margin-top: -3px
    }

    .navbar-default .nav li a {
        text-transform: uppercase;
        font-weight: 400;
        font-size: 14px;
        color: #fff;
        padding: 25px 20px;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
        letter-spacing: 2px;
    }

    .navbar-default.background--dark .nav li>a,
    .navbar-default.background--dark .navbar-brand,
    #headerwrap.background--dark .intro-text,
    .navbar-default .nav li>a,
    .navbar-default .navbar-brand,
    #headerwrap .intro-text {
        color: #fff;
    }

    .navbar-default.background--light .nav li>a,
    .navbar-default.background--light .navbar-brand,
    #headerwrap.background--light .intro-text,
    .navbar-default.background--light #navbar-social a,
    #headerwrap.background--light .slider-control a {
        color: #333;
    }

    .navbar-default.background--light .tcon-menu__lines,
    .navbar-default.background--light .tcon-menu__lines::before,
    .navbar-default.background--light .tcon-menu__lines::after,
    #headerwrap.background--light .wheel {
        background: #333;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    #headerwrap.background--light .mouse {
        border: 2px solid #333;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .navbar-default .nav li a:hover,
    .navbar-default .nav li a:focus {
        color: #fff;
    }


    .navbar-default .nav li.dropdown.open>a,
    .navbar-default .dropdown-menu a {
        color: #333 !important;
    }

    .navbar-default .nav .dropdown-menu li a {
        padding: 10px 15px;
        font-size: 12px;
    }

    .navbar-default .nav li a:hover,
    .navbar-default .nav li a:focus {
        outline: 0;
        color: #333
    }

    .navbar-default .navbar-nav>.active>a {
        border-radius: 0;
        background-color: transparent;
        color: #333;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .navbar-default.navbar-shrink .nav li.active>a {
        border-radius: 0;
        color: #fff;
        background-color: #222;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .navbar-default.navbar-shrink .nav li>a,
    .navbar-default.navbar-shrink .navbar-brand {
        color: #fff;
    }

    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
        color: #F22613;
        background-color: #333
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 0;
        margin: 2px 0 0;
        font-size: 12px;
        text-align: left;
        list-style: none;
        background-color: #fcfcfc;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: none;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .navbar-default.navbar-shrink .nav .dropdown-menu li a {
        color: #333;
    }

    .navbar-default.navbar-shrink .nav .dropdown-menu li a:hover,
    .navbar-default .nav .dropdown-menu li a:hover {
        color: #333;
        background-color: #F2F3F5;
    }

    #navbar-social {
        display: inline-block;
        float: left;
        padding: 23px 20px 0 20px;
    }

    #navbar-social a {
        color: #fff;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .navbar-default.navbar-shrink #navbar-social a {
        color: #fff;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }


    /*-----------------------------------------------------------------------------------*/
    /*  5 - HEADER
/*-----------------------------------------------------------------------------------*/

    #headerwrap {
        background-color: #f3f3f3;
        overflow: hidden
    }

    #headerwrap input.col-md-4 {
        margin: 0 auto;
        display: inline;
        float: none;
    }

    .opaque {
        background-color: transparent !important
    }

    .backstretch:before,
    #wrapper_mbYTP_BigVideo:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        top: 0;
        left: 0;
        z-index: 1;
    }

    .light-backstretch .backstretch:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.4);
        top: 0;
        left: 0;
        z-index: 1;
    }


    .no-opaque .backstretch:before {
        display: none;
    }

    .slider-control a {
        color: #fff;
        font-size: 36px;
        padding: 0 15px;
    }

    #tubular-container {
        z-index: -1 !important;
        position: absolute !important
    }

    header {
        text-align: center;
        color: #333
    }

    header .intro-text {
        color: #333
    }

    header .intro-text .intro-lead-in {
        margin-bottom: 25px;
        font-size: 22px;
        text-transform: none;
        line-height: 22px
    }

    header .intro-text .intro-heading {
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 300;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  6 - SECTIONS
/*-----------------------------------------------------------------------------------*/
    section,
    section.white-bg {
        background-color: #fcfcfc;
        clear: both;
        border-bottom: 30px solid #222;
    }

    .top-border-me {
        border-top: 30px solid #222;
    }

    .left-half {
        border-right: 15px solid #222;
    }

    .right-half {
        border-left: 15px solid #222;
    }

    .silver-bg {
        background-color: #F2F3F5
    }

    .dark-wrapper {
        background-color: #2B2B2B
    }

    .dark-wrapper.opaqued,
    .dark-opaqued {
        background-color: rgba(0, 0, 0, 0.8);
        height: 100%;
    }

    .dark-opaqued-half {
        background-color: rgba(0, 0, 0, 0.4);
    }

    .opaqued,
    .light-opaqued {
        background-color: rgba(255, 255, 255, 0.6);
    }


    #headerwrap.opaqued {
        background-color: rgba(0, 0, 0, 0.4);
    }

    .dark-wrapper h1,
    .dark-wrapper h2,
    .dark-wrapper h3,
    .dark-wrapper h4,
    .dark-wrapper h5,
    .dark-wrapper h6,
    .dark-wrapper p,
    .dark-wrapper a,
    .dark-wrapper {
        color: #f3f3f3
    }

    .section-inner {
        padding: 100px 0
    }

    section h2.section-heading,
    .section-heading {
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 48px;
        letter-spacing: 2px;
        font-weight: 700;
    }

    section h3.section-subheading {
        text-transform: lowercase;
        font-size: 30px;
        font-weight: 300;
        clear: both;
        display: block;
        padding-top: 20px;
        letter-spacing: 1px;
    }

    .cl-effect-3 a {
        padding: 8px 0;
    }

    .cl-effect-3 a::after {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 3px;
        background: rgba(255, 255, 255, 0.5);
        content: '';
        opacity: 0;
        margin-top: -3px;
        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
        -moz-transition: opacity 0.3s, -moz-transform 0.3s;
        transition: opacity 0.3s, transform 0.3s;
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        transform: translateY(10px);
    }

    .navbar-shrink .cl-effect-3 a::after {
        background: rgba(0, 0, 0, 0.2);
    }

    .cl-effect-3 a:hover::after,
    .cl-effect-3 a:focus::after {
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }

    .tagcloud a {
        border-radius: 0;
        padding: 5px 12px;
        text-transform: uppercase;
        margin: 0 1px 5px 0;
    }

    .tagcloud a:hover {
        background-color: #fff;
        color: #444;
    }

    .widget .media-body .muted {
        display: block;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  10 - HOVER CAPTIONS 
/*-----------------------------------------------------------------------------------*/

    .hover-item {
        position: relative;
        overflow: hidden
    }

    .hover-item img {
        -moz-transform: scale(1.0);
        -webkit-transform: scale(1.0);
        -o-transform: scale(1.0);
        -ms-transform: scale(1.0);
        transform: scale(1.0)
    }

    .overlay-item-caption {
        opacity: 1;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 28%, rgba(0, 0, 0, 0.5) 100%);
        /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(28%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.5)));
        /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 28%, rgba(0, 0, 0, 0.5) 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 28%, rgba(0, 0, 0, 0.5) 100%);
        /* Opera 11.10+ */
        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 28%, rgba(0, 0, 0, 0.5) 100%);
        /* IE10+ */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 28%, rgba(0, 0, 0, 0.5) 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0);
        /* IE6-9 */
        text-align: center;
        text-shadow: 0 0 1px #000;
    }

    .hover-item-caption {
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0px;
        background-color: rgba(0, 0, 0, 0.8);
        text-align: center;
        z-index: 2;
    }

    .hover-item-caption .hover-bar {
        position: absolute;
        bottom: 0px;
        height: 8px;
        width: 0%;
        left: 0;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .hover-item:hover .hover-item-caption .hover-bar {
        width: 100%;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .hover-item:hover .hover-item-caption {
        opacity: 1;
    }

    .hover-item-caption h3,
    .hover-item-caption .smoothie {
        top: 40px;
        position: relative;
    }

    .hover-item:hover .hover-item-caption h3,
    .hover-item:hover .smoothie {
        top: 0px;
    }

    .hover-item:hover .overlay-item-caption {
        opacity: 0;
        top: 40px;
    }

    .hover-item:hover .overlay-item-caption .vertical-center {
        opacity: 0;
    }

    .hover-item:hover img {
        -moz-transform: scale(1.05);
        -webkit-transform: scale(1.05);
        -o-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05)
    }

    .hover-item-caption h3,
    .overlay-item-caption h3 {
        font-size: 24px;
        margin: 0;
        color: #fefefe;
        font-weight: 900;
        letter-spacing: 4px;
    }

    .overlay-item-caption strong {
        color: #fefefe;
        padding-bottom: 16px;
        font-weight: 700;
        text-transform: uppercase;
        display: block;
        letter-spacing: 4px;
        text-shadow: none;
        font-size: 12px;
    }

    .overlay-item-caption strong span {
        padding: 3px 6px;
    }

    .overlay-item-caption .thin-hr:after,
    .dark-wrapper .thin-hr:after {
        background-color: #fff;
    }

    .overlay-item-caption .post-excerpt {
        font-style: italic;
        color: #fefefe;
        padding-top: 16px;
        font-size: 16px;
        padding-left: 15%;
        padding-right: 15%;
    }

    .hover-item-caption h3 span,
    .overlay-item-caption h3 span,
    .hover-item-caption h2 span {
        clear: both;
        display: block;
        text-transform: none;
        font-size: 20px;
        color: #fefefe;
    }

    .hover-item-caption h2 span {
        display: inline-block;
    }

    .hover-item-caption a,
    .overlay-item-caption a {
        color: #fefefe;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  11 - FOOTER
/*-----------------------------------------------------------------------------------*/

    #footer-widgets {
        border-top: 1px solid #333
    }

    #footer-widgets .section-inner {
        padding-bottom: 80px
    }

    footer.white-wrapper {
        padding: 60px 0;
        clear: both;
    }

    footer.white-wrapper *,
    footer.white-wrapper a {
        color: #fff;
    }

    footer.white-wrapper span.copyright {
        letter-spacing: 1px;
        text-transform: uppercase;
        text-transform: none;
        line-height: 40px;
        padding: 15px 10px;
        display: block;
        font-size: 14px;
    }

    footer.white-wrapper .social-links li {
        padding: 15px 30px
    }

    footer.white-wrapper .social-links li a {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 26px;
    }

    .widget-title {
        margin-bottom: 30px;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  12 - CAROUSEL STYLES
/*-----------------------------------------------------------------------------------*/
    .fw-carousel .owl-item {
        /* padding: 0 */
    }

    .fw-carousel .hover-item-caption h3 {
        font-size: 20px
    }

    .owl-carousel-highlighted.news-carousel .owl-item {
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .owl-carousel-highlighted.news-carousel .owl-item.active {
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }


    /*-----------------------------------------------------------------------------------*/
    /*  13 - SEARCH
/*-----------------------------------------------------------------------------------*/

    #search-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.95);
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
        -webkit-transform: translate(0px, -100%) scale(1, 0);
        -moz-transform: translate(0px, -100%) scale(1, 0);
        -o-transform: translate(0px, -100%) scale(1, 0);
        -ms-transform: translate(0px, -100%) scale(1, 0);
        transform: translate(0px, -100%) scale(1, 0);
        opacity: 0;
        z-index: 9999999
    }

    #search-wrapper.open {
        -webkit-transform: translate(0px, 0px) scale(1, 1);
        -moz-transform: translate(0px, 0px) scale(1, 1);
        -o-transform: translate(0px, 0px) scale(1, 1);
        -ms-transform: translate(0px, 0px) scale(1, 1);
        transform: translate(0px, 0px) scale(1, 1);
        opacity: 1
    }

    #search-wrapper input[type="search"] {
        position: absolute;
        top: 50%;
        width: 100%;
        color: #333;
        background: rgba(0, 0, 0, 0);
        font-size: 36px;
        font-weight: 300;
        text-align: center;
        border: 0;
        margin: 0 auto;
        margin-top: -51px;
        padding-left: 30px;
        padding-right: 30px;
        outline: none
    }

    #search-wrapper .btn {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: 61px;
        margin-left: -45px
    }

    #search-wrapper .close {
        position: fixed;
        top: 7px;
        right: 43px;
        color: #fff;
        background-color: transparent;
        color: #333;
        border: none;
        opacity: 1;
        padding: 10px 17px;
        font-size: 36px;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  14 - SPLASH
/*-----------------------------------------------------------------------------------*/

    .preloader {
        background-color: #222;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 9999999;
        top: 0;
        left: 0;
    }

    .preloader span {
        text-transform: none;
        font-size: 34px
    }

    .preloader .preloader-img {
        width: 80px;
        height: 80px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -40px;
        margin-top: -40px;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  15 - MAP
/*-----------------------------------------------------------------------------------*/
    #mapwrapper {
        min-height: 400px;
        clear: both;
        position: relative;
        display: block;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  16 - FORM CONTROL
/*-----------------------------------------------------------------------------------*/

    .form-control {
        display: block;
        width: 100%;
        height: 53px;
        padding: 10px 30px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: transparent;
        background-image: none;
        border: 2px solid;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .form-control:focus,
    .form-control.col-md-4:focus {
        border: 2px solid #F22613;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .dark-wrapper .form-control,
    #headerwrap .form-control {
        border: none;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .dark-wrapper .form-control:focus,
    .dark-wrapper .form-control.col-md-4:focus,
    #headerwrap .form-control:focus {
        border: none;
        color: #f6f6f6;
        -webkit-box-shadow: 0 0 0 1px #ffffff;
        box-shadow: 0 0 0 1px #ffffff;
    }

    .dark-wrapper .form-control.col-md-4,
    .dark-wrapper .form-control.col-md-4:focus {
        width: 32.33333%;
        border-bottom: none;
        border: none;
        background-color: rgba(0, 0, 0, 0.4);
        margin: 0 0.5% 10px;
    }

    .form-control.col-md-4,
    .form-control.col-md-4:focus {
        width: 32.33333%;
        border-bottom: none;
        border: 2px solid;
        background-color: transparent;
        margin: 0 0.5% 10px;
    }

    .dark-wrapper .form-control.col-md-4:first-of-type {
        border-left: none;
    }

    .form-control::-webkit-input-placeholder {
        color: #444;
        font-weight: 700;
        text-transform: uppercase;
    }

    .form-control:-moz-placeholder {
        /* Firefox 18- */

        color: #444;
        font-weight: 700;
        text-transform: uppercase;
    }

    .form-control::-moz-placeholder {
        /* Firefox 19+ */

        color: #444;
        font-weight: 700;
        text-transform: uppercase;
    }

    .form-control:-ms-input-placeholder {
        color: #444;
        font-weight: 700;
        text-transform: uppercase;
    }

    .dark-wrapper .form-control::-webkit-input-placeholder,
    .white-text .form-control::-webkit-input-placeholder {
        color: #f6f6f6;
        font-weight: 700;
        text-transform: uppercase;
    }

    .dark-wrapper .form-control:-moz-placeholder {
        /* Firefox 18- */

        color: #f6f6f6;
        font-weight: 700;
        text-transform: uppercase;
    }

    .dark-wrapper .form-control::-moz-placeholder {
        /* Firefox 19+ */

        color: #f6f6f6;
        font-weight: 700;
        text-transform: uppercase;
    }

    .dark-wrapper .form-control:-ms-input-placeholder {
        color: #f6f6f6;
        font-weight: 700;
        text-transform: uppercase;
    }

    .main-contact-form textarea,
    .main-contact-form textarea:focus,
    #commentform .main-contact-form textarea,
    #commentform .main-contact-form textarea:focus {
        border-top: none;
        min-height: 250px !important;
    }

    #contact-tabs .tabtitle {
        margin-top: 0;
    }

    #contact-tabs .icon-tabs li {
        border-right: none;
    }

    .icon-tabs li.silver-bg.active {
        background-color: #edeff0;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  17 -  TABS
/*-----------------------------------------------------------------------------------*/
    .nav.nav-justified>li>a {
        position: relative;
    }

    .icon-tabs li:after {
        content: '';
        right: 0;
        position: absolute;
        top: 50%;
        letter-spacing: -2px;
    }

    .icon-tabs li a {
        opacity: 0.2;
    }

    .icon-tabs li.active a {
        opacity: 1;
    }

    .icon-tabs li:last-of-type:after,
    .dark-wrapper .icon-tabs li:last-of-type:after {
        display: none;
    }

    .icon-tabs li .tabtitle {
        clear: both;
        display: block;
        margin: 15px 0 0;
        font-size: 34px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 400;
        padding: 0 20px;
        line-height: 1.0;
        text-align: left;
    }

    .nav.nav-justified>li>a:hover,
    .nav.nav-justified>li>a:focus {
        background-color: transparent;
    }

    .nav.nav-justified>li>a>.quote {
        position: absolute;
        left: 0px;
        top: 0;
        opacity: 0;
        width: 30px;
        height: 30px;
        padding: 5px;
        background-color: #13c0ba;
        border-radius: 15px;
        color: #fff;
    }

    .nav.nav-justified>li.active>a>.quote {
        opacity: 1;
    }

    .nav.nav-justified>li>a>img {
        max-width: 100%;
        opacity: .3;
        -webkit-transform: scale(.8, .8);
        transform: scale(.8, .8);
        -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .nav.nav-justified>li.active>a>img,
    .nav.nav-justified>li:hover>a>img,
    .nav.nav-justified>li:focus>a>img {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
        -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .tab-pane .tab-inner {
        padding: 30px 30px 20px;
    }

    @media (min-width: 768px) {
        .nav.nav-justified>li>a>.quote {
            left: auto;
            top: auto;
            right: 20px;
            bottom: 0px;
        }

        .pad-top-180 {
            padding-top: 180px;
        }

        .post-left-col,
        .post-right-col {
            width: 15%;
        }

        .post-center {
            width: 70%;
        }

        .mfp-close-btn-in .mfp-close {
            color: #333;
            position: fixed;
            right: 50px !important;
            top: 14px;
            font-size: 50px;
        }

        .dropdown-menu:before {
            position: absolute;
            top: -7px;
            margin-right: -9px;
            right: 40%;
            display: inline-block;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #ccc;
            border-left: 7px solid transparent;
            border-bottom-color: rgba(0, 0, 0, 0);
            content: '';
        }

        .dropdown-menu:after {
            position: absolute;
            top: -6px;
            margin-right: -10px;
            right: 40%;
            display: inline-block;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #ffffff;
            border-left: 6px solid transparent;
            content: '';
        }
    }

    @media (min-width: 1200px) {
        .pad-top-180 {
            padding-top: 260px;
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*  18 - COUNTDOWN
/*-----------------------------------------------------------------------------------*/
    #countdown span {
        width: 25%;
        display: inline-block;
        float: left;
        font-size: 56px;
        font-weight: 900
    }

    #countdown small {
        font-weight: 300;
        font-size: 18px;
        display: block;
        clear: both;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    #countdown {
        overflow: hidden;
        padding-bottom: 80px;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  19 - MEDIA QUERIES
/*-----------------------------------------------------------------------------------*/
    @media screen and (min-width: 992px) {
        body {
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
        }

        .fullheight {
            min-height: 100vh;
            height: 100vh;
        }

        .navbar-fixed-top .container-fluid {
            padding-left: 50px;
            padding-right: 50px;
        }
    }

    @media screen and (max-width: 991px) {
        .navbar-default .nav li a {
            padding: 25px 15px;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .fullheight {
            min-height: 100vh;
            height: 100vh;
        }
    }

    @media(min-width:767px) {
        header .intro-text {}

        header .intro-text .intro-lead-in {
            margin-bottom: 20px;
            font-size: 40px;
            font-style: normal;
            line-height: 40px;
            letter-spacing: -1px
        }

        header .intro-text .intro-heading {
            text-transform: uppercase;
            font-size: 80px;
            font-weight: 900;
            letter-spacing: 6px;
        }

        header .intro-text .intro-heading img {
            max-width: 540px;
            margin: 0 auto;
        }

        li.dropdown:hover ul.dropdown-menu {
            opacity: 1;
        }

        li.dropdown:hover ul.dropdown-menu {
            display: block;
            -webkit-animation: fadeIn 0.4s;
            animation: fadeIn 0.4s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }

        .animated-navigation #main-navigation .navbar-nav li {
            opacity: 0;
            top: -50px;
            position: relative;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            pointer-events: none;
            cursor: pointer;
        }

        .animated-navigation #main-navigation .navbar-nav li#menu-trigger-wrapper {
            display: block;
            opacity: 1;
            top: 0;
            pointer-events: auto;
            cursor: auto;
            padding: 15px;
        }

        .animated-navigation #main-navigation.menu-active .navbar-nav li {
            opacity: 1;
            top: 0px;
            position: relative;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            pointer-events: auto;
            cursor: auto;
        }

    }

    @media(min-width:768px) {
        .navbar-default {
            padding: 30px 0;
            border: 0;
            background-color: transparent;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            margin-bottom: 0;
        }

        .navbar-default .navbar-brand {
            font-size: 24px;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            transition: all .3s;
            font-weight: 900;
        }

        .navbar-default.navbar-shrink {
            padding: 0;
            background-color: #222;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out
        }
    }

    @media(max-width:768px) {

        #bottom-frame,
        #single-pager-navigation-wrapper,
        .slider-control {
            display: none !important;
        }

        .fullheight,
        .fullheight .article-slide,
        .fullheight .article-slide .carousel-inner,
        .fullheight .article-slide .item,
        .fullheight .article-slide .item img {
            height: auto !important;
            min-height: 600px;
            max-height: 600px;
        }

        header .intro-text .intro-heading img {
            max-width: 360px;
            margin: 0 auto;
        }

        .icon-tabs .fa-4x {
            font-size: 46px;
        }

        .icon-tabs li .tabtitle {
            font-size: 12px;
            letter-spacing: 4px
        }

        .dark-wrapper .icon-tabs li {
            border-right: none;
        }

        .form-control.col-md-4,
        .dark-wrapper.form-control.col-md-4 {
            width: 100% !important;
        }

        .navbar-default.navbar-fixed-top {
            position: relative;
            margin-bottom: 0;
        }

        .navbar-default .navbar-brand,
        .navbar-default .nav li a {
            color: #222;
        }

        .navbar-default .navbar-brand {
            margin-top: 2px;
        }

        .nav-justified>li {
            width: 50%;
            float: left;
            word-wrap: break-word;
        }

        .navbar-default .nav li a {
            font-size: 13px;
            padding: 10px 15px;
        }

        #navbar-social,
        #header-scroll-wrapper {
            display: none;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #222;
        }

        .pad-sides-60 {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        footer .col-md-6 {
            text-align: center;
        }

        footer.white-wrapper .social-links li {
            padding: 15px 10px;
        }

        .post-left-col,
        .post-right-col,
        .post-center {
            width: 100%;
            clear: both;
        }

        .post-date .the-date,
        .post-date .the-month {
            float: none;
        }

        .post-date .the-date {
            width: auto;
            font-size: 14px;
            letter-spacing: 0px;
        }

        [data-easyshare] [data-easyshare-total-count],
        [data-easyshare] [data-easyshare-button-count] {
            padding-left: 0;
        }

        .share-button {
            clear: none;
        }

        .post-right-col {
            padding-top: 30px;
        }
    }

    @media(max-width:460px) {

        .fullheight,
        .fullheight .article-slide,
        .fullheight .article-slide .carousel-inner,
        .fullheight .article-slide .item,
        .fullheight .article-slide .item img {
            height: auto !important;
            min-height: 400px
        }

        header .intro-text .intro-heading img {
            max-width: 260px;
            margin: 0 auto;
        }
    }

    /*-----------------------------------------------------------------------------------*/
    /*  20 - SHOP
/*-----------------------------------------------------------------------------------*/
    .item-excerpt .pull-right {
        margin-top: 0;
    }

    .onsale {
        position: absolute;
        background-color: #fff;
        padding: 15px 10px;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 10px;
        margin-left: 10px;
    }

    .images .thumbnails {
        margin-top: 25px;
    }

    .images .thumbnails a {
        margin-right: 10px;
    }

    .quantity.buttons_added {
        display: inline-block;
    }

    .quantity.buttons_added input {
        padding: 13px 5px;
        position: relative;
        top: 1px;
        width: 60px;
        background-color: transparent;
        border: 1px solid;
    }

    .product-rating.mb,
    .summary .price {
        margin-bottom: 25px;
    }

    .summary .price ins {
        clear: left;
        display: block;
        text-decoration: none;
        font-size: 28px;
        font-weight: 700;
    }

    .product-tabs {
        margin-top: 25px;
    }

    .product-tabs .tab-pane {
        padding: 25px 0;
    }

    .testimonial-owl .hover-item {
        margin-left: 0;
        margin-right: 0;
    }

    .testimonial-owl .hover-item .col-xs-12 {
        padding-left: 0;
        padding-right: 0;
    }

    .testimonial-author {
        max-width: 100px;
        margin: 13px auto;
        border-radius: 50%;
    }


    /*-----------------------------------------------------------------------------------*/
    /*  21 - SIDE NAV
/*-----------------------------------------------------------------------------------*/
    .side-nav-active .master-wrapper {
        padding-left: 280px;
    }

    .side-nav-active .navbar-fixed-top {
        padding-left: 280px;
    }

    .side-nav-active #side-wrapper {
        width: 280px;
        position: fixed;
        left: 0;
        height: 100%;
        z-index: 11;
        padding: 10px;
    }

    .side-nav-active #side-menu-toggle {
        position: fixed;
        left: 15px;
        top: 15px;
        z-index: 10;
        background: #f6f6f6;
        border: none;
        font-size: 24px;
        padding: 6px 8px;
        line-height: 1;
    }

    .side-nav-active #side-menu-toggle.open {
        margin-left: 220px;
        z-index: 15;
    }

    .side-nav-active .side-menu ul {
        padding: 0;
    }

    .side-nav-active .side-menu ul li ul li {
        padding: 10px 20px;
    }

    .side-nav-active .side-menu ul li ul li a {
        font-size: 12px;
        padding: 0 !important;
    }

    .side-nav-active .side-menu .nav>li>a:hover,
    .side-nav-active .side-menu .nav>li>a:focus,
    .side-nav-active .navbar-default.navbar-shrink .nav li.active>a {
        background-color: transparent;
        color: #000;
    }

    #side-wrapper .navbar-header {
        clear: both;
        display: block;
        width: 100%;
        margin-bottom: 25px;
    }

    #side-wrapper .thin-hr:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 2px;
        background-color: #333;
        left: 17px;
        margin-left: 0;
    }

    #side-wrapper .thin-hr {
        margin: 20px 0 40px;
    }

    #side-wrapper .navbar-default {
        background-color: #fcfcfc;
        padding: 0 !important;
    }

    #side-wrapper .navbar-default .nav li a {
        padding: 12px 18px;
    }

    @media(max-width:768px) {
        #side-wrapper {
            display: none;
            background-color: #fcfcfc;
        }

        .side-nav-active .master-wrapper {
            padding-left: 0;
        }

        #side-wrapper .navbar-default .nav li a {
            padding: 10px 20px;
        }
    }

    /* MENU ICON */
    .tcon {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: none;
        cursor: pointer;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        height: 40px;
        transition: 0.3s;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        width: 40px;
        background: transparent;
        outline: none;
        -webkit-tap-highlight-color: transparent;
        -webkit-tap-highlight-color: transparent;
        -moz-transform: scale(0.8);
        -webkit-transform: scale(0.8);
        -o-transform: scale(0.8);
        -ms-transform: scale(0.8);
        transform: scale(0.8);
    }

    .tcon>* {
        display: block;
    }

    .tcon:hover,
    .tcon:focus {
        outline: none;
    }

    .tcon::-moz-focus-inner {
        border: 0;
    }

    .tcon-menu__lines {
        display: inline-block;
        height: 4px;
        width: 28px;
        border-radius: 0px;
        transition: 0.3s;
        background: #fff;
        position: relative;
    }

    .tcon-menu__lines::before,
    .tcon-menu__lines::after {
        display: inline-block;
        height: 4px;
        width: 28px;
        border-radius: 0px;
        transition: 0.3s;
        background: #fff;
        content: '';
        position: absolute;
        left: 0;
        -webkit-transform-origin: 2.85714px center;
        transform-origin: 2.85714px center;
        width: 100%;
    }

    .tcon-menu__lines::before {
        top: 7px;
    }

    .tcon-menu__lines::after {
        top: -7px;
    }

    .tcon-transform .tcon-menu__lines {
        -webkit-transform: scale3d(0.8, 0.8, 0.8);
        transform: scale3d(0.8, 0.8, 0.8);
    }

    .tcon-menu--xcross {
        width: auto;
    }

    .tcon-menu--xcross.tcon-transform .tcon-menu__lines {
        background: transparent !important;
    }

    .tcon-menu--xcross.tcon-transform .tcon-menu__lines::before,
    .tcon-menu--xcross.tcon-transform .tcon-menu__lines::after {
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        top: 0;
        width: 28px;
    }

    .tcon-menu--xcross.tcon-transform .tcon-menu__lines::before {
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
    }

    .tcon-menu--xcross.tcon-transform .tcon-menu__lines::after {
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
    }

    .tcon-visuallyhidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    .tcon-visuallyhidden:active,
    .tcon-visuallyhidden:focus {
        clip: auto;
        height: auto;
        margin: 0;
        overflow: visible;
        position: static;
        width: auto;
    }


    .navbar-default.navbar-shrink .tcon-menu__lines,
    .navbar-default.navbar-shrink .tcon-menu__lines::before,
    .navbar-default.navbar-shrink .tcon-menu__lines::after {
        background: #fff;
    }

    #bottom-frame {
        position: fixed;
        height: 30px;
        bottom: 0;
        width: 100%;
        left: 0;
        background-color: #222;
    }

    .header-scroll-wrapper {
        position: absolute;
        left: 0;
        width: 100%;
        bottom: 100px;
    }

    /* SINGLE PAGER NAV */
    #single-pager-navigation-wrapper {
        position: fixed;
        right: 0px;
        background-color: transparent;
        color: red;
        top: 50%;
        width: 30px;
        text-align: center;
    }

    #single-pager-navigation-wrapper a {
        width: 30px;
        padding: 5px 0;
        display: block;
    }

    #single-pager-navigation-wrapper a {
        color: #222;
    }

    a#back-to-top {
        position: fixed;
        right: 30px;
        bottom: 30px;
        background: #222;
        padding: 10px 20px;
        opacity: 0;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
        color: #fff;
    }

    a#back-to-top.show {
        opacity: 1;
        -webkit-transition: all .5s ease-in-out;
        -moz-transition: all .5s ease-in-out;
        -o-transition: all .5s ease-in-out;
        -ms-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .greyscale-images img {
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        filter: grayscale(100%);
        filter: url(grayscale.svg);
        /* Firefox 4+ */
        filter: gray;
        /* IE 6-9 */
    }

    /* FOOD MENU */
    .food-menu-item {
        margin-bottom: 15px;
    }

    .food-menu-item h3 {
        margin-top: 0;
    }
</style>
@endsection