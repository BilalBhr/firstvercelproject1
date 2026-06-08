<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />

<style>
input[type="email"], input[type="password"],input[type="text"], input[type="date"],textArea{
 
	padding: 15px;
	width: 100%;
	font-size: 1em;
	border: 0;
	border-radius: 5px;
	color: 
	background-color: 
	margin-bottom: 15px;
}
select{
    padding: 15px;
	width: 10%;
	font-size: 1em;
	border: 0;
	border-radius: 5px;
	color: 
	background-color: 
	margin-bottom: 15px;
}
form span{
    padding: 15px;
	
	font-size: 1em;
	border: 0;
	border-radius: 5px;
	color: 
	background-color: 
	margin-bottom: 15px;
        margin-right: 15px;
}
button {
	background-color: orange;
	color: white;
	padding: 15px;
	width: 100%;
	font-size: 1em;
	font-weight: bold;
	border-radius: 5px;
	border: 0;
	cursor: pointer;
}

	color: 
	margin-top: 10px;
	display: block;
	font-size: 0.9em;
}

	max-width: 450px;
	margin: auto;
	background-color: rgba(0,0,0,.75);
	color: white;
	border-radius: 5px;
	padding: 50px;
	margin-top: 50px;
}

.grey {
	color: 
}
</style>
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
   
 </HEAD>

 <BODY>
     <?php
     include_once   'Panier.php';
     include_once  'Tcommande.php';
     session_start();
     if(empty($_SESSION['sessionemail']))
     {
         header("Location:login.php");
     }
     $p=$_SESSION['sessionpanier'];
     
     $contenupanier=$p->getTableau_achats();
     $total=$p->totalpanier();
     ?>
  
    <div class="container sticky-top">
  <header>

    <nav  class="navbar navbar-dark navbar-expand-sm bg-dark pl-5">
     <a class="text-white" style="text-decoration:none" href="#">
	 <h1 style="font-family:Georgia">Burger-Code <span style="color:orange">.</span></h1></a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
	
    </button>
    
    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
      <li class="nav-item active">
        <a class="nav-link" href="acc.php">Accueil</a>
      </li>
	
      
     
	 
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 

  
 <section>
 <div class="container" id="acc"> 
 
 

                
 
 <div  class="container">
     <h1 style="text-align: center">Page De paiement</h1> 
     <h2 style="text-align: center">Total <?=$total?> :(DH)</h2>
     <img src="images/pay.png">
     <form method="POST" action="paiement.php" >
		<input type="text" name="nom" placeholder="Détenteur de la carte" required />
				<input type="text" name="numero" placeholder="Numéro de la carte" required />
						
                    	
                                <span> Année d'expiration :  </span>
                                <select name="annee">
                                       <?php 
                                            for ($i = 2020; $i <=2030; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                    
                                        
                                     </select> 
                                <span style="margin-left: 100"> Mois: </span> 
                                <select name="mois">
                                <?php 
                                            for ($i = 1; $i <=12; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                </select>               
                         
      <input type="text" name="crypto" placeholder="Cryptogramme" required />
	<textarea rows="" name='adresse' cols=''>Enter l'adresse de livraison</textarea>  	 
      <button type="submit" name="validate">Valider</button>
			
     
     </form>

			
	</div>
 
 

 </div>

 </section>

  <?php       
  
  

  
  if(isset($_POST['validate']))
  {
     $nom=$_POST['nom'];
     $numc=$_POST['numero'];
     $anneexp=$_POST['annee'];
     $moisexp=$_POST['mois'];
     $crypto=$_POST['crypto'];
    $c1= Tcommande::checkcreditcard($nom, $numc, $anneexp, $moisexp, $crypto);
    
    
    
    
    $email=$_SESSION['sessionemail'];
    $jour=date('d');
    $mois=date('m');
    $annee=date('Y');
    $datecommande= "$annee-$mois-$jour";
    $adresse=$_POST['adresse'];
    
    try {
 $dbt = new PDO('mysql:host=localhost;dbname=burgercode', 'root', '');
				   
	   $dbt->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
             
           $dbt->beginTransaction();
          $numcommande=  Tcommande::GetCommandeNumer();
          
          
           $c2=$dbt->exec("insert into commande values('$numcommande','$email','$datecommande')");
          
           
           
         
        
           $c3=0;
           for ($i = 0; $i < count($contenupanier); $i++)
           {
               $achat=$contenupanier[$i];
               $iditem=$achat->getCode_p();
               $qte=$achat->getQte();
             
               $c3+=$dbt->exec("insert into achat values('$numcommande','$iditem','$qte')"); 
              
               }
          if($c1!=0 && $c2==1 && $c3== count($contenupanier) )
           
           {
       $dbt->commit();
       ?>
 <script>
     window.location="facture.php?codf=<?=$numcommande?>&adr=<?=$adresse?>";
 </script>
 
      <?php
      
           }
           else{
       $dbt->rollBack();
       
       echo "<h1 style='color:red'>Erreur !!!</h1>";
           }
  
  } catch (Exception $e) {  $dbt->rollBack();  echo "Failed: " . $e->getMessage();}

    
    
    
    
  }
  
  
  ?>

     

     

  

   

<footer>
 <div class="container m-5 mx-auto text-center" style="background-color: #444">
               <h3 style="font-family:Georgia" class="text-white">Burger-Code <span style="color:orange;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reserves.</div>
			</div>

</footer>
 </BODY>
</HTML>
