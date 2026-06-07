<?php

include_once 'Dataaccess.php';

class Tmenu {
    
    static function Chargercombocat(){
        $cur= Dataaccess::sel("select * from categories");
        return $cur;
    }
    
    static function GetItemsByCat($cat){
        $cur= Dataaccess::sel("select name,price,description,image,id from items where category='$cat'");
        return $cur;
    }
    
    static function GetNameOfItem($id){
        $cur= Dataaccess::sel("select name from items where id='$id'");
        $name='';
        while ($row = $cur->fetch()){
            $name=$row[0]; 
        }
        $cur->closeCursor();   
        return $name;
    }
    
    static function GetPriceOfItem($id){
        $cur= Dataaccess::sel("select price from items where id='$id'");
        $price='';
        while ($row = $cur->fetch()){
            $price=$row[0]; 
        }
        $cur->closeCursor();   
        return $price;
    }
    
    static function GetPictureOfItem($id){
        $cur= Dataaccess::sel("select image from items where id='$id'");
        $image='';
        while ($row = $cur->fetch()){
            $image=$row[0]; 
        }
        $cur->closeCursor();   
        return $image;
    }
}
