<?php
ob_start();
?>
    <div class="search-row">
      <div class="form-group">
        <label>Rechercher par ville</label>
        <input id="iville" name="ville" type="text" placeholder="Ex: Casablanca">
      </div>
      <button type="button" id="ibyville" class="btn btn-primary">Rechercher</button>
      <button id="iball" type="button" class="btn btn-ghost">Afficher tous</button>
    </div>

    <div class="table-wrap">
      <table>
        <tbody id="iresall"></tbody>
      </table>
    </div>
<?php
$content = ob_get_clean();
$titre = "Liste des étudiants";
require 'template.php';
?>
