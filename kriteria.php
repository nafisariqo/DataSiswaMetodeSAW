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
  <!-- <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"> -->

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

      <li class="nav-item active">
        <a class="nav-link" href="alternatif.php">
          <i class="fas fa-database"></i>
          <span>Data Alternatif</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-poll"></i>
          <span>Data Ternomalisasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="kriteria.php">
          <i class="fas fa-bell"></i>
          <span>Data Kriteria</span></a>
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
            <h1 class="h3 mb-0 text-gray-800">Data Kriteria</h1>
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> Add Data</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-md-12">
              <table id="myTable" class="table table-bordered table-striped table">
                <thead>
                  <tr>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Atribut</th>
                    <th>Bobot</th>
                    <th class="text-center">Manipulate</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($connection, "SELECT id_kriteria, kode_kriteria, nama_kriteria, atribut, bobot FROM kriteria");
                    while ($criteria = mysqli_fetch_array($query)) {
                   ?>
                  <tr >
                    <td><?php echo $criteria['kode_kriteria'] ?></td>
                    <td><?php echo $criteria['nama_kriteria'] ?></td>
                    <td><?php echo $criteria['atribut'] ?></td>
                    <td><?php echo $criteria['bobot'] ?></td>
                    <td class="text-center font color=black"><a href="kriteria.php?id_kriteria=<?php echo  $criteria['kode_kriteria'] ?>" data-toggle="modal" data-target="#modal-edit<?php echo $criteria['id_kriteria'] ?>"><i class='fas fa-edit'></i></a> | <a href="hapus_kriteria.php?id_kriteria=<?php echo $criteria['id_kriteria'] ?>"><i class='fas fa-trash-alt'></i></a></td>
                  </tr>
                  <?php
                    }
                   ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Content Row -->

         <!-- MODAL TAMBAH DATA -->
          <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Kriteria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="tambah-kriteria.php" method="POST">
                    <div class="form-group">
                      <input name="kode_kriteria" class="form-control" placeholder="Kode Kriteria" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="atribut" class="form-control" placeholder="Atribut" value="" required>
                    </div>
                    <div class="form-group">
                      <input name="bobot" class="form-control" placeholder="Bobot" value="" required>
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


         <!-- MODAL EDIT DATA -->
          <?php 
            $sql = mysqli_query($connection, "SELECT * FROM kriteria");
            while ($criteria_edit = mysqli_fetch_array($sql)) {
           ?>
          <div class="modal fade" id="modal-edit<?php echo $criteria_edit['id_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="system/edit-kriteria.php" method="POST">
                    <div class="form-group">
                      <input type="hidden" name="id_kriteria" class="form-control" placeholder="Kode Kriteria" value="<?php echo $criteria_edit['id_kriteria'] ?>">
                    </div>
                    <div class="form-group">
                      <input name="kode_kriteria_edit" class="form-control" placeholder="Kode Kriteria" value="<?php echo $criteria_edit['kode_kriteria'] ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama_kriteria_edit" class="form-control" placeholder="Nama Kriteria" value="<?php echo $criteria_edit['nama_kriteria'] ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" name="atribut_edit" class="form-control" placeholder="Atribut" value="<?php echo $criteria_edit['atribut'] ?>">
                    </div>
                    <div class="form-group">
                      <input name="bobot_edit" class="form-control" placeholder="Bobot" value="<?php echo $criteria_edit['bobot'] ?>">
                    </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      <input type="submit" name="submit" class="btn btn-primary" values="Save changes">
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <?php 
            }
           ?>

          <!-- TUTUP MODAL EDIT DATA -->


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
  <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script> -->

  <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );
  </script>
</body>

</html>
