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

//用do傳值，且按下download才繼續去撈資料
if(!empty($_GET['do']) && $_GET['do']=='download'){
    $rows=all("students");
    $file=fopen('download.csv',"w+"); /* w+可讀可寫 */
    //寫入BOM檔頭，解決excel亂碼問題。要寫在foreach之前
    $utf8_with_bom = chr(239) . chr(187) .chr(191);
    fwrite($file,$utf8_with_bom);
    foreach($rows as $row){
        $line=implode(',',[$row['id'],$row['name'],$row['age'],$row['birthday'],$row['addr']]);  /* echo 出來因預設有索引值與key值資料會重複兩筆，用陣列再把陣列包起來，只剩一筆 */
        fwrite($file,$line); /* 在網頁按下載，執行成功目錄會多一個 download.csv檔(亂碼)*/
        echo $line . "-已寫入<br>";
    }
    fclose($file);

    $filename="download.csv"; /* 下載成功才會有這個檔 */
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>資料表內容匯出</title>
    <link rel="stylesheet" href="style.css">
    <style>
    table{
        width:50%;
        border-collapse:collapse;
        text-align:center;
        box-shadow:0 0 5px #999;
        margin:auto;
    }
    table td{
        padding:5px 10px;
        border:1px solid #999;
    }
    .download{
        display:block;
        width:100px;
        padding:5px 10px;
        border-radius:20px;
        box-shadow:0 0 5px #ccc;
        margin:10px auto;
        text-align:center;

    }
    </style>
</head>
<body>
<h1 class="header">資料表內容匯出練習</h1>
<!----讀出匯入完成的資料----->
<?php

$rows=all('students');

if(isset($filename)){
?>
<a href='download.csv' download>可以下載了!!</a>
<?php
}
?>
<table>
    <tr>
        <td>姓名</td>
        <td>年齡</td>
        <td>生日</td>
        <td>居住地</td>
    </tr>
    <?php

    foreach($rows as $row){

    ?>
    <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['age']?></td>
        <td><?=$row['birthday']?></td>
        <td><?=$row['addr']?></td>
    </tr>
    <?php
    }
    ?>
</table>
<!-- 按下下載網頁會傳get值，網址後帶?do=download -->
<a href="?do=download" class='download'>下載</a>
</body>
</html>