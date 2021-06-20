 <?php
	require('connexion.php'); 
		  $id2=$_GET['id2'];  
		  
		  if(isset($_GET['a'])){
			  
			   
			   
			  $tel_titulaireU=trim($_POST["tel_titulaire"]);
			  $nom_titulaire=trim($_POST["nom_titulaire"]);
			    $nif_titulaire=trim($_POST["nif_titulaire"]);
				  $rc_titulaire=trim($_POST["rc_titulaire"]);
				   
					  $num_compte_banque=trim($_POST["num_compte_banque"]);
					    $adresse=trim($_POST["adresse"]);
						  $representant_titulaire=trim($_POST["representant_titulaire"]);
						    $nom_banque_m=trim($_POST["nom_banque"]);
							
							 
							$req=$pdo->prepare('select  count(*) from titulaire');
			$req->execute();
			$pointer=$req->fetchcolumn();
			
	
	 
	$var3=$pointer +1;
			if($var3<=9){
				$var3='0'.$var3;
			}else if($var3<=99){
				$var3='00'.$var3;
			}else if($var3<=999){
				$var3='000'.$var3;
			}else if($var3<=9999){
				$var3='0000'.$var3;
			}else if($var3<=99999){
				$var3='00000'.$var3;
			}
		 
			  $nif_titulaire1=trim($nif_titulaire);
	 $id_titulaire=$tel_titulaire.'_'.$var3;
	
	 
	 
		  }
		  
		  
		  
		  if(isset($_POST['b']) ){
			  
			
			  
		 		
			  
			   $nom_banque_M = strtoupper($nom_banque_m);
$req=$pdo->prepare("insert into titulaire(id_titulaire,nom_titulaire,nif_titulaire,rc_titulaire,tel_titulaire,num_compte_banque,nom_banque,representant_titulaire,adresse)values(?,?,?,?,?,?,?,?,?)");
	$params=array($id_titulaire,$nom_titulaire,$nif_titulaire,$rc_titulaire,$tel_titulaireU,$num_compte_banque,$nom_banque_M,$representant_titulaire,$adresse);
				   
									  
			$req->execute($params);
			             $msg_eng='Prestataire crée avec succès.';
	 
	                 header("location:prestataire.php?id2=$id2&msg_eng=$msg_eng&choix=ajouter");  
		   
		       
		  }
		  
		  
		   
		
		   
		  ?> 
		  
   
   
      <!--  $tel_titulaire=substr($tel_titulaire,0,2).'-'.substr($tel_titulaire,2,2).'-'.substr($tel_titulaire,4,2).'-'.substr($tel_titulaire,6,2);  -->
   
   
   
   
   
    <?php 
           require('connexion.php');
		   
		    if(isset($_GET['c'])){
 
	 
			   $id_titulaire=$_POST['id_titulaire'];
			  $tel_titulaire=$_POST["tel_titulaire"];
			  $nom_titulaire=$_POST["nom_titulaire"];
			    $nif_titulaire=$_POST["nif_titulaire"];
				  $rc_titulaire=$_POST["rc_titulaire"];
				    $tel_titulaire=$_POST["tel_titulaire"];
					  $num_compte_banque=$_POST["num_compte_banque"];
					    $adresse=$_POST["adresse"];
						  $representant_titulaire=$_POST["representant_titulaire"];
						    $nom_banque_m=$_POST["nom_banque"];
					 
			}
			
			      if(isset($_POST['d']) ){
			  
				
			  
			   $nom_banque_M = strtoupper($nom_banque_m);
 
			
			$rq_edite=$pdo->prepare('UPDATE titulaire SET nom_titulaire=?,nif_titulaire=?,rc_titulaire=?,tel_titulaire=?,num_compte_banque=?,nom_banque=?,representant_titulaire=?,adresse=?WHERE(id_titulaire=?)');
	$params=array($nom_titulaire,$nif_titulaire,$rc_titulaire,$tel_titulaire,$num_compte_banque,$nom_banque_M,$representant_titulaire,$adresse,$id_titulaire);
	$rq_edite->execute($params);
	
			             $msg_eng='Prestataire Modifié avec succès.';
	 
	                 header("location:prestataire.php?id2=$id2&msg_eng=$msg_eng&choix=liste");  
		   
		       
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

    <title>Gestion de contrats</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>
 
     
  </head>
  
  
   <?php if(isset($_GET['choix'])){
	   $choix=$_GET['choix'];
   }
   
	  if($choix=="ajouter"){     
		                       
		  
	  ?>
  
  
  
  
   <header>
   <div class="nav">

	<div class="navbar navbar-default navbar-fixed-top">
      
        <div class="container">
          
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    
                        <span class="sr-only">Toggle navigation</span>      
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>          
                </button> 

                <h2 class="h1_title">Gestion Contrats</h2>

           </div>

         

 <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				<div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=ajouter";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspAjouter_Fournisseur </i></a></span>
				  </button>
                 </div>
				 

				 
				  
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspListe_Fournisseur</i></a></span>
				  </button>
                 </div>
				 
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="demande_partenariat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspDemande_Partenariat </i></a></span>
				  </button>
                 </div>
				 
				 
				  <div class="btn-group">
				  <button   type="button"  onclick='window.location.href="#";'   class="btn btn-default dropdown-toggle">
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				
				
             </div>		 
			
			
			

        </div>

    </div>

</div>
   
   
    </header>
  
<body>



<div class="container mainbg">
 
<br><div class="btn-group">
<button aria-haspopup="true" class="btn btn-default dropdown-toggle" type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'  class="btn btn-primary" >
   <a class="return" href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>
   </button>
   </div>
    <h1 class="h1_title">Ajout des fournisseurs</h1>
    <hr> <br>

	
	
	 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?> <br><br>


    
     

  
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="prestataire.php?a&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
	   
	   
	   
	   <div class="col-md-4"> 
	   <label class="">Fournisseur: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 
		<input name="nom_titulaire" type="text" placeholder="Nom de l'entreprise" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   <div class="col-md-4"> 
	   <label class="">Adresse_Fournisseur: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
		<input name="adresse" type="text" placeholder="" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">NIF_Fournisseur: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
 <input name="nif_titulaire" type="text" placeholder="" required class="form-control validate[required]" />
 
              </div>
			   </div> <br/><br/>
			      
			    <div class="col-md-4"><br/>
              <label class="">N°_RC: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
	<input name="rc_titulaire" type="text" placeholder="" required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Tel: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 			  	
 
	<input name="tel_titulaire"  pattern="[0-9]{8}" type="tel" maxlength="8" autocomplete="on" placeholder="Ex: 70000000" required class="form-control validate[required]" />
	 
              </div>
			   </div> 
			    
			     <div class="col-md-4"> </br>
              <label class="">Numero_Compte_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
					 
	            <input name="num_compte_banque" type="text" placeholder="" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			  
			     <div class="col-md-4"> </br>
              <label class="">Nom_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
	             <input name="nom_banque" type="text" placeholder="Ex: BNDA" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Rerpresentant(Nom_Prenom): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="representant_titulaire" type="text" placeholder="Rerpresentant " required class="form-control validate[required]" />
             
			</div>
			   </div>
	   
	    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
	   
	  
	   <center>
	       <button type="submit" name="b" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-danger" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'>Annuler</button>     
    </center>
	   <br/><br/>
	   

      </form>
  
  </div>  
        
 


   
   </div>
  
 <br>
        

</div>

 
 <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

</body><br/> <br/> <br/> <br/> <br/>
 
</html>




















   

  
   
  
  
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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>

     
  </head>
  
   <?php }
   
	  elseif($choix=="liste"){     
		                         $id2=$_GET['id2'];  
		  
	  ?>
  
  
  
  
   <div class="nav">

	<div class="navbar navbar-default navbar-fixed-top">
      
        <div class="container">
          
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    
                        <span class="sr-only">Toggle navigation</span>      
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>          
                </button> 

                <h2 class="h1_title">Gestion de contrat</h2>

           </div>

            <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				  
				  	  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=ajouter";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspAjouter_Fournisseur </i></a></span>
				  </button>
                 </div>
				   
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspListe_Fournisseur </i></a></span>
				  </button>
                 </div>
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="demande_partenariat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspDemande_Partenariat </i></a></span>
				  </button>
                 </div>
				 <div class="btn-group">
				  <button   type="button"  onclick='window.location.href="#";'   class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
             </div>

        </div>

    </div>

</div>
  
   
  
<body> 
   
    <div class="container mainbg"> 
   <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Liste Fournisseurs </h1>
   
    <br>
    <br>
    </div> 
   
   <br/> <br/> <br/><br/>
	<center><?php if(isset($_SESSION['ajoutFours'])){?><div  class='alert alert-danger center' style='width: 30%; font-family:Tahoma;height:5%; font-size:15px; margin:auto;'><B> <?php {echo  $_SESSION['ajoutFours']; unset($_SESSION['ajoutFours']);} ?>
		               </B></div>
					   <?php }?>
		  </center> 
		  
		  <?php
   
     $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
  
$id2=$_GET['id2'];
    $sql= "SELECT  * FROM titulaire where id_titulaire!='00000000_07' ";	 
   
 $reponse = $pdo->prepare("$sql");
  $reponse->execute(); 
  
  
	 
	 ?>  
		  
		  
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Nom_Entreprise</th>
            <th>Répresentant</th>
			<th>Téléphone</th>
			 <th>Numéro_Compte_Banque</th>
            <th>Nom_Banque</th> 
			<th>N_i_f</th> 
			<th>N°_RC</th> 
             
			 <th>Modifier</th>
			  <th>Supprimer</th>
			  
            </tr>
        </thead>
        <tbody> 
		   
		    <?php    foreach  ($conn->query($sql) as $pointer5) {   
			
			 



			?> 
           
          <tr>
		   
                  
         <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointer5['nom_titulaire'] ?></td>
              <td><?php echo $pointer5['representant_titulaire'] ?></td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $pointer5['tel_titulaire'] ?></td>
			  <td><?php echo $pointer5['num_compte_banque'] ?></td>
			   <td><?php echo $pointer5['nom_banque'] ?></td> 
			    <td><?php echo $pointer5['nif_titulaire'] ?></td> 
                 <td><?php echo $pointer5['rc_titulaire'] ?></td> 
                
			  <td ><button><a onclick="return confirm('Voulez vous vraiment Modifier ?')"  href="prestataire.php?choix=modifier&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>"><i  class="glyphicon glyphicon-edit"></i></a></button></td>
			   
				<td>
		  
			    <button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delP&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>"><img style="width: 28px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			    

 <div id="myModal<?=$pointer5['id_titulaire'];?>" class="modal fade" role="dialog">
	
 <!-- DEBUT DE WHILE-->
	
	
				  
  <div class="modal-dialog">
  
  
    <!-- Modal content-->
	  
    <div class="modal-content">
	
	
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
             ALERT.......
        </h3>
      </div>
	  
	  
	  
      <div class="modal-body">
          
	   
	    <div class="tab-content" role="tablist">
  
    <div class="tab-pane active" id="home" role="tabpanel">
       
          
     
   
       
	       
      </div>
  
   </div> 

  </div>
  
</div>	
			
	 	 		 
				 
              </td> 
			  
			  
                </tr>  
				
				<?php } ?>  
             
               
        </tbody>
        <tfoot>
            <tr>
                <th>Nom_Entreprise</th>
            <th>Répresentant</th>
			<th>Téléphone</th>
			 <th>Numéro_Compte_Banque</th>
            <th>Nom_Banque</th> 
              <th>N_i_f</th> 
			<th>N°_RC</th> 
			 <th>Modifier</th>
			  <th>Supprimer</th>
			 
			  
            </tr>
        </tfoot>
    </table>
   
 
	  </div>
  
  
  <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
 
</body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
 
	
</html>


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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>
  
     
  </head>
  
  
   <?php  
   }
   
	  if($choix=="modifier"){     
		                       
		    $id2=$_GET['id2'];  
	  ?>
  
  
  
  
   <header>
   <div class="nav">

	<div class="navbar navbar-default navbar-fixed-top">
      
        <div class="container">
          
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    
                        <span class="sr-only">Toggle navigation</span>      
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>          
                </button> 

                <h2 class="h1_title">Fournisseurs</h2>

           </div>

         

 <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				 
			<div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=ajouter";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspAjouter_Fournisseur </i></a></span>
				  </button>
                 </div>
				  
				  
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspListe_Fournisseur</i></a></span>
				  </button>
                 </div>	 
				   
				 <div class="btn-group">
				  <button   type="button" onclick='window.location.href="demande_partenariat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspDemande_Partenariat </i></a></span>
				  </button>
                 </div>
				   
				 
				  <div class="btn-group">
				  <button   type="button"  onclick='window.location.href="#";'   class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				
				
             </div>		 
			
			
			

        </div>

    </div>

</div>
   
   
    </header>
  
<body>



<div class="container mainbg">

<br><button><a class="return" href="prestataire.php?choix=liste&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a></button>

    <h1 class="h1_title">Ajout de Fournisseurs</h1>
    <hr> <br>

	
	
	 <?php           
	 
	 $id_titulaire=$_GET['id_titulaire'];
$rqz= "SELECT  * FROM titulaire where id_titulaire='$id_titulaire'  ";	 

          $reponse1= $pdo->prepare("$rqz");
            $reponse1->execute();
			$data_titu=$reponse1->fetch();

	 
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?> <br><br>


    
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="prestataire.php?c&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
	   
	   
	   
	   <div class="col-md-4"> 
	   <label class="">Fournisseur: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 
		<input name="nom_titulaire" value="<?php echo $data_titu["nom_titulaire"]; ?>" type="text" placeholder="Nom de l'entreprise" required class="form-control validate[required]" />
		 <input name="id_titulaire" value="<?php echo $data_titu["id_titulaire"]; ?>" type="hidden"  required class="form-control validate[required]" />
		
              </div>
			   </div>
			   
			   <div class="col-md-4"> 
	   <label class="">Adresse_Fournisseur : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
		<input name="adresse" value="<?php echo $data_titu["adresse"]; ?>" type="text" placeholder="" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">NIF_Fournisseur : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
 <input name="nif_titulaire" value="<?php echo $data_titu["nif_titulaire"]; ?>" type="text" placeholder="" required class="form-control validate[required]" />
 
              </div>
			   </div> <br/><br/>
			      
			    <div class="col-md-4"><br/>
              <label class="">N°_RC: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
	<input name="rc_titulaire" value="<?php echo $data_titu["rc_titulaire"]; ?>" type="text" placeholder="" required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Tel: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 			  	
 
	<input name="tel_titulaire" value="<?php echo $data_titu["tel_titulaire"]; ?>"  type="tel"  autocomplete="on" placeholder="Ex: 70000000" required class="form-control validate[required]" />
	 
              </div>
			   </div> 
			    
			     <div class="col-md-4"> </br>
              <label class="">Numero_Compte_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
					 
	            <input name="num_compte_banque" value="<?php echo $data_titu["num_compte_banque"]; ?>" type="text" placeholder="" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			  
			     <div class="col-md-4"> </br>
              <label class="">Nom_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
	<input name="nom_banque" value="<?php echo $data_titu["nom_banque"]; ?>" type="text" placeholder="Ex: BNDA" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Nom et prenom: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="representant_titulaire" value="<?php echo $data_titu["representant_titulaire"]; ?>" type="text" placeholder="Rerpresentant titulaire" required class="form-control validate[required]" />
            
			</div>
			   </div>
	   
	    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
	   
	  
	   <center>
	       <button type="submit" name="d" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-danger" onclick='window.location.href="prestataire.php?choix=liste&id2=<?php echo $id2 ?>";'>Annuler</button>     
    </center>
	   <br/><br/>
	   

      </form>
  
  </div>
        

 

 






        
     </div>
   </div>
  
 <br>
        

</div>

 

 <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

</body><br/> <br/> <br/> <br/> <br/> 
	
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
	
	
	
	
	 <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
 </html>  
   
	       
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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>
  
     
  </head>
  
  
   <?php  
   }
   
	  if($choix=="demande_partenariat"){     
		                       
		    $id2=$_GET['id2'];  
	  ?>
  
  
  
  
   <header>
   <div class="nav">

	<div class="navbar navbar-default navbar-fixed-top">
      
        <div class="container">
          
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    
                        <span class="sr-only">Toggle navigation</span>      
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>          
                </button> 

                <h2 class="h1_title">Fournisseurs</h2>

           </div>

         

 <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				 
			<div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=ajouter";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspAjouter_Fournisseur </i></a></span>
				  </button>
                 </div>
				 

				 
				  
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspListe_Fournisseur</i></a></span>
				  </button>
                 </div>	 
				   
				 <div class="btn-group">
				  <button   type="button" onclick='window.location.href="demande_partenariat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspDemande_Partenariat </i></a></span>
				  </button>
                 </div>
				   
				 
				  <div class="btn-group">
				  <button   type="button"  onclick='window.location.href="#";'   class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				
				
             </div>		 
			
			
			

        </div>

    </div>

</div>
   
   
    </header>
  

 
<body> 
   
    <div class="container mainbg"> 
   <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Liste Fournisseurs </h1>
   
    <br>
    <br>
    </div> 
   
   <br/> <br/> <br/><br/>
	<center><?php if(isset($_SESSION['ajoutFours'])){?><div  class='alert alert-danger center' style='width: 30%; font-family:Tahoma;height:5%; font-size:15px; margin:auto;'><B> <?php {echo  $_SESSION['ajoutFours']; unset($_SESSION['ajoutFours']);} ?>
		               </B></div>
					   <?php }?>
		  </center> 
		  
		  <?php
   
     $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
  
$id2=$_GET['id2'];
    $sql= "SELECT  * FROM titulaire where id_titulaire!='00000000_07' "; 
   $reponse = $pdo->prepare("$sql");
  $reponse->execute(); 
  
  
	 
	 ?>  
		  
		  
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Nom_Entreprise</th>
            <th>Répresentant</th>
			<th>Téléphone</th>
			 <th>Numéro_Compte_Banque</th>
            <th>Nom_Banque</th> 
			<th>N_i_f</th> 
			<th>N°_RC</th> 
            <th>Demande_Partenariat</th> 
			 
			  
            </tr>
        </thead>
        <tbody> 
		   
		    <?php    foreach  ($conn->query($sql) as $pointer5) {   
			
			   	?> 
           
          <tr>
		   
                  
         <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointer5['nom_titulaire'] ?></td>
              <td><?php echo $pointer5['representant_titulaire'] ?></td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $pointer5['tel_titulaire'] ?></td>
			  <td><?php echo $pointer5['num_compte_banque'] ?></td>
			   <td><?php echo $pointer5['nom_banque'] ?></td> 
			    <td><?php echo $pointer5['nif_titulaire'] ?></td> 
                 <td><?php echo $pointer5['rc_titulaire'] ?></td> 
				  
             <td><button><a data-toggle="modal" data-target="#<?php echo ($pointer5['id_titulaire']) ?>"><i  class="glyphicon glyphicon-save"></i></a></button>
			 
			  
      <!-- DEBUT ALERT  -->
 
   
   
<div id="<?php echo($pointer5['id_titulaire']) ?>" class="modal fade" role="dialog">
 
 

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
                  <center ><b >S'il vous plait veuillez choisir le type du document !!! </b></center>
        </thead>
           <tbody>
                  
               
          </tbody>
         
       </table>
        
        
        
      </div>
	  
	   <center>
	   
	       <button type="submit" name="b" class="mybtn mybtn-success" onclick='window.location.href="../../contrat_a_1.1/v3/examples/index.php?id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>"'>
		   
	
    <a href="../../contrat_a_1.1/v3/examples/index.php?id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>">		
		</a>Telecharger	   
		   
		  </button>
		  
		  		   
    </center><br/>
       
    </div>

  </div>
  
</div>
 

 
  <!-- FIN ALERT -->
		 	 
			 
			 
			 </td>
			   
                </tr>  
				
				<?php } ?>  
             
               
        </tbody>
        <tfoot>
            <tr>
                <th>Nom_Entreprise</th>
            <th>Répresentant</th>
			<th>Téléphone</th>
			 <th>Numéro_Compte_Banque</th>
            <th>Nom_Banque</th> 
              <th>N_i_f</th> 
			<th>N°_RC</th> 
			<th>Demande_Partenariat</th> 
			   
            </tr>
        </tfoot>
    </table>
   
 
	  </div>
  
  
  <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
 
</body>
<br/><br/><br/><br/><br/><br/><br/><br/>
	<?php }?>
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
	
	
	
	
	 <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
 </html>  		                       
	 

 
 
    