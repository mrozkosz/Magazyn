<?php

	ob_start();

	session_start();

	if(!isset($_GET['step'])) header("LOCATION: install.php?step=2");

	if(!isset($_SESSION['install'])) {

		$_SESSION['install'] = array();

		$_SESSION['install']['hostaddress'] = 'localhost';

		$_SESSION['install']['db_name'] = 'magazyn';

		$_SESSION['install']['db_user'] = 'admin';

		$_SESSION['install']['db_pass'] = NULL;

		$_SESSION['install']['admin_name'] = NULL;

		$_SESSION['install']['admin_pass'] = NULL;

		$_SESSION['install']['admin_pass_check'] = NULL;

		

	}

	if(isset($_POST['db'])) {

		$_SESSION['install']['hostaddress'] = $_POST['hostaddress'];

		$_SESSION['install']['db_name'] = $_POST['db_name'];

		$_SESSION['install']['db_user'] = $_POST['db_user'];

		$_SESSION['install']['db_pass'] = $_POST['db_pass'];

	}

	if(isset($_POST['admin'])) {
		$_SESSION['install']['admin_pass'] = $_POST['admin_pass'];
		$_SESSION['install']['admin_name'] = $_POST['admin_name'];
	}

	

	

	//Etapy

	$etap = (int) $_GET['step'];

	

	//Aplikacje zaimplementowane w system

	
?>



<!DOCTYPE html>

<html>

	<head>

		<title>Instalacja Magazyn v2.1</title>

		<link rel="stylesheet" type="text/css" href="style.css" />

		<style type="text/css">

			#options {

				background:#F3F3F3;

				border-top:1px solid #E6E6E6;

				border-bottom:1px solid #F0F0F0;

				padding:15px;

			}

			h2 {

				padding:10px;

				border-bottom:1px solid #4D4D4D;

			}

			#cont {

				padding:10px;

			}

			table {

				margin:0;

			}

			#pods td {

				padding:5px 10px;

				color:#4D4D4D;

				font-size:16px;

			}

			.ok {

				padding:10px;

				color:green;

				border:1px solid green;

			}

			.error {

				padding:10px;

				color:red;

				border:1px solid red;

			}

			.sql_ok {

				background:#c8ffb0;

				color:#000;

				padding:10px;

			}

			.sql_error {

				background:#ff9b9d;

				color:#000;

				padding:10px;

			}

		</style>

	</head>

	<body>

	

		<div id="content">

			<div id="submenu">

					<ul>

						<?php

						switch($etap) {

							case 1: $active = array('class="active"','','',''); break;

							case 2: $active = array('','class="active"','',''); break;

							case 3: $active = array('','','class="active"',''); break;

							case 4: $active = array('','','','class="active"'); break;

							default: $active = array('','','','');

						}


						echo '<li><a href="install.php?step=2" '.$active[1].'>Etap 2 - Baza danych</a></li>';

						echo '<li><a href="install.php?step=3" '.$active[2].'>Etap 3 - Konfiguracja administratora</a></li>';

						echo '<li><a href="install.php?step=4" '.$active[3].'>Etap 4 - Podsumowanie</a></li>';

						?>

					</ul>

			</div>

			<div id="apigui">

			<?php

				switch($etap) {

					case 2:

						echo '<form method="post" action="install.php?step='.($_GET['step']+1).'">

						<div id="options">

						<table style="margin:0;">

							<tr>

								<td>Serwer bazy danych:</td>

								<td><input type="text" name="hostaddress" value="'.$_SESSION['install']['hostaddress'].'" /></td>

								<td>adres bazy danych...</td>

							</tr>

							<tr>

								<td>Nazwa bazy danych:</td>

								<td><input type="text" name="db_name" value="'.$_SESSION['install']['db_name'].'" /></td>

								<td>... nazwa tabeli, w której ma zostać zainstalowana tablica...</td>

							</tr>

							<tr>

								<td>Użytkownik bazy danych:</td>

								<td><input type="text" name="db_user" value="'.$_SESSION['install']['db_user'].'" /></td>

								<td>... użytkownik...</td>

							</tr>

							<tr>

								<td>Hasło użytkownika:</td>

								<td><input type="password" name="db_pass" /></td>

								<td>... i hasło.</td>

							</tr>

						</table>

						</div>

						<div style="text-align:center; margin-top:20px;">

							<form method="post" action="install.php?step='.($_GET['step']+1).'">

								<input type="submit" name="db" style="" value="Przejdź do kolejnego etapu" />

							</form>

						</div>

						</form>';

					break;

					case 3:

						echo '<form method="post" action="install.php?step='.($_GET['step']+1).'">

						<div id="options">

						<table style="margin:0;">

							<tr>

								<td>Nazwa administratora</td>

								<td><input type="text" name="admin_name" value="'.$_SESSION['install']['admin_name'].'" /></td>

							</tr>

							<tr>

								<td>Hasło użytkownika:</td>

								<td><input type="password" name="admin_pass" /></td>

							</tr>

						</table>

						</div>

						<div style="text-align:center; margin-top:20px;">

							<form method="post" action="install.php?step='.($_GET['step']+1).'">

								<input type="submit" name="admin" style="" value="Przejdź do kolejnego etapu" />

							</form>

						</div>

						</form>';

					break;

					case 4:

						$error = 0;

						if(isset($_POST['pass_check'])) {

							$_SESSION['install']['admin_pass_check'] = $_POST['admin_pass_check'];

						}

						echo '<h2>Podsumowanie</h2>

						<div id="options">

							Sprawdź poprawność danych zanim zaczniesz instalować skrypt. System w między czasie sprawdzi poprawność wpisanych danych. W przypadku źle wpisanych danych instalacja nie będzie możliwa.

						</div>

						<div id="cont">

							<h2>Połączenie z bazą danych</h2>

							<table id="pods">

								<tr>

									<td>Serwer bazy danych:</td>

									<td><b>'.$_SESSION['install']['hostaddress'].'</b></td>

								</tr>

								<tr>

									<td>Nazwa użytkownika:</td>

									<td><b>'.$_SESSION['install']['db_user'].'</b></td>

								</tr>

								<tr>

									<td>Hasło użytkownika:</td>

									<td><b>'.$_SESSION['install']['db_pass'].'</b></td>

								</tr>

								<tr>

									<td>Wybrana baza danych:</td>

									<td><b>'.$_SESSION['install']['db_name'].'</b></td>

								</tr>

							</table>

							';

 	
								if(!@mysqli_connect($_SESSION['install']['hostaddress'], $_SESSION['install']['db_user'], $_SESSION['install']['db_pass'], $_SESSION['install']['db_name'])) {

									$error++;

									echo '<div class="error">Nie można połączyć z bazą danych</div>';

								}

								else echo '<div class="ok">Połączono!</div>';

							echo'

							<h2>Dane administratora</h2>

							<table id="pods">

								<tr>

									<td>Nazwa użytkownika:</td>

									<td><b>'.$_SESSION['install']['admin_name'].'</b></td>

								</tr>

								<tr>

									<td>Hasło:</td>

									<td><b>*****</b></td>';

									if($_SESSION['install']['admin_pass'] === $_SESSION['install']['admin_pass_check']) {

										echo '<td style="color:green;">Potwierdzone!</td>';

									}

									else {

										$error++;

										echo '

										<td>Potwierdź hasło:</td>

										<td><form method="post" action="install.php?step=4"><input type="password" name="admin_pass_check" style="width:100px;" /><input type="submit" name="pass_check" value="Potwierdź" /></form></td>';

									}



									echo '

									</td>

								</tr>

								

							</table>

							<div style="margin-top:20px;">

							<form method="post" action="install.php?step=5">';

							if($error != 0) echo '<input type="submit" name="install" value="Nie można zainstalować" DISABLED/>';

							else echo '<input type="submit" name="install" value="Zainstaluj!" />';

							echo'

						</div>

						';

					break;

					case 5:

						if(isset($_POST['install'])) {

							echo '<h2>Instalowanie</h2>';

							$conn = mysqli_connect($_SESSION['install']['hostaddress'], $_SESSION['install']['db_user'], $_SESSION['install']['db_pass'], $_SESSION['install']['db_name']);
							
							mysqli_set_charset($conn, "utf8");

							echo '

							<table>

								<tr></tr>

								<tr>

									<td>Tabela <i>dane</i></td>

									<td>';

									if($sql_1=$conn->query("CREATE TABLE IF NOT EXISTS `dane` (`id` int(11) NOT NULL,`tab_1` varchar(50) COLLATE utf8_bin NOT NULL,`tab_2` varchar(50) COLLATE utf8_bin NOT NULL,`tab_3` varchar(50) COLLATE utf8_bin NOT NULL,`tab_4` varchar(50) COLLATE utf8_bin NOT NULL,`tab_5` varchar(50) COLLATE utf8_bin NOT NULL,`tab_6` varchar(50) COLLATE utf8_bin NOT NULL,`tab_7` varchar(50) COLLATE utf8_bin NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;")) {
										$sql_2=$conn->query("INSERT INTO `dane` (`id`, `tab_1`, `tab_2`, `tab_3`, `tab_4`, `tab_5`, `tab_6`, `tab_7`) VALUES(1, 'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7'),(2, 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7'),(3, 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7'),(4, 'a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7');");
										echo 'OK';

									}else{ echo('Błąd');}

									echo '</td>

								</tr>';
									$pass = md5($_SESSION['install']['admin_pass']);
									$loginn = $_SESSION['install']['admin_name'];

							echo'<tr>

									<td>Tabela <i>magazyn</i></td>

									<td>';

									if($sql_3=$conn->query("CREATE TABLE IF NOT EXISTS `magazyn` (`id` int(10) NOT NULL,`1` varchar(200) NOT NULL, `2` varchar(200) NOT NULL, `3` varchar(200) NOT NULL, `4` varchar(200) NOT NULL, `5` varchar(200) NOT NULL, `6` varchar(200) NOT NULL, `7` varchar(200) NOT NULL, `8` varchar(250) NOT NULL,`symbol` varchar(2) NOT NULL) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;")){
										$sql_4=$conn->query("INSERT INTO `magazyn` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `symbol`) VALUES(1, '', '', '', '', '', '', '', '', 'a1'),(2, '', '', '', '', '', '', '', '', 'a2'),(3, '', '', '', '', '', '', '', '', 'a3'),(4, '', '', '', '', '', '', '', '', 'a4'),(5, '', '', '', '', '', '', '', '', 'a5'),(6, '', '', '', '', '', '', '', '', 'a6'),(7, '', '', '', '', '', '', '', '', 'a7'),(8, '', '', '', '', '', '', '', '', 'b1'),(9, '', '', '', '', '', '', '', '', 'b2'),(10, '', '', '', '', '', '', '', '', 'b3'),(11, '', '', '', '', '', '', '', '', 'b4'),(12, '', '', '', '', '', '', '', '', 'b5'),(13, '', '', '', '', '', '', '', '', 'b6'),(14, '', '', '', '', '', '', '', '', 'b7'),(15, '', '', '', '', '', '', '', '', 'c1'),(16, '', '', '', '', '', '', '', '', 'c2'),(17, '', '', '', '', '', '', '', '', 'c3'),(18, '', '', '', '', '', '', '', '', 'c4'),(19, '', '', '', '', '', '', '', '', 'c5'),(20, '', '', '', '', '', '', '', '', 'c6'),(21, '', '', '', '', '', '', '', '', 'c7'),(22, '', '', '', '', '', '', '', '', 'd1'),(23, '', '', '', '', '', '', '', '', 'd2'),(24, '', '', '', '', '', '', '', '', 'd3'),(25, '', '', '', '', '', '', '', '', 'd4'),(26, '', '', '', '', '', '', '', '', 'd5'),(27, '', '', '', '', '', '', '', '', 'd6'),(28, '', '', '', '', '', '', '', '', 'd7');");
											echo 'OK';

									}else{ echo('Błąd');}

									echo '</td>

								</tr>';
							echo'<tr>

									<td>Tabela <i>settings</i></td>

									<td>';

									if($sql_5=$conn->query("CREATE TABLE IF NOT EXISTS `settings` (`id` int(1) NOT NULL,`theme` varchar(50) NOT NULL,`tytul` varchar(100) NOT NULL) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;")){
									$sql_6=$conn->query("INSERT INTO `settings` (`id`, `theme`, `tytul`) VALUES(1, 'classic', '');");					
											echo 'OK';

									}else{ echo('Błąd');}

									echo '</td>

								</tr>';
								echo'<tr>

									<td>Tabela <i>user</i></td>

									<td>';

									if($sql_7=$conn->query("CREATE TABLE IF NOT EXISTS `user` (`id_user` smallint(6) NOT NULL,`login` varchar(128) COLLATE utf8_polish_ci NOT NULL,`password` varchar(128) COLLATE utf8_polish_ci NOT NULL,`admin` varchar(1) COLLATE utf8_polish_ci NOT NULL DEFAULT '0') ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;")){
									$sql_8=$conn->query("INSERT INTO `user` (`id_user`, `login`, `password`, `admin`) VALUES(1, '$loginn', '$pass', '1');");
											echo 'OK'.$loginn;


									}else{ echo('Błąd');}

									echo '</td>

								</tr>';
							echo'<tr>

									<td>Tabela <i>tools</i></td>

									<td>';

									if($sql_9=$conn->query("CREATE TABLE IF NOT EXISTS `tools` (`id` int(11) NOT NULL,`number` int(7) NOT NULL,`name` varchar(250) NOT NULL) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;")){
									$sql_10=$conn->query("INSERT INTO `tools` (`id`, `number`, `name`) VALUES
(1, 3902349, 'FAB/UNI 3LR MACHINED BODY'),
(2, 3902228, 'FAB/UNI RP MACH BODY'),
(3, 3902373, 'M3 MACHINED BODY'),
(4, 3902374, 'RL09/C3SR 94 MACHINED BODY'),
(5, 2217683, 'RPF01G-69 FORGING'),
(6, 3902348, 'RP18 MACHINED BODY'),
(7, 3902345, 'RP21 MACHINED BODY'),
(8, 3902346, 'RP22 MACHINED BODY'),
(9, 5283572, 'RS01.76 RTU FORGING'),
(10, 3374098, 'RPF06G 87 .76 CONICAL FORGING'),
(11, 3865464, 'RPF01G 69N FORGING'),
(12, 3636429, 'RPF01-75N'),
(13, 3118040, 'RPF05G VS'),
(14, 3118039, 'RPF05G 75 FORGING'),
(15, 2463168, 'SL07 MACHINED BODY'),
(16, 3584115, 'U92P W/LR GRV FORGING'),
(17, 4056329, 'RTF2 750 NS BODY'),
(18, 4075127, 'RX1-01 MACHINED BODY'),
(19, 4081293, 'RX5-01 MACHINED BODY'),
(20, 4072750, 'SR01NS MACH BODY'),
(21, 4072748, 'SR02NS MACH BODY'),
(22, 3900587, 'SR03 NS NET SHAPED FORGING'),
(23, 4027360, 'SR04 NS CONICAL FORGING'),
(24, 4072749, 'SR05NS MACH BODY'),
(25, 3900588, 'SR750 FORGING'),
(26, 5602637, 'RTF3 75 .76 CONICAL FORGING'),
(27, 5884426, 'RTM3 648 MACHINED BODY'),
(28, 5884427, 'RTM3 870 MACHINED BODY'),
(29, 5294876, 'U43K C21G C21 NS BODY'),
(30, 5294877, 'U43KHD NS BODY'),
(31, 1009272, 'C87BFC FORGING 15B35'),
(32, 5639985, 'U40HD WITH GROOVE'),
(33, 1009282, 'U40KHG FORGING 15B35'),
(34, 1155139, 'FORGING K178DV'),
(35, 5475965, 'EA371 22MM FORGING'),
(36, 5643929, 'EA371 RPF07G VS'),
(37, 6020048, 'EA371 20MM FLAT BOTTOM FORGING'),
(38, 6020049, 'EA371 22MM FLAT BOTTOM FORGING'),
(39, 6220721, 'RPF07G .8FB S'),
(40, 5475969, 'EA371 25MM FORGING'),
(41, 6184661, 'EA371 22MM 21MM MACHINING'),
(42, 6184663, 'EA371 22MM TOOL-20MM MACHINING'),
(43, 6237185, 'TSA W/C TS32CX MACHINING'),
(44, 5071459, 'TS30C NS BODY'),
(45, 6237187, 'TSA W/C TS19CX MACHINING'),
(46, 6237131, 'U92 WIDE COLLAR MACHINING'),
(47, 6237132, 'TSA W/C MACHINING'),
(48, 6237133, 'PROPOINT A1480K PNS MACHINING'),
(49, 6237134, 'PROPOINT30 A1489 PNS MACHINING'),
(50, 6237135, 'U92HDL SN MACHINING'),
(51, 6237136, 'C31L WC FORGING W/C MACHINING'),
(52, 6237137, 'FD25W-17.5-X K3560'),
(53, 6237140, 'C31R FORGING V C35R MACHINING'),
(54, 6237142, 'C31L WC FORGING T5 X MACHINING'),
(55, 6237143, 'C31R FORGING C31RHD MACHINING'),
(56, 6237147, 'U40KHG 15B35 MACHINING'),
(57, 6237148, 'UC765K 15B35 MACHINING'),
(58, 6237149, 'RPF01G-75-RZ34P MACHINING'),
(59, 6237161, 'RL10 FORGING RL11 MACHINING'),
(60, 3993500, 'RZ08-22MM MACHINED BODIES'),
(61, 6237164, 'C87BFC FORGING VC87B MACHINING'),
(62, 6237165, 'C3KBLR COMBO MACHINING'),
(63, 6237181, 'C87BFC FORGING SM06 MACHINING'),
(64, 6237182, 'RPF02GN-RZ3-PNB MACHINING');");		echo 'OK';

									}else{ echo('Błąd');}

									echo '</td>

								</tr>';


									
									
							

									echo '</td>

								</tr>

							</table>';

							echo '

							<table>

								<tr>

									<td>Tworzenie <i>function.php</i></td>

									<td>';

									$config_content = '

					<?php
session_start();
class obiekt
{
	protected static $conn;
	public $server = "'.$_SESSION['install']['hostaddress'].'";
 	public $user = "'.$_SESSION['install']['db_user'].'";
 	public $pass = "'.$_SESSION['install']['db_pass'].'";
 	public $db = "'.$_SESSION['install']['db_name'].'";
	public function connect()
	{
 	    $conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
 		mysqli_set_charset($conn, "utf8");
 		return $conn;
	}
	public function load($key, $tab){
    $conn = $this->connect();
	$sql =("SELECT * FROM `$tab`");
	 $result = $conn->query($sql);
	while($row = mysqli_fetch_array($result)){
		return $row[$key];
		}
}
	public function loop($key, $tab){
    $conn = $this->connect();
	$sql =("SELECT * FROM `$tab`");
	 $result = $conn->query($sql);
	while($row = mysqli_fetch_array($result)){
		return $row[$key];
		}
	}

		public static function host() {

			$link = pathinfo($_SERVER["SCRIPT_NAME"]);

			if($link["dirname"] == "/") $link["dirname"] = NULL;

			return "http://".$_SERVER["SERVER_NAME"].$link["dirname"];
		}
		public function isAdmin(){
		}

}


?>';

									if(file_put_contents('module/function.php',trim($config_content, ' \t'))) echo 'OK';									

									else exit('Błąd');

									echo '</td>

								</tr>

							</table>

							<h2>ZAINSTALOWANO! Nie zapomnij usunąć plik instalacyjny! Teraz możesz przejść do <a href="index.php">logowania</a></h2>

							';

						}

					break;

				}

			?>

			</div>

		</div>

	</body>

</html>

<?php ob_end_flush(); ?>

