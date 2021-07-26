<?php
  include 'system/database.php';

  $id_alternatif =  $_GET['id_alternatif'];

  $query = mysqli_query($connection, "DELETE FROM alternatif where id_alternatif = '$id_alternatif' ");

  if($query){
        echo '<script type="text/javascript">
                alert("Delete Data Finished");
            </script>';
    }else{
        echo '<script type="text/javascript">
                alert("Delete Data Failed!");
            </script>';
  }          

  header("location:alternatif.php");

?>