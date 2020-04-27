<?php
    // ตรวจสอบว่าล็อกอินแล้วรึยัง ถ้าไม่ ห้ามเข้า backend
	session_start();

	if(isset($_SESSION['login'])) { //isset เอาไว้ดูว่าตัวแปรนั้นถูกสร้างขึ้นมารึยัง วิธีการใช้ isset(ตัวแปรที่เราจะดูว่าถูกสร้างขึ้นมารึยัง)
        //ถูกสร้างขึ้นมาแล้ว = ล็อกอินแล้ว = ให้เข้า backend ได้
	}
	else {
        //ยังไม่ได้เข้าระบบ ห้ามเข้า backend
		header("location:login.php?login=1");
    }
    
    /*
1. ล็อกอิน กรอกusername/password
2. ถ้าล็อกอินผ่าน แอป จะสร้างตัวแปรขึ้นมา ชื่อว่า $_SESSION['login']
3. ถ้าจะดูว่า คนที่เข้าแอปเราล็อกอินรึยัง ให้ดูจาก $_SESSION['login']*/
?>