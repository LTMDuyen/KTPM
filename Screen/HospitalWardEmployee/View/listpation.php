<div class="list" style="padding:10px;">
    <center>
        <h3 style="padding:20px 0px;">DANH SÁCH BỆNH NHÂN</h3>
    </center>
    <table class="table table">
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã Tài Khoản</td>
                <td>Tên Đăng Nhập</td>
                <td>Mật Khẩu</td>
                <td>Họ Tên</td>
                <td>Ngày Sinh</td>
                <td>SDT</td>
                <td>Email</td>
                <td>CCCD</td>
                <td>Địa Chỉ</td>

            </tr>
        </thead>
        <tbody class="table table-striped">
            <?php
            $result = getlist($sql);
            $i = 0;
            foreach ($result as $row) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['MaTaiKhoan']; ?></td>
                    <td><?php echo $row['TenDangNhap']; ?></td>
                    <td><?php echo $row['MatKhau']; ?></td>
                    <td><?php echo $row['HoTen']; ?></td>
                    <td><?php echo $row['NgaySinh']; ?></td>
                    <td><?php echo $row['SDT']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['CCCD']; ?></td>
                    <td><?php echo $row['DiaChi']; ?></td>

                    <td>
                        <form action="" method="POST">
                            <a class="btn btn-primary" href="index.php?update=<?php echo $row['MaTaiKhoan'] ?>">Cập nhật</a>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>