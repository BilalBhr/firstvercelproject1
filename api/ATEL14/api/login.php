<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />
<style>
input[type="email"], input[type="password"] {
	padding: 15px;
	width: 100%;
	font-size: 1em;
	border: 0;
	border-radius: 5px;
	color: 
	background-color: 
	margin-bottom: 15px;
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
include_once 'Tclient.php';
include_once 'Panier.php';
$email='';
$pass='';
   if(isset($_POST['actionlog'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
           $n= Tclient::authentification($email, $pass);
           if($n!=0 ){
               session_start();
               $_SESSION['sessionemail']=$email;
               $_SESSION['sessionpass']=$pass;
               
               $p=new Panier();
               
               $_SESSION['sessionpanier']=$p;
               if (isset($_POST['auto'])) {
                       setcookie("cookemail", $email, time()+30);
                       setcookie("cookpass", $pass, time()+30);  

                   
                     }
                    
              header("Location:menu.php"); 
           }
           else {
                ?>
            <div class="container">
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Login ou pass incortrect!!! </strong> 
                          <button style="padding-left: 95%" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
            </div>
 <?php 
           
           }
   }else{
       if(isset($_COOKIE['cookemail']))
       {
       $email=$_COOKIE['cookemail'];    
       }
        if(isset($_COOKIE['cookpass']))
       {
       $pass=$_COOKIE['cookpass'];    
       }
       
   }

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
	  <li class="nav-item ">
              <a class="nav-link" href="menuvisisteur.php">Notre Menu</a>
      </li>
      
     
	 
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 

  
 <section>
 <div class="container" id="acc"> 
 
 
<div class="jumbotron jumbotron-fluid text-white" style="background-image: url('./images/burger.jpg'); background-size: cover; background-position: center">
 
    <div class="display-4 pl-2"   style="color:black">C'est Bon Vous etes Chez<br/> Burger-Code.</div>
   
</div>
                 
 
 <div class="container">
		

	 	<div id="form">
			<form method="POST" action="login.php">
			
                            <input type="email" value="<?=$email?>" name="email" placeholder="Votre adresse email" required />
                            <input type="password" value="<?=$pass?>" name="pass" placeholder="Mot de passe" required />
                                                <button type="submit"  name="actionlog">S'identifier</button>
						<label id="option"><input type="checkbox" name="auto"  />Se souvenir de moi</label>
					</form>
				

					<p class="grey">Première visite sur Notre Site ? <a href="inscription.php">Inscrivez-vous</a>.</p>	
			
		</div>
	</div>
 
 

 </div>

 </section>

  

     

     

  

   

<footer>
 <div class="container m-5 mx-auto text-center" style="background-color: #444">
               <h3 style="font-family:Georgia" class="text-white">Burger-Code <span style="color:orange;font-size:50">.</span></h3>
                <div>Copyright © Tous droits reserves.</div>
			</div>

</footer>
 </BODY>
</HTML>
