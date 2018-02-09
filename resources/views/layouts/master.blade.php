<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="Mohammad Rastegar">
<!--     <link rel="icon" href="../../favicon.ico"> -->

<title>پاما - @yield('title')</title>

<!-- Bootstrap core CSS -->
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('font-awesome-4.5.0/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap/bootstrap-rtl.css')}}" rel="stylesheet">
@yield('css')
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{action('NTAController@index')}}">پــــامـــــا</a>
			</div>
			<div class="collapse navbar-collapse navbar-left navbar-inverse">
		      <form class="navbar-form navbar-right" role="search" action="{{url('nta/search')}}" method="post">
		          {!! csrf_field() !!}
		          <input type="text" name="searchQuery" class="search-input" placeholder="نام محل، شهر، فعالیت ...">
		          <button type="submit" class="btn btn-default">جستجو</button>
		      </form>				
			</div>
			
			<div id="navbar" class="collapse navbar-collapse navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#about">درباره</a></li>
					<li><a href="#about">تماس با ما</a></li>
					<li><a href="#about">راهنما</a></li>
					<li><a href="#contact">قوانین</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container-fluid">@yield('fullSizeContent')</div>
	<div class="container">@yield('content')</div>

	<script src="{{asset('js/jquery-2.2.3.min.js')}}"type="text/javascript"></script>
	@yield('js')
</body>
</html>