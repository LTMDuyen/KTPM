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


<!-- --------------------------------------------------------Body---------------------------------------------------------------------- -->

<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Phân Quyền</li>
            
          </ol>
        </nav>
        <h1 class="font-weight-normal">Phân Quyền</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

<div class="container1">
  <center>


    <form action="" method="POST" style="padding: 50px 0px ;" >
        <table>
            <tr>
                <td>Mã Tài Khoản:</td>
                <td><input type="text" class="form-control" name="id" style="width:300px" value="<?php echo $id?>" readonly></td>
            </tr>
            <tr>
                <td>Tên:</td>
                <td><input type="text" class="form-control" name="name" style="width:300px" value="<?php echo $name?>" readonly></td>
            </tr>
            
            <tr>
                <td>Role:</td>
                <td><input type="text" class="form-control" name="role" style="width:300px" value="<?php echo $role?>"></td>
            </tr>

          
        </table>
        <input type="submit" value="Cập nhật"  name="btngrant" class="btn btn-primary" style="margin:20px 0px ;">
    </form>
    
        
    </center>
</div>

<!-- ---------------------------------------------------Footer---------------------------------------------------------- -->
<?php
include '../HospitalAdmin/View/Footer.php'
?>

<script src="../view/Assets/js/jquery-3.5.1.min.js"></script>

<script src="../view/Assets/js/bootstrap.bundle.min.js"></script>

<script src="../view/Assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../view/Assets/vendor/wow/wow.min.js"></script>

<script src="../view/Assets/js/theme.js"></script>
  
</body>
</html>