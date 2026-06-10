<?php
ob_start();
?>
    <form action="<?= URL ?>save/add" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nom</label>
        <input name="nom" type="text" placeholder="Nom de l'étudiant">
      </div>
      <div class="form-group">
        <label>Prénom</label>
        <input name="prenom" type="text" placeholder="Prénom de l'étudiant">
      </div>
      <div class="form-group">
        <label>Ville</label>
        <input name="ville" type="text" placeholder="Ville de résidence">
      </div>
      <div class="form-group">
        <label>Photo</label>
        <input name="photo" type="file">
      </div>
      <div class="btn-actions">
        <input type="submit" id="ibsave" name="Enregistrer" class="btn btn-primary" value="Enregistrer">
        <button type="reset" class="btn btn-ghost">Réinitialiser</button>
      </div>
    </form>
    <div id="imsg"></div>
<?php
if(!empty($messageadd)) echo '<div class="msg msg-success">' . $messageadd . '</div>';
$content = ob_get_clean();
$titre = "Inscription d'un étudiant";
require 'template.php';
?>
