<div class="page-banner overlay-dark bg-image" style="background-image: url(../../view/Assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cập nhật tình trạng bệnh nhân</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">Cập nhật tình trạng bệnh nhân</h1>
    </div> <!-- .container -->
  </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<!-- action="CheckHealth.php?act=kiemtra" -->
<form class="contact-form mt-5" method="POST">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Nhập mã hồ sơ bệnh nhân</h1>
    <div class="row mb-3">
      <div class="col-sm-3 input-group mb-3 wow fadeInLeft">
      </div>
      <div class="col-sm-6 input-group mb-3 wow fadeInLeft">
        <input type="text" class="form-control" name="txtTimKiem" placeholder="Nhập mã hồ sơ bệnh nhân..." <?php if (isset($_POST['txtTimKiem'])) {
                                                                                                              $id = $_POST['txtTimKiem'];
                                                                                                              echo 'value=' . $id . '';
                                                                                                            } ?>>
        <div class="input-group-append">
          <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div>
</form>

<form method="POST">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Mã hồ sơ</th>
        <th scope="col">Họ tên</th>

        <th scope="col">SDT</th>
        <!-- <th scope="col">Địa chỉ</th> -->

        <th scope="col">Tình trạng hiện tại</th>
        <th scope="col">Tình trạng mới</th>
        <th scope="col">Kết Luận</th>
        <th scope="col">Ngày nhập viện</th>

      </tr>
    </thead>
    <tbody>
      <?php

      if (isset($_POST['txtTimKiem'])) {
        //  $idhoso=$_POST['txtTimKiem'];
        if (isset($_POST['search'])) {
          $search = Search($_POST['txtTimKiem']); //trả về một mảng          

          if (isset($search) && $search != 0) {
            $mahoso = $search['MaHoSo'];
            echo "<input type='hidden' name='txtid' value=" . $mahoso . " >";

            // echo "<p>".$search['TinhTrangSucKhoe']."</p>";
            echo "<tbody>
             <tr>
                <td scope='row' name='mahoso'>" . $search['MaHoSo'] . "</td>
                <td scope='row'>" . $search['HoTen'] . "</td>         
                <td scope='row'>" . $search['SDT'] . "</td>                       
                <td scope='row'>" . $search['TinhTrangSucKhoe'] . "</td>
                <td scope='row'>
                    <input type='text'class='form-control form-control-sm' style='width:200px;' id='txttinhtrang' name='txttinhtrang'>
                </td>
                <td scope='row'>     
                     <select style='width:150px;' class='form-control form-control-sm' name='txtghichu' id='txtghichu'>
                        <option>" . $search['GhiChu'] . "</option>
                        <option value='Dương tính'>Dương tính</option>
                        <option value='Âm tính'>Âm tính</option>
                        <option value='Tử vong'>Tử vong</option>
                     </select>         
                </td>
                <td scope='row'>" . $search['NgayNhapvien'] . "</td>
             </tr>          
                </tbody>";
          } else {
            echo '
             <h3 class="text-center wow fadeInUp" >Không tìm thấy hồ sơ bệnh nhân</h3>
           ';
          }
        }
      }
      // $mahoso=$_POST['mahoso'];
      // $tinhtrang=$_POST['txttinhtrang'];
      // $ghichu=$_POST['txtghichu'];
      ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col text-center">
      <input type="submit" class="btn btn-primary" name="capnhat" id="txtcn" value="Cập Nhật">
      <hr>
    </div>
    <hr>
  </div>
</form>

<!-- if(isset($_POST['nut'])){    
    $tinhtrang=$_POST['txttinhtrang'];
    $ketluan=$_POST['txtghichu'];
    echo $tinhtrang; -->
<!-- xử lý cập nhật tình trạng -->
<?php
if (isset($_POST['capnhat'])) {
  if (isset($_POST['txttinhtrang'])) {
    $resultUpdate = updateSituation($_POST['txttinhtrang'], $_POST['txtghichu'], $_POST['txtid']);
    echo ' <h3 class="text-center wow fadeInUp">' . $resultUpdate . '</h3>';
  } else {
    echo ' <h3 class="text-center wow fadeInUp">Không tìm thấy hồ sơ bệnh nhân</h3>';
  }
}
?>
