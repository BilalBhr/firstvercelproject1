<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Accueil</title>
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
    <a href="acc.php" class="active">Accueil</a>
    <a href="save.php">Nouveau</a>
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

<!-- CONNEXION -->
<div class="page-content">
  <div class="card-box" style="max-width:480px;margin:0 auto;">
    <h2>Authentification</h2>
    <div class="divider-gold"></div>

    <form action="acc.php" method="POST">
      <div class="form-group">
        <label>Login</label>
        <input name="login" type="text" placeholder="Entrez votre login">
      </div>
      <div class="form-group">
        <label>Mot de passe</label>
        <input name="pass" type="password" placeholder="••••••••">
      </div>
      <div style="margin-top:1.5rem;">
        <input type="submit" name="conn" class="btn-primary-custom" value="Se connecter">
        <button type="reset" class="btn-secondary-custom">Annuler</button>
      </div>
    </form>

    <?php
    include_once './Tstutents.php';
    if (!empty($_POST['conn'])) {
        $login = $_POST['login'];
        $pass  = $_POST['pass'];
        $r = Tstutents::checkuser($login, $pass);
        if ($r == 0) {
            echo '<div class="alert-error-custom">Login ou mot de passe incorrect.</div>';
        } else {
            header("Location:save.php");
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
