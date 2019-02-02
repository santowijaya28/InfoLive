<!DOCTYPE html>
<html>
<?php
	session_start();
	if(empty($_SESSION['user'])){
		header('Location:index.php');
	}
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
	</style>
</head>

<body>
	<!--import jquery and materialize-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<div class="nav-fixed">
	<nav class="teal darken-1">
		<div id="back" class="white-text">
			<i class="material-icons white-text">highlight_off</i><p>
		</div>

		<div id="navbar" class="container nav-wrapper">
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

	<div id="status">
		<div class="row">
	    <form class="col s12" action="" method="post" enctype="multipart/form-data">
	      <div class="row">
	      	<!-- Ini untuk input lokasi -->
	      	<div class="input-field col s12 validate">
	      	
	      	  <input class ="autocomplete" style="padding-left: 5% ; padding-right: 5%; width: 90%" type="text" name="lokasi" id="lokasi" placeholder="Masukkan lokasi Anda">
	        </div>

	      	<!-- Ini untuk input kalimat -->
	        <div class="input-field col s12 validate">
	          <textarea id="textarea1" name="textarea1" class="materialize-textarea grey lighten-4"  placeholder="Masukkan Informasi Anda"></textarea>
	        </div>
	        
	        <!---bagian upload-->
	      	<div class="upload">
      			<label for="upload1" style="cursor: pointer;">
      				<i  style="font-size: 2.5em;" class="material-icons grey-text darken-1">mic</i>
      			</label>
      			
      			<label for="upload2" style="cursor: pointer;">
      				<i  style="font-size: 2.5em;" class="material-icons grey-text darken-1">videocam</i>
      			</label>

      			<label for="upload3" style="cursor: pointer;">
      				<i  style="font-size: 2.5em;" class="material-icons grey-text darken-1">image</i>
      			</label>
      			<input type="file" name="upload1" id="upload1">
      			<input type="file" name="upload2" id="upload2">
      			<input type="file" name="upload3" id="upload3">
	      	</div>	      	
	      </div>
	      <button class="btn waves-effect right waves-light" type="submit" name="post">Post</button>
	      </form>
	      <?php
	      	//Server Connection
			$server = "localhost";
			$username = "root";
			$pass = "";
			$database = "info_live";
			$pengguna = $_SESSION['user'];
			
			$conn = mysqli_connect($server,$username,$pass,$database);
			if(!$conn){
				echo "<script type='text/javascript'>
				alert('Cannot Connect to DB. Please Try Again Later');
				</script>";
			}
			error_reporting(1);
			if(isset($_POST['post'])){
				$lokasi = $_POST['lokasi'];
				$kalimat = $_POST['textarea1'];
				date_default_timezone_set('Asia/Jakarta');
				$date = date('Y/m/d H:i:s');
				
				//Handling 3 file
				if(($_FILES['upload1']['error']==0) AND ($_FILES['upload2']['error']!=0) AND ($_FILES['upload3']['error']!=0)){
					$file = $_FILES['upload1'];
				} else{
					if(($_FILES['upload1']['error']!=0) AND ($_FILES['upload2']['error']==0) AND ($_FILES['upload3']['error']!=0)){
						$file = $_FILES['upload2'];
					} else{
						if(($_FILES['upload1']['error']!=0) AND ($_FILES['upload2']['error']!=0) AND ($_FILES['upload3']['error']==0)){
							$file = $_FILES['upload3'];
						} else {
							if(!($_FILES['upload1']['error']!=0) AND ($_FILES['upload2']['error']!=0) AND ($_FILES['upload3']['error']!=0)){
								echo "
									<script type='text/javascript'>
										alert('Tidak dapat menambahkan file lebih dari satu');
									</script>";
							}
						}
					}
				}

				//jika pakai file
				if($file['error']==0){
					$type = $file['type'];
					$path = "upload";
					$nama_file = $file['name'];
					$tmp_name = $file['tmp_name'];

					if(move_uploaded_file($tmp_name, "$path/$nama_file")){
						$sql = "INSERT INTO laporan(isi_laporan,username,namafile,tipe,tanggal,lokasi) VALUES ('$kalimat','$pengguna','$nama_file','$type','$date','$lokasi')";
						mysqli_query($conn,$sql);
						echo "<script type='text/javascript'>
						alert('Posting berhasil');
						</script>";
					} else{
						echo "<script type='text/javascript'>
						alert('Posting gagal. Silahkan masukkan input yang dibutuhkan');
						</script>";
					}
				} else{
					//Jika tanpa file
					$sql = "INSERT INTO laporan(isi_laporan,username,tanggal,lokasi) VALUES ('$kalimat','$pengguna','$date','$lokasi')";
						mysqli_query($conn,$sql);
						echo "<script type='text/javascript'>
						alert('Posting berhasil');
						</script>";
				}
			}
	      ?>
	  </div>
	</div>

	</div>
	<div id="halaman" class="container">
		<br>
		<h5><b>Home</b></h5>
		 	<?php
		 	//Server Connection
			$server = "localhost";
			$username = "root";
			$pass = "";
			$database = "info_live";
			$pengguna = $_SESSION['user'];

			$conn = mysqli_connect($server,$username,$pass,$database);
			if(!$conn){
				echo "<script type='text/javascript'>
				alert('Cannot Connect to DB. Please Try Again Later');
				</script>";
			}
			error_reporting(1);
			
			$sql = "SELECT * FROM laporan NATURAL JOIN pengguna ORDER BY tanggal DESC";
			$results = mysqli_query($conn, $sql);
			if(mysqli_num_rows($results)>0){
				$jumlah = mysqli_num_rows($results);
				foreach ($results as $result) {
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
			}
		 	?>

			
		 </div>

		 <div class="fixed-action-btn">
		 	<a class="btn-floating btn-large waves-effect waves-light red darken-3"><i class="material-icons">mode_edit</i></a>
		 </div>
		 <div id="apa"></div>
	</div>
	<script type="text/javascript">
			$(".button-collapse").sideNav({
				menuWidth:200,
				closeOnClick:true,
				draggable:true
			});
			$('#back').hide();
			$('#status').hide();
			$('.fixed-action-btn').click(function(){
				$('.fixed-action-btn').hide();
				$('#halaman').hide();
				$('#navbar').hide();
				$('#status').show(400);
				$('#back').show();
			});

			$('#back').click(function(){
				$('.fixed-action-btn').show();
				$('#halaman').show();
				$('#navbar').show();
				$('#status').hide(400);
				$('#back').hide();
			});

			$(function() {
			$('input.autocomplete').autocomplete({
			    data: {
			      "Kebon Jeruk, Kec. Andir": null,
			      "Ciroyom, Kec. Andir": null,
			      "Dungus Cariang, Kec. Andir": null,
			      "Campaka, Kec. Andir": null,
			      "Garuda, Kec. Andir": null,
			      "Maleber, Kec. Andir": null,
			      "Antapani Kidul, Kec. Antapani": null,
			      "Antapani Kulon, Kec. Antapani": null,
			      "Antapani Tengah, Kec. Antapani": null,
			      "Antapani Wetan, Kec. Antapani": null,
			      "Cisanten Endah, Kec. Arcamanik": null,
			      "Sindang Jaya, Kec. Arcamanik": null,
			      "Sukamiskin, Kec. Arcamanik": null,
			      "Lebak Siliwangi, Kec. Coblong": null,
			      "Lebak Gede, Kec. Coblong": null,
			      "Dago, Kec. Coblong": null,
			      "Sadang Serang, Kec. Coblong": null,
			      "Sekeloa, Kec. Coblong": null,
			      "Cisitu, Kec. Coblong": null,
			      "Tubagus Ismail": null,
			      "Jl. Ganeca": null,
			    }
			  });
			});

	</script>
</body>
</html>