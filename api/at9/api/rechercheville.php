<?php

include_once './Tstutents.php';

?>

<!DOCTYPE HTML>
<html>

<head>

<meta charset="utf-8">

<link rel="stylesheet" href="./css/bootstrap.min.css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

<div class="container mt-5">

    <h2 class="bg-dark text-white p-3">
        Recherche des étudiants par ville (AJAX)
    </h2>





<!-- combo des villes -->

<div class="form-group">

    <label>
        Choisir une ville
    </label>

    <select id="ville" class="form-control">

        <option value="">
            -- Sélectionner une ville --
        </option>

<?php

$cur = Tstutents::GetCities();

while($row = $cur->fetch())
{
    echo "<option value='$row[0]'>$row[0]</option>";
}

$cur->closeCursor();

?>

    </select>

</div>





<!-- zone résultat -->

<div id="resultat" class="mt-4">

</div>

</div>





<script>

$(document).ready(function(){

    // changement du combo
    $("#ville").change(function(){

        // récupération de la ville
        var city = $(this).val();

        // appel AJAX
        $.ajax({

            url: "searchstudents.php",

            method: "GET",

            data: {
                ville: city
            }

        })

        .done(function(rep){

            $("#resultat").html(rep);

        })

        .fail(function(){

            alert("Erreur AJAX");

        });

    });

});

</script>

</body>

</html>