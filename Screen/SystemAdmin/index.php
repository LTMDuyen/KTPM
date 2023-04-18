<!-- <div> nhân viên y tế phường</div> -->
<?php
session_start();
if (isset($_SESSION['systemAdmin'])) {
    # code...
    include "../../Model/index.php";
    include "../SystemAdmin/View/Header.php";
    // include "../../Controller/index.php";
    if (isset($_GET['update'])) {
        $update = $_GET['update'];
        $sql = thongkenhanvien();
        $result = getlist($sql);
        $i = 0;
        foreach ($result as $row) {
            $i++;
            if ($update == $row['MaTaiKhoan']) {
                $id = $row['MaTaiKhoan'];
                $name = $row['HoTen'];
                $role = $row['Role'];

                if (isset($_POST['btngrant'])) {
                    $role = $_POST['role'];

                    try {
                        $conn = connect();
                        $sql = grant($id, $role);
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        echo "<script>alert('Phân Quyền Thành Công')</script>";
                        echo header("refresh:0");
                    } catch (PDOException $e) {
                        echo $sql . "</br>" . $e->getMessage();
                    }
                    $conn = null;
                }
            }
        }


        include './View/Grant.php';
    } elseif (isset($_GET['act'])) {
        # code...
        $act = $_GET['act'];
        switch ($act) {
            case 'phanquyen':
                $sql = thongkenhanvien();
                include './View/Decentralization.php';
                break;
            case 'logout':
                if (isset($_SESSION['systemAdmin'])) unset($_SESSION['systemAdmin']);
                header('location: ../../Controller/index.php?act=logout');
                break;
            case 'xemthongke':
                $sql=thongke_full();
                if(isset($_POST['btntk'])){
                    if($_POST['fday'] && $_POST['tday']){
                        $fday=$_POST["fday"];
                        $tday=$_POST["tday"];
                        if(strtotime($fday)>strtotime($tday)){
                            echo "<script>alert('Khoảng thời gian sai')</script>";
                        }
                    }
                    if($_POST['fday'] && $_POST['tday'] && !isset($_POST['thongke'])){
                        $fday=$_POST["fday"];
                        $tday=$_POST["tday"];
                        $sql=thongke_time($fday,$tday);
                    }
                    if(isset($_POST['thongke'])){
                        $thongke=$_POST["thongke"];
                        $sql=thongke_status($thongke);
                    }
                    if($_POST['fday'] && $_POST['tday'] && isset($_POST['thongke'])){
                        $fday=$_POST["fday"];
                        $tday=$_POST["tday"];
                        $thongke=$_POST["thongke"];
                        $sql=thongke_time_status($fday,$tday,$thongke);
                    }
                    
                }
                include '../SystemAdmin/View/Statistical.php';
                break;          
            default:
                include "../SystemAdmin/View/Home.php";
                break;
        }
    } else {
        include "../../view/components/Home.php";
    }

    include "../SystemAdmin/View/Footer.php";
} else {
    # code...
    header('location: ../../Controller/index.php?act=login');
}
?>