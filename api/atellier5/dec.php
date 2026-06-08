<?php



// 1- Récupérer la session :
session_start();



// 2- detruire la session

session_destroy();
// 3- redirection vers acc.php 


header("Location:acc.php");