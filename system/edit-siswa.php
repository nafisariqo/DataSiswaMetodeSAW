<?php 
	include('database.php');
	if(isset($_POST['submit'])){
		$id_siswa = $_POST['id_siswa'];
		$nisn = $_POST['nisn_edit'];
		$nama_siswa = $_POST['nama_siswa_edit'];
		$status = $_POST['status_edit'];
		$nilai_siswa = $_POST['nilai_siswa_edit'];
		$juara = $_POST['juara_edit'];
		$sikap = $_POST['sikap_edit'];
		$organisasi = $_POST['organisasi_edit'];
		//query update
		$query = mysqli_query($connection, "UPDATE siswa SET nisn='$nisn' , nama_siswa ='$nama_siswa', status ='$status', nilai_siswa ='$nilai_siswa' , juara ='$juara', sikap ='$sikap', organisasi ='$organisasi' WHERE id_siswa ='$id_siswa'");
		if ($query) {
		    header("location:../siswa.php");    
		}
		else{
		    echo "ERROR, data failed to update". mysql_error();
		}
	}
 ?>