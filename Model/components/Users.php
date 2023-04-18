<?php
function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where TenDangNhap='" . $user . "' and MatKhau='" . $pass . "'";
    return getone($sql);
}

function adduser($user, $pass, $role, $phone, $name, $email)
{
    $sql = "INSERT INTO taikhoan (TenDangNhap, MatKhau, Role, SDT, HoTen, Email) VALUES ('$user', '$pass', '$role', '$phone','$name', '$email')";
    return addsql($sql);
}

function updatepass($user, $pass)
{
    $sql = "UPDATE taikhoan set MatKhau='" . $pass . "' where TenDangNhap='" . $user . "'";
    return execsql($sql, 0);
}

function finduser($user)
{
    $sql = "select * from taikhoan where TenDangNhap='" . $user . "'";
    return getone($sql);
}

function getPassHash($user)
{
    $sql = "select MatKhau from taikhoan where TenDangNhap='" . $user . "'";
    return getone($sql);
}

function get_user_by_id($user_id)
{
    $sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan = $user_id";
    return getone($sql);
}

// function update_user_by_id($update_info, $user_id) {
//     // được phép chỉnh sửa địa chỉ, sdt, họ tên, ngày sinh
//     $address = $update_info['address'];
//     $phone = $update_info['phone'];
//     $email = $update_info['email'];
//     $name = $update_info['name'];
//     $dob = $update_info['dob'];
//     $sql = "UPDATE taikhoan SET address = '$address', phone = '$phone', name = '$name', date = '$dob', email = '$email' WHERE id = $user_id";
//     execsql($sql, 1);
//     return true;
// }
function update_user_by_id($update_info, $user_id)
{
    // được phép chỉnh sửa địa chỉ, sdt, họ tên, ngày sinh
    $address = $update_info['address'];
    $phone = $update_info['phone'];
    $email = $update_info['email'];
    $name = $update_info['name'];
    $dob = $update_info['dob'];
    $cccd = $update_info['cccd'];
    $sql = "UPDATE taikhoan SET DiaChi = '$address', SDT = '$phone', HoTen = '$name', NgaySinh = '$dob', Email = '$email', CCCD = '$cccd' WHERE MaTaiKhoan = $user_id";
    execsql($sql, 1);
    return true;
}
function add($name, $address, $tang, $socamac, $socakhoi)
{
    $sql = "INSERT INTO benhvien(TenBenhVien,DiaChi,TangSo,SoCaMac,SoCaKhoi)
         VALUES('$name','$address','$tang','$socamac','$socakhoi');";
    addsql($sql);
}
// function update($address, $socamac, $name,$socakhoi,$tang,$id)
// {
//     $sql="UPDATE benhvien 
//     Set TenBenhVien ='$name',DiaChi='$address',TangSo='$tang',SoCaMac='$socamac',SoCaKhoi='$socakhoi', MaBenhVien=$id";
//     updatesql($sql);
// }
function  add_benhnhan($user, $pass, $name, $date, $address, $phone, $cccd, $role, $email)
{
    $sql = "INSERT INTO taikhoan (TenDangNhap,MatKhau,HoTen,NgaySinh,SDT,Email,CCCD,DiaChi,Role)
         VALUES('$user','$pass','$name','$date','$phone','$email','$cccd','$address','$role');";
    addsql($sql);
}

function login($data)
{
    $user = $data['user'];
    $pass = $data['pass'];

    if (strlen($user) == 0 || strlen($pass) == 0) {
        return 'Tài khoản hoặc mật khẩu không được để trống';
    }

    $USER = finduser($user);

    if ($USER != NULL) {
        if (md5($pass) == $USER['MatKhau']) {
            return $user;
        } else {
            return 'Sai mật khẩu';
        }
    } else {
        return 'Tài khoản chưa được đăng ký';
    }
}

function register($data)
{
    $user = $data['user'];
    $pass = $data['pass'];
    $rpass = $data['rpass'];
    $name = $data['name'];
    $sdt = $data['sdt'];
    $email = $data['email'];

    if ($pass != $rpass) {
        return "Mật khẩu không trùng khớp";
    } elseif (finduser($user) != NULL) {
        return "Tên đăng nhập đã tồn tại vui lòng nhập lại";
    } elseif (!preg_match("/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,}$/", $name)) {
        return "Họ tên không hợp lệ";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{8,}$/", $pass)) {
        return "Mật khẩu tối thiểu 8 ký tự và ít nhất 1 số";
    } elseif (!preg_match("/^(0[3|5|7|8|9][0-9]{8})$/", $sdt)) {
        return "Số điện thoại không chính xác";
    } elseif (!preg_match("/^[a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,3}$/", $email)) {
        return "Email không hợp lệ";
    } else {
        $pass_hash = md5($pass);
        $role = 0;
        return adduser($user, $pass_hash, $role, $sdt, $name, $email) ? $user : 'Đăng kí không thành công';
    }
}

function editUser($data, $id)
{
    $new_address = $data['address'];
    $new_email = $data['email'];
    $new_phone = $data['tel'];
    $new_date = $data['date'];
    $new_name = $data['name'];
    $new_cccd = $data['cccd'];
    // update thông tin user
    if (!preg_match("/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,}$/", $new_name)) {
        return 'Nhập sai tên';
    }
    if (!preg_match("/^[0][3|5|7|9][0-9]{8}$/", $new_phone)) {
        return 'Nhập sai số điện thoại';
    }
    if (!preg_match("/^[0-9]{12}$/", $new_cccd)) {
        return 'Nhập sai CMND/CCCD';
    }
    if (!preg_match("/^[a-zA-Z0-9]{0,50}[@][a-z]{3,7}[.][a-z]{3}$/", $new_email)) {
        return 'Nhập sai email';
    }
    if (!preg_match("/^[0-9\/]{1,}+[0-9A-Za-z.ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s,]{2,}$/", $new_address)) {
        return 'Nhập sai địa chỉ';
    }
    $date = getdate();
    $day = $date['mday'];
    $month = $date['mon'];
    $year = $date['year'];
    $time = "$year-$month-$day";
    if (strtotime($new_date) > strtotime($time)) {
        return 'Nhập sai ngày';
    }
    $update_info = ['name' => $new_name, 'address' => $new_address, 'phone' => $new_phone, 'dob' => $new_date, 'email' => $new_email, 'cccd' => $new_cccd];
    $result = update_user_by_id($update_info, $id);
    if ($result) {
        return 'Cập nhật thông tin thành công';
    } else {
        return 'Cập nhật thông tin thất bại';
    }
}

function addQuestion($question, $id)
{
    $phuong = GetWard($id);
    if ($question == '') {
        return 'Vui lòng nhập câu hỏi';
    } else {
        return InsertQuestion($question, $id, $phuong['Phuong_BVCongTac'])?'Đặt câu hỏi thành công':'Đặt câu hỏi thất bại';
    }
}
