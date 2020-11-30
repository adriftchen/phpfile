<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */
include_once "base.php";

//若有上傳成功，就搬到upload這個資料夾下
if(!empty($_FILES['txt']['tmp_name'])){
    echo $_FILES['txt']['name'];
    move_uploaded_file($_FILES['txt']['tmp_name'],"./upload/".$_FILES['txt']['name']);

    //上傳純文字檔，並且打算將檔案內容匯入資料庫或另作處理時，需要透過一些檔案專用的指令來取得內容並加以處理
    $file=fopen("./upload/".$_FILES['txt']['name'],'r'); //r:只讀取、w:可改寫
    
    $num=0; /* 把表頭(第一行文字部分)去掉 不存入表單 */
    while(!feof($file)){
        $line=fgets($file); /* 這行拿到if外面來，指針才會從第二行開始取 */
        if($num!=0){
            $line=explode(",",$line); /* 改為陣列 */
            $data=[
                'name'=>$line[1],
                'age'=>$line[2],
                'birthday'=>$line[3],
                'addr'=>$line[4],
                ];
            save('students',$data);
        }
        $num++;
    }
}

fclose($file); /* 要關掉不然之後其他人無法開啟這個檔案 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->
<form action="?" method="post" enctype="multipart/form-data" style="width:300px;margin:auto">
<input type="file" name="txt">
<input type="submit" value="上傳">
</form>



<!----讀出匯入完成的資料----->



</body>
</html>