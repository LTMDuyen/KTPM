<?php
function get_all_request($ward)
{
    $sql = "SELECT *
        FROM yeucau JOIN taikhoan 
        WHERE yeucau.MaTaiKhoan = taikhoan.MaTaiKhoan AND yeucau.Phuong = $ward";
    return getlist($sql);
}
function request($idRequest)
{
    $sql = "SELECT * FROM yeucau WHERE MaYeuCau='$idRequest'";
    return getone($sql);
}
function update_request($reply, $idRequest)
{
    $sql = "UPDATE `yeucau` SET `CauTraLoi` = '$reply' WHERE `yeucau`.`MaYeuCau` = '$idRequest'";
    // $sql = "INSERT INTO `yeucau` (`CauTraLoi`, `MaTaiKhoan`) VALUES ('$reply', '$idRequest')";
    execsql($sql, 1);
    return true;
}
function thongke_full()
{
    $sql = "SELECT * FROM benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        where tk.Role=0 order by tk.MaTaiKhoan asc";
    return $sql;
}
function thongke_full1()
{
    $sql = "SELECT * FROM benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        where tk.Role=0 order by tk.MaTaiKhoan asc";
    return $sql;
}
function statistical_all()
{
    $sql = "SELECT * FROM benhvien ";
    return $sql;
}
function get_one_hospital($MaBenhVien)
{
    $sql = "SELECT * FROM benhvien where MaBenhVien=$MaBenhVien";
    return $sql;
}
function updatehospital($name, $address, $tang, $socamac, $socakhoi, $id)
{
    $sql = "UPDATE benhvien  set TenBenhVien='$name' where MaBenhVien='$id';
        UPDATE benhvien set DiaChi='$address' where MaBenhVien='$id';
        UPDATE benhvien  set TangSo='$tang' where MaBenhVien='$id';
        UPDATE benhvien  set SoCaMac='$socamac' where MaBenhVien='$id';
        UPDATE benhvien  set SoCaKhoi='$socakhoi' where MaBenhVien='$id';";
    return $sql;
}
function thongkenhanvien()
{
    $sql = "SELECT * FROM taikhoan Where Role != 0 ";
    return $sql;
}

function grant($id, $role)
{
    $sql = "UPDATE taikhoan  set Role='$role' where MaTaiKhoan='$id'";
    return $sql;
}
function thongke_time($a, $b)
{
    $sql = "SELECT * FROM benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        where tk.Role=0 and (hs.NgayNhapvien between '$a' and '$b') order by tk.MaTaiKhoan asc";
    return $sql;
}
function thongke_status($c)
{
    $sql = "SELECT * FROM benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        where tk.Role=0 and hs.GhiChu='$c' order by tk.MaTaiKhoan asc";
    return $sql;
}
function thongke_time_status($a, $b, $c)
{
    $sql = "SELECT * FROM benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        where tk.Role=0 and (hs.NgayNhapvien between '$a' and '$b') and hs.GhiChu='$c' order by tk.MaTaiKhoan asc";
    return $sql;
}
function a($MHS)
{
    $sql = "SELECT * FROM hosobenhnhan hs join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan 
        WHERE hs.MaHoSo='$MHS'";
    return getone($sql);
}
function count_duong($a, $day)
{
    $sql = "SELECT count(MaHoSo) as counts from hosobenhnhan where GhiChu='$a' and NgayNhapvien='$day'";
    $get = getone($sql);
    $counts = $get["counts"];
    return $counts;
}
function count_am($a, $day)
{
    $sql = "SELECT count(MaHoSo) as counts from hosobenhnhan where GhiChu='$a' and NgayKhoiBenh='$day'";
    $get = getone($sql);
    $counts = $get["counts"];
    return $counts;
}
function count_duong_kv($a, $day, $kv)
{
    $sql = "SELECT count(MaHoSo) as counts from hosobenhnhan hs join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan where GhiChu='$a' and NgayNhapvien='$day' and DiaChi like'%$kv%'";
    $get = getone($sql);
    $counts = $get["counts"];
    return $counts;
}
function count_am_kv($a, $day, $kv)
{
    $sql = "SELECT count(MaHoSo) as counts from hosobenhnhan hs join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan where GhiChu='$a' and NgayKhoiBenh='$day' and DiaChi like'%$kv%'";
    $get = getone($sql);
    $counts = $get["counts"];
    return $counts;
}
function getonepatient($a)
{
    $sql = "SELECT * from benhvien bv join hosobenhnhan hs on bv.MaBenhVien=hs.MaBenhVien join taikhoan tk on hs.MaTaiKhoan=tk.MaTaiKhoan where hs.MaHoSo='$a'";
    return getone($sql);
}
function updatePatient($hoten, $ngaysinh, $sdt, $mail, $cccd, $diachi, $tinhtrang, $ketluan, $mhs)
{
    $sql = "UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set HoTen='$hoten' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set NgaySinh='$ngaysinh' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set SDT='$sdt' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set Email='$mail' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set CCCD='$cccd' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set DiaChi='$diachi' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set TinhTrangSucKhoe='$tinhtrang' where MaHoSo='$mhs';
        UPDATE taikhoan tk join hosobenhnhan hs on tk.MaTaiKhoan=hs.MaTaiKhoan set GhiChu='$ketluan' where MaHoSo='$mhs';
        ";
    return $sql;
}
function update_Patient($user, $pass, $name, $date, $phone, $email, $cccd, $diachi, $id)
{
    $sql = "UPDATE taikhoan  set TenDangNhap='$user' where MaTaiKhoan='$id';
    UPDATE taikhoan set MatKhau='$pass' where MaTaiKhoan='$id';
    UPDATE taikhoan set HoTen='$name' where MaTaiKhoan='$id';
    UPDATE taikhoan set NgaySinh='$date' where MaTaiKhoan='$id';
    UPDATE taikhoan  set SDT='$phone' where MaTaiKhoan='$id';
    UPDATE taikhoan  set Email='$email' where MaTaiKhoan='$id';
    UPDATE  taikhoan set CCCD='$cccd'where MaTaiKhoan='$id';
    UPDATE taikhoan set DiaChi='$diachi' where MaTaiKhoan='$id;';";
    return $sql;
}
function list_full(){
    $sql="SELECT MaTaiKhoan,TenDangNhap,MatKhau,HoTen,NgaySinh,SDT,Email,CCCD,DiaChi FROM taikhoan Where Role = 0" ;
    return $sql;
}
function thongke_Addinfo(){
    $sql="SELECT * from taikhoan where not exists(SELECT MaTaiKhoan from hosobenhnhan where taikhoan.MaTaiKhoan=hosobenhnhan.MaTaiKhoan) and Role=0";
    return $sql;
}
function addMTK($MTK)
{
    $sql = "INSERT INTO `hosobenhnhan` (`MaTaiKhoan`) VALUES ('$MTK')";
    return addsql($sql);
}
function gettinhtrang($MTK){
    $sql="SELECT * from tokhaiyte where MaTaiKhoan='$MTK'";
    return getone($sql);
}
function add_Patient($day,$tinhtrang,$macs,$mabv,$MTK){
    $sql="UPDATE hosobenhnhan  set NgayNhapvien='$day' where MaTaiKhoan='$MTK';
    UPDATE hosobenhnhan set TinhTrangSucKhoe='$tinhtrang' where MaTaiKhoan='$MTK';
    UPDATE hosobenhnhan set MaCSYT='$macs' where MaTaiKhoan='$MTK';
    UPDATE hosobenhnhan set MaBenhVien='$mabv' where MaTaiKhoan='$MTK'";
    return $sql;
}
function get_All_CSYT(){
    $sql="SELECT * from csytp";
    return getlist($sql);
}
function get_All_BV(){
    $sql="SELECT * from benhvien";
    return getlist($sql);
}