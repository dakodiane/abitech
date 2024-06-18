@extends('landing-page.layouts.template')

@section('content')
   
   <!-- Conditionally include Offres Start -->
   @if($offres->where('active', 1)->count() > 0)
       @include('landing-page.homepage.offres')
   @endif
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

    <!-- ActuStart -->
    @include('landing-page.homepage.actu')
    <!-- ActuEnd -->


    <!-- Client Start -->
    @include('landing-page.homepage.clients')
    <!-- Client End -->
 <!-- Client Start -->
 @include('landing-page.homepage.emails', ['id' => 'newsletter'])
     <!-- Client End -->





@endsection
