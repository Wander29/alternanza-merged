<?php 
	session_start();
	session_destroy();
?>
<html>
	<head>
		<title>Login - Alternanza</title>

		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Inserimento">
        <meta name="author" content="Ludovico Venturi & Luca Moroni">

        <link rel="icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/fonts.css">
        <link rel="stylesheet" href="lib/materialize/materialize.min.css">
        <link rel="stylesheet" href="assets/css/style_ins.css">
        <link rel="stylesheet" href="assets/css/style_login.css">
        
        <script src="lib/jquery.js"></script>
        <script src="lib/materialize/materialize.min.js"></script>
	</head>
	<body>
		<nav class="my_nav">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center">Alternanza Scuola-Lavoro</a>
			</div>
		</nav>
		<div id="wrap-login-all">
			<div class="compensatore"></div>
			<div class="container row">
				<form method="post" action="server/_login.php" enctype="multipart/form-data" autocomplete="off" id="login">
					<div class="col s7">
						<div id="wrap-login">
							<div class="row" align="center">
								<h5>AUTENTICAZIONE</h5>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<select id="user_type" name="user_type" required>
					                  	<option value="" disabled selected>Tipologia Utente</option>
					                  	<option value="dirig">Dirigente</option>
					                  	<option value="tutsc">Tutor Scolastico</option>
					                  	<option value="tutaz">Tutor Aziendale</option>
					                  	<option value="alu">Alunno</option>
					                </select>
					                <label for="user_type">Utente</label>
				              	</div>
				              	<div class="input-field col s12">
				                  <input name="email" id="email" type="text" required>
				                  <label for="email">E-Mail</label>
				                </div>
				                <div class="input-field col s12">
				                  <input name="psw" id="psw" type="password" required>
				                  <label for="psw">Password</label>
				                </div>
							</div>

							 <div align="right">
				            	<button class="waves-effect waves-green btn btn-flat btn-submit-aut" action="submit" name="action">INVIA</button>
				            </div>
						</div>
					</div>
				</form>
				<form method="post" action="server/_loginOspite.php" enctype="multipart/form-data" autocomplete="off" id="login">
					<div class="col s5">
						<div id="wrap-ospite">
							<div class="row" align="center">
								<div align="center"><button class="waves-effect waves-green btn btn-flat btn-submit-aut" action="submit" name="action">OSPITE</button></div>
							</div>
							<br>
							<div align="right">
								<a class="tooltipped tooltip-text-view" data-position="bottom" data-delay="50" data-tooltip="<ul>
									<li>Visualizzare le <b>aziende</b> che ospitano gli stage</li><br>
									<li>Visualizzare la <b>Mappa</b> delle aziende</li>
								</ul>">Cosa posso fare?</a>
							</div>
						</div>
					</div>
				</form>
	        </div>
		</div>
  
	<script>
		$(document).ready(function(){
			$('.tooltipped').tooltip({delay: 50, html: true});
			$('select').material_select();
		});
	</script>
	</body>
</html>