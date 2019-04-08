<?php
ob_start();
   require_once('module/function.php');
   $obiekt = new obiekt;
  

    $host = $obiekt->host();
  $themes = $obiekt->load("theme", "settings");
   $w = $obiekt->load("view", "settings");
  $conn = $obiekt->connect();
  $url = $obiekt->host().'/themes/'.$themes;


  require_once("themes/".$themes."/admin_zmien_haslo.php");

  

ob_end_flush();
?>