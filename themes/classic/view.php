            <div class="component" style="">
<table class="">
          <thead>
            <tr>
              <th>Magazyn</th>

<?php
if(isset($_GET['s'])){
    $symbol = $_GET['s'];
}else{
    $symbol = 'a1';
}
$i=0;
$k=0;
$c=0;
$d=1;
$arr = [];
$sql_1 = $conn->query("SELECT * FROM magazyn WHERE symbol = '$symbol'");
$sql = $conn->query("SELECT * FROM magazyn WHERE symbol = '$symbol'");
$sql_2 = $conn->query("SELECT * FROM magazyn WHERE symbol = '$symbol'");
$sql_3 = $conn->query("SELECT * FROM tools ");
$sql_4 = $conn->query("SELECT * FROM tools ");

for ($abc = 0; $abc < ($ile = mysqli_num_rows($sql_4)); $abc++) {
   $fetch = mysqli_fetch_assoc($sql_4);
   foreach ($fetch as $key => $value) {
      $arr[$abc][$key] = $value;
   }
}

while($row_1 = mysqli_fetch_array($sql_1)){
    for($b=1;$b<=8;$b++){
      $eee = $k+1;
           if($row_1[''.$b.''] == true){
    echo '<th><a href="usun.php?k='.$b.'&s='.$symbol.'">Usuń | '.$eee.'</a></th>';
    $k++;
}
}
}
$end_k = 8 - $k;
for($l=0;$l<$end_k;$l++){
    echo '<th><a href="#">Usuń | '.$eee++.'</a></th>';
}
echo"</tr>
    </thead>
      <tbody>
        <tr>
          <th><div id='table'>$symbol</div></th>";
while($row = mysqli_fetch_array($sql)){
    for($a=1;$a<=8;$a++){
           if($row[''.$a.''] == true){
    echo '<td>'.$row[''.$a.''].'</td>';
    $i++;
}
}
}
$end = 8 - $i;
for($j=0;$j<$end;$j++){
    echo '<td>--</td>';
}
echo'<tr>
          <th><div id="table">Sap: </div></th>
          <div class="content">';
        echo"<form action='edit.php?table=$symbol' method='POST'>";
          echo "<td><input id='txtSearch_1' name='tool_1' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_2' name='tool_2' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_3' name='tool_3' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_4' name='tool_4' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_5' name='tool_5' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_6' name='tool_6' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_7' name='tool_7' class='city' type='text' placeholder='' /></td>
          <td><input id='txtSearch_8' name='tool_8' class='city' type='text' placeholder='' /></td>
             
    </div></tr>";
echo "<tr><th>TOOLS: </th>";
  
  

   while($row_1 = mysqli_fetch_array($sql_2)){
    for($b=1;$b<9;$b++){
           if($row_1[''.$b.''] == true){
    echo "<td><select class='lista' name='name_$d'>";
     echo"<option>".$row_1[''.$b.'']."</option>";
        for($cba=0;$cba<=$ile;$cba++){       
     echo"<option>".$arr[''.$cba.'']['number']." ".$arr[''.$cba.'']['name']."</option>";
}
     echo"<option>--</option>";

    echo '</select></td>';
    $d++;
}

}
}
$end_d = 9 - $d;
for($c=0;$c<$end_d;$c++){
    echo "<td><select class='lista' name='name_$d'>";
    echo"<option>--</option>";
             for($cba=0;$cba<=$ile;$cba++){       
     echo"<option>".$arr[''.$cba.'']['number']." ".$arr[''.$cba.'']['name']."</option>";
}   
     echo"</select></td>";
   $d++;
}



echo '</tr>';
echo "</table>";
  echo "<button><img src='$url/img/button-1.png'></button></form>"; 
      echo"</tbody>
      <a href='all_col.php?table=$symbol'><img src='$url/img/button.png'></a></table></form>";  
?>  


</table>



</body>
</html>