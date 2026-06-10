<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentManager
 *
 * @author Admin
 */
include_once 'Student.php';
class StudentManager {
    
    // Authentification 
    
  public static function Authenification($p1,$p2)
{
    $flag=0;
    
    if($p1=='TDM' && $p2=='123')
    {
        $flag=1; 
    }
    return $flag;
}
    
    
    // AddStudent
    public static function AddStudent(Student $st,$tmp,$destination)
    {
        // ouvrir le fichier en mode add
    $fp = fopen("students.txt","a");
    // declarer l'enregitrement
    $enregistrement= $st->getNom().';'.$st->getPrenom().';'.$st->getVille().';'.$st->getImage();
   // ecrire dans le fichier
    fwrite($fp,$enregistrement );
    fwrite($fp, "\r\n"); // retour à la ligne
    // fermer le fichier
    fclose($fp);
   
    move_uploaded_file($tmp, $destination);
     
    }
   
    // GetAllStudents 
    
    public static function GetAllStudents()
    {
          $listStudents["all"]=array();
          $fp= fopen("students.txt", "r");
          
          // boucler sur les lignes:
          while (!feof($fp))
          {
               
               // lecture d'une ligne : 
               
               $ligne= fgets($fp);
               
               // si la ligne n'est pas vide
               if($ligne!="")
               {
                   $student=array();
                   // diviser la ligne (/)
                  $row= explode(";", $ligne);
                  
                  $st=new Student($row[0],$row[1],$row[2],$row[3]);
             $student['nom']=$row[0];
             $student['prenom']=$row[1];
             $student['ville']=$row[2];
             $student['image']=$row[3];
          
                  array_push($listStudents["all"], $student);
               }
              
              
              
              
          }
                // fermer le fichier 
    fclose($fp);
     
           echo json_encode($listStudents); 
         
    }
    
    // GetStudentsByCity 
    
    public static function GetStudentsByCity($city)
    {
          $listStudents["all"]=array();
          $fp= fopen("students.txt", "r");
          
          // boucler sur les lignes:
          while (!feof($fp))
          {
               
               // lecture d'une ligne : 
               
               $ligne= fgets($fp);
               
               // si la ligne n'est pas vide
               if($ligne!="")
               {
                  $student=array();
                   // diviser la ligne (/)
                  $row= explode(";", $ligne);
                  
                  $ville= trim($row[2]);
                  if($ville==$city)
                  {
              
                  $student['nom']=$row[0];
                  $student['prenom']=$row[1];
                  $student['ville']=$row[2];
                  $student['image']=$row[3];
                
                  array_push($listStudents["all"], $student);
        
                  }
               }
              
              
              
              
          }
                // fermer le fichier 
    fclose($fp);
           echo json_encode($listStudents); 
         
    }   
     
    
}
