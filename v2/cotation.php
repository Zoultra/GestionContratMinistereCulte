<?PHP 
require'connexion.php';

   $id2=$_GET['id2']; 
 
	   $num_contrat=$_GET['num_contrat'];
		$req=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req->execute();
		$data=$req->fetch();
		  $num_contrat=$data['num_contrat'];
	 
		 $id_titulaire=$_GET['id_titulaire'];
		$req1=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req1->execute();
		$data1=$req1->fetch();
		  $nom_titulaire=$data1['nom_titulaire'];
		   $tel_titulaire=$data1['tel_titulaire'];
	 
		
			   
	 
	 
		
		 
		   
		 
		  if(isset($_GET['a'])){
			  
		
		 
		 
			$num_ref=$_POST['num_ref'];
	 
		   $num_contrat=$_POST['num_contrat'];
	          
		 
		 	$nom_piece=$_POST['nom_piece'];
	 
	 
	
	
			  
			    $req_add_p=$pdo->prepare('select max(code_pj) from piece_jointe');
			$req_add_p->execute();
			$pointer_add_p=$req_add_p->fetch();
	
			$code_pj=$pointer_add_p['max(code_pj)']+1;
			if($code_pj<=9){
				$code_pj='00000'.$code_pj;
			}else if($code_pj<=99){
				$code_pj='0000'.$code_pj;
			}else if($code_pj<=999){
				$code_pj='000'.$code_pj;
			}else if($code_pj<=9999){
				$code_pj='00'.$code_pj;
			}else if($code_pj<=99999){
				$code_pj='0'.$code_pj;
			}
			
		 
			$photo=$_FILES["photo"]['name'];
			 $prop=$nom_titulaire.'_'.$tel_titulaire;
			 if(is_dir("C:\wamp\www\Contrats_generes\PIECES/".$num_contrat)=='true'){
		 
	 }else{
	 mkdir("C:\wamp\www\Contrats_generes\PIECES/$num_contrat");
	 }
	$dossier="C:\wamp\www\Contrats_generes\PIECES/$num_contrat";
	
	$target="$dossier/".basename($_FILES["photo"]['name']);
	$photo=$_FILES["photo"]['name'];
	
	if(move_uploaded_file($_FILES["photo"]['tmp_name'],$target)){
																										$msg="ok";
																									}else { $msg="no";}
			
			}
			   if(isset($_POST['save'])){
				   
				   if($nom_piece!='Veillez choisir le nom de la piece'){
	 $req_insert=$pdo->prepare("insert into piece_jointe (code_pj,num_ref,nom_piece,photo,num_contrat) values(?,?,?,?,?)");
          $params=array($code_pj,$num_ref,$nom_piece,$photo,$num_contrat);
          $req_insert->execute($params); 
		  
	    $msg_eng="Pièce ajoutée avec succès.";
		 header("location:p_j.php?id2=$id2&msg_eng=$msg_eng&num_contrat=$num_contrat&id_titulaire=$id_titulaire");  
		
				   }else{
					    $msg_eng_echec="Echec d'envoi, veuillez choisir un document!!!";
	    header("location:p_j.php?id2=$id2&msg_eng_echec=$msg_eng_echec&num_contrat=$num_contrat&id_titulaire=$id_titulaire");  
				   }
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

                <h2 class="h1_title">Modification de contrat</h2>
 
           </div>

         

 <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				<div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=ajouter";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspAjouter_Prestataire </i></a></span>
				  </button>
                 </div>
				 

				 
				  
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspListe_Prestataires</i></a></span>
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

<br><button><a class="return" href="liste_contrat.php?choix=private&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a></button>

    <h1 class="h1_title">Ajout de pièces justificatifs pour le contrat N°<b style="color:yellow"><?php echo $num_contrat ?></b>
	                  
	</h1> 
	
                                    
    
  
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="p_j.php?a&id2=<?php echo $id2 ?>&id_titulaire=<?php echo $id_titulaire ?>" method="post" enctype="multipart/form-data">
	   </br>
	   
	                  
	  <div class="col-md-4"> 
	   <label class="">Type document: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
               <select required name="nom_piece" type="text"  class="form-control" autofocus >
                			 
											
				 <option   selected  >Veillez choisir le nom de la piece</option>
				  <option   >Reférence expression des besoins</option>
					<option   >Facture</option>	
                     <option >Procès verval</option> 
					 
										</select>   
		 
              </div>
			   </div>
	
	
	
	   
										
										
	   <div class="col-md-4"> 
	   <label class="">Identifiant Document: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                 
		<input name="num_ref" required  value="<?php if(isset($_POST['num_ref'])){echo $_POST['num_ref'];} ?>" type="text"  required class="form-control validate[required]" />
		 <input name="num_contrat" value="<?php echo $num_contrat ?>" type="hidden"  placeholder="Numero d'identification" required class="form-control validate[required]" />
		
              </div>
			   </div>
			   
			    <div class="col-md-4"> 
	   <label class="">Copie: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                 
		<input name="photo" required type="FILE"    placeholder="Image du document"  class="form-control validate[required]" />
		 
              </div><br/><br/>
			   </div> </br></br>
			    
			   
			<center> </br></br></br> </br>
			 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:70px; font-family:Tahoma; font-size:15px; margin: auto;'><B><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></B></div> <?php }?> </br>
		   
		    <?php               
                  if (isset($_GET['msg_eng_echec'])){?><div class='alert alert-danger center' style='width: 50%; height:70px; font-family:Tahoma; font-size:15px; margin: auto;'><B><p><?php  echo $msg_eng_echec=$_GET['msg_eng_echec'];?>
				 
	       </p></B></div> <?php }?> </br>
			  
	       <button type="submit" name="save" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-danger" onclick='window.location.href="liste_contrat.php?choix=private&id2=<?php echo $id2 ?>";'>Annuler</button>     
    </center></br></br>   
			   
			     
      
  </form> 
  </div> 
  
  
  
  
  
   
 
        
    
   </div> 
   
    
                  
<div id="myModalListePatients" class="modal fade" role="dialog">
  
  
  
		  
 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
            Nouveau produit pour le contrat numéro&nbsp<b style="color:red"><?= strtoupper($num_contrat);?></b>
        </h3>
      </div>
      <div class="modal-body">
          <form id="formID"   

action="modifier_contrat.php?addpb&id2=<?php echo $id2 ?>&num_contrat=<?php echo $num_contrat ?>&id_titulaire=<?php echo $id_titulaire ?>&fonction=<?php echo $fonction ?>"
 method="post" enctype="multipart/form-data" >

		 
              
              
			   <input type="hidden" name="num_contrat" value="<?php echo $num_contrat;?> " />
              <div class="col-sm-6"><br/><br/>
			<label class="">Designation: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="designation"  type="text" placeholder="Entrez la designation" class="form-control" required />
              </div>
		  </div>
		  <div class="col-sm-6"><br/><br/>
			<label class="">Quantité: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="quantite"  type="text" placeholder="Entrez la quantité" class="form-control" required />
              </div>
		  </div>
		  <div class="col-sm-6"><br/>
			<label class="">Prix unitaire: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="prix_unitaire" type="text"  placeholder="Entrez prix unitaire" class="form-control" required />
              </div>
		  </div>
		  <br/><center>
		  
		  
		  
		  
		  
		   <center> </br></br></br></br></br></br></br></br></br>
			 
	       <button type="submit" name="addpb" class="mybtn mybtn-success">Enregistrer</button>
             </center>
		  
		  
		  
		  
		  
              
              
          </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Fermer</button>-->
      </div>
    </div>

  </div> 
  
  
  
  
</div>
 
 
 
</div>		
                           
 
 
    
    
  
           

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



  </body>
 <br/><br/><br/><br/>  
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>  
