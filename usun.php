<?php
ob_start();
   require_once('module/function.php');
   $obiekt = new obiekt;
    if(isset($_SESSION['admin']) and $_SESSION['admin'] == 1 or $_SESSION['admin'] == 2){
  $host = $obiekt->host();
  $themes = $obiekt->load("theme", "settings");
    $w = $obiekt->load("view", "settings");
  $admin = $obiekt->isAdmin();
  $conn = $obiekt->connect();
  $url = $obiekt->host().'/themes/'.$themes;
if(isset($_GET['k']) and isset($_GET['s'])){
$k = $_GET['k'];
$s = $_GET['s'];
$sql = $conn->query("UPDATE `magazyn` SET `$k`='' WHERE `symbol` = '$s' ");

}


header("location:view.php?s=$s");
}else{
header("location:index.php");
}
?>

