<?php

    require("db_info.php");
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
    $datanasc = $_POST['datanasc'];  
    $emailains = $_POST['emailains'];
    $psw = MD5($_POST['psw']);
    $FKClass = $_POST['fkclass'];


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO alunno (CodAlu, Nome, Cognome, CodFisc, DataNasc, EMail, Password, FKClasse) VALUES(null, '$nome','$cognome','$codfisc',$datanasc, '$emailains', '$psw', '$FKClass')"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $data['sucquery'] = true;
        $data['query'] = "Record  Aggiunto correttamente"; 
        $data['reload'] = true;
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
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

    function forDate($date) {

        $dates = explode(" ", $date);
        
        echo $dates;

        $final += $dates[2] + "-";        
        $final += getTime($dates[1]) + "-";
        $final += $dates[0];

        return $final;
    }
   
   function getTime($date) {
        $date = substr($date, 0, -1);

        switch ($date) {
            case "January":
                $date = "01";
                break;
            case "February":
                $date = "02";
                break;
            case "March":
                $date = "03";
                break;
            case "April":
                $date = "04";
                break;
            case "May":
                $date = "05";
                break;
            case "June":
                $date = "06";
                break;
            case "July":
                $date = "07";
                break;
            case "August":
                $date = "08";
                break;
            case "September":
                $date = "09";
                break;
            case "October":
                $date = "10";
                break;
            case "November":
                $date = "11";
                break;
            case "December":
                $date = "12";
                break;
        }

        return $date;
   }
?>