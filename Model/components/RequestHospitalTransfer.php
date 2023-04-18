<?php
    function check_mahs($mahoso)
    {
        $sql="SELECT * FROM hosobenhnhan where MaHoSo=$mahoso";
        return getone($sql);
    }
    function check_mabv($mabenhvien)
    {
        $sql="SELECT * FROM benhvien where MaBenhVien=$mabenhvien";
        return getone($sql);
    }
    function check_matk($matk)
    {
        $sql="SELECT * FROM taikhoan where MaTaiKhoan=$matk";
        return getone($sql);
    }
    function add_yeucau($date, $mucdo,$mtk, $mahoso,$mabenhvien)
    {
        $sql = "INSERT INTO `phieuyeucauchuyenvien` (`NgayYeuCau`,`MoTa`,`MaTaiKhoan`,`MaHoSo`,`MaBenhVien`) 
        VALUES ('$date', '$mucdo','$mtk','$mahoso','$mabenhvien')";
        return addsql($sql);
        
    }
    function join_bang($mahoso)
    {
        $sql = "SELECT *
        FROM hosobenhnhan JOIN taikhoan on hosobenhnhan.MaTaiKhoan = taikhoan.MaTaiKhoan
        WHERE hosobenhnhan.MaHoSo = $mahoso";
        return getone($sql);
    }
    function requestbenhvien(){
        $sql = "SELECT * FROM benhvien group by TangSo";
        return getlist($sql);
    }
    function requesttenbv($tang){
        $sql = "SELECT * FROM benhvien WHERE TangSo=$tang";
        return getlist($sql);
    }
    function add_dangkydieutri($tinhtrangsuckhoe,$ngayyeucau,$macsyt,$mahs)
    {
        $sql = "UPDATE `hosobenhnhan` SET  `TinhTrangSucKhoe` = '$tinhtrangsuckhoe', `NgayNhapvien` = '$ngayyeucau', `MaCSYT` = '$macsyt' WHERE `hosobenhnhan`.`MaHoSo` = $mahs;";
        return $sql;
    }
    function laytk($mtk)
    {
        $sql = "SELECT *
        FROM `hosobenhnhan` where `MaTaiKhoan` = '$mtk'";
        return getone($sql);
    }
?>