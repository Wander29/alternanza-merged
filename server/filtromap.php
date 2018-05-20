<?php
	$data = array();   
    $appo = array();    
    $cnt = 0;
    $classe = $_POST['classe']; 
    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT azienda.CodAz, alunno.cognome, alunno.nome, azienda.Nome FROM alunno, tirocinio, azienda WHERE tirocinio.FKAlu = alunno.CodAlu AND tirocinio.FKAz = azienda.CodAz AND alunno.FKClasse = '$classe' GROUP BY alunno.CodAlu;";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
    	$data['fail'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['valore'] = "classe = " . $classe;
    } else {    
        while ($row = mysqli_fetch_row($result)){
            $appo[$cnt] = $row; 
            $cnt++;
        }
        $data['query'] = $appo;
    }
    mysqli_close($connection); 

    echo json_encode($data); //funzione di ritorno tramite JSON/XML
?>