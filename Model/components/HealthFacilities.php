<?php
    function get_csyt()
    {
       $query = "SELECT *
                FROM csytp";
        return getlist($query);
    }
    function thongtin($tencsyt)
    {
        $query= "SELECT * FROM csytp WHERE TenCSYT=$tencsyt";
        return getone($query);
    }
    function add_dangky($date, $mucdo)
    {
        $sql = "INSERT INTO `hosobenhnhan` (`NgayYeuCau`,`Tinh`) VALUES ('$date', '$mucdo')";
        return addsql($sql);
        
    }
?>
