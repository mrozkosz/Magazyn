<?php
session_start();
class obiekt
{
	protected static $conn;
	public $server = "localhost";
 	public $user = "user";
 	public $pass = "password";
 	public $db = "db";
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

			return "https://".$_SERVER["SERVER_NAME"].$link["dirname"];
		}

}
define("static_1",  "something");
	
define("static_2", "something else");

?>
