<?php
function modelInsertKhaiBaoYTe($loaiKhaiBao, $noiKhaiBao, $tienSuBenh, $trieuChung, $dichTe, $taiKhoan)
{
    $sql = "INSERT INTO `tokhaiyte`(`loaiKhaiBao`,`NoiKhaiBao`, `TienSuBenh`, `TrieuChungBenh`, `YeuToDichTe`, `MaTaiKhoan`) VALUES ('$loaiKhaiBao','$noiKhaiBao','$tienSuBenh','$trieuChung','$dichTe','$taiKhoan')";
    return addsql($sql);
}
