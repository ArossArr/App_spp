<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPP AROSS LOGIN</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer ROw -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">
                      Welcome Back
                    </h1>
                    <form action="plogin" class="user" method="post">
                      <div class="form-group">
                        <input type="text" name="username" id="username" aria-describedby="emailHelp"
                          placeholder="Enter Username" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password"
                          class="form-control">
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label for="customCheck" class="custom-control-label">Remember Me</label>
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary btn-user btn-block" value="login">
                    </form>
                    <hr>
                    <div class="text-center">
                      <a href="forgot-password.html" class="small">Forget Password?</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php if (!empty(session()->getFlashdata('error'))): ?>

<div class="alert alert-success">
  <?php echo session()->getFlashdata('error'); ?>
</div>

<?php
endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url()?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url()?>/js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url()?>/js/demo/chart-pie-demo.js"></script>
</body>

</html>