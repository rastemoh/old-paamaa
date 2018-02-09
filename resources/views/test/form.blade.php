@extends('layouts.master') 
@section('title',"فرم آزمایشی")
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
			<div class="col-md-6 col-md-offset-3 form-container">
				
			        <!-- Display Validation Errors -->
        			@include('common.errors')
				
				
				<form action="{{url('test/store')}}" method="post" enctype="multipart/form-data">
				 {!! csrf_field() !!}
				 

					<div class="row form-item">					
				    	<label for="imageFile" class="col-sm-12 form-label">بارگذاری تصویر</label>
						<div class="col-sm-12 col-md-6">
				    	<input type="file" id="imageFile" name="image">
						</div>
						<div class="col-sm-12 help-block">
				    	تصویر جاذبه گردشگری را اینجا بارگذاری کنید.
				    	</div>
				  	</div>
					
			
					
					<button type="submit" class="btn btn-primary">ثبت</button>
				</form>
			</div>

		</div>
	</div>

</div>
@endsection
@section('js')
@endsection