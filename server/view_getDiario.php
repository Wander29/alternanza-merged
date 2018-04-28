<?php

	$data = array();     // array contenente le info da restituire all'utente tramite AJAX (errori inclusi)        
    $idDiario = $_POST['idDiario']; 

    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT d.data, d.TipoAtt, d.Descr, d.Ore  FROM diario AS d WHERE d.CodDia = $idDiario";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
    	$data['fail'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['valore'] = "idDiario = " . $idDiario;
    } else {
    	$data['query'] = mysqli_fetch_row($result);
    }
    mysqli_close($connection); 

    echo json_encode($data); //funzione di ritorno tramite JSON/XML
?>