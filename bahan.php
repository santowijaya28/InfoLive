	if($file['error']==0){
					if(isset($_FILES['$file'])){
						move_uploaded_file($tmp_name, "$path/$nama_file");
						$sql = "INSERT INTO laporan(isi_laporan,username,namafile,tipe) VALUES ('$kalimat','$pengguna','$nama_file','$type')";
					} else{
						$sql = "INSERT INTO laporan(isi_laporan,username) VALUES ('$kalimat','$pengguna')";
					}
					mysqli_query($conn,$sql);
					echo "<script type='text/javascript'>
						alert('Posting berhasil');
						</script>";
				}
			}