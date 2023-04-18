<div class="list" style="padding:10px;">
    <center><h3>DANH SÁCH THÊM THÔNG TIN BỆNH NHÂN</h3></center>
    <table class="table table">
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã tài khoản</td>
                <td>Tên bệnh nhân</td>
                <td>Thêm</td>
            </tr>
        </thead>
        <tbody class="table table-striped">
        <?php
            $result=getlist($sqladd);
            $i=0;
            foreach($result as $row){
                $i++;
        ?>
                    <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['MaTaiKhoan']; ?></td>
                            <td><?php echo $row['HoTen']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <a class="btn btn-primary" href="index.php?add=<?php echo $row['MaTaiKhoan']?>">Thêm thông tin</a>
                                </form>
                            </td>
                    </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>