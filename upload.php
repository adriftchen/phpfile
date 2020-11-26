<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */
date_default_timezone_set(Asia/Taipei);

if(!empty($_FILES['img']['tmp_name'])){
    echo "檔案原始名稱:".$_FILES['img']['name'];
    echo "<br>檔案上傳成功";
    echo "原始上傳路徑:".$_FILES['img']['tmp_name'];

    $subname="";
    $subname=explode('.',$_FILES['img']['name']);
    echo $subname=array_pop($subname);

    //改用上面$subname抓副檔名
    // switch($_FILES['file']['type']){
    //     case "image/jpeg":
    //         $subname=".jpg";
    //     break;
    //     case "image/png":
    //         $subname=".png";
    //     break;
    //     case "image/gif":
    //         $subname=".gif";
    //     break;
    // }

    $filename=date("Ymdhis").".".$subname ; /* 自定義檔名，不會重複 */

    move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);
    // $_FILES['img']['name'] 改成自定義$filename
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
<form action="?" method="post" enctype="multipart/form-data"> <!-- form上傳用post，可上傳的檔案較大-->
<input type="file" name="img">
<input type="submit" value="上傳">
</form>




<!----建立一個連結來查看上傳後的圖檔---->  


</body>
</html>