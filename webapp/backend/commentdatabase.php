<?php
    session_start();
    require("../connect.php");

    $postid = $_POST['myPost'];
    $comment = $_POST['myComment'];
    $userid = $_SESSION['userid'];

    $sql = "INSERT INTO comment(userid, datecomment, comment, postid)
            VALUES('$userid', NOW(),'$comment', '$postid')";
    $result = mysqli_query($link,$sql);

    if(!$result) { // เช็คว่า result มีปัญหาไหม
        // บันทึกไม่สำเร็จ
        header("location:viewpost.php?postid=".$postid);
    }
    else {
        // บันทึกสำเร็จ
        header("location:viewpost.php?postid=".$postid);
    }
?>