
             <style>
             td a{
              color:black;
              }
              th{
                text-transform: uppercase;
              }
              #info{
                margin-left: 25px;
                font-size: 20px;
              }
              #info a{
                text-transform: uppercase;
              }
              #info a:hover{
                text-transform: uppercase;
                color:red;
              }
              </style>
              <?php
if(isset($_POST['szukaj'])){
  $szukaj = $_POST['szukaj'];
  $i = 0;
}else{
  $i = 1;
}
switch ($i) {
  case 0:
$sql = $conn->query("SELECT symbol FROM magazyn WHERE `1` LIKE '$szukaj' or `2` like '$szukaj' or `3` like '$szukaj' or `4` like '$szukaj' or `5` like '$szukaj' or `6` like '$szukaj' or `7` like '$szukaj' or `8` like '$szukaj'");
echo "<br><div id='info'>Narzędzie, które szukasz znaleziono na regale:";
while($row = mysqli_fetch_array($sql)){
  if($row['symbol'] == true){
    $table = $row['symbol'];
  }
  echo " <a href='search.php?table=$table&szukaj=$szukaj'><font color=black>".$table."</font></a>, ";
}
 break;
  case 1:
  if(isset($_GET['szukaj']) and isset($_GET['table'])){
    $szukaj = $_GET['szukaj'];
    $table = $_GET['table'];
$sql = $conn->query("SELECT symbol FROM magazyn WHERE `1` LIKE '$szukaj' or `2` like '$szukaj' or `3` like '$szukaj' or `4` like '$szukaj' or `5` like '$szukaj' or `6` like '$szukaj' or `7` like '$szukaj' or `8` like '$szukaj'");
echo "<br><div id='info'>Nażędzie, które szukasz znaleziono na regale:";
while($row = mysqli_fetch_array($sql)){
  if($row['symbol'] == true){
    $tab = $row['symbol'];
  }
  echo " <a href='search.php?table=$tab&szukaj=$szukaj'><font color=black>".$tab."</font></a>, ";
}
}
  break;  
}
if(isset($table) and $table !== null){
?>
</div>
             <div class="component" style="">
<table class="">
          <thead>
            <tr>
              <th>Magazyn</th>
              <th>1</th><th>2</th><th>3</th><th>4</th>
             <th>5</th><th>6</th><th>7</th><th>8</th>
</tr>
    </thead>
      <tbody>
        
     
<?php

if(strstr($table, "a")!==False){
   $tab = 'a';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a1' or `symbol` LIKE 'a2' or `symbol` LIKE 'a3' or `symbol` LIKE 'a4' or `symbol` LIKE 'a5' or `symbol` LIKE 'a6' or `symbol` LIKE 'a7' or `symbol` LIKE 'a8' ");
}
if(strstr($table, "b")!==False){
   $tab = 'b';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'b1' or `symbol` LIKE 'b2' or `symbol` LIKE 'b3' or `symbol` LIKE 'b4' or `symbol` LIKE 'b5' or `symbol` LIKE 'b6' or `symbol` LIKE 'b7' or `symbol` LIKE 'b8' ");
}
if(strstr($table, "c")!==False){
   $tab = 'c';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'c1' or `symbol` LIKE 'c2' or `symbol` LIKE 'c3' or `symbol` LIKE 'c4' or `symbol` LIKE 'c5' or `symbol` LIKE 'c6' or `symbol` LIKE 'c7' or `symbol` LIKE 'c8' ");
}
if(strstr($table, "d")!==False){
   $tab = 'd';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'd1' or `symbol` LIKE 'd2' or `symbol` LIKE 'd3' or `symbol` LIKE 'd4' or `symbol` LIKE 'd5' or `symbol` LIKE 'd6' or `symbol` LIKE 'd7' or `symbol` LIKE 'd8' ");
}
$i=0;
$k=1;
while($row = mysqli_fetch_array($sql)){
  echo "<tr><th><a href='view.php?s=$tab$k' ><div class='table'>$tab$k </div></a></th>"; 
  for($a=1;$a<=8;$a++){
           if($row[''.$a.''] == true){
            $i++;
            if($row[''.$a.''] == "$szukaj"){
    echo "<td><a href=view.php?s=$tab$k><font color='red'>".$row[''.$a.'']."</font></a></td>";
    
}else{
  echo "<td><a href=view.php?s=$tab$k>".$row[''.$a.'']."</a></td>";
}
}
}
$k++;
$end = 8 - $i;
for($j=0;$j<$end;$j++){
    echo '<td>--</td>';
}
 echo'</tr>'; 
}
}else{
  echo "<br>Brak wyników wyszukiwania";
}
?>
</table>

</body>
</html>  