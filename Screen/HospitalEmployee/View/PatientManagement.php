<div class="list" style="padding:10px;">
    <center><h3>DANH SÁCH BỆNH NHÂN</h3></center>
    <table class="table table">
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã bệnh nhân</td>
                <td>Tên bệnh nhân</td>
                <td>Ngày nhập viện</td>
                <td>Tình trạng</td>
                <td>Tầng điều trị</td>
                <td>Cập nhật</td>
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
                            <td>
                                <form action="" method="POST">
                                    <a class="btn btn-primary" href="index.php?update=<?php echo $row['MaHoSo']?>">Cập nhật</a>
                                </form>
                            </td>
                    </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>