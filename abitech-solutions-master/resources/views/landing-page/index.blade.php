@extends('landing-page.layouts.template')

@section('content')
<!-- Actualite Start 
@include('landing-page.homepage.actu')
 Banner End -->
    <!-- Banner Start -->
    @include('landing-page.homepage.banner')
    <!-- Banner End -->

    <!-- About Start -->
    @include('landing-page.homepage.about')
    <!-- About End -->

    @include('landing-page.homepage.services')

    <!-- Categorie Formations Start -->
   
    <!-- Categorie Formations End -->

    <!-- Features Start -->
    @include('landing-page.homepage.features')
    <!-- Features End -->

    <!-- Formations Start -->
   
    <!-- Formations End -->



    <!-- Client Start -->
    @include('landing-page.homepage.clients')
    <!-- Client End -->





@endsection
