<?php 
require'connexion.php';

   $id2=$_GET['id2']; 

   
    
    

	   $num_contrat=$_GET['num_contrat'];
		$req=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req->execute();
		$data=$req->fetch();
		  $num_contrat=$data['num_contrat'];
		    $id_cotation=$_GET['id_cotation'];
		  
		   $id_titulaire=$_GET['id_titulaire'];
		$req1=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req1->execute();
		$data1=$req1->fetch();
		  $id_titulaire=$data1['id_titulaire'];
		  
		  
		
		 
		  
		  if(isset($_GET['a'])){
			  
			   
			  
 $id_titulaire_post= $_POST["id_titulaire"];
 
	  $date_contrat=date("Y-m-d");
     
   	  
     $objet_contrat=trim($_POST["objet_contrat"]);
   
	 $delai_execution=trim($_POST["delai_execution"]);
   
	 
   
    $source_finance=trim($_POST["source_finance"]);
  
	 $exercice=trim($_POST["exercice"]);	  
  
	 $section=trim($_POST["section"]);
   
	 $chapitre=trim($_POST["chapitre"]);
   
	 $nature=trim($_POST["nature"]); 
	 
	 
  
   
	  
  
	
  
		 $representant_dfm=$_POST["representant_dfm"];
	 	 
  
		 $approuv_par=$_POST["approuv_par"];
	 		 
	 
		 $fonction_post=$_POST["fonction"];
	 
	 
		 $fonction_approuv=$_POST["fonction_approuv"];
 
		 $conclu_par=$_POST["conclu_par"];
	 
	 
		 $nom_conlu_par=$_POST["nom_conlu_par"];
	 
	 
		 $profession_conclu=$_POST["profession_conclu"];
	 $nb_produit=$_POST["nb_produit"];
	 
	    $designation=$_POST["designation"]; 
	    $quantite=$_POST["quantite"];
	    $prix_unitaire=$_POST["prix_unitaire"];
	
	 $req_verif2=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation' AND id_titulaire='$id_titulaire_post' AND etat='choisi' ");
			$req_verif2->execute();
			$data_verif2=$req_verif2->fetch();
		
			 $total_ttc=$data_verif2['montant'];
			 
	 include_once('convert.php'); 
			
			 $reqUpContrat=$pdo->prepare("update contrat set  total_ttc='$total_ttc', enlettre='$enlettre1' where num_contrat='$num_contrat' ");
      
                  $reqUpContrat->execute();
						   $data_mont=$reqUpContrat->fetchAll();
  
	 
		  }
		  
		  
		  
		  if(isset($_POST['b'])){
			  
			 
	  
	#$exercice,$section,$chapitre,$nature,$nb_produit,$approuv_par,$representant_dfm,$id2,$date_contrat,$fonction,
	#$nom_conlu_par,$conclu_par,profession_conclu
	#$fonction_approuv,$profession_conclu,$num_contrat
	#$delai_execution,$source_finance,	
	
	 $reqb=$pdo->prepare('UPDATE contrat SET objet_contrat=?,id_titulaire=?,exercice=?,section=?,
     chapitre=?,nature=?,nb_produit=?,approuv_par=?,representant_dfm=?,id2=?,date_contrat=?,fonction=?,
       fonction_approuv=?,nom_conlu_par=?,conclu_par=?,profession_conclu=?
	   
	    
				 									  
													  
			WHERE(num_contrat=?)');
	$params=array($objet_contrat,$id_titulaire_post,$exercice,$section,$chapitre,$nature,$nb_produit,$approuv_par,
	$representant_dfm,$id2,$date_contrat,$fonction_post,$fonction_approuv,$nom_conlu_par,$conclu_par,$profession_conclu,$num_contrat);
		
			$reqb->execute($params);	
			
			
	 
		
	 
	                        $msg_eng="Modification effectuée";
	                 header("location:liste_contrat.php?id2=$id2&num_contrat=$num_contrat&id_titulaire=$id_titulaire&msg_eng=$msg_eng&choix=private");  
		   

		       
		  }
		 /////////////////////////////////////////////////////////
    if(isset($_POST['addpb'])){
		
	 $req_add_p=$pdo->prepare('select max(code_produit) from produit_contrat');
			$req_add_p->execute();
			$pointer_add_p=$req_add_p->fetch();
	
			$code_produit=$pointer_add_p['max(code_produit)']+1;
			if($code_produit<=9){
				$code_produit='00000'.$code_produit;
			}else if($code_produit<=99){
				$code_produit='0000'.$code_produit;
			}else if($code_produit<=999){
				$code_produit='000'.$code_produit;
			}else if($code_produit<=9999){
				$code_produit='00'.$code_produit;
			}else if($code_produit<=99999){
				$code_produit='0'.$code_produit;
			}
	
 
			
			$designation=$_POST['designation'];
			 
	 
	   
		 
			$quantite=$_POST['quantite'];
		 
		 
			$prix_unitaire='0';
		 
		 
			$num_contrat=$_POST['num_contrat'];
			 $montant=$prix_unitaire*$quantite;
		 
	 
	 
                include ('convert_p.php');
				
   $reqadd=$pdo->prepare("insert into produit_contrat (code_produit,designation,prix_unitaire,quantite,montant,p_enlettre,num_contrat) values(?,?,?,?,?,?,?)");
          $params=array($code_produit,$designation,$prix_unitaire,$quantite,$montant,$enlettre2,$num_contrat);
          $reqadd->execute($params);
		  
		  
	 $rqsum= "SELECT  sum(montant) FROM produit_contrat where num_contrat='$num_contrat' "; 
     $reponsesum = $pdo->prepare("$rqsum");
     $reponsesum->execute(); 
     $datasum=$reponsesum->fetch();
	
	
  $total_ht=($datasum["sum(montant)"]);
  $tva=($total_ht*18)/100;
  $total_ttc=intval($tva+$total_ht);
  
   $rqprd= "SELECT * FROM contrat where num_contrat='$num_contrat' "; 
     $reponseprd = $pdo->prepare("$rqprd");
     $reponseprd->execute(); 
     $dataprd=$reponseprd->fetch();
	$nb_produit1 = $dataprd['nb_produit'];
     $nb_produit = $nb_produit1+1;
	 
	 include_once('convert.php'); 
	 
	$rqup=$pdo->prepare('UPDATE contrat SET total_ht=?, tva=?, total_ttc=?,nb_produit=?, enlettre=? WHERE(num_contrat=?)');
	$params=array($total_ht,$tva,$total_ttc,$nb_produit,$enlettre1,$num_contrat);
	$rqup->execute($params);
	
	
		   header("location:modifier_contrat.php?id2=$id2&msg_sup=$msg_sup&num_contrat=$num_contrat&fonction=$fonction&id_titulaire=$id_titulaire&id_cotation=$id_cotation");
 
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
				  <button   type="button" onclick='window.location.href="contrat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspNouveau_Contrat</i></a></span>
				  </button>
                 </div>
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="liste_contrat.php?id2=<?php   echo $id2;?>&choix=public";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspLivre_journal_des_contrats</i></a></span>
				  </button>
                 </div>
				  	  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="liste_contrat.php?id2=<?php   echo $id2;?>&choix=private";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspMes_Contrats</i></a></span>
				  </button>
                 </div>
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listeCotation";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspCotation</i></a></span>
				  </button>
                 </div>
				 
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listePj";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspPièce_Justificative</i></a></span>
				  </button>
                 </div>
				  <div class="btn-group">
				  <button        class="btn btn-default dropdown-toggle" >
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"  href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				  
				 
             </div>

        </div>

    </div>

</div>
 

<div class="container main">
   
   
 <div class="container mainbg">

<br><button><a class="return" href="liste_contrat.php?choix=private&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a></button>

    <h1 class="h1_title">Modification du contrats N° <?php echo $num_contrat ?></br>
	                   Choix du fournisseur
	</h1>
 

	 
	 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?> 
                                    
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="modifier_contrat.php?a&id2=<?php echo $id2 ?>&num_contrat=<?php echo $num_contrat ?>&id_titulaire=<?php echo $id_titulaire ?>&id_cotation=<?php echo $id_cotation ?>" method="post" enctype="multipart/form-data">
	   
	   
	   
	   <div class="col-md-6"> 
	   <label class="">Num_Contrat : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 
		<input name="num_contrat" readonly value="<?php echo $data["num_contrat"];?>"  placeholder="Nom de l'entreprise" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			      

			   <?php
				
				$reqniveau=$pdo->prepare("select * from titulaire where id_titulaire!='00000000_07' ");
												  $reqniveau->execute();
												  $etreqniveau=$reqniveau->fetchAll(PDO::FETCH_ASSOC);
										 	  
												   
											  
	?>
	 <div class="col-md-6">
		 <label class="">Titulaire   :<span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
		   <div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
				 <select name="id_titulaire"   class="form-control" autofocus >
						  <?php   ?> 
										  
											<option value="" selected>Veillez choisir le titulaire</option>	  
												  
										  <?php  ?>
										  
										  
										  <?php foreach($etreqniveau as $etreqniveau1){ 
													   
										  ?>
										  
										  
  <option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="<?php echo $etreqniveau1['id_titulaire'];  ?>" 
				 <?php if(isset($_GET['id_titulaire'])){
					 if($_GET['id_titulaire']==$etreqniveau1['id_titulaire']){?> selected <?php }
					  
					 
					 } ?> >
													  
									<?php echo $etreqniveau1['representant_titulaire']; ?>&nbsp&nbsp
									(<?php echo $etreqniveau1['nom_titulaire']; ?>)   
	</option>												  
										  			
									  	  
											  
										  <?php  } ?>
										  
										 
									  </select>
			 
			 
			 </div>
</div>


 


	   
	    <br/><br/><br/><br/><br/><br/>
	   
	  
	  
	   <br/><br/>
	   

      
  
  </div>
        
 
        
     </div>
   </div>
   
   
   
   
 



<div class="container mainbg">

 
    <h1 class="h1_title"> 
	                 Informations concernant le contrat
	
	</h1>
    <hr> 

	 
	 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?> 
                                    
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      
	   
	   
	   
	   <div class="col-md-4"> 
	   <label class="">Objet_Contrat : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 
		<input name="objet_contrat"  value="<?php echo $data["objet_contrat"];?>"  placeholder="Nom de l'entreprise" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   <div class="col-md-4"> 
	   <label class="">Délai_Execution : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
		<input name="delai_execution" type="text" value="<?php echo $data["delai_execution"];?>" placeholder="" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">Source_Financement : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
                <input name="source_finance" value="<?php echo $data["source_finance"];?>" type="text" placeholder="" required class="form-control validate[required]" />
 
              </div>
			   </div> <br/><br/>
			      
			    <div class="col-md-4"><br/>
              <label class="">Exercice : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
	<input name="exercice" type="text" value="<?php echo $data["exercice"];?>" placeholder="" required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Section: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 			  	
 
	<input name="section"  type="tel" value="<?php echo $data["section"];?>"   required class="form-control validate[required]" />
	 
              </div>
			   </div> 
			    
			     <div class="col-md-4"> </br>
              <label class="">Chapitre: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
					 
	            <input name="chapitre" type="text" value="<?php echo $data["chapitre"];?>"  placeholder="" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			  
			     <div class="col-md-6"> </br>
              <label class="">Nature: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
	<input name="nature" type="text" value="<?php echo $data["nature"];?>" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			    
			   
			    <div class="col-md-6"> </br>
              <label class=""> Nombre_Produits: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="nb_produit" type="text" readonly value="<?php echo $data["nb_produit"];?>"  required class="form-control validate[required]" />
            </div></br></br>
			</div> </div></br></br></br></br>
			   </div>
			   
	 		    



        
     </div>
   




<div class="container mainbg">

 
    <h1 class="h1_title">Informations concernant les intervenants</br>
	                    
	</h1>
    <hr> 

	 
	 
                                    
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="modifier_contrat.php?a&id2=<?php echo $id2 ?>&num_contrat=<?php echo $num_contrat ?>&id_titulaire=<?php echo $id_titulaire ?>&id_cotation=<?php echo $id_cotation ?>" method="post" enctype="multipart/form-data">
	   
	   
	   
	   
 <div class="col-md-4"> </br>
              <label class="">Répresentant_dfm: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="representant_dfm" type="text" value="<?php echo $data["representant_dfm"];?>" placeholder="Rerpresentant titulaire" required class="form-control validate[required]" />
            
			</div>
			   </div>
			                     <?php
				$fonction=$_GET['fonction']; 
	              $reqniveau=$pdo->prepare("select * from contrat where num_contrat='$num_contrat' AND fonction='$fonction'  ");
						$reqniveau->execute();
						$etreqniveau=$reqniveau->fetchAll(PDO::FETCH_ASSOC);
					 	 	 	
	                           ?>
            <div class="col-md-4"> </br>
              <label class="">Répesentant_DFM(Fontion): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group"> 
                <select name="fonction"  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_GET['fonction'])){ ?>
				  
				    
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="<?php echo $data["fonction"];?>"    selected  ><?php echo  $fonction; ?></option>
				
				<?php if($fonction=='le Directeur Administratif et Financier'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >le Chef de Division de Materiel et Equipement</option>
				   
				<?php }elseif($fonction=='le Chef de Division de Materiel et Equipement'){ ?>
				<option name="fonction"   style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >le Directeur Administratif et Financier</option>  
				 <?php }?>
			 
				  
				  <?php }?>
				  
						 
				   
				      </select>
				    
              </div>  
			   </div>				
			   
			    <div class="col-md-4"> </br>
              <label class="">Approuver_Par(Nom_Prenom) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="approuv_par" type="text" value="<?php echo $data["approuv_par"];?>" placeholder="Approuver_Par" required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Approuver_Par(Fonction) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="fonction_approuv" type="text" value="<?php echo $data["fonction_approuv"];?>" placeholder="fonction_approuv" required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Conclu_Par(Nom_Prenom) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="nom_conlu_par" type="text" value="<?php echo $data["nom_conlu_par"];?>"  required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Conclu_Par(Fontion): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="conclu_par" type="text" value="<?php echo $data["conclu_par"];?>"  required class="form-control validate[required]" />
            
			</div>
			   </div>
			   
			    
			   	   
			   		   
			 <center> </br></br></br></br></br></br></br></br></br></br></br>
	 <B style="color:blue"><h2 class="h2_title">Si vous avez modifié des informations cliquer sur envoyer avant d'ajouter des produits.</br></h2></B> 
			   		  
	       <button type="submit" name="b" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-danger" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'>Annuler</button>     
    </center>
	   <br/><br/>
	   

      </form> 
  
  
        
  
        </div>
     </div></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> 
   </div>   
   
   
    
 

<div class="container mainbg">

 
    <h1 class="h1_title"> 
	                 Informations concernant les produits
	
	</h1>
    <hr> 

	 
	 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?> 
                                    
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

     
<div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  
        $req2=$pdo->prepare("select * from produit_contrat where num_contrat='$num_contrat'");
		$req2->execute();
		  
		 $fonction1=$_GET['fonction']; 
          $id_titulaire=$data1['id_titulaire'];
   
  ?>
		
          <table class="table table-striped table-bordered">
	                <tr class="tr-table" colspan="8"><center><h2>Les produits</h2></center></tr>	  
          <tr class="tr-table">
             <th>Désignation:</th>
            <th>Quantité </th>
            <th>Prix Unitaire:</th> 
			 <th>Supprimer</th>
			  
          </tr> 
	  
	<?php  while ($data2=$req2->fetch()){
                   $code_produit=$data2['code_produit'];
	?>
	 <tr>
	 
	<td><input name="designation" type="text" readonly  value="<?php echo $data2['designation'] ;?>"  required class="form-control validate[required]" /></td>

			 
	  <td><input name="quantite" type="text" readonly value="<?php echo $data2['quantite'];  ?>"  required class="form-control validate[required]" /></td>
	 
        <td><input name="prix_unitaire" readonly type="text"  value="<?php echo $data2['prix_unitaire'];  ?>"  required class="form-control validate[required]" /></td>
	 <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delPro&num_contrat=<?php echo($data['num_contrat']) ?>&id2=<?php echo $id2 ?>&code_produit=<?php echo($data2['code_produit']) ?>&fonction=<?php echo $fonction ?>&id_titulaire=<?php echo $id_titulaire ?>&id_cotation=<?php echo $id_cotation ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
	 		  
		  </tr>
		 
		   
	<?php  }?>  
	
      </table>
	  
	
 <table class="table table-striped table-bordered">
	                	  
						  
          <tr class="tr-table">
		  <th>
		  <a data-toggle="modal" data-target="#myModalListePatients">
	  <button class="btn btn-lg btn-primary btn-block" role="button" type="button">AJOUTER</button>
	   </a>
             	</th>
            
			  
          </tr> 
	  
	 
	
      </table>	
 </div>



	 
  
  </div>
        
 
        
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

action="modifier_contrat.php?addpb&id2=<?php echo $id2 ?>&num_contrat=<?php echo $num_contrat ?>&id_titulaire=<?php echo $id_titulaire ?>&fonction=<?php echo $fonction ?>&id_cotation=<?php echo $id_cotation ?>"
 method="post" enctype="multipart/form-data"

		  >
              
              
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
		  
		  </br></br></br></br></br></br></br></br>
                        <center>
                            <button type="submit" name="addpb" class="btn btn-success" >Enregistrer</button>
           
		                       
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
<div  id="footer">
 
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  
	</div>
	</footer>
</html>  
