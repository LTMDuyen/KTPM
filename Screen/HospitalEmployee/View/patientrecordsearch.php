<!-- <div>Tìm kiếm thông tin bệnh nhân</div> -->
<div class="page-banner overlay-dark bg-image" style="background-image: url(../../view/Assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yêu cầu chuyển viện</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Yêu cầu chuyển viện</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div>
<div>
    <form class="contact-form mt-5" action="index.php?act=yeucau" method="GET">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Nhập mã hồ sơ bệnh nhân</h1>
            <div class="row mb-3">
                <div class="col-sm-3 input-group mb-3 wow fadeInLeft">
                </div>
                <div class="col-sm-6 input-group mb-3 wow fadeInLeft">
                    <input type="text" class="form-control" name="txttimkiem" placeholder="Nhập mã hồ sơ bệnh nhân...">
                    
                    <div class="input-group-append">
                        <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary">
                        <input type="hidden" name="act" value="yeucau">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>