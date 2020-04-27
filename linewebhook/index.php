<?php
    //token ของ LINE OFFICIAL
    $accessToken = "xxxxxxxxxx"; //copy Channel access token
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    $id = $arrayJson['events'][0]['source']['userId'];
    
    require("connect.php");

    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    #ตัวอย่าง Message Type "Text"
    if($message == "สวัสดีครับ" || $message == "สวัสดีค่ะ"){ 
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "ข่าวสารล่าสุด"){ 

        $sql = "SELECT newsid, topic,CONCAT(SUBSTRING(content,1,90),'...') AS content, imagename FROM news WHERE newstypeid = 1 ORDER BY datenews DESC LIMIT 3";
        $result = mysqli_query($link, $sql);

        $str = "💬 ข่าวสารล่าสุดมีดังนี้\n\n";

        while($data = mysqli_fetch_array($result)) {
           
            $str = $str."👉🏻".$data['topic']."\n";
            $str = $str."https://beedev.in.th/school/readnews.php?newsid=".$data['newsid']."\n\n";

        }

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $str;
        replyMsg($arrayHeader,$arrayPostData);

    }
    else if($message == "ประกาศล่าสุด"){ 
       
        $sql = "SELECT newsid, topic,CONCAT(SUBSTRING(content,1,90),'...') AS content, imagename FROM news WHERE newstypeid = 2 ORDER BY datenews DESC LIMIT 3";
        $result = mysqli_query($link, $sql);

        $str = "🔊 ประกาศล่าสุดมีดังนี้\n\n";

        while($data = mysqli_fetch_array($result)) {
           
            $str = $str."👉🏻".$data['topic']."\n";
            $str = $str."https://beedev.in.th/school/readnews.php?newsid=".$data['newsid']."\n\n";

        }

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $str;
        replyMsg($arrayHeader,$arrayPostData);

    }
    else if($message == "เว็บบอร์ด"){ 
        
        $sql = "SELECT postid, topic,CONCAT(SUBSTRING(content,1,90),'...') AS content, firstname FROM webboard LEFT JOIN user ON webboard.userid = user.userid ORDER BY datepost DESC LIMIT 3";
        $result = mysqli_query($link, $sql);

        $str = "❓ กระทู้ล่าสุดมีดังนี้\n\n";

        while($data = mysqli_fetch_array($result)) {
           
            $str = $str."👉🏻".$data['topic']."\n";
            $str = $str."https://beedev.in.th/school/backend/viewpost.php?postid=".$data['postid']."\n\n";

        }

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $str;
        replyMsg($arrayHeader,$arrayPostData);

    }

function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }

    function pushMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/push";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
     }

   exit;
?>
