@extends('layouts.master') 
@section('title',"صفحه اصلی")
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
					<div class="hint-text">
						<i class="fa fa-list"></i>
						محل های ثبت شده در سامانه:
					</div>
						<a href="{{action('NTAController@form')}}" class="insert-new">
						<button type="button" class="btn btn-primary">
							<i class="fa fa-plus"></i>ثبت مورد جدید
						</button>
						</a>
					</div>
				</div>
				@forelse ($ntas as $nta)
					<div class="row nta-row">
						<div class="col-xs-3 picture" style="background-image:url('{{$nta->mainPicFile()}}');">
						</div>
						<div class="col-xs-9 text">
							<h2><a href="{{$nta->getLink()}}">{{$nta->name}}</a></h2>
							<p>{{str_limit($nta->description,200)}}</p>
						</div>
					</div>	
				@empty
					<div class="row top-row">
						<div class="col-xs-12">
						Ù‡ÛŒÚ† Ù…Ø­Ù„ÛŒ Ø«Ø¨Øª Ù†Ø´Ø¯Ù‡ Ø§Ø³Øª.
						</div>
					</div>
				@endforelse
		
			</div>
		</div>
	</div>
</div>
@endsection 