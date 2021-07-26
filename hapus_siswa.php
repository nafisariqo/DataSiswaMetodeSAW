<?php
  include 'system/database.php';

  $id_siswa =  $_GET['id_siswa'];

  $query = mysqli_query($connection, "DELETE FROM siswa where id_siswa = '$id_siswa' ");

  if($query){
        echo '<script type="text/javascript">
                alert("Delete Data Finished");
            </script>';
    }else{
        echo '<script type="text/javascript">
                alert("Delete Data Failed!");
            </script>';
  }          

  header("location:siswa.php");

?>