<?php
  include 'system/database.php';

  $id_kriteria =  $_GET['id_kriteria'];

  $query = mysqli_query($connection, "DELETE FROM kriteria where id_kriteria = '$id_kriteria' ");

  if($query){
        echo '<script type="text/javascript">
                alert("Delete Data Finished");
            </script>';
    }else{
        echo '<script type="text/javascript">
                alert("Delete Data Failed!");
            </script>';
  }          

  header("location:kriteria.php");

?>