<?php 
include("koneksi.php");
session_start();
if(isset($_POST['login']))
  {

     $username = strip_tags($_POST['username']);
     $password = strip_tags($_POST['password']);
     
     //$username = $connect->real_escape_string($username);
     //$password = $connect->real_escape_string($password);
     
     $query = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";
     //$query2 = $connect->query("SELECT username FROM tbl_user WHERE username='$username' and password='$password'");
     //$row=$query->fetch_array();
     //$row2 = mysqli_fetch_assoc($query2);
     
     $res = mysqli_query($kon, $query);
     $data = mysqli_fetch_array($res);
     
	   $count = mysqli_num_rows($res);

      if ($count>=1) 
      {
       
        $_SESSION['username']=$data['username'];
        $_SESSION['level']=$data['level'];

       header('location: index.php');
       } else {
        
        echo '<script> alert("Username dan Password Salah");</script>';
       }
       $kon->close();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="img/png" href="temp/dist/img/UNBIN.png">
  <title>LOGIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="temp/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="temp/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="temp/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="temp/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="temp/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img src="temp2/assets/images/logo_pkh.png"  width="100%;">
    <!-- <a href="temp/index2.html"><b>Universitas Binaniaga Indonesia</b></a> -->
  </div>
    <h4>
    <h3 class="login-box-msg">Sistem Informasi Penentuan Penerima PKH</h3>
  </h4>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <p class="login-box-msg">Silahkan Masukan Username dan Password Untuk Login</p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name = "login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="temp/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="temp/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="temp/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('.table').DataTable();
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>