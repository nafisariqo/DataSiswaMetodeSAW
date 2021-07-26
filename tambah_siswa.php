<?php
    include 'system/database.php';

    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $status = $_POST['status'];
    $nilai_siswa = $_POST['nilai_siswa'];
    $juara = $_POST['juara'];
    $sikap = $_POST['sikap'];
    $organisasi = $_POST['organisasi'];

    $query = "insert into siswa(nisn, nama_siswa, status, nilai_siswa, juara, sikap, organisasi) values('$nisn','$nama_siswa','$status','$nilai_siswa','$juara','$sikap','$organisasi')";
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

    header("location:siswa.php");


?>