<?php

include_once "base.php";

$id=$_GET['id'];

//找出檔案路徑並刪除
$row=find('upload',$id);
$path=$row['path'];
unlink($path);

//刪資料表的紀錄
del('upload',$id);

to('manage.php');


?>