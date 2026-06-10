<?php

include_once './Tstutents.php';

?>

<!DOCTYPE HTML>

<html>

<head>

<meta charset="utf-8">

<link rel="stylesheet"
      href="./css/bootstrap.min.css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

<div class="container mt-5">

    <h2 class="bg-dark text-white p-3">

        Recherche AJAX JSON par sexe

    </h2>





<!-- radio buttons -->

<div class="form-group">

    <label>

        <input type="radio"
               name="sexe"
               value="H">

        Masculin

    </label>

    <label class="ml-3">

        <input type="radio"
               name="sexe"
               value="F">

        Féminin

    </label>

</div>





<!-- résultat -->

<div id="resultat">

</div>

</div>





<script>

$(document).ready(function(){


    // changement radio
    $("input[name='sexe']").click(function(){

        // récupération sexe
        var sexe = $(this).val();

alert(sexe);
        // AJAX
        $.ajax({

            url:"searchsexe.php",

            method:"GET",

            data:{
                sexe:sexe
            },

            dataType:"json"

        })

        .done(function(rep){

            // construction HTML

            var html = "";

            html += "<table class='table table-bordered'>";

            html += "<tr>";

            html += "<th>Nom</th>";
            html += "<th>Prénom</th>";
            html += "<th>Ville</th>";
            html += "<th>Sexe</th>";

            html += "</tr>";

// boucle JSON
for(var i = 0 ; i < rep.length ; i++)
{
    html += "<tr>";

    html += "<td>"+rep[i].nom+"</td>";
    html += "<td>"+rep[i].prenom+"</td>";
    html += "<td>"+rep[i].ville+"</td>";
    html += "<td>"+rep[i].sexe+"</td>";

    html += "</tr>";
}

            html += "</table>";


            // affichage
            $("#resultat").html(html);

        })

        .fail(function(){

            alert("Erreur AJAX");

        });

    });

});

</script>

</body>

</html>
