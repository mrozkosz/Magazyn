
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
echo $table;
if(strstr($table, "1")!==False){
   $tab = '1';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a1' or `symbol` LIKE 'b1' or `symbol` LIKE 'c1' or `symbol` LIKE 'd1' ");
}
if(strstr($table, "2")!==False){
   $tab = '2';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a2' or `symbol` LIKE 'b2' or `symbol` LIKE 'c2' or `symbol` LIKE 'd2' ");
}
if(strstr($table, "3")!==False){
   $tab = '3';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a3' or `symbol` LIKE 'b3' or `symbol` LIKE 'c3' or `symbol` LIKE 'd3' ");
}
if(strstr($table, "4")!==False){
   $tab = '4';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a4' or `symbol` LIKE 'b4' or `symbol` LIKE 'c4' or `symbol` LIKE 'd4' ");
}
if(strstr($table, "5")!==False){
   $tab = '5';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a5' or `symbol` LIKE 'b5' or `symbol` LIKE 'c5' or `symbol` LIKE 'd5' ");
}
if(strstr($table, "6")!==False){
   $tab = '6';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a6' or `symbol` LIKE 'b6' or `symbol` LIKE 'c6' or `symbol` LIKE 'd6' ");
}
if(strstr($table, "7")!==False){
   $tab = '7';
   $sql = $conn->query("SELECT * FROM `magazyn` WHERE `symbol` LIKE 'a7' or `symbol` LIKE 'b7' or `symbol` LIKE 'c7' or `symbol` LIKE 'd7' ");
}
$i=0;
$k=1;
while($row = mysqli_fetch_array($sql)){
  echo "<tr><th><a href='view.php?s=".$row['symbol']."' ><div class='table'>".$row['symbol']."</div></a></th>"; 
  for($a=1;$a<=8;$a++){
           if($row[''.$a.''] == true){
           	$i++;
           	if($row[''.$a.''] == "$szukaj"){
    echo "<td><a href=view.php?s=".$row['symbol']."><font color='red'>".$row[''.$a.'']."</font></a></td>";
    
}else{
	echo "<td><a href=view.php?s=".$row['symbol'].">".$row[''.$a.'']."</a></td>";
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