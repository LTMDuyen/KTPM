<body>
<div class="list" style="padding:10px;">
    <center><h3>DANH SÁCH BỆNH VIỆN</h3></center>
    <table class="table table">
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã bệnh viện</td>
                <td>Tên bệnh viện</td>
                <td>Địa Chỉ</td>
                <td>Tầng điều trị</td>
                <td>Số Ca Mắc</td>
                <td>Số Ca Khỏi</td>
            </tr>
        </thead>
        <tbody class="table table-striped"> 
        <?php
            $result = getlist($sql);
            $i=0;
            foreach($result as $row){
                $i++;
        ?>
                    <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['MaBenhVien']; ?></td>
                            <td><?php echo $row['TenBenhVien']; ?></td>
                            <td><?php echo $row['DiaChi']; ?></td>
                            <td><?php echo $row['TangSo']; ?></td>
                            <td><?php echo $row['SoCaMac']; ?></td>
                            <td><?php echo $row['SoCaKhoi']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <a class="btn btn-primary" href="index.php?update=<?php echo $row['MaBenhVien']?>">Chỉnh sửa</a>
                                </form>
                            </td>
                    </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</body>
