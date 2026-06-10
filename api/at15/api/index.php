<?php


session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


require_once "Controller/StudentController.php";
$stController = new StudentController;

try{
    if(empty($_GET['page'])){
        require "View/accueil.php";
    } else {
        //$url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
$url = explode("/", $_GET['page']);

        switch($url[0]){
            case "accueil" : 
              if(empty($url[1]))
                {
                 require "View/accueil.php";   
                }
                
                if(isset($url[1])){
                if($url[1]=='aut')
            {
           $stController->Athentification();
            }
            } 
                break;
            case "save" :// require "View/save.php";
                if(empty($url[1]))
                {
                 require "View/save.php";   
                }
                
                if(isset($url[1])){
                if($url[1]=='add')
            {
           $stController->AddStudent();
            }
            }
            break;
             case "search" : 
                 
                 if(empty($url[1])){
                  require "View/search.php";    
                 }
                 
                 if(isset($url[1])){
                if($url[1]=='all')
            {
           $stController->ListStudents();
            }
              if($url[1]=='ville')
            {
           $stController->ListStudentsByCity();
            }
            }
            break;
           
            default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "View/error.php";
}
