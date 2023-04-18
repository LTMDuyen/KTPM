<!-- <div>Tư vấn</div> -->
<div class="page-banner overlay-dark bg-image" style="background-image: url(../../view/Assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tư vấn cho bệnh nhân</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Tư vấn cho bệnh nhân</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
<table class="table">
  <thead style="text-align: center;">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Mã câu hỏi</th>
      <th scope="col">Tên bệnh nhân</th>
      <th scope="col">Câu hỏi</th>
      <th scope="col">Trả lời câu hỏi</th>
      <th scope="col">Trạng thái</th>
    </tr>
  </thead>
  
<?php
  if(isset($aa)){
        foreach($aa as $abc){
            echo "<tbody style='text-align: center;'>
            <tr>
              <td scope='row'>".$abc['MaYeuCau']."</td>
              <td scope='row'>".$abc['HoTen']."</td>
              <td scope='row'>".$abc['CauHoi']."</td>";
              if ($abc['CauTraLoi'] == NULL) {
                # code...
                // echo "<td scope='row'><input class='btn btn-primary wow zoomIn' type='submit' name='traloi' value='Trả lời'></td>";
                echo "<td scope='row'>
                  <div class='nav-item'>
                    <a class='btn btn-primary wow zoomIn ml-lg-3' href='index.php?act=reply&id=".$abc['MaYeuCau']."'>Trả lời</a>
                  </div>
                </td>";
                echo "<td scope='row'><i>Chưa trả lời</i></td>";
              }else {
                # code...
                echo "<td scope='row'>".$abc['CauTraLoi']."</td>";
                echo "<td scope='row'><i>Đã trả lời</i></td>";
              }
              
            echo "</tr>
            
          </tbody>";
        }
      }
?>

</table>

<?php
// echo $ward;
?>