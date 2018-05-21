<?php
	$data = array();   
    $appo = array();    
    $cnt = 0;
    $tut = $_POST['tutor']; 
    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT azienda.CodAz, azienda.Nome FROM azienda, tutor_scolastico, alunno, classe, tirocinio WHERE tutor_scolastico.CodTutSc = Classe.FKTutSc AND Classe.CodClas = Alunno.FKClasse AND alunno.CodAlu = tirocinio.FKAlu AND tirocinio.FKAz = azienda.CodAz AND tutor_scolastico.CodTutSc = '$tut' GROUP BY azienda.CodAz;";
  
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