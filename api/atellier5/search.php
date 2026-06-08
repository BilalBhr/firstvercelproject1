<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Rechercher</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/styles.css">
  <script src="./js/jquery-3.3.1.slim.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</head>
<body>

<?php
include_once 'Traitements.php';
session_start();
if (empty($_SESSION['slog'])) { header("Location:acc.php"); exit; }
$login = $_SESSION['slog'];
?>

<!-- NAVBAR -->
<div class="container sticky-top">
  <header>
    <nav class="navbar navbar-dark navbar-expand-sm pl-5">
      <a class="brand-title" href="#">TDM-Classroom<span class="dot">.</span></a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-5">
          <li class="nav-item"><a class="nav-link" href="acc.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="save.php">Nouveau</a></li>
          <li class="nav-item active"><a class="nav-link" href="search.php">Rechercher</a></li>
        </ul>
      </div>
    </nav>
  </header>
</div>

<!-- HERO -->
<section>
  <div class="container">
    <div class="jumbotron jumbotron-fluid" style="background-image: url('./images/school.jpg'); background-size: cover; background-position: center;">
      <div class="display-4">Bienvenue à<br>TDM-Classroom.</div>
    </div>
  </div>
</section>

<!-- SEARCH -->
<div class="container page-wrap">
  <div class="form-card">
    <div class="welcome-badge">
      <span class="dot-live"></span>
      Connecté en tant que <strong style="color:var(--text-primary);margin-left:4px"><?= htmlspecialchars($login) ?></strong>
    </div>
    <p class="section-label">Base de données</p>
    <h2>Rechercher un Étudiant</h2>
    <div class="divider-accent"></div>

    <a class="show-all-link" href="search.php?cle=display">
      ↗ Afficher tous les étudiants
    </a>

    <form action="search.php" method="POST">
      <div class="form-group">
        <label>Ville</label>
        <input name="ville" type="text" class="form-control" placeholder="Entrez la ville à rechercher">
      </div>
      <div class="btn-row">
        <input type="submit" name="search" class="btn-outline-light" value="Rechercher">
        <button type="reset" class="btn-outline-light">Annuler</button>
      </div>
    </form>

    <a class="deconnect-link" href="dec.php">→ Déconnexion</a>
  </div>
</div>

<!-- RESULTS -->
<div class="container" style="margin-bottom:48px">
<?php
if (!empty($_POST['search'])) {
  $ville = $_POST['ville'];
  GetStudentsByCity($ville);
}
if (!empty($_GET['cle'])) {
  DispalyAll();
}
?>
</div>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-inner">
      <p class="footer-brand">TDM-Classroom<span class="dot">.</span></p>
      <p class="footer-copy">Copyright &copy; Tous droits réservés.</p>
    </div>
  </div>
</footer>

</body>
</html>
