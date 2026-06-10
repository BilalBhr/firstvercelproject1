<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Modifier étudiant</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/jquery-3.3.1.slim.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</head>
<body>

<!-- NAVBAR -->
<header class="site-navbar">
  <div class="brand">TDM-Classroom<span>.</span></div>
  <nav>
    <a href="acc.php">Accueil</a>
    <a href="save.php" class="active">Nouveau</a>
    <a href="search.php">Rechercher</a>
  </nav>
</header>

<!-- HERO -->
<div class="hero">
  <div class="hero-content">
    <h1>Bienvenue à<br>TDM-Classroom<span>.</span></h1>
    <p>Gestion des étudiants — plateforme administrative</p>
  </div>
</div>

<?php
include_once './Tstutents.php';
$id = $nom = $prenom = $ville = $photo = '';
if (!empty($_GET['actiontest'])) {
    $id     = $_GET['cid'];
    $nom    = $_GET['cnom'];
    $prenom = $_GET['cprenom'];
    $ville  = $_GET['cville'];
    $photo  = $_GET['cphoto'];
}
?>

<!-- FORMULAIRE MISE À JOUR -->
<div class="page-content">
  <div class="card-box" style="max-width:540px;margin:0 auto;">
    <h2>Modifier les informations</h2>
    <div class="divider-gold"></div>

    <form action="update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nom</label>
        <input name="nom" type="text" value="<?= htmlspecialchars($nom) ?>">
      </div>
      <div class="form-group">
        <label>Prénom</label>
        <input name="prenom" type="text" value="<?= htmlspecialchars($prenom) ?>">
      </div>
      <div class="form-group">
        <label>Ville</label>
        <input name="ville" type="text" value="<?= htmlspecialchars($ville) ?>">
      </div>
      <div class="form-group">
        <label>Photo actuelle</label><br>
        <?php if ($photo): ?>
          <img src="<?= $photo ?>" width="80" height="80" style="border-radius:8px;object-fit:cover;margin-bottom:.6rem;display:block;">
        <?php endif; ?>
        <label>Nouvelle photo</label>
        <input name="photo" type="file">
      </div>
      <div style="margin-top:1.5rem;">
        <input type="submit" name="Modifier" class="btn-primary-custom" value="Enregistrer">
        <a href="search.php?action3=list" class="btn-secondary-custom" style="display:inline-block;text-align:center;">Annuler</a>
      </div>
    </form>

    <?php
    if (!empty($_POST['Modifier'])) {
        $id       = $_GET['id'];
        $nom      = $_POST['nom'];
        $prenom   = $_POST['prenom'];
        $ville    = $_POST['ville'];
        $phototem = $_FILES['photo']['tmp_name'];
        $nomp     = $_FILES['photo']['name'];
        $photodes = "pics/$nomp";
        Tstutents::UpdateStudent($id, $nom, $prenom, $ville, $phototem, $photodes);
        echo '<div class="alert-success-custom">✓ Informations mises à jour.</div>';
    }
    ?>
  </div>
</div>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="brand-foot">TDM-Classroom<span>.</span></div>
  <div>Copyright &copy; Tous droits réservés.</div>
</footer>
</body>
</html>
