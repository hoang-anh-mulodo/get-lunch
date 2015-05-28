<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

	<!-- Fonts -->
	<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="teal lighten-2">
			<ul class="right hide-on-med-and-down">
				<li><a href="{{ url('/') }}">Menu</a></li>
				<li><a href="{{ url('orders') }}">Order of today</a></li>
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
						<li>
							<a href='#' class="dropdown-button" data-beloworigin="true" data-activates='dropdown-user-menu'>{{ Auth::user()->name }} <i class="mdi-hardware-keyboard-arrow-down"></i></a>
							<ul id="dropdown-user-menu" class="dropdown-content" style="z-index: 1000">
                @if (Auth::user()->isAdmin == true)
                  <li><a href="{{ url('/foods/create') }}">Create new food</a></li>
                @endif
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
			</ul>
			<ul id="slide-out" class="side-nav">
				<li><a href="#!">First Sidebar Linka</a></li>
				<li><a href="#!">Second Sidebar Link</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</nav>
		<!-- example content -->
		<div class="container-fluid">
			@yield('content')
		</div>


		<script>
			$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
    );
			$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false // Displays dropdown below the button
    }
  );
		</script>
	</body>
	</html>
