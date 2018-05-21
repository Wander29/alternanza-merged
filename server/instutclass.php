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
    $codfisc = strtoupper($_POST['codfisc']);
    $emailpins = $_POST['emailpins'];
    $psw = MD5($_POST['psw']);


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO tutor_scolastico (CodTutSc, Nome, Cognome, CodFisc, EMail) VALUES(null, '$nome','$cognome','$codfisc','$emailpins')"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $query2 = "SELECT CodTutSc FROM tutor_scolastico WHERE CodFisc = '$codfisc'";
        $row2 = mysqli_fetch_array(mysqli_query($connection, $query2));
        if($row2[0] != null){
            $codRelUt = $row2[0];

            $query3 = "SELECT CodTipoUt FROM tipo_utente WHERE Tipo = 'tutor_scolastico'";
            $row3 = mysqli_fetch_array(mysqli_query($connection, $query3));
            if($row3[0] != null){
                $codTipoUt = $row3[0];

                $query4 = "INSERT INTO users (Email, Password, FKTipoUtente, FKCod_relativo_Utente) VALUES('$emailpins', '$psw', $codTipoUt, $codRelUt)";

                if(mysqli_query($connection, $query4)){
                    $data['sucquery'] = true;
                    $data['query'] = "Record  Aggiunto correttamente"; 
                    $data['reload'] = true;
                }
            }
        }
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è statto possibile eseguire:  $query." . mysqli_error($connection);
        $data['errore'] = "ERRORE, record non inserito";
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