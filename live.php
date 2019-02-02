<!DOCTYPE html>
<?php
	session_start();
	if(empty($_SESSION['user'])){
		header('Location:index.php');
	}
?>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0"/>
	<meta charset="utf-8"/>
	<title>InfoLive | HOME</title>
	<link rel="shortcut icon" href="lib/Logo.png">

	<!-- Import Materialize css -->
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css" media="screen,projection"/>

	<!-- Import Wow js-->
	<link rel="stylesheet" type="text/css" href="js/animate.css">
	<script src="js/wow.js"></script>
	
	<!-- Import Icon-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<style type="text/css">
	html {
    	font-family: "Trebuchet MS";
  	}

  	body{
  		background-color: rgba(21,31,12,0.1);
  	}

	#halaman{
  		margin-top: 5%;
  		margin-bottom: 5%;
  		padding: 5%;
  		padding-top: 16%;
  		background-color: rgba(255,255,255,1);
  		border-radius: 3px;
  	}
  	.nav-fixed{
		position: fixed;
		right: 0;
		left: 0;
		z-index: 1030;
	}
	.nav-fixed {
		top: 0;
	}
	@media (min-width: 768px)
		.nav-fixed{
		border-radius: 0;
	}
	#status{
		background-color: rgba(255,255,255,1);
		padding: 4% 3% 3% 2%;
	}
	#back{
		padding-left: 10%;
		cursor: pointer;
	}

	#textarea1{
		padding: 5% 5% 5% 5%;
		width: 90%;
		margin-bottom: 2%;
	}

	.brand-logo #gambar{
		margin-top: 6%;
		height: 35px;
	}

	.news{
		padding: 5%;
		margin-top: 5%;
	}

	.upload>input{
		display: none;
	}

	.upload>label{
		margin-left :9px;
	}
	audio{
		width: 100%;

	}

	.koment{
		cursor: pointer;
	}

	.koment:hover{
		color: rgba(30,30,30,1) !important;
		-webkit-transition:color .09s ease-in;
	}

	#search{
  		border-bottom: 0.1em solid rgba(121,121,211,0.3);
  	}

  	.nav-fixed{
		position: fixed;
		right: 0;
		left: 0;
		z-index: 1030;
	}

	.nav-fixed {
		top: 0;
	}
	@media (min-width: 768px)
		.nav-fixed{
		border-radius: 0;
	}
	.brand-logo #gambar{
		margin-top: 6%;
		height: 35px;
	}

	</style>
</head>

<body>
<!--import jquery and materialize-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<div class="nav-fixed">
	<nav class="teal darken-1">
		<div class="container nav-wrapper">
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons white-text">menu</i></a>

			<!--- Ini untuk Logo InfoLive-->
			<a href="home.php" class="brand-logo">
				<img id="gambar" src="lib/LogoNav.png">
			</a>
			
			<!--side bar-->
			<ul id="slide-out" class="side-nav">
				<li><a href="search.php" class="teal-text darken-1">Search</a></li>
				<li><a href="home.php" class="teal-text darken-1">Home</a></li>
				<li><a href="live.php" class="teal-text darken-1">Live</a></li>
				<li><a href="profile.php" class="teal-text darken-1">My Profile</a></li>
				<li><a href="about.php" class="teal-text darken-1">About</a></li>
				<li><a href="index.php" class="teal-text darken-1">Sign Out</a></li>			
			</ul>
		</div>
	</nav>
	</div>

	<div id="halaman" class="container">
		aaaa
	</div>

	<script type="text/javascript">
			$(".button-collapse").sideNav({
				menuWidth:200,
				closeOnClick:true,
				draggable:true
			});
	</script>
</body>
</html>