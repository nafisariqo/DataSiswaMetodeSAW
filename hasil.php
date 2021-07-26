<?php
  include 'system/database.php';
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Solimi</title>
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/jquery.dataTables.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-school" style="color:#ffffff"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MTS Negeri 21 Jakarta Timur</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard Solimi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="siswa.php">
          <i class="fas fa-users"></i>
          <span>Data Siswa</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="alternatif.php">
          <i class="fas fa-database"></i>
          <span>Data Alternatif</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-poll"></i>
          <span>Data Ternormalisasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pengumuman.php">
          <i class="fas fa-bell"></i>
          <span>Data Pengumuman</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                <img class="img-profile rounded-circle" src="img/profile-admin.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hasil Perhitungan</h1>
          </div>

          <?php

            $max_nilai;
            $max_juara;
            $max_sikap;
            $max_organisasi;

            $queryMax = mysqli_query($connection, "SELECT MAX(nilai) as max_nilai, MAX(juara) as max_juara, MAX(sikap) as max_sikap, MAX(organisasi) as max_organisasi FROM alternatif");
            while ($ssiswa = mysqli_fetch_array($queryMax)) {
                $max_nilai = $ssiswa['max_nilai'];
                $max_juara = $ssiswa['max_juara'];
                $max_sikap = $ssiswa['max_sikap'];
                $max_organisasi = $ssiswa['max_organisasi'];

            }

            $arrayIdSiswa;
            $arrayNilai;
            $arrayJuara;
            $arraySikap;
            $arrayOrganisasi;

            $bobotNilai = 0.3;
            $bobotJuara = 0.27;
            $bobotSikap = 0.23;
            $bobotOrganisasi = 0.2;

            $query = mysqli_query($connection, "SELECT * FROM alternatif");
            while ($ssiswa = mysqli_fetch_array($query)) {

                 $arrayIdSiswa[] = $ssiswa['id_siswa'];
                 $arrayNilai[] = $ssiswa['nilai']/$max_nilai;
                 $arrayJuara[] = $ssiswa['juara']/$max_juara;
                 $arraySikap[] = $ssiswa['sikap']/$max_sikap;
                 $arrayOrganisasi[] = $ssiswa['organisasi']/$max_organisasi;


            }

            ?>

          <div class="row">
            <h3>Tabel Hasil Normalisasi</h3>
            <div class="col-md-12">
              <table class="table table-bordered table-striped myTable">
                <thead>
                  <tr>
                      <th>Id Siswa</th>
                      <th>Nilai</th>
                      <th>Juara</th>
                      <th>Sikap</th>
                      <th>Organisasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      for($i = 0; $i < count($arrayNilai); $i++){
                  ?>

                  <tr>
                    <td><?php echo round($arrayIdSiswa[$i],4); ?></td>
                    <td><?php echo round($arrayNilai[$i],4); ?></td>
                    <td><?php echo round($arrayJuara[$i],4); ?></td>
                    <td><?php echo round($arraySikap[$i],4); ?></td>
                    <td><?php echo round($arrayOrganisasi[$i],4); ?></td>
                  </tr>

                  <?php
                      }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
          <br><br>

          <?php

            $hasilNilai;
            $hasilJuara;
            $hasilSikap;
            $hasilOrganisasi;

            for($i = 0; $i < count($arrayNilai); $i++){
                $hasilNilai[] = $arrayNilai[$i] * $bobotNilai;
                $hasilJuara[] = $arrayJuara[$i] * $bobotJuara;
                $hasilSikap[] = $arraySikap[$i] * $bobotSikap;
                $hasilOrganisasi[] = $arrayOrganisasi[$i] * $bobotOrganisasi;
            }
            ?>

            <div class="row">
              <h3>Tabel Hasil Normalisasi x Bobot</h3>
              <div class="col-md-12">
                <table class="table table-bordered table-striped myTable table-success">
                  <thead>
                      <tr>
                          <th>Id Siswa</th>
                          <th>Nilai</th>
                          <th>Juara</th>
                          <th>Sikap</th>
                          <th>Organisasi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          for($i = 0; $i < count($hasilNilai); $i++){
                      ?>

                      <tr>
                      <td><?php echo round($arrayIdSiswa[$i],4); ?></td>
                      <td><?php echo round($hasilNilai[$i],4); ?></td>
                      <td><?php echo round($hasilJuara[$i],4); ?></td>
                      <td><?php echo round($hasilSikap[$i],4); ?></td>
                      <td><?php echo round($hasilOrganisasi[$i],4); ?></td>
                      </tr>

                      <?php
                          }
                      ?>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ranking</h1>
          </div>
            <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-striped myTable">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Juara</th>
                            <th>Sikap</th>
                            <th>Organisasi</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                        <?php
                        $maxValue = "SELECT MAX(nilai) AS nilai,
                        MAX(juara) as juara,
                        MAX(sikap) as sikap,
                        MAX(organisasi) as organisasi FROM alternatif";
                      $executeMaxQuery = mysqli_query($connection, $maxValue);
                      $resultMaxQuery = mysqli_fetch_object($executeMaxQuery);
                      $max_nilai = $resultMaxQuery->nilai;
                      $max_juara = $resultMaxQuery->juara;
                      $max_sikap = $resultMaxQuery->sikap;
                      $max_organisasi = $resultMaxQuery->organisasi;

                      $no = 0;
                      $rankingQuery = SELECT a.*, s.nisn, s.nama_siswa , SUM(CASE
                        WHEN a.nilai = 1 THEN (1/".$max_nilai.")*0.3
                        WHEN a.nilai = 2 THEN (2/".$max_nilai.")*0.3
                        WHEN a.nilai = 3 THEN (3/".$max_nilai.")*0.3
                          ELSE (4/".$max_nilai.")*0.3
                      END) AS nilai_normalisasi,
                      SUM(CASE
                        WHEN a.juara = 1 THEN (1/".$max_juara.")*0.27
                        WHEN a.juara = 2 THEN (2/".$max_juara.")*0.27
                        WHEN a.juara = 3 THEN (3/".$max_juara.")*0.27
                          ELSE (4/".$max_juara.")*0.27
                      END) AS juara_normalisasi,
                      SUM(CASE
                        WHEN a.sikap = 1 THEN (1/".$max_sikap.")*0.23
                          ELSE (2/".$max_sikap.")*0.23
                      END) AS sikap_normalisasi,
                      SUM(CASE
                        WHEN a.organisasi = 1 THEN (1/".$max_organisasi.")*0.2
                          ELSE (2/".$max_organisasi.")*0.2
                      END) AS organisasi_normalisasi,

                        (SUM(CASE
                          WHEN a.nilai = 1 THEN (1/".$max_nilai.")*0.3
                          WHEN a.nilai = 2 THEN (2/".$max_nilai.")*0.3
                          WHEN a.nilai = 3 THEN (3/".$max_nilai.")*0.3
                            ELSE (4/".$max_nilai.")*0.3
                        END)+
                        SUM(CASE
                          WHEN a.juara = 1 THEN (1/".$max_juara.")*0.27
                          WHEN a.juara = 2 THEN (2/".$max_juara.")*0.27
                          WHEN a.juara = 3 THEN (3/".$max_juara.")*0.27
                            ELSE (4/".$max_juara.")*0.27
                        END)+
                        SUM(CASE
                          WHEN a.sikap = 1 THEN (1/".$max_sikap.")*0.23
                            ELSE (2/".$max_sikap.")*0.23
                        END)+
                        SUM(CASE
                          WHEN a.organisasi = 1 THEN (1/".$max_organisasi.")*0.2
                            ELSE (2/".$max_organisasi.")*0.2
                        END)) AS NilaiAkhir,
                        RANK() OVER(ORDER BY NilaiAkhir DESC) AS Ranking
                        FROM alternatif a JOIN siswa s WHERE a.id_siswa = s.id_siswa
                        GROUP BY a.id_alternatif
                        ORDER BY Ranking
                        LIMIT 10


                      $executeRankingQuery = mysqli_query($connection, $rankingQuery);
                      while ($data = mysqli_fetch_array($executeRankingQuery) ) {
                      $no++;
                    ?>
                    <tr>
                      <td style="font-weight: bold;">#<?php echo $data["Ranking"]; ?></td>
                      <td><?php echo $data["nisn"]; ?></td>
                      <td><?php echo $data["nama_siswa"]; ?></td>
                      <td><?php echo ($data["nilai_normalisasi"] == null ? $data["nilai_normalisasi"] : $data["nilai_normalisasi"]); ?></td>
                      <td><?php echo ($data["juara_normalisasi"] == null ? $data["juara_normalisasi"] : $data["juara_normalisasi"]); ?></td>
                      <td><?php echo ($data["sikap_normalisasi"] == null ? $data["sikap_normalisasi"] : $data["sikap_normalisasi"]); ?></td>
                      <td><?php echo ($data["organisasi_normalisasi"] == null ? $data["organisasi_normalisasi"] : $data["organisasi_normalisasi"]); ?></td>
                      <td><?php echo ($data["NilaiAkhir"] == null ? $data["NilaiAkhir"] : $data["NilaiAkhir"]); ?></td>

                    </tr>
                    <?php } ?>
                  </tr>
                  </tbody>

                </table>
                </div>


                </form>
            </div>

          <!-- Content Row -->


          <!-- Content Row -->

          <!-- MODAL EDIT DATA -->
          <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="" method="POST">
                    <div class="form-group">
                      <input type="number" name="nisn" class="form-control" placeholder="NISN" value="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control" placeholder="Nama" value="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="status" class="form-control" placeholder="Status Siswa" value="">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- TUTUP MODAL EDIT DATA -->


          <!-- MODAL TAMBAH DATA -->
          <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="tambah_siswa.php" method="POST">
                    <div class="form-group">
                      <input type="number" name="nisn" class="form-control" placeholder="NISN" value="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control" placeholder="Nama" value="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="status" class="form-control" placeholder="Status Siswa" value="">
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" values="Save changes">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- TUTUP MODAL TAMBAH DATA -->



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MTS N 21 Jakarta Timur</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="system/auth_logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <!-- <script src="js/dataTables.bootstrap4.min.js"></script> -->

  <script>
    $(document).ready(function() {
        $('.myTable').DataTable();
    } );
  </script>
</body>

</html>
