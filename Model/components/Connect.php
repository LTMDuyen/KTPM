<?php
    function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=covid1", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    function getlist($sql){
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function getone($sql){
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
    function execsql($sql,$chk){
        $conn = connect();
        if($chk==1){
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }else{
            $conn->exec($sql);
        }
    }
    function addsql($sql){
        $conn = connect();
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;
    }

    
   
?>