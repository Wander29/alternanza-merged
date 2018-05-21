<?php

    require("db_info.php");
    session_start();
    $data = array();    
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }
    $idtut = $_POST['idtut'];
    $fktir = $_POST['tirocinio'];
    $valTest = $_POST['commit'];
    $voto = $_POST['val'];

    $valTest = !empty($valTest) ? "'$valTest'" : "NULL";

    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO quest_tutor (Voto, ValTest, FKTir, FKTutSc) VALUES($voto, $valTest, $fktir, $idtut);"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $data['sucquery'] = true;
        $data['query'] = "Record  Aggiunto correttamente"; 
        $data['reload'] = false;
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['errore'] = "ERRORE, record non inserito";
    }

    $data['success'] = true; 

    mysqli_close($connection); 

    echo json_encode($data); 
?>