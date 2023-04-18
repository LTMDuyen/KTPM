<body>
<div class="list" style="padding:10px;">
    <center><h3>DANH SÁCH NHÂN VIÊN</h3></center>
    <table class="table table">
        <thead class="table table-dark">
            <tr>
                <td>STT</td>
                <td>Mã Tài Khoản</td>
                <td>Họ Tên</td>
                <td>Role</td>
                
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
                            <td><?php echo $row['MaTaiKhoan']; ?></td>
                            <td><?php echo $row['HoTen']; ?></td>
                            <td><?php echo $row['Role']; ?></td>
        
                            <td>
                                <form action="" method="POST">
                                    <a class="btn btn-primary" href="index.php?update=<?php echo $row['MaTaiKhoan']?>">Phân Quyền</a>
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
