<?php

    require("db_info.php");
    session_start();
    $data = array(); 		// array to pass back data to ajax 
    
    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }

    /********** POST/GET **********/
    $nomeut = test_input($_POST['nomeut']);
    $oldpsw = md5(test_input($_POST['oldpsw']));
    $newpsw = md5(test_input($_POST['newpsw']));

    /********** Query **********/
    $query_verifica = "SELECT Nome FROM alunno WHERE EMail = '$nomeut' AND Password = '$oldpsw';";
    $query_modifica = "UPDATE alunno SET Password = '$newpsw' WHERE EMail = '$nomeut' AND Password = '$oldpsw';";

    $verifica = mysqli_fetch_array(mysqli_query($connection, $query_verifica));
    
    if($verifica != null){
        $modifica = mysqli_query($connection, $query_modifica);
        if($modifica){
            $data['success'] = false;
            $data['query'] = "Errore";
        }else {
            $data['success'] = true;
            $data['query'] = "Password cambiata";

            try {
                //Server settings
                $mail->isSMTP();                                      // Set mailer to use SMTP
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
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

            } catch (Exception $e) {
                $data["e"] = $E -> getMessage();
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