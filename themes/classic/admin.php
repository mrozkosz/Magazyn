            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>V.2.1</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                            <i class="fa fa-dashboard"></i>  <a href="admin.php">Admin</a>
                            </li>
                            <li class="active">
                                
                            </li>
                        </ol>
                    </div>
                    
                </div>
                <!-- /.row -->

<?php
$i=0;
if(isset($_GET['i'])){
  $i = $_GET['i'];
}
switch ($i) {
    case 0:
    echo ' <div class="col-md-4">
        <form method="POST" action="admin_edit.php?q=1&id=0">

                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="login" class="form-control" placeholder="login">
                            </div>

                             <div class="form-group">
                                <label>Hasło</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Imię</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nazwisko</label>
                                <input type="text" name="surname" class="form-control">
                            </div>
                            <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="admin" value="1">Administrator
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Dodaj</button>
                            <button type="reset" class="btn btn-default">Reset</button>
</form></div>';
        $sql = $conn->query("SELECT * FROM user");
   $fields = mysqli_num_fields($sql);
   echo "<div class='col-md-8'>
                <div class='table-responsive'>
                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Admin</th>
                                        <th>Edytuj</th>
                                        <th>Usuń</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>";
    while($row = mysqli_fetch_row($sql)){
        $admin = $row[3];
         
            echo "<tr>
                <td class='tg-k20k'>{$row[1]}</td>
                <td class='tg-k20k'>";
                if($admin == 1){
                    echo "TAK";
                }else{
                    echo "NIE";
                }
                echo"</td>
                <td class='tg-k20k'><a href='admin_edit.php?id={$row[0]}&q=2'>edytuj</a></td>
                <td class='tg-k20k'><a href='admin_edit.php?id={$row[0]}&q=3'>usuń</a></td>
                                    </tr>";

      
   }
   echo '</tbody>
                            </table>
                        </div>
                    </div>';
        break;
    case 1:
    echo ' <div class="col-md-4">
        <form method="POST" action="admin_edit.php?q=4&id=0">

                              <div class="form-group">
                                <label>Numer</label>
                                <input type="text" name="number" class="form-control">
                            </div>

                             <div class="form-group">
                                <label>Nazwa</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                                <button type="submit" class="btn btn-default">Dodaj</button>
                            <button type="reset" class="btn btn-default">Reset</button>
</form></div>';
        $sql = $conn->query("SELECT * FROM tools ORDER BY number ASC"); /*ORDER BY number ASC*/

   $fields = mysqli_num_fields($sql);
   echo "<div class='col-md-8'>
                <div class='table-responsive'>
                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Numer</th>
                                        <th>Nazwa</th>
                                        <th>Usuń</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>";
        while($row = mysqli_fetch_row($sql)){

         
            echo "<tr>
                <td class='tg-k20k'>{$row[1]}</td>
                  <td class='tg-k20k'>{$row[2]}</td>
                  <td class='tg-k20k'><a href='admin_edit.php?id={$row[0]}&q=5'>usuń</a></td>";

      
   }
   echo '</tr><tr>';
        break;
    case 2:
    echo'<style>
    .cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
.visa{background-image:url(img/w.png);}
.mastercard{background-image:url(img/h.png);}

.cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:400px;height:150px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}

/* Extras */
a:visited{color:#888}
a{color:#444;text-decoration:none;}
p{margin-bottom:.3em;}
</style>';
echo'<form method="POST" action="admin_edit.php?q=7&id=0">
    <p></p>
    <div class="cc-selector">';
    if($w == '_w'){
        echo  '<input id="visa" type="radio" name="view" value="_w" checked="checked"/>
        <label class="drinkcard-cc visa" for="visa"></label>
        <input id="mastercard" type="radio" name="view" value="_h" />
        <label class="drinkcard-cc mastercard" for="mastercard"></label>';
    }else{
        echo'<input id="visa" type="radio" name="view" value="_w" />
        <label class="drinkcard-cc visa" for="visa"></label>
        <input id="mastercard" type="radio" name="view" value="_h" checked="checked"/>
        <label class="drinkcard-cc mastercard" for="mastercard"></label>';
    }
   echo' </div>
   <button type="submit" class="btn btn-default">Zapisz zmiany</button>
</form>';

    break;
}
?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $url ?>/js_admin/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $url ?>/js_admin/bootstrap.min.js"></script>

</body>

</html>
