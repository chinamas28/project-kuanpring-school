<?php
    // ตรวจสอบการล็อกอินเข้าสู่ระบบ
    session_start(); //ต้องอยู่บรรทัดบนสุดเท่านั้น

    $username = $_POST["myUsername"];
    $password = $_POST["myPassword"];
    $postid = $_POST['postid'];

    require("../connect.php");

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password';";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_array($result);

    $row = mysqli_num_rows($result); //ข้อมูล return ออกมากี่รายการ

    if($row == 0) {
        //login ผิด == ไม่เจอ user ที่กรอกมา ไม่ให้เข้าระบบ
        header("location:login.php?login=0"); //เปลี่ยนหน้าเว็บ เพราะล็อกอินไม่ถูก (login=0)
    }
    else if($row == 1) { 
        //เข้าระบบได้ กรอก username/password ถูกต้อง
        // เก็บข้อมูลของคนที่ล็อกอินเข้าไปใน session

        $_SESSION['login']  = true;  //ไปเช็คว่าให้เข้าระบบได้หรือไม่
        $_SESSION['user']   = $username;
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['firstname'] = $data['firstname'];
        $_SESSION['lastname'] = $data['lastname'];
        $_SESSION['typeid'] = $data['typeid'];


        if($postid != 'null') { //isset มีไว้ตรวจสอบว่ามีการส่งค่า postid มา
            header("location:viewpost.php?postid=".$postid);
        }
        else {
            header("location:index.php");
        }
    }


?>