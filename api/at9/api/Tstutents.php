<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tstutents
 *
 * @author Admin
 */
include_once './Dataaccess.php';
class Tstutents {
    //put your code here
    
    
    //action 1 : authentification 
    
    static function checkuser($login,$pass)
    {
        
        $req="select * from utilisateur where login='$login'    and pass='$pass'";
    
        $cur=Dataaccess::selection($req);
        
        $nbr=$cur->rowCount();
        
        return $nbr;
        
    }
    
    // action 2 Ajouter 
    
    static function AddStudent($nom,$prenom,$ville,$phototem,$photodes)
    {
        $req="insert into student(nom,prenom,ville,photo) values('$nom','$prenom','$ville','$photodes')";
    
        $r= Dataaccess::majour($req);
        
        
        move_uploaded_file($phototem, $photodes);
        
        return $r;
    }
    
    
    // action3 (afficher tous)
    
    static function GetAllStudents()
    {
      $req="select * from student";
        
        $cur= Dataaccess::selection($req);
    
        return $cur;
        
    }
    
    
    // action 4 : supprimer 
    
    static function DeleteStudent($id)
    {
        $req="delete from student where id='$id'";
        
        $r= Dataaccess::majour($req);
        
        return $r;
    }
    
    // GetPicById
    
    static function GetPicById($id)
    {
        $req="select photo from student where id='$id'";
    
        
        
        $pic='';
      $cur=  Dataaccess::selection($req);
        
      while ($row = $cur->fetch()) {
          $pic=$row[0];
      }
      return $pic; 
    }




    // action 5 Modifier
    
    static function UpdateStudent($id,$nom,$prenom,$ville,$phototmp,$photodes)
    {
        $req="update student set nom='$nom', prenom='$prenom',ville='$ville',photo='$photodes' where id='$id' ";
        
        
        $oldpic= self::GetPicById($id);
        
        // supprimer old pic 
        
        unlink($oldpic);
        
        
        // executer la modification :
        
        $r= Dataaccess::majour($req);
        
        
        move_uploaded_file($phototmp, $photodes);
        
        return $r;
        
        
        
    }
    
    
    // getstudentsByCity
    static function GetStudentsByCity($city)
    {
      $req="select * from student where ville='$city'";
        
        $cur= Dataaccess::selection($req);
    
        return $cur;
        
    }



    // GetStudentsPagination
static function GetStudentsPagination($page)
{
    // nombre d'étudiants par page
    $limit = 3;

    // calcul du premier élément
    $offset = ($page - 1) * $limit;

    // requête SQL
    $req = "SELECT * FROM student LIMIT $offset, $limit";

    // exécution
    $cur = Dataaccess::selection($req);

    return $cur;
}

// GetTotalPages
static function GetTotalPages()
{
    // requête SQL
    $req = "SELECT COUNT(*) FROM student";

    // exécution de la requête
    $cur = Dataaccess::selection($req);

    // nombre total d'étudiants
    $totalStudents = 0;

    // lecture du curseur
    while($row = $cur->fetch())
    {
        $totalStudents = $row[0];
    }

    // nombre d'étudiants par page
    $limit = 3;

    // calcul du nombre total de pages
    $totalPages = ceil($totalStudents / $limit);

    return $totalPages;
}



 // récupérer les villes
    static function GetCities()
    {
        $req = "select distinct ville from student";

        $cur = Dataaccess::selection($req);

        return $cur;
    }

    // GetStudentsBySexe
static function GetStudentsBySexe($sexe)
{
    $req = "select * from student where sexe='$sexe'";

    $cur = Dataaccess::selection($req);

    return $cur;
}

    
    
    
}
