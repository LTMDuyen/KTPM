<?php
    function QVA($id){ 
        $query = "SELECT * from `yeucau`  WHERE `yeucau`.`MaTaiKhoan` = '$id'";
        return getone($query);
    }
    function get_all_QVA($id){
        $query = "SELECT * from `yeucau`  WHERE `yeucau`.`MaTaiKhoan` = '$id'";
        return getlist($query);
    }
    function InsertQuestion($cauhoi, $id, $phuong){
        $sql="INSERT INTO `yeucau` (`MaYeuCau`,`CauHoi`,`CauTraLoi`, `MaTaiKhoan`,`Phuong`) VALUES ('','$cauhoi', '','$id', '$phuong')";
        return addsql($sql);
    }
    function GetWard($id){
        $sql1 = "SELECT * FROM `taikhoan` WHERE `taikhoan`.`MaTaiKhoan` = '$id'";
        return getone($sql1);
    }
?>