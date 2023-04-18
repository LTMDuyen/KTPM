<?php
    function findHoSoByID($idhoso){ 
        $query = "SELECT * from `hosobenhnhan` WHERE `MaHoSo` = '$idhoso'";
        return getone($query);
    }

    function Search($timkiem){ 
        $query = "SELECT * from `hosobenhnhan` JOIN `taikhoan` WHERE hosobenhnhan.MaTaiKhoan = taikhoan.MaTaiKhoan AND hosobenhnhan.MaHoSo LIKE '$timkiem'";
        return getone($query);
    }

    function update_health($tinhtrang, $ghichu, $id){
        $sql = "UPDATE `hosobenhnhan` SET `TinhTrangSucKhoe` = '$tinhtrang', `GhiChu`='$ghichu' WHERE `hosobenhnhan`.`MaHoSo` = '$id'";
        
        execsql($sql, 1);
        return true;
    }

    function updateSituation($tinhtrang, $ghichu, $idhoso) {

        $hoso = findHoSoByID($idhoso);

        if($hoso == NULL) return 'Không tìm thấy hồ sơ bệnh nhân';

        if ($tinhtrang != '') {
            update_health($tinhtrang, $ghichu, $idhoso);

            return 'Cập nhật thành công';
        } else {
            return 'Cập nhật không thành công';
        }
    }