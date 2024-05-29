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
					<h2 class="page-title"><b>{{ $offre->nom }}</b></h2>
				</header> <br>
				<p style="font-size: 20px;color:black;">{{ $offre->description }}</p>
				
			</article>
			<aside class="col-md-4 sidebar sidebar-left">
				@if($offre->photo)
				<div class="row widget">
					<div class="col-xs-12">
						<p><img src="{{ asset($offre->photo) }}" alt="" class="custom-card-image"></p>
					</div>
					<a href="{{ $offre->lien }}" class="btn btn-primary">{{ $offre->button_name }}</a>

				</div>
				@endif
			
			</aside>





		</div>
	</div>

</main>
</div>
</div>
@endsection