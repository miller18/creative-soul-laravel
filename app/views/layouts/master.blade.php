<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Creative Soul</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/custom.css') }}
	</head>
	<body>
		@include('partials._header')
		<div class="container">
			<div class="page-header">
				@yield('header')
			</div>
			@if(Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif
			
			@if(Session::has('messages'))
				<div class="alert alert-warning">
					<p>The following errors have occurred:</p>
					<ul>
					<?php 
					
					$messages = Session::get('messages');
					foreach ($messages->get('class_time') as $message) {
						echo '<li>' . $message . '</li>';
					}
					foreach ($messages->get('class_type') as $message) {
						echo '<li>' . $message . '</li>';
					}
					foreach ($messages->get('class_duration') as $message) {
						echo '<li>' . $message . '</li>';
					}

					?> 
					</ul>
				</div>	
			@endif

			@if(Session::has('error'))
				<div class="alert alert-warning">
					{{ Session::get('error') }}
				</div>
			@endif

		@yield('content')	
		{{ HTML::script('js/jquery.js') }}
		{{ HTML::script('js/bootstrap.js') }}
		</div>

	</body>
</html>