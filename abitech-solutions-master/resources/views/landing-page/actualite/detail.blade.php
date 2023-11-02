@extends('landing-page.layouts.template')

@section('content')
<div style="height: 100px;">

</div>
<style>
	.custom-card-image {
		width: 200px;
		height: 200px;
		object-fit: cover;
	}
</style>
<main id="main">
	<div class="container">
		<div class="row topspace">
			<article class="col-sm-8 col-md-8 maincontent">
				<header class="">
					<h2 class="page-title"><b>{{ $actualite->nom }}</b></h2>
				</header> <br>
				<p style="font-size: 20px;color:black;">{{ $actualite->description }}</p>
				
			</article>
			<aside class="col-md-4 sidebar sidebar-left">
				@if($actualite->photo1)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset('storage/' . $actualite->photo1) }}" alt="" class="custom-card-image"></p>
					</div>
				</div>
				@endif
				@if($actualite->photo2)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset('storage/' . $actualite->photo2) }}" alt="" class="custom-card-image"></p>
					</div>
				</div>
				@endif
				@if($actualite->photo3)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset('storage/' . $actualite->photo3) }}" alt="" class="custom-card-image"></p>
					</div>
				</div>
				@endif
				@if($actualite->photo4)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset('storage/' . $actualite->photo4) }}" alt="" class="custom-card-image"></p>
					</div>
				</div>
				@endif
				@if($actualite->photo4)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset('storage/' . $actualite->photo5) }}" alt="" class="custom-card-image"></p>
					</div>
				</div>
				@endif
			</aside>





		</div>
	</div>

</main>
</div>
</div>
@endsection