<!-- <div> tiep nhan benh nhan </div> -->
<div class="page-banner overlay-dark bg-image" style="background-image: url(../../view/Assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tiếp nhận bệnh nhân</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Tiếp nhận bệnh nhân</h1>
        </div>
    </div>
</div>
<form action="" method="POST">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Chọn khoảng thời gian</h1>
        <div class="row mb-3">
            Thời gian : Từ <input type="date" name="fday" value>
            đến <input type="date" name="tday" value>
            <div class="input-group-append md-3">
                <input type="submit" value="Xem danh sách" name="btnds" class="btn btn-primary">
            </div>
        </div>
    </div>
    <table class="table table">
        <thead>
            <tr>
                <th scope="col">Mã Hồ Sơ</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Tình trạng sức khỏe</th>
                <th scope="col">Ngày yêu cầu</th>
                <th scope="col">Mã bệnh viện</th>
                <th scope="col">Xác nhận</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = thongke_all();
            if (isset($_POST['btnds'])) {
                if ($_POST["fday"] && $_POST["tday"]) {
                    $fday = $_POST["fday"];
                    $tday = $_POST["tday"];
                    if (strtotime($fday) < strtotime($tday)) {
                        $query = thongke_thoigian($fday, $tday);
                    } else echo "<script>alert('Sai khoảng thời gian')</script>";
                }
            }
            $result = getlist($query);
            $i = 0;

            foreach ($result as $row) {
                $i++;
            ?>
                <tr>
                    <th scope="col" name="txthoso"><?php echo $row['MaHoSo'] ?></th>
                    <th scope='col' name="txthoten"><?php echo $row['HoTen'] ?></th>
                    <th scope='col' name="txtmota"><?php echo $row['MoTa'] ?></th>
                    <th scope='col' name="txtdate"><?php echo $row['NgayYeuCau'] ?></th>
                    <th scope='col' name="txtmabv"><?php echo $row['MaBenhVien'] ?></th>
                    <th scope='col'>
                        <form action="" method="POST">
                            <input type="submit" name="btnxacnhan" class='btn btn-primary' value="Xác nhận">
                            <input type="submit" name="btnhuy" class='btn btn-danger' value="Hủy">
                        </form>

                    </th>
                </tr>
            <?php
            }
            if (isset($_POST['btnxacnhan'])) {
                $mbv = $row['MaBenhVien'];
                $mhs = $row['MaHoSo'];
                try {
                    $sql = update_mabv($mbv, $mhs);
                    $conn = connect();
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo $sql . "</br>" . $e->getMessage();
                }
                $conn = null;
                try {
                    $sql = delete_tiepnhan($mhs);
                    $conn = connect();
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo $sql . "</br>" . $e->getMessage();
                }
                $conn = null;
                echo '<script>alert("Xác nhận thành công");</script>';

                header('refresh:0');
            }
            if (isset($_POST['btnhuy'])) {
                $mhs = $row['MaHoSo'];
                try {
                    $sql = delete_tiepnhan($mhs);
                    $conn = connect();
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo $sql . "</br>" . $e->getMessage();
                }
                $conn = null;
                echo '<script>alert("Hủy thành công");</script>';
                header('refresh:0');
            }
            ?>
        </tbody>
    </table>
</form>