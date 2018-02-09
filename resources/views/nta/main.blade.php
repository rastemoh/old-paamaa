@extends('layouts.master')
@section('title',"First Page")
@section('content')
<?php 
$location = $nta->xPosition.",".$nta->yPosition
?>
<div class="row nta-header">
	<div class="col-xs-12 col-md-9 pic-section" style="background-image:url('{{$nta->mainPicFile()}}');">
		<div class="row">
			<div class="col-xs-12 black-band pull-down">
				<div class="row">
				<div class="col-xs-2">
					<div id="circle" style="background-color: {{$nta->climate->colorCode}};background-image:url({{asset('img/'.$nta->NTAType->iconName)}})"></div>
					<div id="line" style="border-color:{{$nta->climate->colorCode}};"></div>					
				</div>
				<h1 class="col-xs-6">{{$nta->name}} ({{$nta->englishName}})</h1>
				<h4 class="col-xs-3 col-xs-offset-1">{{$nta->division->getParent()->name}}/{{$nta->division->name}}</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3 map-section" 
		style="background-image:url('https://maps.googleapis.com/maps/api/staticmap?center={{$location}}&size=293x450&zoom=8&markers={{$location}}')" >
	</div>
</div>
<div class="row nta-body">
	<div class="col-xs-12 col-md-9 text-section">
		<div class="row">
			<div class="col-xs-12 text-about" style="border-color:{{$nta->climate->colorCode}};">
				<h2>درباره {{$nta->name}}</h2>
				<p>{{$nta->description}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-information">
				<h3>اطلاعات {{$nta->name}}
					<span class="info-circle"></span>
				</h3>
				<h4>دسترسی ها
					<span class="small-tab"></span>
				</h4>
				<p>
					<ul>
						@foreach ($nta->accessWays as $accessWay)
							<li><strong>{{$accessWay->name}}</strong>: {{$accessWay->pivot->description}}</li>				
						@endforeach		
					</ul>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-activity">
				<h3>فعالیت ها در  {{$nta->name}}
					<span class="activity-circle"></span>
				</h3>
				<ul>
					@foreach ($nta->activities as $activity)
						<li>{{$activity->name}}</li>
					@endforeach	
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3 banner-section">
		<h4>اطلاعات محلی {{$nta->name}}</h4>
		<div class="row">
			<div class="col-xs-12 banner">
				<div class="row">
					<div class="col-xs-3 icon"><i class="fa fa-compass"></i></div>
					<div class="col-xs-3"></div>
					<div class="col-xs-6 text">
					<span>طول و عرض جغرافیایی</span>
					{{$nta->xPosition}}
					<br>
					{{$nta->yPosition}}
					</div>
				</div>
			</div>
			<div class="col-xs-12 banner">
				<div class="row">
					<div class="col-xs-3 icon" id="weatherIcon"></div>
					<div class="col-xs-5" id="temp"></div>
					<div class="col-xs-4" id="metric">درجه سانتی گراد</div>
				</div>
			</div>
		</div>
	</div>

<br>

@endsection
@section('js')
<script type="text/javascript">
$('.pull-down').each(function() {
  var $this = $(this);
  $this.css('margin-top', $this.parent().parent().height() - $this.height())
});
$(document).ready(function(){
	key = "fb862da47c081988b97f10fb9d01cf51"
	lat = "{{$nta->xPosition}}"	
	lng = "{{$nta->yPosition}}"	
	url = "http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lng+"&units=metric&appid="+key
	$.ajax({//loading subdivisions of selected state
		  url: url,
		  success: function(data){
			  imageUrl = "http://openweathermap.org/img/w/"+data.weather[0].icon+".png";
			  imgElem = "<img src="+imageUrl+">"
			  $("#weatherIcon").append(imgElem);
			  $("#temp").html(Math.ceil(data.main.temp));
		  },
		  dataType: "json",
		});
	
	});
</script>
@endsection