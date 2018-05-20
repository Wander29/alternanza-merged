<?php if ($_SESSION['tipoUt'] !== "ospite") { ?>
  <ul id="slide-out" class="side-nav">
    <li><div class="user-view">
      <div style="background-color: #01870A" class="background">
      </div>
      <img class="circle" src="../assets/img/profile.jpg">
      <span class="white-text name"><?php echo $_SESSION["name"]; ?></span>
      <span class="white-text email"><?php echo $_SESSION["mail"]; ?></span>
    </div></li>
    <li><a class="modal-trigger" id="changeP" href="#modal1">Cambia Password</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../server/logout.php">ESCI</a></li>
    <li><div class="divider"></div></li>
  </ul>

    <div id="modal1" class="modal">
    <div class="modal-content">
      <form class="changep" action="../server/changepw.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="row flexx">
          <h4>Modifica Password</h4>
          <button class="modal-action modal-close waves-effect waves-green btn btn-flat" action="submit" name="action">INVIA</button>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="oldpsw" id="oldpsw" type="password" >
              <label for="oldpsw">Vecchia Password</label>
            </div>
            <div class="input-field col s12">
              <input name="newpsw" id="newpsw" type="password" >
              <label for="newpsw">Nuova Password</label>
            </div>
        </div>
      </form>
    </div>
  </div>
    <div class="progress_cont dn">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
  <?php } ?>