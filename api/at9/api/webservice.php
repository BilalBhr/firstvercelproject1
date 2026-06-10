
<?php

// URL du service web
$url = "https://data.laregion.fr/api/explore/v2.1/catalog/datasets/agenda-d-occitanie-musees/records?limit=5";


// récupération JSON
$json = file_get_contents($url);


// transformation JSON -> tableau PHP
$data = json_decode($json);


// début tableau HTML
echo "<table border='1' width='100%'>";

echo "<tr>";

echo "<th>Nom du lieu</th>";
echo "<th>Ville</th>";


echo "</tr>";



// boucle résultats
foreach($data->results as $r)
{
    echo "<tr>";

    echo "<td>"
         .$r->nom_du_lieu.
         "</td>";

    echo "<td>"
         .$r->ville.
         "</td>";

   

    echo "</tr>";
}


// fin tableau
echo "</table>";

?>