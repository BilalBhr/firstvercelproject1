<?php

include_once './Tstutents.php';

if(!empty($_GET['sexe']))
{
    $sexe = $_GET['sexe'];
   

    // récupération étudiants
    $cur = Tstutents::GetStudentsBySexe($sexe);

    // tableau PHP
    $tab = array();

    while($row = $cur->fetch())
    {
        $etudiant = array(

            "nom"     => $row[1],
            "prenom"  => $row[2],
            "ville"   => $row[3],
            "sexe"    => $row[5]

        );

        $tab[] = $etudiant;
    }

    // transformation JSON
    echo json_encode($tab);
}

?>
