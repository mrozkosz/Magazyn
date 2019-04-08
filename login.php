<?php
require_once('module/function.php');
$obiekt = new obiekt;
$conn = $obiekt->connect();
if(isset($_POST['login']) and isset( $_POST['password'])){
$_SESSION['login'] = $_POST['login'];
    $password  = $_POST['password'];
    $pass = md5($password);
    	$query = $conn->query("SELECT * FROM `user` WHERE `login`='".$_SESSION['login']."' AND `password`='".$pass."'");
				if($query == false){ return 0;
				}else{
					while($row = mysqli_fetch_array($query)){
						if($_SESSION['user'] == $row['user'] and $pass == $row['password']){
							 $_SESSION['admin'] = $row['admin'];
							$_SESSION['login'] = $row['login'];
							$_SESSION['name'] = $row['name'];
							$_SESSION['surname'] = $row['surname'];
							
						}
					}
				} 


}
 if(isset($_POST['login']) and $_SESSION['admin'] == 1 or $_SESSION['admin'] == 2){
      header("location:view.php");
    }else{
      header("location:index.php");	
    }
?>