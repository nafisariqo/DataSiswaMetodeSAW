<?php
	include('database.php');
	if(isset($_POST['submit'])){
		$id_alternatif = $_POST['id_alternatif'];
		$kode_alternatif = $_POST['kode_alternatif_edit'];
		$nilai = $_POST['nilai_edit'];
		$juara = $_POST['juara_edit'];
		$sikap = $_POST['sikap_edit'];
		$organisasi = $_POST['organisasi_edit'];
		//query update

		$query = mysqli_query($connection, "UPDATE alternatif SET kode_alternatif ='$kode_alternatif', nilai ='$nilai', juara ='$juara', sikap ='$sikap', organisasi ='$organisasi' WHERE id_alternatif ='$id_alternatif'");
		if ($query) {
		    header("location:../alternatif.php");
		}
		else{
		    echo "ERROR, data failed to update". mysql_error();
		}
	}
 ?>
