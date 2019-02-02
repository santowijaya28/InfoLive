<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0"/>
	<meta charset="utf-8"/>
	<title>InfoLive | About</title>
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
	.brand-logo #gambar{
		margin-top: 6%;
		height: 35px;
	}

	@media (min-width: 768px)
		.nav-fixed{
		border-radius: 0;
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
		<br>
		<h5>About</h5>
		<div class="divider"></div>
		<p class="wow fadeInRight"><b class="teal-text darken-1" ">Infolive</b> merupakan portal informasi yang menyajikan informasi aktual di sekitar Anda. Kami memiliki konsen untuk mengurangi berita informasi yang bersifat <b class="red-text accent-4">HOAX</b>. Kini Anda dapat mengakses informasi di sekitar dengan mudah. 
		</p> 

		<!--slider-->
		<div class="slider wow fadeIn">
			<ul class="slides">
				<li><img class="responsive-img" src="lib/hoax.jpg">
				</li>
				<li><img class="responsive-img" src="lib/macet.jpg"></li>
				<li><img class="responsive-img" src="lib/info.jpg">
				</li>
			</ul>
		</div>
		
		<!--Founder-->
		<p><b>Tim Kami : </b></p>
		<div class="row valign-wrapper wow fadeInLeft">
            <div class="col s4">
              <img src="lib/Andre.jpg" class="circle responsive-img">
            </div>
            <div class="col s10">
              <span class="black-text">
		        <p><b>Andreas Ekadinata</b>, berperan sebagai Web Developer. Bertanggung jawab untuk mengembangkan web infolive.</p>
		      </span>
            </div>
        </div>
        
		<div class="row valign-wrapper wow fadeInLeft">
            <div class="col s4">
              <img src="lib/berlin.jpg" class="circle responsive-img"> 
            </div>
            <div class="col s10">
            	<span class="black-text">
		        <p><b>Berlin</b>, berperan sebagai Data Analyst. Bertanggung jawab untuk memfilter informasi.</p>
				</span>
            </div>
        </div>

        <div class="row valign-wrapper wow fadeInLeft">
            <div class="col s4">
              <img src="lib/Santo.jpg" class="circle responsive-img">
            </div>
            <div class="col s10">
              <span class="black-text">
		        <p><b>Santo Wijaya</b>, berperan sebagai Web Developer. Bertanggung jawab untuk mengembangkan web infolive.</p>
            </div>
        </div>
		<br>
		<p><b>Contact:</b></p>
		<i class="material-icons teal-text darken-1" style="display: inline-flex;vertical-align: middle;">email</i><p style="display: inline-flex;vertical-align: middle; margin-left: 5%"> admin@infolive.com</p> <br>
		<i class="material-icons red-text darken-1" style="display: inline-flex;vertical-align: middle;">place</i><p style="display: inline-flex;vertical-align: middle; margin-left: 5%">Jalan Cisitu Indah Baru</p> <br>

		<i class="material-icons teal-text darken-1" style="display: inline-flex;vertical-align: middle;">phone</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 0 5%"> 0857-2703-5802</p>
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
	<script>

			var wow = new WOW();
			wow.init();
	</script>

</body>
</html>