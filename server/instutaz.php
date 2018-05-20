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
    $fka = $_POST['fka'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];       
    $codfisc = strtoupper($_POST['codfisc']);
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $psw = md5($_POST['psw']);
    $date = $_POST['data'];

    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO tutor_aziendale (CodTutAz, FKAz, Nome, Cognome, CodFisc, Tel, EMail, DataNasc) VALUES(null, '$fka', '$nome', '$cognome', '$codfisc', $tel, '$mail', $date)"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $query2 = "SELECT CodTutAz FROM tutor_aziendale WHERE CodFisc = '$codfisc'";
        $row2 = mysqli_fetch_array(mysqli_query($connection, $query2));
        if($row2[0] != null){
            $codRelUt = $row2[0];

            $query3 = "SELECT CodTipoUt FROM tipo_utente WHERE Tipo = 'tutor_aziendale'";
            $row3 = mysqli_fetch_array(mysqli_query($connection, $query3));
            if($row3[0] != null){
                $codTipoUt = $row3[0];

                $query4 = "INSERT INTO users (Email, Password, FKTipoUtente, FKCod_relativo_Utente) VALUES('$mail', '$psw', $codTipoUt, $codRelUt)";

                if(mysqli_query($connection, $query4)){
                    $data['sucquery'] = true;
                    $data['query'] = "Record  Aggiunto correttamente"; 
                    $data['reload'] = false;
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
?>