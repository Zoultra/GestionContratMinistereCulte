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
                
   
			
			if($nbre>100){
				 
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


   

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
<body>

<div class="navbar navbar-default navbar-fixed-top">
<center>
    <div class="col-md-12">
      <a href="#">
          <div class="link">
           
            <div class="h4_title" ></div><span><h1><img style="width:100px; height:55px;" src="img/drapeau.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GECO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width:100px; height:55px;" src="img/drapeau.png"/> <br/> Gestion de contrats</h1></span>
         </div>
      </a>
    </div>
	</center>
	</div>
 



 



 


<div class="container main" style="margin-top: 130px;">
  
<div class="row">

 
       
</div>
 <div class="clear"></div><br>


    
  
     
<div class="row col-md-4 col-md-offset-4">
<center>
   <img   src="img/SMART_TECH.jpg"/>
</center>
         </br> </br>
   <button class="btn btn-lg btn-primary btn-block" type="submit">Commencer</button><br/>
 
 
 
	 
 </div>
	 
	 
	  
 <!-- DEBUT ALERT  -->
  <?php
 $req1=$pdo->prepare("select * from user where id2='ad_ad_ad_00_00_00'");
		$req1->execute();
		$pointer2=$req1->fetch();
		  $id2=$pointer2['id2'];
		  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  $tel_user=$pointer2['tel_user'];
 ?>
                  
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
                  <center><b>S'il vous plais veuillez contactez l'administrateur:&nbsp<?php echo strtoupper($prenom_user) ?>&nbsp<?php echo strtoupper($nom_user) ?>&nbsp<?php echo $tel_user ?></b></center>
        </thead>
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
