<?php
    include 'system/database.php';

    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $atribut = $_POST['atribut'];
    $bobot = $_POST['bobot'];

    $query = "insert into kriteria(kode_kriteria, nama_kriteria, atribut, bobot) values('$kode_kriteria','$nama_kriteria','$atribut','$bobot')";
    $hasil = mysqli_query($connection, $query);

    if($hasil){
        echo '<script type="text/javascript">
                alert("Add Data Successed");
             </script>';
    }else{
        echo '<script type="text/javascript">
                alert("Add Data Failed!");
             </script>';
    }

    header("location:kriteria.php");


?>