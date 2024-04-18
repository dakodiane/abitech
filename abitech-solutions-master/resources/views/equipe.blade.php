@extends('landing-page.layouts.template')

@section('content')

<div style="height: 150px;">

</div>
<section id="team" class="team">
  <div class="container">

    <div class="section-title">
      <h2>Notre Equipe</h2>
      <p></p>
    </div>
    <div class="row">
      @foreach($members as $member)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
        <div class="member">
          <img src="{{ asset($member->photo) }}" alt="{{ $member->nom }}">
          <h4>{{ $member->nom }}</h4>
          <span>{{ $member->poste }}</span>
          <p>{{ $member->description }}</p>
          <div class="social">
            @if($member->linkedin)
            <a class="btn btn-outline-light btn-social" href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
            @endif
            @if($member->email)
            <a class="btn btn-outline-light btn-social" href="mailto:{{ $member->email }}" target="_blank"><i class="fab fa-google"></i></a>
            @endif

          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section><!-- End Team Section -->

@endsection