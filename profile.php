<!DOCTYPE html>
<html>
<?php
	session_start();
	if(empty($_SESSION['user'])){
		header('Location:index.php');
	}
?>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0"/>
	<meta charset="utf-8"/>
	<title>InfoLive | Profile</title>
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
  		margin-bottom: 5%;
  		padding: 5%;
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
		<br><br>
		<?php 
		//Server Connection
		$server = "localhost";
		$username = "root";
		$pass = "";
		$database = "info_live";

		$conn = mysqli_connect($server,$username,$pass,$database);
		if(!$conn){
			echo "<script type='text/javascript'>
			alert('Cannot Connect to DB. Please Try Again Later');
			</script>";
		}
		error_reporting(1);
		$pengguna = $_SESSION['user'];
		$sql = "SELECT * FROM pengguna WHERE username LIKE '".$pengguna."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)==1){
			$row = $result ->fetch_assoc();
			echo '
				<!--Image Profil-->
				<div class="row valign-wrapper" style="margin-top: 5%;">
		            <div class="col s5 offset-s4">
		              <img src="'.$row["image"].'" class="circle responsive-img z-depth-3">
		            </div>
		        </div>';

		    echo '
				<!-- Isi profil-->
				<p><b>Profile</b></p>
				<div class="divider"></div>

				<i class="material-icons black-text darken-2" style="display: inline-flex;vertical-align: middle;">people</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">'.$row["nama"].'</p>
				<div class="divider"></div>';

			echo '					
				<i class="material-icons teal-text darken-1" style="display: inline-flex;vertical-align: middle;">email</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">'.$row["email"].'</p>';

			echo '
				<div class="divider"></div>
				<i class="material-icons  red-text darken-4" style="display: inline-flex;vertical-align: middle;">place</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">'.$row["alamat"].'</p>
				<div class="divider"></div>';

			echo '
				<i class="material-icons blue-text darken-4" style="display: inline-flex;vertical-align: middle;">phone</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">'.$row["telepon"].'</p>
				<div class="divider"></div>';
		} else{
			echo "<script type='text/javascript'>
			alert('Database Error');
			</script>";
		}
		mysqli_close($conn);
	?>
		<!--Statistik-->
		<br>
		<p><b>Statistik</b></p>
		<div class="divider"></div>

		<i class="material-icons teal-text darken-3" style="display: inline-flex;vertical-align: middle;">note</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">Post : 55</p>

		<div class="divider"></div>
		<i class="material-icons blue-text darken-2" style="display: inline-flex;vertical-align: middle;">comment</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%">Comment : 55</p>
		<div class="divider"></div>

		<br>
		<p><b>My Post</b></p>
		<div class="divider"></div>
	
	</div>
	<script type="text/javascript">
			$(".button-collapse").sideNav({
				menuWidth:200,
				closeOnClick:true,
				draggable:true
			});
			$(document).ready(function(){
				$('.slider').slider();
			});
	</script>
</body>
</html>