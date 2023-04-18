<center>
    <div class="capnhat" style="padding: 10px;">
        <span>
            <h4>CẬP NHẬT THÔNG TIN BỆNH NHÂN</h4>
        </span>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Mã Tài Khoản:</td>
                    <td><input type="text" class="form-control" name="id" style="width:300px" value="<?php echo $id ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tên Đăng Nhập:</td>
                    <td><input type="text" class="form-control" name="user" style="width:300px" value="<?php echo $user ?>"></td>
                </tr>
                <tr>
                    <td>Mật Khẩu:</td>
                    <td><input type="password" class="form-control" name="pass" style="width:300px" value="<?php echo $pass ?>"></td>
                </tr>
                <tr>
                    <td>Họ Tên:</td>
                    <td><input type="text" class="form-control" name="name" style="width:300px" value="<?php echo $name ?>"></td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input type="date" class="form-control" name="date" style="width:300px" value="<?php echo $date ?>"></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" class="form-control" name="phone" style="width:300px" value="<?php echo $phone ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" class="form-control" name="email" style="width:300px" value="<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td>Số căn cước:</td>
                    <td><input type="text" class="form-control" name="cccd" style="width:300px" value="<?php echo $cccd ?>"></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" class="form-control" name="diachi" style="width:300px" value="<?php echo $diachi ?>"></td>
                </tr>

            </table>
            <input type="submit" value="Cập nhật" name="btnupdate" class="btn btn-primary">
        </form>
    </div>
</center>