<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TDM-Classroom — Rechercher</title>
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
    <a href="save.php">Nouveau</a>
    <a href="search.php" class="active">Rechercher</a>
  </nav>
</header>

<!-- HERO -->
<div class="hero">
  <div class="hero-content">
    <h1>Bienvenue à<br>TDM-Classroom<span>.</span></h1>
    <p>Gestion des étudiants — plateforme administrative</p>
  </div>
</div>

<!-- RECHERCHE -->
<div class="page-content">
  <div class="card-box">
    <h2>Rechercher des étudiants</h2>
    <div class="divider-gold"></div>

    <div style="margin-bottom:1rem;">
      <a href="search.php?action3=list" class="btn-link-gold">→ Afficher tous les étudiants</a>
    </div>

    <form action="search.php" method="POST" style="display:flex;gap:.75rem;align-items:flex-end;">
      <div class="form-group" style="flex:1;margin-bottom:0;">
        <label>Recherche par ville</label>
        <input name="ville" type="text" placeholder="Entrez la ville...">
      </div>
      <div>
        <input type="submit" name="actionsearch" class="btn-primary-custom" value="Rechercher">
        <button type="reset" class="btn-secondary-custom">Annuler</button>
      </div>
    </form>
  </div>

  <?php
  include_once './Tstutents.php';

  function renderTable($cursor) { ?>
  <div class="table-wrapper">
    <table class="styled-table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Ville</th>
          <th>Sexe</th>
          <th>Photo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $cursor->fetch()): ?>
        <tr>
          <td><?= htmlspecialchars($row[1]) ?></td>
          <td><?= htmlspecialchars($row[2]) ?></td>
          <td><?= htmlspecialchars($row[3]) ?></td>
          <td><?= htmlspecialchars($row[5] ?? '') ?></td>
          <td><img src="<?= $row[4] ?>" width="60" height="60" style="border-radius:6px;object-fit:cover;"></td>
          <td style="white-space:nowrap;">
            <a href="search.php?action4=<?= $row[0] ?>" title="Supprimer">
              <img src="images/delete.png" class="action-icon">
            </a>
            <a href="update.php?actiontest=ok&cid=<?= $row[0] ?>&cnom=<?= urlencode($row[1]) ?>&cprenom=<?= urlencode($row[2]) ?>&cville=<?= urlencode($row[3]) ?>&cphoto=<?= urlencode($row[4]) ?>" title="Modifier">
              <img src="images/update.png" class="action-icon" style="margin-left:.4rem;">
            </a>
          </td>
        </tr>
      <?php endwhile; $cursor->closeCursor(); ?>
      </tbody>
    </table>
  </div>
  <?php }

  if (!empty($_GET['action3'])) {
      $cur = Tstutents::GetAllStudents();
      renderTable($cur);
  }

  if (!empty($_GET['action4'])) {
      Tstutents::DeleteStudent($_GET['action4']);
      echo '<div class="alert-success-custom" style="margin-top:1rem;">✓ Étudiant supprimé.</div>';
  }

  if (!empty($_POST['actionsearch'])) {
      $city = $_POST['ville'];
      $cur  = Tstudents::GetStudentsByCity($city);
      renderTable($cur);
  }
  ?>
</div>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="brand-foot">TDM-Classroom<span>.</span></div>
  <div>Copyright &copy; Tous droits réservés.</div>
</footer>
</body>
</html>
