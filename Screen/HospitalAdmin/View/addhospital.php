

<style>
  .container1{

    padding: 50px 0px;
  }
  .form{
    padding: 0px 300px;
  }
</style>


<!-- ------------------------------------------------------end header--------------------------------------------------- -->
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản Lý Thông Tin Bệnh Viện</li>
            <li class="breadcrumb-item active" aria-current="page">Thêm Bệnh Viện</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Thêm Bệnh Viện</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->
<!-- -------------------------------------------//--------------------------------------- -->

<div class="container1">
  
       <form class="form" method="post" > 
           
         <!-- <div class="form-group row">
            <label for="inputid" class="col-sm-2 col-form-label">Mã bệnh viện</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="idbenhvien" >
            </div>
          </div> -->

          <div class="form-group row">
            <label for="inputname=" class="col-sm-2 col-form-label">Tên bệnh viện</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control"  name="name"  >
            </div>
          </div>
         
          <div class="form-group row">
            <label for="inputadd" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="address" >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputtang" class="col-sm-2 col-form-label">Tầng Số </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tang" >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputsocamac" class="col-sm-2 col-form-label">Số Ca Mắc</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" name="socamac" >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputsocakhoi" class="col-sm-2 col-form-label">Số Ca Khỏi</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control"  name="socakhoi" >
            </div>
            
            <div class="col-lg-10" style="padding:10px 0px 0px 500px;">
                <input type="submit"  name = "submitbtn" value="Thêm">
               
            
            </div>
        </form>
        
   
</div>


