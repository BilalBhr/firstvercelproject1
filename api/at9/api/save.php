<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Nouveau étudiant</title>
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

<!-- FORMULAIRE AJOUT -->
<div class="page-content">
  <div class="card-box" style="max-width:540px;margin:0 auto;">
    <h2>Ajouter un étudiant</h2>
    <div class="divider-gold"></div>

    <form action="save.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nom</label>
        <input name="nom" type="text" placeholder="Nom de famille">
      </div>
      <div class="form-group">
        <label>Prénom</label>
        <input name="prenom" type="text" placeholder="Prénom">
      </div>
      <div class="form-group">
        <label>Ville</label>
        <input name="ville" type="text" placeholder="Ville de résidence">
      </div>
      <div class="form-group">
        <label>Photo</label>
        <input name="photo" type="file">
      </div>
      <div style="margin-top:1.5rem;">
        <input type="submit" name="Enregistrer" class="btn-primary-custom" value="Ajouter">
        <button type="reset" class="btn-secondary-custom">Annuler</button>
      </div>
    </form>

    <?php
    include_once './Tstutents.php';
    if (!empty($_POST['Enregistrer'])) {
        $nom      = $_POST['nom'];
        $prenom   = $_POST['prenom'];
        $ville    = $_POST['ville'];
        $phototem = $_FILES['photo']['tmp_name'];
        $nomp     = $_FILES['photo']['name'];
        $photodes = "pics/$nomp";
        $r = Tstutents::AddStudent($nom, $prenom, $ville, $phototem, $photodes);
        if ($r != 0) {
            echo '<div class="alert-success-custom">✓ Étudiant ajouté avec succès !</div>';
        }
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
