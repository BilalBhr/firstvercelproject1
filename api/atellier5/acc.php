<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Connexion</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/styles.css">
  <script src="./js/jquery-3.3.1.slim.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</head>
<body>

<?php
include_once 'Traitements.php';
$username = ''; $password = ''; $error = '';

if (!empty($_POST['conn'])) {
  $username = $_POST['login'];
  $password = $_POST['pass'];
  $r = authentification($username, $password);
  if ($r == 0) {
    $error = "Login ou mot de passe incorrect.";
  } else {
    session_start();
    $_SESSION['slog'] = $username;
    $_SESSION['spass'] = $password;
    if ($r == 1 && !empty($_POST['remember'])) {
      setcookie("username", $username, time()+30);
      setcookie("password", $password, time()+30);
    }
    header("Location:save.php");
  }
} else {
  if (isset($_COOKIE['username'])) $username = $_COOKIE['username'];
  if (isset($_COOKIE['password'])) $password = $_COOKIE['password'];
}
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
          <li class="nav-item active"><a class="nav-link" href="acc.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="save.php">Nouveau</a></li>
          <li class="nav-item"><a class="nav-link" href="search.php">Rechercher</a></li>
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

<!-- LOGIN FORM -->
<div class="container page-wrap">
  <div class="form-card">
    <p class="section-label">Espace sécurisé</p>
    <h2>Authentification</h2>
    <div class="divider-accent"></div>

    <?php if (!empty($error)): ?>
      <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="acc.php" method="POST">
      <div class="form-group">
        <label>Login</label>
        <input name="login" type="text" class="form-control" value="<?= htmlspecialchars($username) ?>" placeholder="Entrez votre login">
      </div>
      <div class="form-group">
        <label>Mot de passe</label>
        <input name="pass" type="password" class="form-control" value="<?= htmlspecialchars($password) ?>" placeholder="••••••••">
      </div>
      <label class="remember-row">
        <input type="checkbox" name="remember" value="remember"> Se souvenir de moi
      </label>
      <div class="btn-row">
        <input type="submit" name="conn" class="btn-outline-light" value="Connexion">
        <button type="reset" class="btn-outline-light">Annuler</button>
      </div>
    </form>
  </div>
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
