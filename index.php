<?PHP 
require'connexion.php';

  
	
	
	  $id_code='00001';
  $ps=$pdo->prepare("SELECT * FROM codeur  ");
    $ps->execute();
	$user_data=$ps->fetch();
  $nbre=$user_data['nbre'];
  
  $nbre++;
   $req=$pdo->prepare("update codeur set nbre='$nbre'   where id_code='$id_code'");
       $req->execute();
                
   
			
			if($nbre>2000){
				 
				$msgblock='Le logiciel doit etre activé veuillez contactez le numero 00223 66-94-60-01 ';
				header("location:block.php?msgblock=$msgblock");
			}
  
 
    
    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Smart_Tech</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	 
	  <link rel="stylesheet" href="myStyle.css" rel="stylesheet">


   

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
  
  
   
    
  
  
<body>



               
				   
<div class="navbar navbar-default navbar-fixed-top">
<center>
    <div class="col-md-12">
      <a href="#">
          <div class="link">
           
            <div class="h4_title" ></div><span><h1><img style="width:100px; height:70px;" src="img/drapeau.png"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SmarTech  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img style="width:100px; height:70px;" src="img/drapeau.png"/> <br/> Gestion Contrats</h1></span>
         </div>
      </a>
    </div>
	</center>
	</div>
 



 



 


<div class="container main" style="margin-top: 130px;">
  
<div class="row">
<!--  <div id="preloader" > </div>   -->
   
       
</div>
 <div class="clear"></div><br>


    
  
     
<div class="row col-md-4 col-md-offset-4">
  
 <form class="form-signin" method="POST" action="testmdp.php?">
       
    <center>  <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1></center>
      <label for="inputEmail" class="sr-only">Nom d'utilisateur</label>
      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Nom d'utilisateur" required autofocus></br>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
         <br/> 
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button><br/>
	   <a data-toggle="modal" data-target="#myModalListePatients">
	  <button class="btn btn-lg btn-danger btn-block" role="button" type="button">Mot de passe oublié</button>
	   </a>
      

	  <br/>
	  
    <?php  
	
                  if (isset($_GET['msg'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg=$_GET['msg'];?>
				  
	       </p></div> <?php }?>
		   <?php  
	
                  if (isset($_GET['msgk'])){?><div class='alert alert-success center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><p><strong><?php  echo $msgk=$_GET['msgk'];?></strong>
				  
	       </p></div> <?php }?>
    </form>
	 
 </div>
	 
	 
	  
 <!-- DEBUT ALERT  -->
 
                  
<div id="myModalListePatients" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
            Alert  
        </h3>
      </div>
      <div class="modal-body">
         
          <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead>
                  <center><b>S'il vous plais veuillez contactez un administrateur !!!</center><br/>
        </thead>
		
		
 
 
 
	
		
		 <tr>
                 <th>Nom</th>
            <th>Prénom</th>
			<th>Tel</th>
			 <th>E-Mail</th>
			  <th>Message</th>
			 
			  
            </tr>
			
			 
		 <?php
 $req1=$pdo->prepare("select * from user where type_compte='administrateur'  ");
   
		$req1->execute();
		
		
		
		
		 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
  
 
    $sql= "select * from user where type_compte='administrateur' ";	 
	
    foreach  ($conn->query($sql) as $pointer2) { 
	
	  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  $tel_user=$pointer2['tel_user'];
		  $email_user=$pointer2['email_user'];	  
 ?> 
		


		  
			  <tr>
		   
                  
        <td style="font-family:tahoma;font-size:20;" ><?php echo $nom_user ?></td>
              <td style="font-family:tahoma;font-size:20;"><?php echo $prenom_user ?></td>
              <td style="font-family:tahoma;font-size:20;" ><?php echo $tel_user ?></td>
			  <td style="font-family:tahoma;font-size:20;"><?php echo $email_user ?></td>
			  <td style="font-family:tahoma;font-size:20;"><button><a href="index_msg.php?id2=<?php echo($pointer2['id2']) ?>"> <i class="glyphicon glyphicon-edit"></i> </a></button></td>
 	       	
			  </tr>	
			  
			  
	 <?php	 } ?> 
	 
        <tbody>
   


   
          
                 
               
        </tbody>
         
    </table>
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block btn-xs" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
 
  <!-- FIN ALERT -->
 
  
    

</div>
		
                           
 
 
    
    
  
           

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



  </body>
   
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>  
