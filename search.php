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
		<br><br>
		<form method="POST">
	        <div class="input-field">
	          <input id="search" name="search" type="search" placeholder="Masukkan kata kunci"
	          required>
	          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
	          <i class="material-icons">close</i>
	        </div>
	        <input id="Submit" type="submit" style="margin-left: 70%" class="btn" name="Submit" value="Search">	        
      	</form>
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
			if(isset($_POST['Submit']) && isset($_POST['search'])){
      			$kata_kunci = $_POST['search'];	
				$sql = "SELECT * FROM laporan  NATURAL JOIN pengguna WHERE lokasi LIKE '%".$kata_kunci."%' OR isi_laporan like '%".$kata_kunci."%' ORDER BY tanggal DESC";
				$results = mysqli_query($conn, $sql);
				if(mysqli_num_rows($results)>0){
					echo "<br><br>";
					foreach ($results as $result) {
					echo "<div class ='divider'></div>";
					$id_berita = $result['id_laporan'];
					$poster = $result['nama'];
					$poster_img = $result['image'];
					$lokasi = $result['lokasi'];
					$waktu = $result['tanggal'];
					$isi = $result['isi_laporan'];
					$file =  $result['namafile'];
					$file_type = $result['tipe'];
					$hari = date('d F Y', strtotime($waktu));
					$jam = date('H.i', strtotime($waktu));
					echo '
					<div class="divider"></div>
					<div class="news">
					<!-- Identity -->
					<div id="'.$id_berita.'" class="valign-wrapper">
					 	<div class="col s2">
							<img class="circle responsive-img" style="height: 35px;margin-right: 2%" src="'.$poster_img.'">
						</div>
						<div class="col s5" style="padding-left: 5%; margin-top: 0px;">
			              <span class="black-text">
					        <b style="font-size: 0.96em">'.$poster.'</b><br> 
					        <p class ="grey-text lighten-4" style="font-size: 0.8em;margin: 0px">
					        '.$jam.' - '. $hari.' <br> '.$lokasi.'</p>
					       </span>
			            </div>
					</div>
					';

					echo '
					<!-- Konten -->
					<div id="konten">
						<p>'.$isi.'</p>';
					//Cek jenis file
					if($file_type=="video/mp4"){
						//Video
						echo "
						<video class ='responsive-video center' controls>
					  		<source src='upload/".$file."' type='video/mp4'>
						</video>
						";
					} else{
						if(($file_type=="image/jpeg") OR ($file_type=="image/png") OR ($file_type=="image/jpg")){
							//image
							echo '<img style="width: 100%" src="upload/'.$file.'">';
						} else{
							if(($file_type=="audio/x-m4a") OR($file_type=="audio/mp3")){
								echo '
								<audio controls>
									<source src="upload/'.$file.'" type="audio/mpeg">
								</audio>';
							} else{
								echo "";
							}
						}
					}
					echo '</div>';
					echo '<!-- Navigasi berita-->
							<div class="center row nav-wrapper grey lighten-3" style="margin-bottom:0px; margin-top:3%; font-size: 0.8em; padding:3% 2% 3% 2%; border-radius: 3px; ">

								 <div id ="c'.$id_berita.'" class="col s5 grey-text lighten-1 nav-wrapper koment" style="margin-right: 6%">
								 	<i class="material-icons" style="display: inline-flex;vertical-align: middle;">info</i><div style="display: inline-flex;vertical-align: middle; margin: 2% 0 2% 5%;">Laporkan</div>
								 </div>

								 <div class="col s6 grey-text lighten-1 nav-wrapper koment" style="border-left: 1px solid rgba(0,0,0,0.2)">
								 	<i class="material-icons " style="display: inline-flex;vertical-align: middle;">comment</i><p style="display: inline-flex;vertical-align: middle; margin: 2% 0 3% 5%">Komentar</p>
								 </div>
							</div>';
					echo '</div>';
					}
				} else {
					echo "<br><br><div class ='divider'></div><p class='center'>--- Data tidak ditemukan ---</p>";
				}
      		}

		?>
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