<?php
    require("db_info.php");
    $data = array();

    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);
    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }

    /********** POST/GET **********/
    $id = $_POST['id'];       

    /********** Query **********/
    $query = "SELECT alunno.Nome FROM azienda, tirocinio, alunno WHERE azienda.CodAz = tirocinio.FkAz AND alunno.CodAlu = tirocinio.FkAlu AND azienda.CodAz = $id Group By alunno.CodAlu;";

    if(mysqli_query($connection, $query)){
        $data['sucquery'] = true;
        $data['query'] = "OK"; 
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è statto possibile eseguire:  $query." . mysqli_error($connection);
    }

    $data['success'] = true;

    /********** Chiusura **********/
    mysqli_close($connection);


    /********** Return Ajax **********/
	echo json_encode($data);


    /********** Funzioni **********/
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>