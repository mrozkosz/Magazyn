<?php
$login = $_POST['login'];
$password_old = $_POST['password_old'];
$password_new = $_POST['password_new'];
$password_old_md5 = md5($password_old);
$password_new_md5 = md5($password_new);
$sql_1 = $conn->query("SELECT * FROM user WHERE login = '$login'");
if ($row = mysqli_fetch_assoc($sql_1)){
	$loginn = $row['login'];
	$passwordd = $row['password'];
}
if(($login == $loginn)and ($passwordd == $password_old_md5)){
$sql = $conn->query("UPDATE user
SET login='$login', password='$password_new_md5'
WHERE password='$password_old_md5' and login='$login';");
header("location:index.php");
}else{
	echo 'Błędny login lub hasło';
}
?>