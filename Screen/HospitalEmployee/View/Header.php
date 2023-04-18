<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>One Health - Medical Center</title>
  <link rel="stylesheet" href="../../view/Assets/css/maicons.css">
  <link rel="stylesheet" href="../../view/Assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../view/Assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../../view/Assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../../view/Assets/css/theme.css">
  <link rel="stylesheet" href="../../view/Assets/css/index.css">
</head>

<body>
  <div class="back-to-top"></div>
  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="tel:+"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="mailto:thanhloctruong11022@gmail.com"><span class="mai-mail text-primary"></span>nhom5@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <!-- <form action="index.php?act=search" method="post">
        <div class="input-group input-navbar">
          <div class="input-group-prepend">
            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
          </div>
          <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
        </div>
      </form> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Trang chủ</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="index.php?act=about">Về chúng tôi</a>
          </li> -->

            <li class="nav-item">
              <a class="nav-link" href="index.php?act=tracuu">Tìm kiếm bệnh nhân</a>
              <!--ManagePatientInformation-->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?act=capnhatttb">Cập nhật tình trạng bệnh</a>
              <!--Counseling-->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?act=quanly">Quản lý thông tin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?act=timkiem">Yêu cầu chuyển viện</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="index.php?act=new">Tin tức</a>
          </li> -->
            <li class="nav-item">
              <!-- <a class="btn btn-primary ml-lg-3" href="../../../Controller/index.php?act=logout">Logout</a> -->
              <a class="btn btn-primary ml-lg-3" href="index.php?act=logout">Logout</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>