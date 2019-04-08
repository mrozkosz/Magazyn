
<?php
$i=0;
if(isset($_GET['i'])){
  $i = $_GET['i'];
}
switch ($i) {
    case 0:
        $sql = $conn->query("SELECT * FROM user");
   $fields = mysqli_num_fields($sql);
    while($row = mysqli_fetch_row($sql)){
echo "<tr>";
         
            echo "<th class='tg-k20k'>{$row[1]}</th>
                  <th class='tg-k20k'>{$row[2]}</th>
                  <th class='tg-k20k'>{$row[3]}</th>
                  <th class='tg-k20k'><a href='admin_user_delete.php?id={$row[0]}'>usun</a></th>";

      
   }
   echo '</tr><tr>';
        break;
    case 1:
        echo "</table><br>Zarejestruj nowego użytkownika:<br>
   <form method=\"POST\" action=\"admin_new_user.php\">
                <input type=\"text\" name=\"login\" placeholder='login'><br>
                <input type=\"password\" name=\"password\" placeholder='Hasło'><br>
                <label><input type=\"checkbox\" name=\"admin\" value=\"1\">Administrator</label><br>
                <input type=\"submit\" name=\"log\" value=\"Dodaj\">
              </form></div>";
        break;
    case 2:
        $sql = $conn->query("SELECT * FROM tools"); /*ORDER BY number ASC*/

   $fields = mysqli_num_fields($sql);
        while($row = mysqli_fetch_row($sql)){
echo "<tr>";
         
            echo "<th class='tg-k20k'>{$row[1]}</th>
                  <th class='tg-k20k'>{$row[2]}</th>
                  <th class='tg-k20k'><a href='user_tools_delete.php?id={$row[0]}'>usun</a></th>";

      
   }
   echo '</tr><tr>';
        break;
    case 3:

    break;
}

   



?>
