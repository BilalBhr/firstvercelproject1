<?php
ob_start();
?>
    <div class="error-page">
        <div class="error-code">404</div>
        <p style="font-size:18px;margin-top:12px;font-weight:600;">Page introuvable</p>
        <p class="error-msg"><?= isset($msg) ? $msg : "Cette page n'existe pas." ?></p>
        <a href="<?= URL ?>accueil" class="btn btn-primary" style="margin-top:24px;display:inline-flex;">Retour à l'accueil</a>
    </div>
<?php
$content = ob_get_clean();
$titre = "Erreur";
require 'template.php';
?>
