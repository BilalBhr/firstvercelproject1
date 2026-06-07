<?php
ob_start();
?>
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
   <meta charset="utf-8">

   
 </HEAD>

 <BODY>
  <?php

include_once 'Panier.php';
     session_start();
     if(empty($_SESSION['sessionemail']))
     {
         header("Location:login.php");
     }
     $p=$_SESSION['sessionpanier'];
     $totalpanier=$p->totalpanier();
     $nf=$_GET['codf'];
     $adresse=$_GET['adr'];
     $jour=date('d');
    $mois=date('m');
    $annee=date('Y');
    $datecommande= "$jour-$mois-$annee";
    echo "<h1>Fatcture N°: $nf   / LE : $datecommande</h1>";
       ?>
     <div class="container">
            <div class="row"> 
               <img src="images/logo.png"  class="ml-2" width="200" height="100"/>
               <br/><br/>
                     <div  style="padding-top:2%;font-size: 60px;text-align: center">
                        
                          </div>
<table border='2'>
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prix_unitaire</th>
                      <th>Image</th>
                      <th>qte</th>
                      <th>Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      
                      
                      <?php 
             $contenup=$p->getTableau_achats();
           foreach ($contenup as $achat) 
               {
               $iditem=$achat->getCode_p();
               $qte=$achat->getQte();
               $name= Tmenu::GetNameOfItem($iditem);
               $price= Tmenu::GetPriceOfItem($iditem);
               $image= Tmenu::GetPictureOfItem($iditem);
               $totalachat=$price*$qte;
               echo " <tr>";
              
              
                 echo " <td>$name</td>";
                 echo " <td>$price</td>";
                 echo " <td><img src='images/$image'  width='100' height='100'/></td>";
                  echo " <td>$qte</td>";
                 echo " <td>$totalachat (DH)</td>";
                
                
                 
                  
               echo " </tr>";                
               }        
                      
                      
                      
                      
                      ?>
                      
                      
                      
                       </tbody>
                </table>
            <h2>  Total :<?=$totalpanier?> (DH)</h2>
            <h2>  Adresse  de Livraison :<?=$adresse?> </h2>    
            </div>
  </div>
<?php
 

session_destroy();
