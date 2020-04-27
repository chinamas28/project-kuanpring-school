<?php
    session_start();
    require("../connect.php");

    $type = $_POST['myType'];
    $topic = $_POST['myTopic'];
    $content = $_POST['myContent'];
    $userid = $_SESSION['userid'];

    ///////////////////////////////////////////////////////////////

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $target_dir = "uploads/"; //จะอัพโหลดไฟล์ไปวางที่ไหน
    $target_file = $target_dir . basename($_FILES["myFile"]["name"]); //ไฟล์ที่อัพโหลดจะชื่ออะไร
    $uploadOk = 1; //สถานะเช็คว่าอัพโหลดผ่านไหม ให้เริ่มที่ 1 ซึ่งก็คือผ่านไว้ก่อน
    $imageFileName = strtolower(pathinfo(basename($_FILES["myFile"]["name"]),PATHINFO_FILENAME)); //ชื่อไฟล์ไม่เอานามสกุล
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //เก็บนามสกุลไฟล์
    $target_file = $target_dir . $imageFilename . generateRandomString() . '.' .$imageFileType;

    // เช็คว่าไฟล์ที่อัพโหลดมาเป็นไฟล์รูปจริงไหม โดยใช้คำสั่ง getimagesize
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["myFile"]["tmp_name"]);
        
        // == เท่ากันสองข้าง
        // !== สองข้างไม่เท่ากัน
        if($check !== false) { //ถ้าค่า returnออกมา ไม่เป็นค่า (!== ไม่เท่ากับ) false แสดงว่าเป็นไฟล์รูปจริง
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // เช็คดูว่าชื่อไฟล์ซ้ำกันบน server ไหม
    if (file_exists($target_file)) { //file_exists = เช็คชื่อไฟล์ซ้ำ
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // เช็คขนาดไฟล์ไม่ให้ใหญ่เกิน เพื่อจะได้ไม่กระทบกับ server
    if ($_FILES["myFile"]["size"] > 10000000) { //เช็คขนาดไฟล์ไม่ให้ใหญ่เกิน 10MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // เช็คนามสกุลไฟล์รูปที่อัพโหลด ไม่ให้นอกเหนือจากที่กำหนด
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // ตรวจสอบว่าค่า uploadOk ไม่ได้เป็น 0 เพราะถ้าเป็น 0 แสดงว่าติดปัญหามาจากเงื่อนไขข้างบน
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["myFile"]["name"]). " has been uploaded."; //อัพโหลดสำเร็จ
        } else {
            echo "Sorry, there was an error uploading your file."; //อัพโหลดไม่สำเร็จ
        }
    }


    ///////////////////////////////////////////////////////////////

    $filename = $target_file;

    $sql = "INSERT INTO news(topic, content, imagename, userid, datenews, newstypeid)
            VALUES('$topic','$content','$filename',$userid,NOW(),$type)";
    $result = mysqli_query($link,$sql);

    if(!$result) { // เช็คว่า result มีปัญหาไหม
        // บันทึกไม่สำเร็จ
        header("location:newsview.php?status=0");
    }
    else {
        // บันทึกสำเร็จ
        header("location:newsview.php?status=1");
    }

?>
