<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("82.148.66.15","1208952229","tinnioglisa123");
    $db=mysql_select_db("1208952229_picturebase",$con);
    $query=mysql_query("select * from users where userName LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['userName'];
    }
    echo json_encode($array);
?>
