<?php
ob_start();
   require_once('module/function.php');
   $obiekt = new obiekt;
    if(isset($_SESSION['admin']) and $_SESSION['admin'] == 1 or $_SESSION['admin'] == 2){
  $host = $obiekt->host();
  $themes = $obiekt->load("theme", "settings");
    $w = $obiekt->load("view", "settings");
  
  $conn = $obiekt->connect();
  $url = $obiekt->host().'/themes/'.$themes;

$tool_1 = $_POST['tool_1'];
$tool_2 = $_POST['tool_2'];
$tool_3 = $_POST['tool_3'];
$tool_4 = $_POST['tool_4'];
$tool_5 = $_POST['tool_5'];
$tool_6 = $_POST['tool_6'];
$tool_7 = $_POST['tool_7'];
$tool_8 = $_POST['tool_8'];

$name_1 = $_POST['name_1'];
$name_2 = $_POST['name_2'];
$name_3 = $_POST['name_3'];
$name_4 = $_POST['name_4'];
$name_5 = $_POST['name_5'];
$name_6 = $_POST['name_6'];
$name_7 = $_POST['name_7'];
$name_8 = $_POST['name_8'];
$table = $_GET['table'];

$save_1 = $conn->query("UPDATE `magazyn` SET `1`='$name_1',`2`='$name_2',`3`='$name_3',`4`='$name_4',`5`='$name_5',`6`='$name_6',`7`='$name_7', `8`='$name_8' WHERE `symbol`='$table'");


if($tool_1 == !null){
$save_2 = $conn->query("UPDATE `magazyn` SET `1`='$tool_1' WHERE `symbol`='$table'");
}
if($tool_2 == !null){
$save_3 = $conn->query("UPDATE `magazyn` SET `2`='$tool_2'WHERE `symbol`='$table'");
}
if($tool_3 == !null){
$save_4 = $conn->query("UPDATE `magazyn` SET `3`='$tool_3' WHERE `symbol`='$table'");
}
if($tool_4 == !null){
$save_5 = $conn->query("UPDATE `magazyn` SET `4`='$tool_4' WHERE `symbol`='$table'");
}
if($tool_5 == !null){
$save_6 = $conn->query("UPDATE `magazyn` SET `5`='$tool_5' WHERE `symbol`='$table'");
}
if($tool_6 == !null){
$save_7 = $conn->query("UPDATE `magazyn` SET `6`='$tool_6' WHERE `symbol`='$table'");
}
if($tool_7 == !null){
$save_8 = $conn->query("UPDATE `magazyn` SET `7`='$tool_7' WHERE `symbol`='$table'");
}
if($tool_8 == !null){
$save_9 = $conn->query("UPDATE `magazyn` SET `8`='$tool_8' WHERE `symbol`='$table'");
}

header("location:view.php?s=$table");
}else{
header("location:index.php");
}
?>

