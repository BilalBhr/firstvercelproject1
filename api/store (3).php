<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Fruit Store</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  :root {
    --green:  #2d7a2d; --lime: #6abf3f; --light: #f0f7ec;
    --white:  #ffffff; --dark: #1a2e1a; --gray: #6b7a6b;
    --border: #d4e8cc; --card: #ffffff; --bg: #f5f9f2; --red: #d94040;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--dark); min-height: 100vh; }

  header { background: var(--dark); padding: 0 32px; display: flex; align-items: center; justify-content: space-between; height: 62px; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 12px rgba(0,0,0,0.25); }
  .logo { font-family: 'Syne', sans-serif; font-size: 1.5rem; color: var(--lime); text-decoration: none; }
  .logo span { color: var(--white); }
  nav a { color: #aac4a0; text-decoration: none; margin-left: 28px; font-size: 0.9rem; font-weight: 500; transition: color 0.2s; }
  nav a:hover { color: var(--lime); }
  .header-right { display: flex; align-items: center; gap: 16px; }
  .cart-badge { display: flex; align-items: center; gap: 8px; background: rgba(106,191,63,0.15); border: 1px solid rgba(106,191,63,0.3); color: var(--white); padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; cursor: pointer; }
  .cart-badge .num { background: var(--lime); color: var(--dark); font-weight: 700; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; }
  .btn-logout { color: #aac4a0; font-size: 0.85rem; text-decoration: none; padding: 6px 12px; border: 1px solid #2a4a2a; border-radius: 6px; transition: all 0.2s; }
  .btn-logout:hover { color: var(--red); border-color: var(--red); }

  .login-wrap { min-height: calc(100vh - 62px); display: flex; align-items: center; justify-content: center; padding: 20px; }
  .login-box { background: var(--card); border: 1px solid var(--border); border-radius: 20px; padding: 40px 36px; width: 100%; max-width: 400px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); animation: fadeUp 0.5s ease both; }
  .logo-big { text-align: center; font-family: 'Syne', sans-serif; font-size: 2.2rem; color: var(--lime); margin-bottom: 4px; }
  .logo-big span { color: var(--dark); }
  .sub { text-align: center; color: var(--gray); font-size: 0.85rem; margin-bottom: 28px; }
  .lbl { display: block; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 1px; color: var(--gray); margin-bottom: 6px; }
  .inp { width: 100%; padding: 11px 14px; border: 1.5px solid var(--border); border-radius: 10px; font-family: 'Inter', sans-serif; font-size: 0.95rem; color: var(--dark); background: var(--light); outline: none; transition: border 0.2s; margin-bottom: 18px; }
  .inp:focus { border-color: var(--lime); background: #fff; }
  .btn-green { width: 100%; padding: 13px; background: var(--lime); color: var(--dark); border: none; border-radius: 10px; font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700; cursor: pointer; }
  .btn-green:hover { background: var(--green); color: #fff; }
  .alert-err { background: #ffeaea; border: 1px solid #f5c0c0; color: var(--red); padding: 10px 14px; border-radius: 8px; font-size: 0.88rem; margin-bottom: 18px; }

  .store-layout { display: grid; grid-template-columns: 1fr 340px; gap: 28px; max-width: 1200px; margin: 0 auto; padding: 32px 24px; align-items: start; }
  @media (max-width: 900px) { .store-layout { grid-template-columns: 1fr; } }
  @media (max-width: 600px) { .store-layout { padding: 16px; } header { padding: 0 16px; } }

  .section-title { font-family: 'Syne', sans-serif; font-size: 1.3rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
  .section-title i { color: var(--lime); }
  .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(170px, 1fr)); gap: 16px; }
  @media (max-width: 500px) { .products-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; } }

  .fruit-card { background: var(--card); border: 1.5px solid var(--border); border-radius: 16px; overflow: hidden; transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s; }
  .fruit-card:hover { transform: translateY(-4px); box-shadow: 0 12px 28px rgba(45,122,45,0.13); border-color: var(--lime); }
  .fruit-img { width: 100%; height: 130px; object-fit: cover; display: block; background: var(--light); }
  .fruit-body { padding: 12px 14px 14px; }
  .fruit-name { font-family: 'Syne', sans-serif; font-size: 1rem; margin-bottom: 4px; }
  .fruit-price { color: var(--lime); font-weight: 700; font-size: 1.05rem; margin-bottom: 12px; }
  .fruit-price span { font-size: 0.78rem; color: var(--gray); font-weight: 400; }
  .add-row { display: flex; gap: 6px; align-items: center; }
  .qty-input { width: 52px; padding: 7px 8px; border: 1.5px solid var(--border); border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 0.9rem; text-align: center; color: var(--dark); background: var(--light); outline: none; }
  .btn-add { flex: 1; padding: 7px 10px; background: var(--lime); color: var(--dark); border: none; border-radius: 8px; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 5px; }
  .btn-add:hover { background: var(--green); color: #fff; }

  .cart-box { background: var(--card); border: 1.5px solid var(--border); border-radius: 18px; padding: 24px 20px; position: sticky; top: 78px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
  .cart-empty-msg { text-align: center; color: var(--gray); padding: 28px 0; font-size: 0.9rem; }
  .cart-empty-msg .big { font-size: 2.5rem; display: block; margin-bottom: 8px; }
  .cart-item { display: flex; align-items: center; gap: 10px; padding: 10px 0; border-bottom: 1px solid var(--border); }
  .ci-img { width: 44px; height: 44px; border-radius: 10px; overflow: hidden; flex-shrink: 0; background: var(--light); }
  .ci-img img { width: 100%; height: 100%; object-fit: cover; }
  .ci-info { flex: 1; }
  .ci-name { font-weight: 600; font-size: 0.9rem; }
  .ci-detail { font-size: 0.78rem; color: var(--gray); }
  .ci-sub { font-weight: 700; color: var(--green); font-size: 0.9rem; white-space: nowrap; }
  .btn-del { background: none; border: none; color: #c0c0c0; font-size: 1rem; cursor: pointer; padding: 4px 6px; border-radius: 6px; transition: color 0.2s, background 0.2s; }
  .btn-del:hover { color: var(--red); background: #ffeaea; }
  .cart-total-row { display: flex; justify-content: space-between; align-items: center; margin-top: 16px; padding-top: 14px; border-top: 2px solid var(--dark); font-family: 'Syne', sans-serif; font-size: 1.1rem; }
  .cart-total-row strong { color: var(--green); font-size: 1.3rem; }
  .btn-order { display: block; width: 100%; margin-top: 14px; padding: 13px; background: var(--dark); color: var(--white); border: none; border-radius: 10px; font-family: 'Syne', sans-serif; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: background 0.2s; }
  .btn-order:hover { background: var(--green); }
  .btn-vider { background: none; border: none; display: block; width: 100%; text-align: center; margin-top: 10px; font-size: 0.8rem; color: var(--gray); cursor: pointer; font-family: 'Inter', sans-serif; }
  .btn-vider:hover { color: var(--red); }

  .flash { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%); background: var(--lime); color: var(--dark); padding: 10px 24px; border-radius: 30px; font-weight: 600; font-size: 0.88rem; z-index: 999; animation: flashFade 2.5s forwards; white-space: nowrap; box-shadow: 0 4px 16px rgba(106,191,63,0.4); }
  @keyframes flashFade { 0%{opacity:0;transform:translateX(-50%) translateY(10px)} 15%{opacity:1;transform:translateX(-50%) translateY(0)} 80%{opacity:1} 100%{opacity:0} }
  @keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }
  footer { text-align: center; padding: 24px; color: var(--gray); font-size: 0.8rem; border-top: 1px solid var(--border); margin-top: 20px; }
</style>
</head>
<body>
<?php

/* ====================================================
   CLASSE Fruit
==================================================== */
class Fruit {
  public string $id;
  public string $nom;
  public string $image; // chemin image ex: images/pomme.jpg
  public float  $prix;

  public function __construct(string $id, string $nom, string $image, float $prix) {
    $this->id    = $id;
    $this->nom   = $nom;
    $this->image = $image;
    $this->prix  = $prix;
  }
  public function getPrix():  float  { return $this->prix; }
  public function getNom():   string { return $this->nom; }
  public function getImage(): string { return $this->image; }
}

/* ====================================================
   CLASSE Panier
==================================================== */
class Panier {
  private array $items = [];

  public function ajouter(Fruit $fruit, int $qte = 1): void {
    if (isset($this->items[$fruit->id])) {
      $this->items[$fruit->id]['qty'] += $qte;
    } else {
      $this->items[$fruit->id] = ['fruit' => $fruit, 'qty' => $qte];
    }
  }

  public function supprimer(string $id): void {
    unset($this->items[$id]);
  }

  public function getItems(): array { return $this->items; }

  public function getTotal(): float {
    $total = 0;
    foreach ($this->items as $item)
      $total += $item['fruit']->getPrix() * $item['qty'];
    return $total;
  }

  public function getNombreFruits(): int {
    return array_sum(array_column($this->items, 'qty'));
  }

  public function vider(): void { $this->items = []; }
}

/* ====================================================
   CATALOGUE — images dans dossier images/
==================================================== */
$catalogue = [
  new Fruit('pomme',  'Pomme',   'pomme.jpg',   3.90),
  new Fruit('avocat', 'Avocat',  'avocat.jpg',  4.20),
  new Fruit('banane', 'Banane',  'banane.jpg',  3.20),
  new Fruit('orange', 'Orange',  'orange.jpg',  4.50),
  new Fruit('fraise', 'Fraises', 'fraise.jpg',  5.90),
  new Fruit('ananas', 'Ananas',  'ananas.jpg',  6.90),
  new Fruit('kiwi',   'Kiwi',    'kiwi.jpg',    7.90),
  new Fruit('mangue', 'Mangue',  'mangue.jpg',  9.90),
];
$index = [];
foreach ($catalogue as $f) $index[$f->id] = $f;

/* ====================================================
   AUTH
==================================================== */
$USERS = ['Bilal' => '1234'];
$login_error = '';

if (!empty($_GET['logout'])) { session_destroy(); header('Location: store.php'); exit; }

if (!empty($_POST['action_login'])) {
  $u = trim($_POST['login']);
  $p = $_POST['pass'];
  if (isset($USERS[$u]) && $USERS[$u] === $p) {
    $_SESSION['user'] = $u;
    if (!isset($_SESSION['panier'])) $_SESSION['panier'] = new Panier();
  } else {
    $login_error = "Identifiant ou mot de passe incorrect.";
  }
}

/* ====================================================
   ACTIONS PANIER — tout en POST (pas de GET ?del=)
==================================================== */
if (!isset($_SESSION['panier'])) $_SESSION['panier'] = new Panier();
$panier = $_SESSION['panier'];
$flash  = '';

// Ajouter
if (!empty($_POST['action_add'])) {
  $id  = $_POST['fruit_id'];
  $qty = max(1, (int)($_POST['qty'] ?? 1));
  if (isset($index[$id])) {
    $panier->ajouter($index[$id], $qty);
    $flash = '✔ ' . $index[$id]->getNom() . ' ajouté au panier !';
  }
}

// Supprimer un fruit — POST (corrige erreur 403 Vercel)
if (!empty($_POST['action_del'])) {
  $panier->supprimer($_POST['del_id']);
}

// Vider le panier — POST
if (!empty($_POST['action_vider'])) {
  $panier->vider();
}

$logged = !empty($_SESSION['user']);
$user   = $_SESSION['user'] ?? '';
?>

<?php if ($flash && $logged): ?>
<div class="flash"><?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<!-- HEADER -->
<header>
  <a href="store.php" class="logo">E-Fruit<span>.</span></a>
  <nav>
    <a href="store.php">Accueil</a>
    <?php if ($logged): ?><a href="#store">Store</a><?php endif; ?>
  </nav>
  <?php if ($logged): ?>
  <div class="header-right">
    <div class="cart-badge" onclick="document.getElementById('panier-section').scrollIntoView({behavior:'smooth'})">
      <i class="fas fa-shopping-basket"></i> Panier
      <span class="num"><?= $panier->getNombreFruits() ?></span>
    </div>
    <span style="color:#aac4a0;font-size:0.85rem;"> <?= htmlspecialchars($user) ?></span>
    <a href="store.php?logout=1" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
  </div>
  <?php endif; ?>
</header>

<?php if (!$logged): ?>
<!-- ===== LOGIN ===== -->
<div class="login-wrap">
  <div class="login-box">
    <div class="logo-big">E-Fruit<span>.</span></div>
    <p class="sub">Veuillez vous authentifier</p>
    <?php if ($login_error): ?>
      <div class="alert-err"><i class="fas fa-exclamation-circle"></i> <?= $login_error ?></div>
    <?php endif; ?>
    <form method="POST">
      <label class="lbl">Login</label>
      <input class="inp" type="text" name="login" placeholder="Bilal" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>" required autofocus>
      <label class="lbl">Mot de passe</label>
      <input class="inp" type="password" name="pass" placeholder="••••••••" required>
      <button class="btn-green" type="submit" name="action_login" value="1">
        <i class="fas fa-sign-in-alt"></i> Connexion
      </button>
    </form>
  </div>
</div>

<?php else: ?>
<!-- ===== STORE ===== -->
<div class="store-layout" id="store">

  <!-- PRODUITS -->
  <div>
    <div class="section-title"><i class="fas fa-store"></i> Nos Fruits Frais</div>
    <div class="products-grid">
      <?php foreach ($catalogue as $fruit): ?>
      <div class="fruit-card">
        <img class="fruit-img" src="<?= $fruit->getImage() ?>" alt="<?= $fruit->getNom() ?>">
        <div class="fruit-body">
          <div class="fruit-name"><?= $fruit->getNom() ?></div>
          <div class="fruit-price"><?= number_format($fruit->getPrix(), 2) ?> €<span>/kg</span></div>
          <form method="POST" class="add-row">
            <input type="hidden" name="fruit_id" value="<?= $fruit->id ?>">
            <input class="qty-input" type="number" name="qty" value="1" min="1" max="99">
            <button class="btn-add" type="submit" name="action_add" value="1">
              <i class="fas fa-plus"></i> Ajouter
            </button>
          </form>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- PANIER -->
  <div id="panier-section">
    <div class="cart-box">
      <div class="section-title"><i class="fas fa-shopping-basket"></i> Mon Panier</div>

      <?php $items = $panier->getItems(); ?>
      <?php if (empty($items)): ?>
        <div class="cart-empty-msg">
          <span class="big"></span>
          Votre panier est vide.<br>Ajoutez des fruits !
        </div>
      <?php else: ?>
        <?php foreach ($items as $item):
          $f = $item['fruit']; $qty = $item['qty'];
        ?>
        <div class="cart-item">
          <div class="ci-img">
            <img src="<?= $f->getImage() ?>" alt="<?= $f->getNom() ?>">
          </div>
          <div class="ci-info">
            <div class="ci-name"><?= $f->getNom() ?></div>
            <div class="ci-detail"><?= $qty ?> × <?= number_format($f->getPrix(), 2) ?> €</div>
          </div>
          <div class="ci-sub"><?= number_format($f->getPrix() * $qty, 2) ?> €</div>
          <!-- SUPPRIMER en POST (corrige 403 Vercel) -->
          <form method="POST" style="display:inline;">
            <input type="hidden" name="del_id" value="<?= $f->id ?>">
            <button type="submit" name="action_del" value="1" class="btn-del" title="Supprimer">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </div>
        <?php endforeach; ?>

        <div class="cart-total-row">
          <span>Total</span>
          <strong><?= number_format($panier->getTotal(), 2) ?> €</strong>
        </div>

        <button class="btn-order"
          onclick="alert(' Commande passée !\nTotal : <?= number_format($panier->getTotal(), 2) ?> €\nMerci <?= htmlspecialchars($user) ?> ')">
          <i class="fas fa-check-circle"></i> Passer la commande
        </button>

        <!-- VIDER en POST -->
        <form method="POST">
          <button type="submit" name="action_vider" value="1" class="btn-vider">
            🗑 Vider le panier
          </button>
        </form>

      <?php endif; ?>
    </div>
  </div>

</div>
<?php endif; ?>


</body>
</html>
