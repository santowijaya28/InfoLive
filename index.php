<!--Created by : Santo Wijaya-->
<!DOCTYPE html>
<html>
<?php
	session_start();
	unset($_SESSION['user']);
?>
<head>
	<meta name="viewport" content="width=devic-width, initial-scale=1.0"/>
	<meta charset="utf-8"/>
	<title>InfoLive |LOGIN </title>
	<link rel="shortcut icon" href="lib/Logo.png">

	<!-- Import Materialize css -->
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css" media="screen,projection"/>

	<!-- Import Wow js-->
	<link rel="stylesheet" type="text/css" href="js/animate.css">
	<script src="js/wow.js"></script>
	
	<!-- Import Icon-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--CSS Goes here-->
	<style type="text/css">
	html {
    	font-family: "Trebuchet MS";
  	}

  	body{
  		margin: 0px;
  		padding: 0px;
  	}
  	#gambar{
  		margin-top: 18%;
  		width: 40%;
  	}

  	#baris{
  		margin: 10% 4% 8% 4%;
  		border-radius: 3px;
  		padding: 15% 9% 9% 9%;
  		background-color: rgba(255,255,255,1);
  	}

  	#username,#Password{
  		padding-left: 6%;
  		height:2.6em; 
  		border-radius: 3px;
  		width: 70%;
  		padding-right: 6%;
  	}

  	.pass{
  		margin-top: 0px;
  	}

  	</style>
</head>

<body class="teal darker-2">
	<!--import jquery and materialize-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<div class="container center">
		<a href="home.php">
		<img id ="gambar" src="lib/logoNav.png"></a>
		<div id="baris" class="row left-align">
			<form action="" method="post">
				<div class="input-field">
		          <i class="material-icons prefix blue-grey-text darken-4" style="margin-top: 2%;">account_circle</i>
		          <input placeholder="Username" name="username" id="username" type="text" class="validate">
		        </div>
		        <div class="input-field pass">
		          <i class="material-icons prefix blue-grey-text darken-4" style="margin-top: 2%">vpn_key</i>
		          <input placeholder="Password" name= "password" id="Password" type="password" class="validate">
		        </div>
		        <button class="left btn waves-effect right waves-light" type="submit" name="submit">Sign In</button>
			</form>
		</div>		
	</div>

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
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])){
			$pengguna = $_POST["username"];
			$passs = $_POST["password"];
			$sql = "SELECT * FROM pengguna WHERE username LIKE '".$pengguna."'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result)==1){
				$row = $result->fetch_assoc();
				//Cek apakah password sesuai dengan yang ada di database
				if (password_verify($passs, $row['password'])){
					header("Refresh:0.01; url=home.php");
					$_SESSION['user'] = $pengguna;
					echo "
					<script type='text/javascript'>
					alert('Selamat Datang ".$row['nama']."');
					</script>";
				} else{
					echo "
					<script type='text/javascript'>
					alert('Password/E-mail salah, Silahkan ulangi');
					</script>";					
				};
			}
		}
		
		mysqli_close($conn);
	?>
</body>
</html>