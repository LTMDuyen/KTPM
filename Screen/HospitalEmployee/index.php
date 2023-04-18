<!-- <div> nhân viên y tế bệnh viện</div> -->
<?php
ob_start();
session_start();
if (isset($_SESSION['HospitalEmployee'])) {
    # code...
    include "../../Model/index.php";
    include "../HospitalEmployee/View/Header.php";
    // include "../../Controller/index.php";
    if (isset($_GET['update'])) {
        $update = $_GET['update'];
        $sql = thongke_full();
        $result = getlist($sql);
        $i = 0;
        foreach ($result as $row) {
            $i++;
            if ($update == $row['MaHoSo']) {
                $MHS = $row['MaHoSo'];
                $HoTen = $row['HoTen'];
                $NgaySinh = $row['NgaySinh'];
                $SDT = $row['SDT'];
                $Mail = $row['Email'];
                $CCCD = $row['CCCD'];
                $DiaChi = $row['DiaChi'];
                $TinhTrang = $row['TinhTrangSucKhoe'];
                $KetLuan = $row['GhiChu'];
                if (isset($_POST['btnupdate'])) {
                    $mhs = $_POST['mhs'];
                    $ten = $_POST['ten'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $sdt = $_POST['sdt'];
                    $mail = $_POST['mail'];
                    $cccd = $_POST['cccd'];
                    $diachi = $_POST['diachi'];
                    $tinhtrang = $_POST['tinhtrang'];
                    $ketluan = $_POST['ketluan'];
                    if (!preg_match("/^[[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{1,}$/", $ten)) {
                        echo '<script>alert("Nhập sai tên");</script>';
                        break;
                    }
                    if (!preg_match("/^[0]{1}[9|3|7]{1}[0-9]{8}$/", $sdt)) {
                        echo '<script>alert("Nhập sai số điện thoại");</script>';
                        break;
                    }
                    if (!preg_match("/^[a-zA-Z0-9]{0,50}[@][a-z]{3,7}[.][a-z]{3}$/", $mail)) {
                        echo '<script>alert("Nhập sai email");</script>';
                        break;
                    }
                    if (!preg_match("/^[0][0-9]{11}$/", $cccd)) {
                        echo '<script>alert("Nhập sai số căn cước");</script>';
                        break;
                    }
                    if (!preg_match("/^[0-9\/]{1,}+,+[0-9A-Za-z.ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s,]{2,}$/", $diachi)) {
                        echo '<script>alert("Nhập sai địa chỉ");</script>';
                        break;
                    }
                    try {
                        $conn = connect();
                        $sql = updatePatient($ten, $ngaysinh, $sdt, $mail, $cccd, $diachi, $tinhtrang, $ketluan, $mhs);
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        echo "<script>alert('Cập nhật thành công')</script>";
                        echo header('refresh:0');
                    } catch (PDOException $e) {
                        echo $sql . "</br>" . $e->getMessage();
                    }
                    $conn = NULL;
                }
            }
        }
        include './View/UpdatePatient.php';
    } else if (isset($_GET['add'])) {
        $add = $_GET['add'];
        $sql = thongke_Addinfo();
        $result = getlist($sql);
        $i = 0;
        foreach ($result as $row) {
            $i++;
            if ($add == $row['MaTaiKhoan']) {
                $MTK = $row['MaTaiKhoan'];
                $TEN = $row['HoTen'];
                $TINHTRANG = gettinhtrang($MTK);
                if ($TINHTRANG) {
                    $date = getdate();
                    $day = $date['mday'];
                    $month = $date['mon'];
                    $year = $date['year'];
                    $time = "$year-$month-$day";
                    if (isset($_POST['btnadd'])) {
                        $mtk = $MTK;
                        $ten = $_POST['ten'];
                        $ngay = $_POST['day'];
                        $tinhtrang = $_POST['tinhtrang'];
                        $macs = $_POST['macs'];
                        $mabv = $_POST['mabv'];
                        try {
                            $conn = connect();
                            addMTK($mtk);
                            $sql = add_Patient($ngay, $tinhtrang, $macs, $mabv, $mtk);
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            echo "<script>alert('Thêm thành công')</script>";
                        } catch (PDOException $e) {
                            echo $sql . "</br>" . $e->getMessage();
                        }
                        $conn = NULL;
                    }
                } else {
                    echo "<script>alert('Người dùng chưa khai báo y tế')</script>";
                    echo header('refresh:0; url= index.php?act=quanly');
                    exit;
                }
            }
        }
        include "./View/addInfoPatient.php";
    } elseif (isset($_GET['act'])) {
        # code...
        $act = $_GET['act'];
        switch ($act) {
            case 'tiepnhan':
                include './View/Receivingpatients.php';
                break;
            case 'dkdieutri':
                include "./View/Registerfortreatment.php";
                break;
            case 'yeucau':
                if (isset($_GET['search']) && ($_GET['search'])) {
                    if (isset($_GET['txttimkiem']) && $_GET['txttimkiem'] != NULL) {
                        $search = join_bang($_GET['txttimkiem']);
                        if ($search != 0) {
                            $Requestahospitaltransfer = requestbenhvien();
                            if (isset($_REQUEST['txttang'])) {
                                $tenbv = requesttenbv($_REQUEST['txttang']);
                            }
                            include "./View/Requestahospitaltransfer.php";
                        } else {
                            echo '<script>alert("Mã hồ sơ không tồn tại")</script>';
                            header('refresh:0; url="index.php?act=timkiem"');
                        }
                    } else {
                        echo "<script>alert('Vui lòng nhập mã hồ sơ')</script>";
                        include "./View/patientrecordsearch.php";
                    }
                    break;
                }
            case 'btnguiyeucau':
                if (isset($_REQUEST['btnguiyeucau'])) {
                    $mahoso = $_REQUEST['txtmahoso'];
                    $date = $_REQUEST['txtdate'];
                    $mucdo = $_REQUEST['txtmucdo'];
                    $mtk = $_REQUEST['txtmatk'];
                    $mabenhvien = $_REQUEST['txttenbv'];
                    $result = add_yeucau($date, $mucdo, $mtk, $mahoso, $mabenhvien);
                    echo '<script>alert("Gửi yêu cầu thành công");</script>';
                    include './View/patientrecordsearch.php';
                    break;
                }
            case 'timkiem':
                if (isset($_POST['search']) && ($_POST['search'])) {
                    if (isset($_POST['txttimkiem']) && $_POST['txttimkiem'] != 0) {
                        $search = Search($_POST['txttimkiem']);
                        include './View/Requestahospitaltransfer.php';
                    } else {
                        echo "andia";
                        // echo header('refresh:0; url="index.php?act=timkiem"');
                        // include './View/patientrecordsearch.php';
                    }
                    // break;
                } else {
                    include './View/patientrecordsearch.php';
                    // break;
                }
                break;

                // case 'add':
                //     if(isset($_POST['btnguiyeucau']))
                //     {
                //         $mahoso=$_POST['txtmahoso'];
                //         $date=$_POST['txtdate'];
                //         $mucdo=$_POST['txtmucdo'];
                //         $result=add_yeucau($mahoso,$date,$mucdo);
                //     }
            case 'chuyenvien':
                include "./View/Requestahospitaltransfer.php";
                break;
            case 'dkdieutri':
                include "./View/Registerfortreatment.php";
                break;
            case 'yeucau':
                include "./View/Requestahospitaltransfer.php";
                break;
            case 'capnhatttb':
                include "./View/UpdateHealth.php";
                break;
            case 'tracuu':

                if (isset($_POST['search']) && ($_POST['search'])) {
                    $search = Search($_POST['txtTimKiem']);
                    include './View/Search.php';
                    break;
                    // $search = $_POST['txtTimKiem'];
                    // $row = Search($search) -> fetchColumn();
                    // if ($search == 0 ) {
                    //     # code...
                    //     $txt_err_lg = "Không tìm thấy mã hồ sơ !!!!!!";
                    // } else{
                    // }
                } else {
                    include './View/Search.php';
                    break;
                }
            case 'logout':
                if (isset($_SESSION['HospitalEmployee'])) unset($_SESSION['HospitalEmployee']);
                header('location: ../../Controller/index.php?act=logout');
                break;
            case 'quanly':
                $sql = thongke_full();
                $sqladd = thongke_Addinfo();
                if (isset($_POST['btnupdate'])) {
                    include "./View/PatientManagement.php";
                } else if (isset($_POST['btnadd'])) {
                    include "./View/AddPatientManagement.php";
                } else include './View/AddorUpdate.php';
                break;
            default:
                include "./View/Home.php";
        }
    } else {
        include "./View/Home.php";
    }

    include "../HospitalEmployee/View/Footer.php";
} else {
    # code...
    header('location: ../../Controller/index.php?act=login');
}
?>