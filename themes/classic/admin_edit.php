<?php
if(isset($_GET['id']) and isset($_GET['q'])){
	$id = $_GET['id'];
	$q = $_GET['q'];
switch ($q) {
    case 1:
        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        if(isset($_POST['admin']) and $_POST['admin'] == 1){
        	$admin = $_POST['admin'];
        }else{
        	$admin = 2;
        }
        $sql = $conn->query("INSERT INTO `user`(`login`, `password`, `admin`, `name`, `surname`) VALUES ('$login','$password','$admin' ,'$name', '$surname')");
        header("location:admin.php?i=0");
        break;
    case 2:
    	$sql = $conn->query("SELECT * FROM user WHERE id_user = '$id'");
         require_once("themes/".$themes."/admin_menu.php");
         echo'     <!-- /.navbar-collapse -->
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
';
while($row = mysqli_fetch_array($sql)){
echo '<div class="col-md-4">
        <form method="POST" action="admin_edit.php?q=6&id='.$id.'">
                          <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="login" class="form-control" placeholder="'.$row['login'].'" readonly>
                            </div>

                             <div class="form-group">
                                <label>Hasło</label>
                                <input type="password" name="password" class="form-control" value="****">
                            </div>
                            <div class="form-group">
                                <label>Imię</label>
                                <input type="text" name="name" class="form-control" value="'.$row['name'].'" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nazwisko</label>
                                <input type="text" name="surname" class="form-control" value="'.$row['surname'].'" readonly>
                            </div>
                            <div class="checkbox">
                                    <label>';
                                    if($row['admin'] ==1){
                                    	echo '<input type="checkbox" name="admin" value="1" checked>Administrator';
                                    }else{
                                    	echo '<input type="checkbox" name="admin" value="1">Administrator';
                                    }
                                        
                                    echo'</label>
                                </div>
                                <button type="submit" class="btn btn-default">Zapisz</button>
                            <button type="reset" class="btn btn-default">Reset</button>
</form></div>';
}
$sql_1 = $conn->query("SELECT * FROM user");
   $fields = mysqli_num_fields($sql_1);
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
    while($row = mysqli_fetch_row($sql_1)){
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

echo "</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src='$url/js_admin/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='$url/js_admin/bootstrap.min.js'></script>

</body>

</html>";

        break;
    case 3:
    if($id==1){

    }else{
        $sql = $conn->query("DELETE FROM `user` WHERE id_user='$id'");
    }
        header("location:admin.php?i=0");
        break;
    case 4:
    	$name = $_POST['name'];
    	$number = $_POST['number'];
    	$sql = $conn->query("INSERT INTO `tools`(`number`, `name`) VALUES ('$number','$name')");
    	 header("location:admin.php?i=1");
        break;
    case 5:
        $sql = $conn->query("DELETE FROM `tools` WHERE id = '$id'");
        header("location:admin.php?i=1");
        break;
     case 6:
     	$password = $_POST['password'];
        if($id==1){
        }else{
     	if(isset($_POST['admin'])){
     		$admin = $_POST['admin'];
     	}else{
     		$admin = 2;
     	}
     	if($password == '****' or $password == null){
     		$sql = $conn->query("UPDATE `user` SET `admin`='$admin' WHERE id_user = '$id'");
     	}else{
     		$pass = md5($password);
     		$sql = $conn->query("UPDATE `user` SET password = '$pass', `admin`='$admin' WHERE id_user = '$id'");
     	}
     	}
        header("location:admin_edit.php?q=2&id=$id");
        break;
        case 7:
        if(isset($_POST['view'])){
            $view = $_POST['view'];
            $sql = $conn->query("UPDATE `settings` SET `view`='$view' WHERE id =1");
            header("location:admin.php?i=2");
        }else{
            header("location:admin.php?i=2");
        }
        break;
}
}


?>