<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Magazyn</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/component.css" />
  </head>
  <body>
    <style>
        h1 {
            font-size: 15px;
            color: #111;
        }

        .content {
            width: 100%;
            margin: 0 auto;
            margin-top: 0px;
        }

        .ui-helper-hidden-accessible{
        display: none;
        }
        .ui-menu {
         
            
            font-size: 15px;
            height: 24px;
            line-height: 30px;
            outline: medium none;
            padding: 6px 12px;
            width: 250px;
        }
        li,
        .tt-dropdown-menu {
            float: left;
            width: 250px;
            margin-top: 5px;
            padding: 0px 2px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 15px;
            color: #111;
            background-color: #D1D1D1;
            z-index: 1000;
            list-style-type: none;
        }
    #table{
          text-transform:uppercase;
    }
    .table_name{
      text-transform:uppercase;
    }
    a.url{
      font-size: 25px;
      color:black;
    }
    a{
      text-decoration: none;
      color: white;
    }
    a:hover{
      color:#ed4242;
    }
    .lista{
      width: 100px;
    }
    button{
      background: none;
      border:none;
      
    }
    .number{
        color: red;
    }
    input[type=text]{
      width: 80%;
    }
    #szukaj{
      position: absolute;
      right: 0;
      margin-right: 50px;
      margin-top: -15px;
    }
    #admin{
      left: 0;
      margin-left: 15px;
      margin-top: 10px;
    }
    </style>
    <div id="admin">
<?php
echo "<a href=\"logout.php\" style='color:red;'>  wyloguj </a>";
  echo "| zalogowałeś się jako <b>".$_SESSION["login"]."</b> |";
  
  if($_SESSION['admin'] == 1){
    echo'<a href="admin.php" style="color:black;"> Panel Administracyjny</a>';
  }
?>
</div>
<div id='szukaj'>
<form method='POST' action='search.php'> 
<input type="search" id="txtSearch_9" name="szukaj" class="city" placeholder="szukaj..." >
<input type="submit" value="Szukaj"></form>
</div>