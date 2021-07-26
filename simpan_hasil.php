<?php
    include 'system/database.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['lang'])) {

            $query_hapus = "TRUNCATE PENGUMUMAN";
            $hasil_hapus = mysqli_query($connection, $query_hapus);

            foreach($_POST['lang'] as $value){

                $query = "insert into pengumuman(id_admin, id_hasil) values('1','$value')";
                $hasil = mysqli_query($connection, $query);
                    
                if($hasil){
      
                  echo '<script type="text/javascript">
                            alert("Add Data Successed!");
                        </script>';
                }else{
                    echo '<script type="text/javascript">
                            alert("Failed Add Data!");
                         </script>';
                }       
            }

            header("location:pengumuman.php");

        }

      }



?>