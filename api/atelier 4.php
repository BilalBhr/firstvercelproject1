<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <meta charset="utf-8"> 
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />
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
     
     include_once 'Traitements.php';
     
     ?>
  <!--    Entete      !-->
    <div class="container sticky-top">
  <header>

    <nav  class="navbar navbar-dark navbar-expand-sm bg-dark pl-5">
     <a class="text-white" style="text-decoration:none" href="#">
	 <h1 style="font-family:Georgia">TDM-Classroom <span style="color:orange">.</span></h1></a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
	
    </button>
    
    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
      <li class="nav-item ">
        <a class="nav-link" href="acc.php">Accueil</a>
      </li>
	  <li class="nav-item ">
        <a class="nav-link" href="save.php">Nouveau</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="search.php">Rechercher</a>
      </li>
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 













  <!--    Section 1 Image(background)    !-->
 <section>
 <div class="container" id="acc"> 
 
 <!-- AFFICHAGE DU JUMBOTRON -->
<div class="jumbotron jumbotron-fluid text-white" style="background-image: url('./images/school.jpg'); background-size: cover; background-position: center">
 
    <div class="display-4 pl-2"   style="color:white">Bienvenue à<br/> TDM-Classroom.</div>
   
</div>
 
 
 
 
 
 
 </div>


 </section>















  <!--    Section Login    !-->
  <div class="container" id="acc">
<section class="bg-dark p-2 text-white">
  <div class="mx-auto w-50">
    
      <h2><a href="search.php?cle=display">Afficher Tous</a></h2>
   
      
      <form action="search.php"  method="POST">
      <div class="form-group">
        <label>Ville:</label>
        <input name="ville" type="text" class="form-control" placeholder="Entrez la ville">
          </div>
      
	 
	 
	 
        <input type="submit" name="search" class="btn btn-outline-light" value="Rechercher"/>
     <button type="reset" class="btn btn-outline-light">Annuler</button>
   
    </form>
  </div>
    
</section>

<?php      
// action Rechercher 
if(!empty($_POST['search']))  // 7ta nkliki sur rechercher (search)
{
	
	// lecture de la ville : 
	
	//$v=$_POST['ville];
	//getStudentsByCity($v);
	
   ?> 
     <div class="container mt-4">
            <div class="row">
                
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Ville</th>
                      <th>Photo</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <th>Nom 1</th>
                      <th>Prénom 1</th>
                      <th>Tanger</th>
                      <th><img src="images/student.jfif"  width="100"  height="100"  /></th>
                    
                    </tr>
              
                      
                  </tbody>
                </table>
            </div>
        </div>





<?php    
    
}


// action afficher Tous :
if(!empty($_GET['cle']))   // 7ta nklili sur afficher tous 
{
   /* 
    $val=$_GET['cle'];
    echo "Test valeur :  $val";
   */ 
    
    
  DispalyAll();
    
}


?>


</div>



  



   <!--    Footer      !-->



<footer>
 <div class="container m-5 mx-auto text-center" style="background-color: #444">
               <h3 style="font-family:Georgia" class="text-white">TDM-Classroom <span style="color:orange;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reservés.</div>
			</div>


</footer>
 </BODY>
</HTML>
