<?php

include_once './Tstutents.php';

// page actuelle
$page = 1;

// récupération du numéro de page
if(!empty($_GET['page']))
{
    $page = $_GET['page'];
}

// récupération des étudiants paginés
$curstudents = Tstutents::GetStudentsPagination($page);

// récupération du nombre total des pages
$totalPages = Tstutents::GetTotalPages();

?>

<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">

<link rel="stylesheet" href="./css/bootstrap.min.css" />
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</head>

<body>

<div class="container mt-5">

    <h2 class="bg-dark text-white p-3">
        Pagination des étudiants
    </h2>

    <table class="table table-bordered table-striped">

        <thead class="thead-dark">

            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Sexe</th>
                <th>Photo</th>
            </tr>

        </thead>

        <tbody>

<?php

// affichage des étudiants
while($row = $curstudents->fetch())
{
    echo "<tr>";

    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[5]</td>";

    echo "<td>
            <img src='$row[4]'
                 width='100'
                 height='100'/>
          </td>";

    echo "</tr>";
}

// fermeture du curseur
$curstudents->closeCursor();

?>

        </tbody>

    </table>





<!-- pagination -->

<div class="text-center">

<?php

// boucle des pages
for($i = 1 ; $i <= $totalPages ; $i++)
{
    echo "
    
    <a href='pagination.php?page=$i'
       class='btn btn-dark m-1'>
       $i
    </a>

    ";
}

?>

</div>

</div>

</body>
</html>