<?php
ob_start();
   require_once('module/function.php');
   $obiekt = new obiekt;
  
  if(isset($_SESSION['admin']) and $_SESSION['admin'] == 1 or $_SESSION['admin'] == 2){
  $host = $obiekt->host();
  $themes = $obiekt->load("theme", "settings");
  $w= $obiekt->load("view", "settings");
  $conn = $obiekt->connect();
  $url = $obiekt->host().'/themes/'.$themes;

  require_once("themes/".$themes."/header.php");
  require_once("themes/".$themes."/view.php");
  require_once("themes/".$themes."/footer.php");
}else{
header("location:index.php");       
}

  

ob_end_flush();
?>