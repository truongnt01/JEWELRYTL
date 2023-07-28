<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- My CSS -->
	@vite(['resources/css/style.css','resources/js/admin.js'])
	@yield('layout')
	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ url('admin') }}" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ url('admin') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('product.index') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li>
				<a href="{{ route('category.index') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li>
				<a href="{{ route('attribute.index') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Attributes</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();
				">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
				@csrf
				</form>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="{{ url('admin') }}" class="nav-link">Admin</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		@yield('content')
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
@yield('script')
	
</body>
</html>