<?php
    function get_thongke($thongke)
    {
            $sql = "SELECT *
            FROM   phieuyeucauchuyenvien join taikhoan 
            where  phieuyeucauchuyenvien.MaTaiKhoan = taikhoan.MaTaiKhoan AND  MaHoSo=$thongke";
            // $request=getone($sql);
            // return $request;
            return getone($sql);
    }
    function get_all()
    {
        $sql = "SELECT *
        FROM   phieuyeucauchuyenvien ph join taikhoan tk on ph.MaTaiKhoan=tk.MaTaiKhoan ";
        return getlist($sql);
    }
    function thongke_all()
    {
        $sql="SELECT * 
        FROM   phieuyeucauchuyenvien join taikhoan 
        where  phieuyeucauchuyenvien.MaTaiKhoan = taikhoan.MaTaiKhoan"; 
        return $sql;
    }
    function thongke_thoigian($a,$b)
    {
        $sql="SELECT * 
        FROM   phieuyeucauchuyenvien join taikhoan 
        where  phieuyeucauchuyenvien.MaTaiKhoan = taikhoan.MaTaiKhoan AND 
        (phieuyeucauchuyenvien.NgayYeuCau between '$a' AND '$b')";
        return $sql;
    }
    function get_Search($mahs)
    { 
        $query = "SELECT * 
        FROM   phieuyeucauchuyenvien join taikhoan
        WHERE phieuyeucauchuyenvien.MaTaiKhoan = taikhoan.MaTaiKhoan AND phieuyeucauchuyenvien.MaHoSo = $mahs";
        return getone($query);
    }
    function update_mabv($mabv,$mahs)
    {
        $sql = "UPDATE hosobenhnhan set MaBenhVien='$mabv'
        WHERE MaHoSo='$mahs'";
        return $sql;
    }
    function delete_tiepnhan($mhs)
    {
        $sql="DELETE from phieuyeucauchuyenvien where MaHoSo='$mhs'";
        return $sql;
    }
?>