<?php
	include 'database.php';
	if(isset($_POST['submit'])){
		$id_siswa = $_POST['id_siswa'];
		$kode_alternatif = $_POST['kode_alternatif'];
		$nilai = $_POST['nilai'];
		$juara = $_POST['juara'];
		$sikap = $_POST['sikap'];
		$organisasi = $_POST['organisasi'];

		$tambah = mysqli_query($connection,"INSERT INTO alternatif(id_siswa, kode_alternatif, nilai, juara, sikap, organisasi) VALUES($id_siswa, '$kode_alternatif', '$nilai', '$juara', '$sikap', '$organisasi')");
		if ($tambah) {
			header("location:../alternatif.php");
		}else{
			echo "failed input data";
		}
	}
 ?>
