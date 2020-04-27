<?php
    session_start();
    require("../connect.php");

    $type = $_POST['myType'];
    $firstname = $_POST['myFirstname'];
    $lastname = $_POST['myLastname'];
    $username = $_POST['myUsername'];
    $password = $_POST['myPassword'];
    $email = $_POST['myEmail'];
    $line = $_POST['myLine'];

    $sql = "INSERT INTO user(studentid, username, password, email, firstname, lastname, lineuserid, typeid)
            VALUES('0','$username','$password','$email','$firstname','$lastname','$line','$type')";
    $result = mysqli_query($link,$sql);

    if(!$result) { // เช็คว่า result มีปัญหาไหม
        // บันทึกไม่สำเร็จ
        header("location:memberview.php?status=0");
    }
    else {
        // บันทึกสำเร็จ
        header("location:memberview.php?status=1");
    }
?>