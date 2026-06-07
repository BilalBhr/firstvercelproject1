<?php

include_once 'Dataaccess.php';

class Tcommande {
    
   public static function checkcreditcard($nom,$num,$anne,$mois,$crypto){
     $cur= Dataaccess::sel("select * from Cartebancaire where num_carte='$num' and detenteur ='$nom' and anneeexp='$anne' and moisexp='$mois' and crypto ='$crypto' ");
     $nbr=$cur->rowCount();
     return $nbr;
    }
    
    public static function GetCommandeNumer(){
        $numc=0;
        $cur= Dataaccess::sel("select max(num) from commande ");
        while ($row = $cur->fetch()){
            $numc=$row[0]+1; 
        }
        $cur->closeCursor();   
        return $numc;  
    }
}
