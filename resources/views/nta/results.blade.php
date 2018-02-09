@extends('layouts.master') 
@section('title',"نتایج جستجو")
@section('css')
<style>
body {
	background: black url("{{asset('img/back-new-location.png')}}");
}
</style>
@endsection 
@section('content')
<div class="row">
	<div class="col-xs-12 ">
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2 results-container">
			<div class="row top-row">
				<div class="col-xs-12">
					جستجو برای:
					<span style="color:red">{{$query}}</span>
				</div>
			</div>
				@forelse ($results as $nta)
					<div class="row nta-row">
						<div class="col-xs-3 picture" style="background-image:url('{{$nta->mainPicFile()}}');">
						</div>
						<div class="col-xs-9 text">
							<h2>{{$nta->name}}</h2>
							<p>{{str_limit($nta->description,180)}}</p>
						</div>
					</div>	
				@empty
					<div class="row top-row">
						<div class="col-xs-12">
						متاسفانه هیچ موردی یافت نشد
						</div>
					</div>
				@endforelse
		
			</div>
		</div>
	</div>
</div>
@endsection 