<!DOCTYPE html>
<html>
	<head>
		<title>
			@section('title')
			Family Connection
			@show
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		{{-- CSS And Scripts--}}
		
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::script('ckeditor/ckeditor.js') }} 
		{{ HTML::script('js/jquery.v1.8.3.min.js') }}
		{{ HTML::script('js/script.js') }}
		<style>
		@section('styles')
			body {
				padding-top: 100px;
				padding-bottom: 100px;
			}
		@show
		</style>
	</head>

	<body>
		{{-- Navbar --}}
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">		
					<ul class="nav navbar-nav pull-left">
						
						@if(Auth::guest())
							<li><a href="{{{ URL::to('') }}}">Home</a></li>
						@else
							<li>{{ HTML::link('userHome', 'Family Connection', array('class' => 'navbar-brand')) }}</li>
							<li>{{ HTML::link('userHome', 'Home') }}</li>
							<li>{{ HTML::link('users/' . Auth::user()->id, 'My Profile') }}</li>
							<li>{{ HTML::link('friends', 'Family') }}</li>
						@endif
						</ul>
					<ul class="nav navbar-nav pull-right">
							@if ( Auth::guest() )
								<li>{{ HTML::link('login', 'Login') }}</li>
								<li>{{ HTML::link('register', 'Register')}}</li>
							@else
								<li><a>Logged In As<br> {{{Auth::user()->first_name . " " . Auth::user()->last_name}}}</a></li>
								<li>{{HTML::image(Config::get('image.thumb_folder').'/'. Auth::user()->image, 'your name', array('class' => 'small-img img-circle'))}}</li>

								<li>{{ HTML::link('logout', 'Logout') }}</li>
							@endif
						</ul>	
				</div>
			</div>
		</div> 
		{{-- Page Content --}}
		<div class="container">
			{{-- Success Message --}}
			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Success</h4>
					{{{ $message }}}
				</div>
				{{-- Error Message --}}
			@elseif ($message = Session::get('error'))
				<div class="alert alert-error alter-block">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Oops There Was An Error</h4>
					{{{ $message }}}
				</div>
			@endif
			{{-- Content --}}
			@yield('content')
		</div>
	</body>
</html>
