<!--<div>Yêu cầu chuyển viện</div>-->
<style>
    .b123 {
        margin: 20px;
    }

    .tokhai {
        margin-bottom: 10px;
    }
</style>
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
    <form action="index.php?act=btnguiyeucau" method="POST">
        <div class="row justify-content-center">
            <h4 class="b123 text-center"><b>Phiếu yêu cầu chuyển viện</b></h4>
        </div>
        <input type="text" class="form-control col-md-7" name="txtmatk" value="<?php echo $search['MaTaiKhoan'] ?>" hidden>
        <div class="tokhai row">
            <label for="txtmahoso" class="col-md-4 text-center">Mã hồ sơ:</label>
            <input type="text" class="form-control col-md-7" name="txtmahoso" value="<?php echo $search['MaHoSo'] ?>" readonly>
        </div>

        <div class="tokhai row">
            <label for="txtname" class="col-md-4 text-center">Họ tên bệnh nhân:</label>
            <input type="text" class="form-control col-md-7" name="txtname" value="<?php echo $search['HoTen'] ?>" readonly>
        </div>
        <div class="tokhai row">
            <label for="txtmucdo" class="col-md-4 text-center">Mức độ bệnh:</label>
            <select name="txtmucdo" class="form-control col-md-7">
                <option value="Mức độ 1">Mức độ 1</option>
                <option value="Mức độ 2">Mức độ 2</option>
                <option value="Mức độ 3">Mức độ 3</option>
                <option value="Mức độ 4">Mức độ 4</option>
                <option value="Mức độ 5">Mức độ 5</option>
            </select>
        </div>
        <div class="tokhai row">
            <label for="txtdate" class="col-md-4 text-center">Ngày yêu cầu:</label>
            <input type="text" class="form-control col-md-7" name="txtdate" value="<?php $time = getdate();
                                                                                    echo $time['year'] . "-" . $time['mon'] . "-" . $time['mday']; ?>" readonly>
        </div>
        <div class="tokhai row">
            <label for="txttang" class="col-md-4 text-center">Tầng yêu cầu:</label>
            <select class="form-control col-md-7" id="mySelect" onchange="location = this.value">
                <option value="">---</option>
                <?php
                foreach ($Requestahospitaltransfer as $thongtin) {
                    if (isset($_REQUEST['txttang']) and $_REQUEST['txttang'] == $thongtin["MaBenhVien"]) {
                        echo "<option selected value='?txttimkiem=" . $_REQUEST["txttimkiem"] . "&&search=" . $_REQUEST["txttimkiem"] . "&&act=yeucau&&txttang=" . $thongtin["MaBenhVien"] . "'>" . $thongtin["TangSo"] . "</option>";
                    } else {
                        echo "<option value='?txttimkiem=" . $_REQUEST["txttimkiem"] . "&&search=" . $_REQUEST["txttimkiem"] . "&&act=yeucau&&txttang=" . $thongtin["MaBenhVien"] . "'>" . $thongtin["TangSo"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="tokhai row">
            <?php
            if (isset($_REQUEST['txttang'])) { ?>
                <label for="txttenbv" class="col-md-4 text-center">Tên bệnh viện:</label>
                <select name="txttenbv" class="form-control col-md-7" id="mySelect">
                    <option value="">---</option>
                    <?php foreach ($tenbv as $laytenbv) {
                        echo "<option value='" . $laytenbv["MaBenhVien"] . "'>" . $laytenbv["TenBenhVien"] . "</option>";
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
        <div class="tokhai row d-flex justify-content-center pr-2 border-bottom">
            <input type="submit" class="btn btn-primary" name="btnguiyeucau" value="Gửi yêu cầu">
        </div>
    </form>
</div>