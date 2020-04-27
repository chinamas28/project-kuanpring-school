<?php
    $isadmin = false;

	if(isset($_SESSION['typeid'])) { //isset เอาไว้ดูว่าตัวแปรนั้นถูกสร้างขึ้นมารึยัง วิธีการใช้ isset(ตัวแปรที่เราจะดูว่าถูกสร้างขึ้นมารึยัง)
        if($_SESSION['typeid'] == 1) {
            $isadmin = true;
        }
    }
	else {
		$isadmin = false;
    }
    

?>
