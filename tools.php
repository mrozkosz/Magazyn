<?php
    
  require_once("module/function.php");
    $obiekt = new obiekt;

    $DBhost = $obiekt->server;
    $DBuser = $obiekt->user;
    $DBpass = $obiekt->pass;
    $DBname = $obiekt->db;
    
    try {
        $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
        $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex){
        die($ex->getMessage());
    }

    $keyword = trim($_REQUEST['term']); // this is user input

    $sugg_json = array();    // this is for displaying json data as a autosearch suggestion
    $json_row = array();     // this is for stroring mysql results in json string
 

    $keyword = preg_replace('/\s+/', ' ', $keyword); // it will replace multiple spaces from the input.

    $query = 'SELECT * FROM tools WHERE number LIKE :term or name LIKE :term'; // select query
    
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':term'=>"%$keyword%"));
    
    if ( $stmt->rowCount()>0 ) {
        
        while($recResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json_row["value"] = $recResult['number']." ".$recResult['name'];
            $json_row["label"] = $recResult['number']." ".$recResult['name'];
            array_push($sugg_json, $json_row);
        }
        
    } else {
        $json_row["value"] = "";
        $json_row["label"] = "Nothing Found!";
        array_push($sugg_json, $json_row);
    }
    
    $jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES); 
    print $jsonOutput;