<?php
require_once "Model/StudentManager.php";

class StudentController{
    

    public function __construct(){
       
    }

    public function Athentification(){
        
        
        $p1=$_POST['login'];
        $p2=$_POST['pass'];
        $r=StudentManager::Authenification($p1, $p2);
           $reponse["message"] = array(); 
        if($r==0)
        {
                  
                   $reponse["message"] ="Login ou pass incorrect !!!";
                 
              
        }
        else{
          
                   $reponse["message"] ="ok"; 
        }
          echo json_encode($reponse);
    }
    
    public function AddStudent(){
      
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $ville=$_POST['ville'];
        $tmp=$_FILES['photo']['tmp_name'];
        $name=$_FILES['photo']['name'];
        $photo=URL."public/images/".$name;
        $destination="public/images/".$name;
        $st=new Student($nom, $prenom, $ville, $photo);
        StudentManager::AddStudent($st,$tmp,$destination)   ;
    
   $messageadd="Merci de votre inscription";  
 require "View/save.php";
    }
    public function ListStudents()
    {
  
    StudentManager::GetAllStudents();
   
        
    }
      public function ListStudentsByCity()
    {
          $city=$_POST['byville'];
          StudentManager::GetStudentsByCity($city);
   
        
    }
    

}