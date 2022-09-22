<?php

  include '../../config.php';
  session_start();
  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
    header('location:http://localhost/anipixel_admin/login.php');
    exit();
  };

  if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:http://localhost/anipixel_admin/login.php');
    exit();
  };

  //Pegando usuario
  $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
  if(mysqli_num_rows($select_user) > 0){
     $fetch_user = mysqli_fetch_assoc($select_user);
  };

  //Pegando todos os usuarios
  $result = mysqli_query($conn, "SELECT * FROM `user_info` ORDER BY id") or die('query failed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Contacts</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini dark-mode">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <?php
  include 'navbar.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include 'sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Membros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Membros</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de membros cadastrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Avatar</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Status</th>
                      <th>Position</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($user_data = $result->fetch_array()) { ?> 
                      <tr> 
                        <td><?php echo $user_data['id']; ?></td>
                        <td class="user-panel"><img src="../dist/img/<?php echo $user_data['avatar']?>" class="img-circle elevation-2" alt="Member Image"></td>
                        <td><?php echo $user_data['name']; ?></td> 
                        <td><?php echo $user_data['email']; ?></td> 
                        <td><?php echo $user_data['status']; ?></td> 
                        <td>
                          <?php
                            if($user_data['position']==1){
                              echo "Usuario"; 
                            }
                            else{
                              echo "Admin";
                            }
                          ?>
                        </td>
                        <td>
                          <?php 
                          echo "<a class='' href='profile-edit.php?user_id=$user_data[id]'><i class='fa-solid fa-pencil'></i></a>
                                <a class='' href='#'><i class='fa-solid fa-trash-can'></i></a>"; 
                          ?>
                        </td>
                      </tr> 
                    <?php } ?> 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Avatar</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Status</th>
                      <th>Position</th>
                      <th>Ações</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2022 <a href="#">Anipixel</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.3
    </div>
  </footer>
  <!-- ./Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Icons -->
<script src="https://kit.fontawesome.com/ce281c5da6.js" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
