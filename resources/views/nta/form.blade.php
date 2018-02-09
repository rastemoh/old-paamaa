@extends('layouts.master') 
@section('title',"فرم ورود جاذبه طبیعی")
@section('css')
<style>
body {
	background: black url("{{asset('img/back-new-location.png')}}");
}
</style>
@endsection 
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3 form-header">
				<h4>فرم ثبت مکان جدید
				</h4>
			</div>
			<div class="col-xs-12 col-md-6 col-md-offset-3 form-container">
				
			        <!-- Display Validation Errors -->
        			@include('common.errors')
				
				
				<form action="{{url('nta/store')}}" method="post" enctype="multipart/form-data">
				 {!! csrf_field() !!}
				 
					<div class="row form-item">
						<label for="nta-name" class="col-sm-12 form-label"> نام مکان
							گردشگری: 
							<span class="mandatory">*</span>
						</label>
						<div class="col-sm-12">
							<input type="text" name="name" id="nta-name" class="form-text-input">
						</div>
						<div class="col-sm-12 help-block">
						این یک متن راهنما در زیر قسمت ورود نام جاذبه گردشگری است
						</div>						
					</div>
					
					<div class="row form-item">
						<label for="eng-name" class="col-sm-12 form-label"> نام انگلیسی: <span
							class="mandatory">*</span>
						</label>
						<div class="col-sm-12">
							<input type="text" name="englishName" id="eng-name"
								class="form-text-input ltr-input">
						</div>
					</div>
					
					<div class="row form-item">
						<label for="description-input" class="col-sm-12 form-label">
							درباره محل: 
							</label>
						<div class="col-sm-12">
							<textarea name="description" id="description-input" class="textarea-input" rows="4"></textarea>
						</div>
					</div>
					
					<div class="row form-item">
						<label for="selectClimate" class="col-sm-12 form-label">
						اقلیم:
						</label>
						<div class="col-sm-12 col-md-6">
							<select name="climate" class="select-input" id="selectClimate">
									<option value="">انتخاب کنید</option>
								@foreach($climates as $climate)
									<option value="{{$climate->id}}">{{$climate->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row form-item">
						<label for="selectEnvCategory" class="col-sm-12 form-label">
						طبقه بندی زیست محیطی
						</label>
						<div class="col-sm-12 col-md-6">
							<select name="envCategory" class="select-input" id="selectEnvCategory">
									<option value="">انتخاب کنید</option>
								@foreach($envCats as $envCat)
									<option value="{{$envCat->id}}">{{$envCat->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="row form-item">
						<label for="selectNTAType" class="col-sm-12 form-label">
						طبقه بندی نوعی
						</label>
						<div class="col-sm-12 col-md-6">
							<select name="NTAType" class="select-input" id="selectNTAType">
									<option value="">انتخاب کنید</option>
								@foreach($ntatypes as $ntatype)
									<option value="{{$ntatype->id}}">{{$ntatype->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row form-item">					
				    	<label for="imageFile" class="col-sm-12 form-label">بارگذاری تصویر</label>
						<div class="col-sm-12 col-md-6">
				    	<input type="file" id="imageFile" name="image">
						</div>
						<div class="col-sm-12 help-block">
				    	تصویر جاذبه گردشگری را اینجا بارگذاری کنید.
				    	</div>
				  	</div>
					
					<div class="row form-item">
						<label for="selectState" class="col-sm-12 form-label">
						استان
						</label>
						<div class="col-sm-12 col-md-6">
							<select name="state" class="select-input" id="selectState">
									<option value="">انتخاب کنید</option>
								@foreach($states as $state)
									<option value="{{$state->id}}">{{$state->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row form-item">
						<label for="selectDivision" class="col-sm-12 form-label">
						شهرستان
						<span class="mandatory">*</span>
						</label>
						<div class="col-sm-12 col-md-6">
							<select name="division" class="select-input" id="selectDivision">
									<option value="">انتخاب کنید</option>
							</select>
						</div>
						<div class="col-sm-12 help-block">
						ابتدا استان و سپس شهرستان را انتخاب کنید.
						</div>						
					</div>
					
					<div class="row form-item">
						<label for="" class="col-sm-12 form-label">
						لطفا محل مورد نظر را روی نقشه انتخاب کنید (روی محل کلیک کنید)
						</label>
						<div class="col-sm-12 col-md-10 col-md-offset-1" id="mapContainer">						
						</div>
					</div>

					<div class="row form-item">
						<label for="inputX" class="col-sm-6 form-label">
						طول جغرافیایی
							<span	class="mandatory">*</span>
						</label>
						<label for="inputY" class="col-sm-6 form-label">
						عرض جغرافیایی
							<span	class="mandatory">*</span>
						</label>

						<div class="col-sm-6">
							<input type="text" name="xPosition" id="inputX"	class="form-text-input ltr-input">
						</div>
						<div class="col-sm-6">
							<input type="text" name="yPosition" id="inputY" class="form-text-input ltr-input">
						</div>
					</div>

					<div class="row form-item">
						<label for="fAddress-input" class="col-sm-12 form-label">
						آدرس عامیانه
						</label>
						<div class="col-sm-12">
							<textarea name="folkAddress" id="fAddress-input" class="textarea-input" rows="4"></textarea>
						</div>
					</div>
					
					<p>
					نحوه دسترسی به محل از طریق:
					</p>
					<div class="row form-item">
						<label for="air-access" class="col-sm-12 form-label"> 
						دسترسی هوایی:
						</label>
						<div class="col-sm-12">
							<input type="text" name="airAccess" id="air-access" class="form-text-input">
						</div>
					</div>
					
					<div class="row form-item">
						<label for="bus-access" class="col-sm-12 form-label">
						دسترسی با اتوبوس  
						</label>
						<div class="col-sm-12">
							<input type="text" name="busAccess" id="bus-access" class="form-text-input">
						</div>
					</div>

					<div class="row form-item">
						<label for="train-access" class="col-sm-12 form-label">
						دسترسی با قطار  
						</label>
						<div class="col-sm-12">
							<input type="text" name="trainAccess" id="train-access" class="form-text-input">
						</div>
					</div>

					<div class="row form-item">
						<label for="sea-access" class="col-sm-12 form-label">
						دسترسی دریایی  
						</label>
						<div class="col-sm-12">
							<input type="text" name="seaAccess" id="sea-access" class="form-text-input ">
						</div>
					</div>

					<div class="row form-item">
						<label for="offroad-access" class="col-sm-12 form-label">
						دسترسی با خودروی شخصی / خارج از جاده
							</label>
						<div class="col-sm-12">
							<textarea name="offroadAccess" id="offroad-access" class="textarea-input" rows="4"></textarea>
						</div>
					</div>
					
					<hr class="form-splitter">

					<div class="row form-item">
						<label for="" class="col-sm-12 form-label">
						فعالیت های گردشگری قابل انجام و موجود در این مکان را انتخاب کنید:
							</label>
							@foreach($activities as $activity)
								<div class="col-sm-12 col-md-6">
									      <div class="checkbox">
										        <label>
									          		<input type="checkbox" name="activity[]" value="{{$activity->id}}">{{$activity->name}}
										        </label>
									      </div>
								</div>
							@endforeach
					</div>

					
					<button type="submit" class="btn btn-primary">ثبت</button>
				</form>
			</div>

		</div>
	</div>

</div>
@endsection
@section('js')
<script type="text/javascript">
$( "#selectState" ).change(function() {
	$(".added-option").remove();//removing all previously added elements (options)
	value = $("#selectState").val();
	url = "{{url('div/load_subdivisions/')}}"+"/"+value;
	$.ajax({//loading subdivisions of selected state
		  url: url,
		  success: function(data){
			  $.each(data,function(i , val){//adding loaded data as options to select division
				  element = "<option value='"+val.id+"' class='added-option'>"+val.name+"</option>";
				  $("#selectDivision").append(element);
			  })
		  },
		  dataType: "json",
		});
	
	});
</script>
<!-- Map API -->
<script type="text/javascript" src="{{asset('js/map.js')}}"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCljQQ4DhekAz5WLfueNcMx6CP8PNYo9fc&sensor=false&language=fa&async=2&callback=initializeMap">
</script>
@endsection