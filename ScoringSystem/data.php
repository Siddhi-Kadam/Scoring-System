<?php 
  session_start();
  error_reporting(0);
  include('includes/connect.php');
  $ids = $_SESSION['ids'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="logout.php">
          <i class="fas fa-th-large"> LOGOUT</i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="color: darkblue;">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Scoring System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Hey <?php echo $ids; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
          <li class="nav-header">TRIALS</li>
          <li class="nav-item">
            <a href="data.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Scoring Tables
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="advanced.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Add Entry
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Scores</h3>
            </div>
            <div class="card-header">
                <button type="button" style="height:50px;width:200px" class="btn btn-block bg-gradient-danger">
                  <a href="advanced.php" style="color: white;">Add Entry</a>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Roll No</th>
                  <th>PCPF</th>
                  <th>DBMS</th>
                  <th>EM III</th>
                  <th>DSA</th>
                  <th>PCOM</th>
                  <th>Percentage</th>
                  <th>Status</th>
                  <th>Update</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql="select * from scores";
                    $result = mysqli_query($con,$sql);
                    foreach($result as $j)
                    {
                  ?>
                      <form action="updateFile.php" method="post">
                        <tr>
                          <input type="hidden" name="id" value="<?php echo $j['id'];?>">
                          <td><?php echo $j['id'];?></td>
                          <td><?php echo $j['rollNo'] ?></td>
                          <td><?php echo $j['sub1'] ?></td>
                          <td><?php echo $j['sub2'] ?></td>
                          <td><?php echo $j['sub3'] ?></td>
                          <td><?php echo $j['sub4'] ?></td>
                          <td><?php echo $j['sub5'] ?></td>
                          <td><?php echo $j['percent'] ?>%</td>
                          <td>
                            <?php
                              if($j['percent']>=90){
                                echo "EXCELLENT";
                              }
                              elseif ($j['percent']>=70) {
                                 echo "GOOD";
                              }
                              elseif ($j['percent']>=35) {
                                 echo "PASSED";
                              }
                              else{
                                echo "FAILED";
                              } 
                            ?>    
                          </td>
                          <td><button name="submit" type="submit"><i class="fa fa-edit"></i></button></td>
                        </tr>
                      </form>  
                  <?php  
                    }
                  ?>
                          
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
