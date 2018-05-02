<?php
    require("db_info.php");
    session_start();
    $data = array(); 		// array to pass back data to ajax 

    ini_set('max_execution_time', 300); //300 seconds = 5 minutes

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require('PHPMailer-master/src/PHPMailer.php');
    require('PHPMailer-master/src/Exception.php');
    require('PHPMailer-master/src/SMTP.php');
    $mail=new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "Errore nella connessione";
        die();
    }

    /********** POST/GET **********/
    $nomeut = $_SESSION["mail"];
    $table = $_SESSION["table"];
    $oldpsw = md5(test_input($_POST['oldpsw']));
    $newpsw = md5(test_input($_POST['newpsw']));

    /********** Query **********/
    $query_verifica = "SELECT Nome FROM $table WHERE EMail = '$nomeut' AND Password = '$oldpsw';";
    $query_modifica = "UPDATE $table SET Password = '$newpsw' WHERE EMail = '$nomeut' AND Password = '$oldpsw';";

    $verifica = mysqli_fetch_array(mysqli_query($connection, $query_verifica));
    
    if($verifica != null){
        $modifica = mysqli_query($connection, $query_modifica);
        if(!$modifica){
            $data['success'] = false;
            $data['query'] = "Errore";
        }else {
            $data['success'] = true;
            $data['query'] = "Password cambiata";

            try {
                //Server settings
                $mail->isSMTP();    
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );                                   // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username   = '144.developer.master@gmail.com';
                $mail->Password   = 'karate1998';
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->SetFrom('144.developer.master@gmail.com', "ASL WEB SITE");
                $mail->AddAddress($nomeut, 'prova mail php');
                $mail->AddReplyTo('no-reply@mycomp.com','no-reply');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Cambio Password';
                $mail->Body    = 'Caro/a <b>'.$_SESSION["name"].'</b><br> La sua password è stata cambiata con successo.';
                $mail->AltBody = 'Caro/a '.$_SESSION["name"].' La sua password è stata cambiata con successo.';

                $mail->send();

            } catch (Exception $e) {
                $data["e"] = $e -> getMessage();
            }
        }
    } else {
        $data['success'] = false;
        $data['query'] = "Errore";
    }

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