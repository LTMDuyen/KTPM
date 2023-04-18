
<style>
.viewTK{
    padding: 20px;
}
table{
    text-align: center;
}
form{
    font-size: large;
}
thead{
    font-size: larger;
}
h2{
    font-family:'Segoe UI', Tahoma, Verdana, sans-serif;
}
</style>
<div class="viewTK">
    <form class="contact-form mt-5" method="POST" >
        Thời gian:
        Từ <input type="date" name="fday">
        đến <input type="date" name="tday">
    </br>
        Tình trạng:
        <input type="radio" name="thongke" value="Dương tính"> Dương tính
        <input type="radio" name="thongke" value="Âm tính"> Âm tính
        <input type="radio" name="thongke" value="Tử vong"> Tử vong
        </br><input type="submit" value="Thống kê" class="btn btn-primary" name="btntk">
    </form>
    <table class="table table">
        <h2 class="text text-danger"><center>BẢNG THỐNG KÊ</center></h2>
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã bệnh nhân</td>
                <td>Tên bệnh nhân</td>
                <td>Ngày nhập viện</td>
                <td>Tình trạng</td>
                <td>Tầng điều trị</td>
                <td>Ghi chú</td>
            </tr>
        </thead>
        <tbody class="table table-striped">
        <?php
            $result=getlist($sql);
            $i=0;
            foreach($result as $row){
                $i++;
        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['MaHoSo']; ?></td>
                        <td><?php echo $row['HoTen']; ?></td>
                        <td><?php echo $row['NgayNhapvien']; ?></td>
                        <td><?php echo $row['TinhTrangSucKhoe']; ?></td>
                        <td><?php echo $row['TangSo']; ?></td>
                        <td><?php echo $row['GhiChu']; ?></td>
                    </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
