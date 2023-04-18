<center>
<div class="capnhat" style="padding: 10px;">
    <span><h4>CẬP NHẬT THÔNG TIN BỆNH NHÂN</h4></span>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Mã hồ sơ:</td>
                <td><input type="text" class="form-control" name="mhs" style="width:300px" value="<?php echo $MHS ?>" readonly></td>
            </tr>
            <tr>
                <td>Tên bệnh nhân:</td>
                <td><input type="text" class="form-control" name="ten" style="width:300px" value="<?php echo $HoTen?>" required></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" class="form-control" name="ngaysinh" style="width:300px" value="<?php echo $NgaySinh?>"></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><input type="text" class="form-control" name="sdt" style="width:300px" value="<?php echo $SDT?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" class="form-control"name="mail" style="width:300px" value="<?php echo $Mail?>" required></td>
            </tr>
            <tr>
                <td>Số căn cước:</td>
                <td><input type="text" class="form-control" name="cccd" style="width:300px" value="<?php echo $CCCD?>" required></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" class="form-control" name="diachi" style="width:300px" value="<?php echo $DiaChi?>" required></td>
            </tr>
            <tr>
                <td>Tình trạng:</td>
                <td><input type="text" class="form-control" name="tinhtrang" style="width:300px" value="<?php echo $TinhTrang?>" required></td>
            </tr>
            <tr>
                <td>Kết luận:</td>
                <td><input type="text" class="form-control" name="ketluan" style="width:300px" value="<?php echo $KetLuan?>" required></td>
            </tr>
        </table>
</br>
        <input type="submit" value="Cập nhật"  name="btnupdate" class="btn btn-primary">
    </form>
</div>
</center>