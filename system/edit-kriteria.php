<?php
	include('database.php');
	if(isset($_POST['submit'])){
		$id_kriteria = $_POST['id_kriteria'];
		$kode_kriteria = $_POST['kode_kriteria_edit'];
		$nama_kriteria = $_POST['nama_kriteria_edit'];
		$atribut = $_POST['atribut_edit'];
		$bobot = $_POST['bobot_edit'];
		//query update

		$query = mysqli_query($connection, "UPDATE kriteria SET kode_kriteria ='$kode_kriteria', nama_kriteria ='$nama_kriteria', atribut ='$atribut', bobot ='$bobot' WHERE id_kriteria ='$id_kriteria'");
		if ($query) {
		    header("location:../kriteria.php");
		}
		else{
		    echo "ERROR, data failed to update". mysql_error();
		}
	}
 ?>
