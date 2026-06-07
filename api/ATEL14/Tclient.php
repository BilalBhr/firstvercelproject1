<?php

include_once 'Dataaccess.php';

class Tclient {
    
    public static function inscription($email,$nom,$prenom,$tel,$dnaissance,$pass){
        $r= Dataaccess::maj("insert into client values('$email','$nom','$prenom','$tel','$dnaissance','$pass')");
        return $r;
    }
    
    public static function authentification($email,$pass){
        $cur= Dataaccess::sel("select * from client where email='$email' and password='$pass'");
        $nbr=$cur->rowCount();
        return $nbr;
    }
}
