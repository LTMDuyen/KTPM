<center>
    <div class="capnhat" style="padding: 10px;">
        <span>
            <h4>THÊM THÔNG TIN BỆNH NHÂN</h4>
        </span>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Mã tài khoản:</td>
                    <td><input type="text" class="form-control" name="mhs" style="width:300px" value="<?php echo $MTK ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tên bệnh nhân:</td>
                    <td><input type="text" class="form-control" name="ten" style="width:300px" value="<?php echo $TEN ?>" readonly></td>
                </tr>
                <tr>
                    <td>Ngày nhập viện:</td>
                    <td><input type="text" class="form-control" name="day" style="width:300px" value="<?php echo $time ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tình trạng sức khoẻ:</td>
                    <td><input type="text" class="form-control" name="tinhtrang" style="width:300px" value="<?php echo $TINHTRANG['TrieuChungBenh'] ?>" readonly></td>
                </tr>

                <tr>
                    <td>Cơ sở y tế:</td>
                    <td>
                        <select name="macs" class="form-control" id="">
                            <?php
                            //chinh sua
                            $sql = get_All_CSYT();
                            $i = 0;
                            foreach ($sql as $row) {
                                $i++;
                                $MaCSYT = $row['MaCSYT'];
                                $TenCSYT = $row['TenCSYT'];
                            ?>

                                <option value="<?php echo $MaCSYT ?>"><?php echo $TenCSYT ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <td>Bệnh viện:</td>
                <td>
                    <select name="mabv" class="form-control" id="">
                            <?php
                                //chinh sua
                                $sql= get_All_BV();
                                $i=0;
                                foreach($sql as $row){
                                    $i++;
                                    $MaBV=$row['MaBenhVien'];
                                    $TenBV=$row['TenBenhVien'];
                            ?>
                                    <option value="<?php echo $MaBV?>"><?php echo $TenBV?></option>
                            <?php
                                }
                            ?>
                        </select>
                </td>
                </tr>
            </table>
            </br>
            <input type="submit" value="Thêm thông tin" name="btnadd" class="btn btn-primary">
        </form>
    </div>
</center>