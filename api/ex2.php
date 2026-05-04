<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
echo("<h1>Hello TDM 2</h1>"); 
?>

<?php
$nom = "TDM2"; 
$age = 20; 
$poids = 75.8; 
$majeur = true;

echo "Nom : " . $nom;
?>

<?php
$age = 20;

if ($age >= 18) { 
    echo "Majeur"; 
} else { 
    echo "Mineur"; 
}
?>

<?php
for ($i = 1; $i <= 5; $i++) { 
    echo $i; 
}
?>
while
PHP
<?php
$i = 1; 
while ($i <= 5) { 
    echo $i; 
    $i++; 
}
?>

<?php
function saluer($nom = "Etudiant") { 
    echo "Bonjour " . $nom; 
}

saluer();
saluer("Ali");
?>

<?php
$notes = [12, 15, 18]; 
echo $notes[0];
?>
Tableau associatif
PHP
<?php
$personne = [ 
    "nom" => "Ali", 
    "age" => 20 
];

echo $personne["nom"];
?>

<?php
$tab = [10, 20, 30, 40, 50]; 

foreach ($tab as $valeur) { 
    echo $valeur . "<br>"; 
}
?>

<?php
$tab = [10, 20, 30, 40, 50]; 
$somme = 0; 

foreach ($tab as $valeur) { 
    $somme += $valeur; 
} 

echo "Somme = " . $somme;
?>

<?php
$tab = [10, 20, 5, 40, 50]; 

echo "Min = " . min($tab) . "<br>"; 
echo "Max = " . max($tab);
?>

<?php
$tab = [10, 20, 30, 40]; 

if (in_array(20, $tab)) { 
    echo "Valeur trouvée"; 
} else { 
    echo "Valeur non trouvée"; 
}
?>
    
</body>
</html>