<script src="<?php echo $url; ?>/js/jquery-1.12.4.js"></script>
<script src="<?php echo $url; ?>/js/jquery-ui.js"></script>
<script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  
  $('#txtSearch_1').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
   $('#txtSearch_2').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
      $('#txtSearch_3').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
   $('#txtSearch_4').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
      $('#txtSearch_5').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
         $('#txtSearch_6').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
    $('#txtSearch_7').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
      $('#txtSearch_8').autocomplete({
      source: "tools.php",
      minLength: 2,
  })
         $('#txtSearch_9').autocomplete({
      source: "tools.php",
      minLength: 1,
  })
  
});
</script>
<br>
<br>
<?php
   $sql = $conn->query("SELECT * FROM dane LIMIT 4");
   $fields = mysqli_num_fields($sql);
   echo "<table style='width:500px; margin:0 auto;'><thead></thead><tbody>";
        while($row = mysqli_fetch_row($sql)){
echo"<tr>";
         for($count=1;$count<$fields;$count++) {
      $field = mysqli_fetch_field($sql);
            echo "<td><div class='table_name' style='padding-top:6px; padding-bottom:6px;'>
      <a href='view.php?s={$row["$count"]}' class='url'><font size='6'>{$row["$count"]}</font></a></div></td>";

      }
      echo '</tr>';
   }
   
?>
</table>