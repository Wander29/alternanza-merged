<?php
    require("db_info.php");
    session_start();
    $connection = mysqli_connect("localhost", $username, $password, $database);
    if(!$connection){
        die();
    }
    $mail = $psw = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mail = $_POST["email"];
        $psw = md5($_POST["psw"]);
    }

    $query = "SELECT Email, Tipo, FKCod_relativo_Utente, Permessi FROM users, tipo_utente WHERE EMail = '$mail' AND Password = '$psw' AND CodTipoUt = FKTipoUtente"; 
    $row = mysqli_fetch_array(mysqli_query($connection, $query));
    
    if($row[0] != null){
        $_SESSION["mail"] = $row[0];
        $table = $row[1];
        switch ($table) {
            case 'dirigente':
                $codice_nome = "CodDirig";
                break;
            case 'tutor_scolastico':
                $codice_nome = "CodTutSc";
                break;
            case 'alunno':
                $codice_nome = "CodAlu";
                break;
            case 'tutor_aziendale':
                $codice_nome = "CodTutAz";
                break;
            default:
                break;
        }
        $cod_ut_relativo = $row[2];
        $_SESSION['permessi'] = $row[3];
        $_SESSION['tipoUt'] = $table;

        $query2 = "SELECT Nome, Cognome FROM $table WHERE $cod_ut_relativo = $codice_nome";
        $row2 = mysqli_fetch_array(mysqli_query($connection, $query2));

        if($row2[0] != null){
            $_SESSION['name'] = $row2[0] . " " . $row2[1];
        }
    } 
    if (strpos($_SESSION['permessi'], "HOME") !== false) { 
        header('Location: ../public/home.php');
    }
    mysqli_close($connection); 
?>