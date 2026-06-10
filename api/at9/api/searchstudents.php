<?php

include_once './Tstutents.php';

if(!empty($_GET['ville']))
{
    $city = $_GET['ville'];

    // récupération des étudiants
    $curstudents = Tstutents::GetStudentsByCity($city);

?>

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

while($row = $curstudents->fetch())
{
    echo "<tr>";

    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[5]</td>";

    echo "
    
    <td>
    
        <img src='$row[4]'
             width='100'
             height='100'/>
             
    </td>
    
    ";

    echo "</tr>";
}

$curstudents->closeCursor();

?>

    </tbody>

</table>

<?php

}

?>