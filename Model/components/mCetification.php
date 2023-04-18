<?php
function modelSelectCertification($MaTaiKhoan)
{
    $sql = "SELECT * FROM `hosobenhnhan` INNER JOIN `taikhoan` ON `hosobenhnhan`.`MaTaiKhoan`=`taikhoan`.`MaTaiKhoan` INNER JOIN `tokhaiyte` ON `hosobenhnhan`.`MaTaiKhoan` = `tokhaiyte`.`MaTaiKhoan` WHERE `taikhoan`.`MaTaiKhoan` = '$MaTaiKhoan' ORDER BY `tokhaiyte`.`Ngaykhaibao` DESC LIMIT 1;";
    
    return getone($sql);
}
