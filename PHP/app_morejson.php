<?php
header('content-type:application/json;charset=utf8');
include_once("mysql.php");

getConnect();
$results = array();
$id = $_GET['id'];
$select = "SELECT username,name ,phone  FROM userinfo natural join application WHERE id=$id";

$result_query=mysql_query($select);

  while ($row = mysql_fetch_assoc($result_query)) {
    $results[] = $row;
  }
  
  if($results){
      echo json_encode($results);
  
  }else{
      echo mysql_error();
  }

  closeConnect();
?>