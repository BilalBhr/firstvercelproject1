<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FruitStore - Connexion</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="topbar">
  <div class="topbar-inner">
    <a class="brand" href="#">FruitStore<span>.</span></a>
    <div class="nav-links">
      <a href="connection.php" class="active">Connexion</a>
    </div>
  </div>
</div>

<div class="hero">
  <div class="hero-img">
    <img src="images/panier.jpg" alt="Panier">
    <div class="hero-text">
      <h1>Bienvenue sur FruitStore</h1>
      <p>Gerez votre panier de fruits en ligne</p>
    </div>
  </div>
</div>

<div class="wrap">
  <div class="card" style="max-width:480px; margin:0 auto;">
    <p class="section-label">Espace securise</p>
    <h2 class="card-title">Authentification</h2>
    <div class="divider"></div>

    <?php
    include 'Panier.php';
    if (!empty($_POST['actionlog'])) {
      $login = $_POST['login'];
      $pass  = $_POST['pass'];
      $r = Panier::checkuser($login, $pass);
      if ($r == 1) {
        session_start();
        $panier = new Panier();
        $_SESSION['cpanier'] = $panier;
        $_SESSION['cid'] = 0;
        header("Location:store.php");
        exit;
      } else {
        echo '<div class="error-box">Login ou mot de passe incorrect.</div>';
      }
    }
    ?>

    <form action="connection.php" method="POST">
      <div class="form-row">
        <label>Login</label>
        <input type="text" name="login" placeholder="Entrez votre login">
      </div>
      <div class="form-row">
        <label>Mot de passe</label>
        <input type="password" name="pass" placeholder="........">
      </div>
      <div class="btn-row" style="margin-top:8px;">
        <input type="submit" name="actionlog" class="btn btn-primary" value="Se connecter">
        <input type="reset" class="btn btn-ghost" value="Annuler">
      </div>
    </form>
  </div>
</div>

<footer>
  <div class="footer-inner">
    <p class="footer-brand">FruitStore<span>.</span></p>
    <p class="footer-copy">Copyright &copy; Tous droits reserves.</p>
  </div>
</footer>

</body>
</html>
