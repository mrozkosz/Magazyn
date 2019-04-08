<?php
    require_once('module/function.php');
    $obiekt = new obiekt;
    $conn = $obiekt->connect();
    
    if (isset($_SESSION['admin']) and $_SESSION['admin'] == 1 or isset($_SESSION['admin']) and $_SESSION['admin'] == 2) {
       header('location:view.php');
    }
    else {
        
        echo "<div id='container'><div id='login'>zaloguj się<form method=\"POST\" action=\"login.php\">
               <input type=\"text\" name=\"login\" placeholder='Login' value='admin' required><br>
               <input type=\"password\" name=\"password\" placeholder='Hasło' value='admin' required><br>
                <button>zaloguj się</button>
              </form></div>";
              echo'<div id="login">Zmień hasło<form method="POST" action="admin_zmien_haslo.php">
               <input type="text" name="login" placeholder="Login" required><br>
               <input type="password" name="password_old" placeholder="Stare hasło" required><br>
               <input type="password" name="password_new" placeholder="Nowe hasło" required><br>
                <button>Zmień</button>
              </form></div></div>';
            
    }
            
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Magazyn</title>
</head>

<style>
#login{
    margin:100px auto;
    width: 320px;
    height: 250px;
    float: left;
    margin-left:200px;
}
form{
    background: #ABCDEF;
    border:solid grey;
}
input{
    font-size: 17px;
    margin-left: 6px;
    width: 295px;
    height: 40px;
    margin-top:10px;
}
button{
    margin:10px;
    width: 100px;
    height: 40px;
    background: white;
    border:none;
    font-size: 17px;
}
button:hover{
    background: #ABBFEF;
    color:white;
    cursor: pointer;
}
a{
    color:black;
    text-decoration: none;
}
a:hover{
    color:white;
}
</style>


</body>
</html>
