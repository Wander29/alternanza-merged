<?php 
	session_start(); 
	if (strpos($_SESSION['permessi'], "HOME") !== false) {
?>
<html>
	<head>
		<title>Autenticazione</title>

		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Inserimento">
        <meta name="author" content="Ludovico Venturi & Luca Moroni">

        <link rel="icon" href="../assets/img/favicon.png">
        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="stylesheet" href="../lib/materialize/materialize.min.css">
        <link rel="stylesheet" href="../assets/css/style_ins.css">
        
        <script src="../lib/jquery.js"></script>
        <script src="../lib/materialize/materialize.min.js"></script>
	</head>
	<body>
		<nav class="my_nav">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center">Alternanza Scuola-Lavoro</a>
				<?php if ($_SESSION['tipoUt'] != "ospite") { ?>
                <div class="chip">
                  <img id="sliderTrigger" data-activates="slide-out" src="../assets/img/profile.jpg" alt="Contact Person">
                    <?php echo $_SESSION['name'] ?>
                </div>
              <?php } else { ?>
				<a href="../server/logout.php" class="btn" id="btn-esci-ospite">ESCI</a>
              <?php } ?>
			</div>
		</nav>
		<div class="compensatore"></div>
		<div class="container row">
			<div class="col s6">
			<?php if (strpos($_SESSION['permessi'], "VIEW") !== false) { ?>
				<div class="row">
					<div class="col s8 offset-s2">
						<div class="card blue-grey darken-1">
					    <div class="card-content white-text">
					      <span class="card-title">VISUALIZZAZIONE</span>
					    </div>
					    <div class="card-action">
					      <a href="view.php">Vai</a>
					    </div>
					  </div>
					</div>
					<div class="col s1"></div>
				</div>
			<?php } ?>
			</div>
			<div class="col s6">
			<?php if (strpos($_SESSION['permessi'], "INS") !== false) { ?>
				<div class="row">
					<div class="col s8 offset-s1">
						<div class="card blue-grey darken-1">
					    <div class="card-content white-text">
					      <span class="card-title">INSERIMENTO</span>
					    </div>
					    <div class="card-action">
					      <a href="ins.php">Vai</a>
					    </div>
					  </div>
					</div>
					<div class="col s1"></div>
				</div>
			<?php } ?>
			</div>
			<?php if (strpos($_SESSION['permessi'], "MAP") !== false) { ?>
				<div class="col s6">
					<div class="row">
						<div class="col s8 offset-s2">
							<div class="card blue-grey darken-1">
						    <div class="card-content white-text">
						      <span class="card-title">MAPPA</span>
						      <p>Visualizza Mappa Aziende</p>
						    </div>
						    <div class="card-action">
						      <a href="map.php">Vai</a>
						    </div>
						  </div>
						</div>
						<div class="col s3"></div>
					</div>
				</div>
			<?php } ?>
		</div>

		<!-- NOMI AUTORI -->
		<div class="fixed-action-btn toolbar">
		  <a class="btn-floating btn-large gre tooltipped" data-position="top" data-delay="50" data-tooltip="AUTORI sito">
		    <i class="large material-icons">mode_edit</i>
		  </a>
		  <ul>
		    <li><a class="btn-floating gre">Luca MORONI</a></li>
		    <li><a class="btn-floating gre">Ludovico VENTURI</a></li>
		</div>

	<?php require("../server/sideNavBottom.php"); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
			$("#sliderTrigger").sideNav();

			$("#changeP").click(function(){
				$("#nome_ut").val($(".email").html());
			});
		});
	</script>
	<script src="../assets/js/ins_ajax.js"></script>
	<?php if ($_SESSION['tipoUt'] !== "ospite") { ?> <script src="../assets/js/changep_aj.js"></script> <?php } ?>
	</body>
</html>
<?php } ?>