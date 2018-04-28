<?php

    require("db_info.php");
    session_start();
    $data = array();        // array to pass back data to ajax 
    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }
    /********** POST/GET **********/
    //in post prendo tutti i dati che vengono passati dal ajax
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];       
    $codfisc = $_POST['codfisc'];
    $emailpins = $_POST['emailpins'];
    $psw = MD5($_POST['psw']);


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO tutor_scolastico (CodTutSc, Nome, Cognome, CodFisc, EMail, Password) VALUES(null, '$nome','$cognome','$codfisc','$emailpins','$psw')"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $data['sucquery'] = true;
        $data['query'] = "Record  Aggiunto correttamente"; 
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è statto possibile eseguire:  $query." . mysqli_error($connection);
    }

    $data['success'] = true; //necessario per il cporretto funzionamento dell'ajax

    /********** Chiusura **********/
    mysqli_close($connection); // Chiusura connessione


    /********** Return Ajax **********/
	echo json_encode($data); //funzione di ritorno tramite JSON


    /********** Funzioni **********/
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>