             <style>
             td a{
              color:black;
              }
              th{
                text-transform: uppercase;
              }

              </style>
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
   $table = $_GET['table'];
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
    echo "<td><a href=view.php?s=$tab$k>".$row[''.$a.'']."</a></td>";
    $i++;
}
}
$k++;
$end = 8 - $i;
for($j=0;$j<$end;$j++){
    echo '<td>--</td>';
}
 echo'</tr>'; 
}
echo"</table><div class='buttons'><button><a href='all_col.php?table=a'><img src='".$url."/img/poziom_a.png'></a></button>
<button><a href='all_col.php?table=b'><img src='".$url."/img/poziom_b.png'></a></button>
<button><a href='all_col.php?table=c'><img src='".$url."/img/poziom_c.png'></a></button>
<button><a href='all_col.php?table=d'><img src='".$url."/img/poziom_d.png'></a></button></div>";
?>

</body>
</html>  
