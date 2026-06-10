<?php 
ob_start();
?>
    <form>
      <div class="form-group">
        <label>Login</label>
        <input id="ilog" name="login" type="text" placeholder="Entrez votre login">
      </div>
      <div class="form-group">
        <label>Mot de passe</label>
        <input id="ipass" name="pass" type="password" placeholder="••••••••">
      </div>
      <div class="btn-actions">
        <button id="ibc" type="button" class="btn btn-primary">Se connecter</button>
        <button type="reset" class="btn btn-ghost">Annuler</button>
      </div>
    </form>
    <div id="imsg"></div>

<?php
if(!empty($messagerr)) echo '<div class="msg">' . $messagerr . '</div>';
$content = ob_get_clean();
$titre = "Authentification";
require 'template.php';
?>
