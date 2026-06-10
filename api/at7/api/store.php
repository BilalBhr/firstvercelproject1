<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FruitStore - Mon Panier</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
include_once 'Panier.php';
session_start();
if (isset($_SESSION['cpanier'])) {
  $p = $_SESSION['cpanier'];
  $id = $_SESSION['cid'];
  $contenu = count($p->getTableau_fruit());
} else {
  $contenu = 0;
}
?>

<div class="topbar">
  <div class="topbar-inner">
    <a class="brand" href="#">FruitStore<span>.</span></a>
    <div class="nav-links">
      <a href="store.php" class="active">Boutique</a>
      <a href="store.php?actionlist=all">Mon panier</a>
    </div>
    <div class="cart-badge">
      <span class="dot"></span>
      <?= $contenu ?> fruit<?= $contenu > 1 ? 's' : '' ?>
    </div>
  </div>
</div>

<div class="hero">
  <div class="hero-img">
    <img src="images/panier.jpg" alt="Panier">
    <div class="hero-text">
      <h1>Mon Panier</h1>
      <p><?= $contenu ?> fruit<?= $contenu > 1 ? 's' : '' ?> ajoute<?= $contenu > 1 ? 's' : '' ?></p>
    </div>
  </div>
</div>

<div class="wrap">
  <div class="card">
    <p class="section-label">Ajouter des fruits</p>
    <h2 class="card-title">Composer votre panier</h2>
    <div class="divider"></div>

    <form action="store.php" method="POST">
      <fieldset>
        <legend>Choisissez vos quantites</legend>
        <div class="input-grid" style="margin-top:18px;">
          <div class="fruit-field">
            <img src="images/pomme.jpg" alt="Pomme">
            <label for="nb_pommes">Pommes - 1.00 DH</label>
            <input type="number" id="nb_pommes" name="nb_pommes" value="0" min="0" required>
          </div>
          <div class="fruit-field">
            <img src="images/poire.jpg" alt="Poire">
            <label for="nb_poires">Poires - 1.50 DH</label>
            <input type="number" id="nb_poires" name="nb_poires" value="0" min="0" required>
          </div>
          <div class="fruit-field">
            <img src="images/banane.jpg" alt="Banane">
            <label for="nb_bananes">Bananes - 2.00 DH</label>
            <input type="number" id="nb_bananes" name="nb_bananes" value="0" min="0" required>
          </div>
        </div>
        <div class="btn-row">
          <input type="submit" name="actionadd" class="btn btn-primary" value="Ajouter au panier">
          <input type="reset" class="btn btn-ghost" value="Reinitialiser">
        </div>
      </fieldset>
    </form>

    <a class="deconnect" href="store.php?actiondec=dec">Deconnexion</a>
  </div>

  <?php
  if (isset($_POST['actionadd'])) {
    $nbpommes  = $_POST['nb_pommes'];
    $nbpoires  = $_POST['nb_poires'];
    $nbbananes = $_POST['nb_bananes'];
    for ($i = 0; $i < $nbpommes;  $i++) { $p->Ajouter_fruit(new Fruit($_SESSION['cid']++, "Pomme",  1,   'images/pomme.jpg')); }
    for ($i = 0; $i < $nbpoires;  $i++) { $p->Ajouter_fruit(new Fruit($_SESSION['cid']++, "Poire",  1.5, 'images/poire.jpg')); }
    for ($i = 0; $i < $nbbananes; $i++) { $p->Ajouter_fruit(new Fruit($_SESSION['cid']++, "Banane", 2,   'images/banane.jpg')); }
    header("Location:store.php");
    exit;
  }

  if (isset($_GET['actionlist'])) {
    $fruits = $p->getTableau_fruit();
    echo '<div class="panier-section">';
    echo '<h2>Contenu du panier <span class="badge">' . count($fruits) . ' fruit' . (count($fruits) > 1 ? 's' : '') . '</span></h2>';
    if (count($fruits) === 0) {
      echo '<p style="color:var(--txt-muted);font-size:.9rem;">Votre panier est vide.</p>';
    } else {
      echo '<table><thead><tr><th>Fruit</th><th>Prix unitaire</th><th>Photo</th><th>Action</th></tr></thead><tbody>';
      foreach ($fruits as $fruit) {
        $fid   = $fruit->getId();
        $nom   = $fruit->getNom();
        $prix  = $fruit->getPrix_unitaire();
        $photo = $fruit->getPhoto();
        echo "<tr>
          <td>$nom</td>
          <td>$prix DH</td>
          <td><img src='$photo' width='48' height='48' alt='$nom'></td>
          <td><a href='store.php?actionsup=$fid' class='btn btn-danger'>Supprimer</a></td>
        </tr>";
      }
      echo '</tbody></table>';
      $total = $p->Prix_total();
      echo '<div class="total-row"><span class="label">Total a payer</span><span class="amount">' . number_format($total, 2) . ' DH</span></div>';
    }
    echo '</div>';
  }

  if (isset($_GET['actiondec'])) {
    session_destroy();
    header("Location:connection.php");
    exit;
  }

  if (isset($_GET['actionsup'])) {
    $p->supprimer($_GET['actionsup']);
    $_SESSION['cid']--;
    header("Location:store.php?actionlist=all");
    exit;
  }
  ?>
</div>

<footer>
  <div class="footer-inner">
    <p class="footer-brand">FruitStore<span>.</span></p>
    <p class="footer-copy">Copyright &copy; Tous droits reserves.</p>
  </div>
</footer>

</body>
</html>
