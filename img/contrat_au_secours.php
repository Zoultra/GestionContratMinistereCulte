<!DOCTYPE html>
  

<?php require('connexion.php');
   $id1=$_GET['id_user'];
  $ps=$pdo->prepare("SELECT * FROM user WHERE  id_user='$id1' ");
    $ps->execute();
	$user_data=$ps->fetch();
  $id2=$user_data['id_user']; 
  
if(isset($_GET['a'])){
	
 
 	  
      
  								  
 if(isset($_POST['num_contrat'])){
     $num_contrat= $_POST["num_contrat"];
  }if(isset($_POST['objet_contrat'])){	  
     $objet_contrat= $_POST["objet_contrat"];
  }if(isset($_POST['delai_execution'])){
	 $delai_execution= $_POST["delai_execution"];
  }if(isset($_POST['date_approbation'])){
	 $date_approbation= $_POST["date_approbation"];   
  }if(isset($_POST['date_notification'])){
	 $date_notification= $_POST["date_notification"];

  }if(isset($_POST['num_contrat'])){
	 $num_contrat= $_POST["num_contrat"]; 
  }if(isset($_POST['source_finance'])){
	 $source_finance= $_POST["source_finance"];
  }if(isset($_POST['exercice'])){
	 $exercice= $_POST["exercice"];	  
 } if(isset($_POST['section'])){
	 $section= $_POST["section"];
  }if(isset($_POST['chapitre'])){
	 $chapitre= $_POST["chapitre"];
  }if(isset($_POST['nature'])){
	 $nature= $_POST["nature"]; 
 } if(isset($_POST['nb_produit'])){
	 $nb_produit= $_POST["nb_produit"];
	if(isset($_POST['nb_produit1'])){
		 $nb_produit1= $_POST["nb_produit1"];
	}	
 if(isset($_POST['tel_titulaire'])){
		 $tel_titulaire= $_POST["tel_titulaire"];
	}
  
 if(isset($_POST['adresse'])){
     $adresse= $_POST["adresse"];
  }  
  if(isset($_POST['num_compte_banque'])){
		 $num_compte_banque= $_POST["num_compte_banque"];
	}
  if(isset($_POST['representant_titulaire'])){
		 $representant_titulaire= $_POST["representant_titulaire"];
	}			 
	  if(isset($_POST['nom_banque'])){
		 $nom_banque= $_POST["nom_banque"];
	}		     
	  if(isset($_POST['rc_titulaire'])){
		 $rc_titulaire= $_POST["rc_titulaire"];
	}		    
	 if(isset($_POST['nif_titulaire'])){
		 $nif_titulaire= $_POST["nif_titulaire"];
	}	
 if(isset($_POST['nom_titulaire'])){
		 $nom_titulaire= $_POST["nom_titulaire"];
	}	
 if(isset($_POST['representant_dfm'])){
		 $representant_dfm= $_POST["representant_dfm"];
	}		 
 if(isset($_POST['approuv_par'])){
		 $approuv_par= $_POST["approuv_par"];
	}			 
	 if(isset($_POST['conclu_par'])){
		 $conclu_par= $_POST["conclu_par"];
	}
  

  
   
  
  
       }
 $zou='oui';
 
 
  
   
 
 

 if(isset($_POST['nb'])){
	 $n=$nb_produit;
	 if(isset($_POST['Enregistrer'])){
		 
		 $req=$pdo->prepare('select  count(*) from contrat');
			$req->execute();
			$pointerz=$req->fetchcolumn();
		 
		   
	 
	      $varz=$pointerz +1;
			if($varz<=9){
				$varz='0'.$varz;
			}else if($varz<=99){
				$varz='00'.$varz;
			}else if($varz<=999){
				$varz='000'.$varz;
			}else if($varz<=9999){
				$varz='0000'.$varz;
			}else if($var3<=99999){
				$varz='00000'.$varz;
			}
			
		        $date_contrat=date("d/m/y");
		   
		        $num_contrat=strtolower($varz);
					    
				$tel_titulaire=substr($tel_titulaire,0,2).'-'.substr($tel_titulaire,2,2).'-'.substr($tel_titulaire,4,2).'-'.substr($tel_titulaire,6,2);
				
				 
				 
		  $req=$pdo->prepare("insert into contrat(num_contrat,objet_contrat,delai_execution,date_approbation,date_notification,source_finance,
													exercice, section, chapitre,nature, nb_produit,
													nom_titulaire, nif_titulaire, rc_titulaire,tel_titulaire, num_compte_banque
													, nom_banque, representant_titulaire,conclu_par,approuv_par,representant_dfm,id_user,adresse,date_contrat
										 ) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$params=array($num_contrat,$objet_contrat,$delai_execution,$date_approbation,$date_notification,$source_finance,
									$exercice,$section,$chapitre,$nature,$nb_produit,
									$nom_titulaire,$nif_titulaire,$rc_titulaire,$tel_titulaire,$num_compte_banque
									,$nom_banque,$representant_titulaire,$conclu_par,$approuv_par,$representant_dfm,$id2,$adresse,$date_contrat);
										  
			$req->execute($params);
			 
			 
		 
	 }
	 
	 if(isset($_POST['Precedent'])){
		
		  
		 if($_POST['nb']==$nb_produit){
			 $i1=$nb_produit ;
			  echo $i1;
		 }else{
		 $i1=$nb_produit;
		 echo $i1;
		 } 
	 }else if(isset($_POST['not'])){
		 $i1=$nb_produit;
	 }else{
	 $i1=$nb_produit;
	
	 }
	 
	 
	  
	 while($i1!=0){
	
		 $designation='designation'.$n;
 
		if(isset($_POST[$designation])){
			
			$designation=$_POST[$designation];
			
			 
		}
	  
	
		 $quantite='quantite'.$n; 
		 if(isset($_POST[$quantite])){
			$quantite=$_POST[$quantite];
		}
		 
		 
		 $prix_unitaire='prix_unitaire'.$n;
		 if(isset($_POST[$prix_unitaire])){
			$prix_unitaire=$_POST[$prix_unitaire];
		}
		 
		 
		 $i1=$i1-1;
		 $n=$n-1;
		  if(isset($_POST['Enregistrer'])){
			  
 $montant=$prix_unitaire*$quantite;

 
 
  
  
	$req=$pdo->prepare('select  count(*) from produit_contrat');
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
		  
			  $desig=substr($designation,0,2);
			   
	 $code_produit= $desig.'_'.$quantite.'_'.$var3;
	 
	/// 
		  
  
 	  include ('convert_p.php');
	 
		
     $req=$pdo->prepare("insert into produit_contrat (code_produit,designation,prix_unitaire,quantite,montant,p_enlettre,num_contrat) values(?,?,?,?,?,?,?)");
          $params=array($code_produit,$designation,$prix_unitaire,$quantite,$montant,$enlettre2,$num_contrat);
          $req->execute($params);
		
		
		$rq= "SELECT  sum(montant) FROM produit_contrat where num_contrat='$num_contrat' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
	  
	$data=$reponse->fetch();
	
	
	
	  
	
	
	 
	
  $total_ht=($data["sum(montant)"]);
  $tva=($total_ht*18)/100;
  $total_ttc=intval($tva+$total_ht);

	  
	 
		 
	 }
		   	  
	 }
if(isset($total_ttc)){	
	include_once('convert.php'); 
 

 
	$rq1=$pdo->prepare('UPDATE contrat SET total_ht=?, tva=?, total_ttc=?, enlettre=? WHERE(num_contrat=?)');
	$params=array($total_ht,$tva,$total_ttc,$enlettre1,$num_contrat);
	$rq1->execute($params);
	 
 $msg_eng='Contrat crée avec succès vous pouvez generer maintenant.';
	 
	header("location:liste_contrat.php?id_user=$id2&choix=private&msg_eng=$msg_eng");
}
  }
	 		  if(isset($_POST['Enregistrer'])){
		  
		                   
		
			  }
		
 }
	

	
	
    

 
?>	
	 
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />
	 
	<title>Contrat</title>
	
	 

   
	
	
   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">  
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

      <script src="js/jquery-1.11.3.min.js"></script>
<script language="Javascript">
function verif_nombre(champ)
  {
	var chiffres = new RegExp("[0-9]");
	var verif;
	var points = 0;
 
	for(x = 0; x < champ.value.length; x++)
	{
            verif = chiffres.test(champ.value.charAt(x));
	    if(champ.value.charAt(x) == "."){points++;}
            if(points > 1){verif = false; points = 1;}
  	    if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
	}
  }
</script>
     
  </head>
   
   
  
<body>
<?php  include('nav_contrat.php');
?>


<div class="container mainbg">
<br><a class="return" href="index_user.php?id_user=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>

    <h1 class="h1_title">Gestion des contrat</h1>
    <br> <br>
 
     <div class="clear"></div>
	 
	 
	 
	 
	 
	 
	 
	 
	 <!----- HHHHHHHHHHH----------------------------------------------------------------->
    <div class="row col-md-10 col-md-offset-1">

<ul class="nav nav-tabs text-capitalize" role="tablist" style="background-color:#999; text-justify:!important; color:#FFF;">

<?php if(!isset($_GET['dedant'])){ ?>
	
 <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_1" role="tab">Etape 1</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_2" role="tab">Etape 2</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_3" role="tab">Etape 3</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
        </li>
		
		 
	
<?php }else{ ?>
 
 
              <!------------------1111---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_1']) and isset($_POST['Suivant']))  or (isset($_GET['etape_2']) and  isset($_POST['Suivant'])) or (isset($_GET['etape_3']) or isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#Etape_1" role="tab">Etape 1</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_2']) and isset($_POST['Precedent']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#Etape_1" role="tab">Etape 1</a>
        </li>
		
		<?php	} 
	 	
?>  
	 


              <!------------------2222222222---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_2']) and isset($_POST['Suivant'])) or (isset($_GET['etape_2']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#Etape_2" role="tab">Etape 2</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_1']) and isset($_POST['Suivant']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#Etape_2" role="tab">Etape 2</a>
        </li>
		
			<?php

 
			}else if((isset($_GET['etape_3']) and isset($_POST['Precedent']))){ ?>
	
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#Etape_2" role="tab">Etape 2</a>
        </li>
		
		<?php } 
	
	 
 ?>











	 


     <!------------------33333333333---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_3']) and isset($_POST['Suivant'])) or (isset($_GET['etape_3']) and isset($_POST['Precedent'])) or (isset($_GET['etape_2']) and  isset($_POST['Precedent']))  or (isset($_GET['etape_4']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_1']) OR isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#Etape_3" role="tab">Etape 3</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_4']) and isset($_POST['Precedent']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#Etape_3" role="tab">Etape 3</a>
        </li>
		
		 
		 
			<?php		}else if((isset($_GET['etape_2']) and isset($_POST['Suivant']))){ ?>
			
				<li class="nav-item active">
				   <a class="nav-link active" data-toggle="tab" href="#Etape_3" role="tab">Etape 3</a>
				</li>
	
				<?php
				}
 ?>


 

              <!------------------4444444444444444444444---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  		
        
		 <?php 
		 
		 
		 
		 
			if((isset($_GET['etape_4']) and isset($_POST['Suivant'])) or (isset($_GET['etape_5']) and isset($_POST['sss'])) or (isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and isset($_POST['Precedent'])) or isset($_GET['etape_1']) or isset($_GET['etape_2'])){ ?>
			
			 
		
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
		<?php 	}else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ ?>
		
				
<?php		if(!isset($_POST['nb'])){  ?>

		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
		
<?php	}else if(isset($_POST['nb'])){
	
				$nb1=$_POST['nb'];
				
				if(isset($_POST['noactive'])){   ?>
					
				<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
					
				<?php }else{ ?>
			<li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
					
				<?php }
				
 ?>		
<?php	} ?>
		
	 
	<?php		}else if((isset($_GET['etape_3']) and isset($_POST['Suivant']))){ ?>
	
		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_4" role="tab">Etape 4</a>
        </li>
	
	<?php   } 
  

?> 
  
        

              <!------------------55555555555555555555---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  		 
		 
		 
<?php 		 
		 
			if((isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_1'])  or isset($_GET['etape_2'])  or isset($_GET['etape_3']) )){ ?>
			
			 
		
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
        </li>	
		
	<?php		} else if((isset($_GET['etape_4']) and isset($_POST['Suivant']))){ ?>
	
		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
        </li>
	
	<?php	////////////////////////////////////// 
}else if(isset($_GET['etape_5']) and isset($_POST['sss'])){ ?>

	<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
        </li>
		
<?php }else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ 
	if(!isset($_POST['nb'])){ ?>
		<li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
        </li>
<?php	}else if(isset($_POST['nb'])){
				$nb1=$_POST['nb'];
				 
				
				if(isset($_POST['noactive'])){   ?>
					
					<li class="nav-item">
					  <a class="nav-link" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
					</li>
					
				<?php }else{  ?>
				
					<li class="nav-item active">
					  <a class="nav-link active" data-toggle="tab" href="#Etape_5" role="tab">Etape 5</a>
					</li>
				<?php }
				
 ?>		
<?php	}  
	
	
} ?>
		
 
<?php  } ?>
        
        
		
		
       
</ul> <br/><br/>
            
  
 <div class="tab-content" role="tablist">
		 
	   <!------------------1111---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  <?php 
			if(!isset($_GET['etape_1']) and !isset($_GET['etape_2']) and  !isset($_GET['etape_3']) and !isset($_GET['etape_4']) and !isset($_GET['etape_5']) ){ ?>
						<div class="tab-pane active" id="Etape_1" role="tabpanel">
			
			<?php }else if((isset($_GET['etape_1']) and isset($_POST['Suivant']))  or (isset($_GET['etape_2']) and  isset($_POST['Suivant'])) or (isset($_GET['etape_3']) or isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<div class="tab-pane" id="Etape_1" role="tabpanel">
	
		
		<?php	}else if((isset($_GET['etape_2']) and isset($_POST['Precedent']))){ ?>
		
		<div class="tab-pane active" id="Etape_1" role="tabpanel">
	
		
		<?php 	} 
	 	
?> 
		
  
			<form id="formID" action="contrat.php?etape_1&a&dedant&id_user=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
					 
					 <?php 
			 if(isset($_POST['nb'])){
	 $n=$nb_produit; ?>
	 <input name="nb_produit1" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>" class="form-control validate[required]" />
			
	<?php if(isset($_POST['Precedent'])){
		 
		  $t=$_POST['nb']+1;
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit;
		 }else{
		 $i=$nb_produit;
		 }
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 }
	 while($i!=0){
		  
		 $designation='designation'.$n;
		  
  ?>
			<input name="<?php echo $designation  ?>" type="hidden" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];}?>"   class="form-control validate[required]" />
											
		<?php $quantite='quantite'.$n;  
		?>
		 	<input name="<?php echo $quantite  ?>" type="hidden" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];}  ?>"   class="form-control validate[required]" />
		
	<?php	 $prix_unitaire='prix_unitaire'.$n;
		 
		  ?>
		 	<input name="<?php echo $prix_unitaire  ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){  echo $_POST[$prix_unitaire];} ?>"   class="form-control validate[required]" />
		
	<?php	
		$i=$i-1;
		 $n=$n-1;
		  
	 }
 }
 if(isset($_POST['nb'])){
 
   ?>
			   
			   <input name="nb" type="hidden" value="<?php echo $nb_produit ?>" class="form-control validate[required]" />
             
			 
			<?php   
			

}	 ?>
      			

				 
			 
	 
	 	
				
			 
			    <div class="col-md-4">
              <label class="">Objet_Contrat : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="text" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } else { ?>
							<input name="objet_contrat" type="text" placeholder="" class="form-control validate[required]" />
				    <?php }   ?>
              </div>
			   </div> 
	 
			     <div class="col-md-4">
              <label class="">Délai_Execution : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="int" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } else { ?>
							  <input name="delai_execution" type="text" placeholder="" class="form-control validate[required]" />
				  
				    <?php }   ?>		
				  
				 
              </div>
			   </div></BR></BR></BR></BR></BR></BR>
			   
			     <div class="col-md-4">
              <label class="">Date_Approbation : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="date" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				   <?php }else{ ?>
							  <input name="date_approbation" type="date" placeholder="" class="form-control validate[required]" />
            
				   <?php }   ?>
				    </div>
			   </div>
			   
			     <div class="col-md-4">
              <label class=""> Date_Notification : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					 <?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="date" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 <?php }else{ ?>
							    <input name="date_notification" type="date" placeholder="" class="form-control validate[required]" />
					 <?php }   ?>
              </div>
			   </div>
			 
			     <BR>
			     <BR>
		  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>"   class="form-control validate[required]" />
			  <?php } ?>	 
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="hidden" value="<?php echo $_POST["nature"]; ?>"  class="form-control validate[required]" />
				   <?php } ?>
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="hidden" value="<?php echo $_POST["chapitre"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
			   <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="hidden" value="<?php echo $_POST["section"]; ?>"   class="form-control validate[required]" />
				 <?php } ?>
					 <?php if(isset($_POST['exercice'])){ ?>
							<input name="exercice" type="hidden" value="<?php echo $_POST["exercice"]; ?>"  class="form-control validate[required]" />
					 <?php } ?>
				  <?php if(isset($_POST['source_finance'])){ ?>
							<input name="source_finance" type="hidden" value="<?php echo $_POST["source_finance"]; ?>"   class="form-control validate[required]" />
				   <?php } ?>
				    
 

  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" type="hidden" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php } ?>
	 <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" type="hidden" value="<?php echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	             <?php } ?>
				   
 <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" type="hidden" value=" <?php		 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
 <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" type="hidden" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>			 
<?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" type="hidden" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }	?>	     
<?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" type="hidden" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	    
	<?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" type="hidden" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
 <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input name="nom_titulaire" type="hidden" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		 
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	
			   
    
			   
		  
			   
			   
				   
				   
		<div><center>
 
            &nbsp;&nbsp; 
             <button type="submit" name="Suivant"  class="mybtn mybtn-success">Suivant</button>
          
			</center> 
	   </div>
					 
					 
					 
					 
					 
					 
					 
					 
		   
		   </form>
	  </div> <BR>
     
 
		    
		  
		  
	
 
		
		 
	
              <!------------------22222222222---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  	<?php 
				if(!isset($_GET['etape_1']) and !isset($_GET['etape_2']) and  !isset($_GET['etape_3']) and !isset($_GET['etape_4']) and !isset($_GET['etape_5']) ){ ?>
						<div class="tab-pane" id="Etape_2" role="tabpanel">
			
			<?php }else if((isset($_GET['etape_2']) and isset($_POST['Suivant'])) or (isset($_GET['etape_2']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<div class="tab-pane" id="Etape_2" role="tabpanel">
		
		<?php	}else if((isset($_GET['etape_1']) and isset($_POST['Suivant']))){ ?>
		
		<div class="tab-pane active" id="Etape_2" role="tabpanel">
		
			<?php

 
			}else if((isset($_GET['etape_3']) and isset($_POST['Precedent']))){ ?>
	
		<div class="tab-pane active" id="Etape_2" role="tabpanel">
		
		<?php } 
	
	 
 ?>
	
 
		<form id="formID" action="contrat.php?etape_2&a&dedant&id_user=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
 <?php 
			 if(isset($_POST['nb'])){
 
	  $n=$nb_produit;
	 if(isset($_POST['Precedent'])){
		 
		 $t=$_POST['nb']+1;
		
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit;  
		 }else{
		 $i=$nb_produit;
		
		 }
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 }
	 while($i!=0){
		 $designation='designation'.$n;
   ?>
			<input name="<?php echo $designation  ?>" type="hidden" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];}?>"   class="form-control validate[required]" />
											
		<?php $quantite='quantite'.$n; 
		?>
		 	<input name="<?php echo $quantite  ?>" type="hidden" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];}  ?>"   class="form-control validate[required]" />
		
	<?php	 $prix_unitaire='prix_unitaire'.$n;
		 
		  ?>
		 	<input name="<?php echo $prix_unitaire  ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){  echo $_POST[$prix_unitaire];} ?>"   class="form-control validate[required]" />
		
	<?php	 
		 $i=$i-1;
		 $n=$n-1;
		  
	 }
 } if(isset($_POST['nb'])){
 
   ?>
			   
			   <input name="nb" type="hidden" value="<?php echo $nb_produit ?>" class="form-control validate[required]" />
             
			 
			<?php   
			

}	 ?>				 
 		 
	


	
					<div class="col-md-4">
              <label class="">Conclu_Par(N_C_D): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="text" value="<?php echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
                  <input name="conclu_par" type="text" placeholder="" class="form-control validate[required]" />
				  <?php } ?>
              </div>
			   </div>
			   
			     <div class="col-md-4">
              <label class="">Approuver_Par : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="text" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
                  <input name="approuv_par" type="text" placeholder="" class="form-control validate[required]" />
              <?php } ?></div>
			   </div>
			  
			     <div class="col-md-4">
              <label class="">D'une_Part_Nom_Répesentant: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="text" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
	<input name="representant_dfm" type="text" placeholder="" class="form-control validate[required]" />
		<?php } ?>			   
              </div>
			   </div>  
			   
			   
			   
			   
			   
  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>"   class="form-control validate[required]" />
			  <?php } ?>	 
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="hidden" value="<?php echo $_POST["nature"]; ?>"  class="form-control validate[required]" />
				   <?php } ?>
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="hidden" value="<?php echo $_POST["chapitre"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
			   <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="hidden" value="<?php echo $_POST["section"]; ?>"   class="form-control validate[required]" />
				 <?php } ?>
					 <?php if(isset($_POST['exercice'])){ ?>
							<input name="exercice" type="hidden" value="<?php echo $_POST["exercice"]; ?>"  class="form-control validate[required]" />
					 <?php } ?>
				  <?php if(isset($_POST['source_finance'])){ ?>
							<input name="source_finance" type="hidden" value="<?php echo $_POST["source_finance"]; ?>"   class="form-control validate[required]" />
				   <?php } ?>
				   
 

  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" type="hidden" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php } ?>
	 <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" type="hidden" value="<?php echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	             <?php } ?>
				   
 <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" type="hidden" value=" <?php		 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
 <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" type="hidden" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>			 
<?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" type="hidden" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }	?>	     
<?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" type="hidden" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	    
	<?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" type="hidden" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
 <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input name="nom_titulaire" type="hidden" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>

			   
	

<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 <?php } ?>	
			   
 <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				   <?php } ?>
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				   
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>			   
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>		   
			   
					   
			   
			   
			   
			    
			   <br/><br/><br/><br/><br/><br/>
			   <center>
				 <button type="submit" name="Precedent" class="mybtn mybtn-success" >Precedent</button> &nbsp;&nbsp; 
				<button type="submit" name="Suivant"  class="mybtn mybtn-success">Suivant</button>
          </center>
	   
	   </form>
	 </div> <BR>
     
 
		    

 
 	 
              <!------------------3333333333---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  <?php 
			if(!isset($_GET['etape_1']) and !isset($_GET['etape_2']) and  !isset($_GET['etape_3']) and !isset($_GET['etape_4']) and !isset($_GET['etape_5']) ){ ?>
						<div class="tab-pane" id="Etape_3" role="tabpanel">
			
			<?php }else if((isset($_GET['etape_3']) and isset($_POST['Suivant']))  or (isset($_GET['etape_3']) and isset($_POST['Precedent']))  or (isset($_GET['etape_2']) and  isset($_POST['Precedent']))  or (isset($_GET['etape_4']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_1']) OR isset($_GET['etape_5']))){ ?>
			
			<div class="tab-pane" id="Etape_3" role="tabpanel">
		
		<?php	}else if((isset($_GET['etape_4']) and isset($_POST['Precedent']))){ ?>
		
			<div class="tab-pane active" id="Etape_3" role="tabpanel">
		
		 
		 
			<?php		}else if((isset($_GET['etape_2']) and isset($_POST['Suivant']))){ ?>
			
				<div class="tab-pane active" id="Etape_3" role="tabpanel">
				
				<?php
				}
 ?>
	

	
  
			
			<form id="formID" action="contrat.php?etape_3&a&dedant&id_user=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
  <?php 
			 if(isset($_POST['nb'])){
 
	  $n=$nb_produit;
	 if(isset($_POST['Precedent'])){
		 
		 $t=$_POST['nb']+1;
		
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit;  
		 }else{
		 $i=$nb_produit;
		
		 }
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 }
	 while($i!=0){
		 $designation='designation'.$n;
   ?>
			<input name="<?php echo $designation  ?>" type="hidden" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];}?>"   class="form-control validate[required]" />
											
		<?php $quantite='quantite'.$n; 
		?>
		 	<input name="<?php echo $quantite  ?>" type="hidden" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];}  ?>"   class="form-control validate[required]" />
		
	<?php	 $prix_unitaire='prix_unitaire'.$n;
		 
		  ?>
		 	<input name="<?php echo $prix_unitaire  ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){  echo $_POST[$prix_unitaire];} ?>"   class="form-control validate[required]" />
		
	<?php	 
		 $i=$i-1;
		 $n=$n-1;
		  
	 }
 }  		
		


if(isset($_POST['nb'])){
 
   ?>
			   
			   <input name="nb" type="hidden" value="<?php echo $nb_produit ?>" class="form-control validate[required]" />
             
			 
			<?php   
			

}	 ?>
	<div class="col-md-4"> 
	   <label class="">Titulaire : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input name="nom_titulaire" type="text" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
		<input name="nom_titulaire" type="text" placeholder="" class="form-control validate[required]" />
		<?php } ?>
              </div>
			   </div>
			   
			   <div class="col-md-4"> 
	   <label class="">Adresse_Titulaire : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" type="text" value=" <?php		echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
		<input name="adresse" type="text" placeholder="" class="form-control validate[required]" />
		<?php } ?>
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">NIF Titulaire : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" type="text" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
 <input name="nif_titulaire" type="text" placeholder="" class="form-control validate[required]" />
 <?php } ?>
              </div>
			   </div>
			      
			    <div class="col-md-4">
              <label class="">N°_RC: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" type="text" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
	<input name="rc_titulaire" type="text" placeholder="" class="form-control validate[required]" />
            <?php } ?>
			</div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Numero_Titulaire_tel: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 			  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" type="tel"  pattern="[0-9]{8}"  maxlength="8" autocomplete="on" placeholder="Ex: 70000000" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="tel_titulaire"  pattern="[0-9]{8}" type="tel" maxlength="8" autocomplete="on" placeholder="Ex: 70000000" class="form-control validate[required]" />
	<?php } ?>
              </div>
			   </div> 
			    
			     <div class="col-md-4"> </br>
              <label class="">Numero_Compte_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" type="text" value=" <?php		 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="num_compte_banque" type="text" placeholder="" class="form-control validate[required]" />
	<?php } ?>
              </div>
			   </div>
			  
			     <div class="col-md-4"> </br>
              <label class="">Nom_Banque: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" type="text" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }else{	?>
	<input name="nom_banque" type="text" placeholder="" class="form-control validate[required]" />
	<?php }	?>
              </div>
			   </div>
			   
			    <div class="col-md-4"> </br>
              <label class="">Nom_Répresentant: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" type="text" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="representant_titulaire" type="text" placeholder="" class="form-control validate[required]" />
            <?php } ?>
			</div>
			   </div>
			   
			   
		  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>"   class="form-control validate[required]" />
			  <?php } ?>	 
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="hidden" value="<?php echo $_POST["nature"]; ?>"  class="form-control validate[required]" />
				   <?php } ?>
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="hidden" value="<?php echo $_POST["chapitre"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
			   <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="hidden" value="<?php echo $_POST["section"]; ?>"   class="form-control validate[required]" />
				 <?php } ?>
					 <?php if(isset($_POST['exercice'])){ ?>
							<input name="exercice" type="hidden" value="<?php echo $_POST["exercice"]; ?>"  class="form-control validate[required]" />
					 <?php } ?>
				  <?php if(isset($_POST['source_finance'])){ ?>
							<input name="source_finance" type="hidden" value="<?php echo $_POST["source_finance"]; ?>"   class="form-control validate[required]" />
				   <?php } ?>
				    
 


<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		 
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
			   
	

<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 <?php } ?>	
			   
 <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				   <?php } ?>
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				   
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>			   
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>		   
			   
		 
			   <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			   <center>
					 <button type="submit" name="Precedent" class="mybtn mybtn-success" >Precedent</button> &nbsp;&nbsp; 
             <button type="submit" name="Suivant"  class="mybtn mybtn-success">Suivant</button>
          </center>
		   </form>
	 </div> <BR>
     
 
		    
 
  
  
              <!------------------4444444444---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
   <?php 
		 
		 
		 
		 
			if(!isset($_GET['etape_1']) and !isset($_GET['etape_2']) and  !isset($_GET['etape_3']) and !isset($_GET['etape_4']) and !isset($_GET['etape_5']) ){ ?>
						<div class="tab-pane" id="Etape_4" role="tabpanel">
			
			<?php }else  if((isset($_GET['etape_4']) and isset($_POST['Suivant'])) or (isset($_GET['etape_5']) and isset($_POST['sss'])) or (isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and isset($_POST['Precedent'])) or isset($_GET['etape_1']) or isset($_GET['etape_2'])){ ?>
			
			 
		
		 <div class="tab-pane" id="Etape_4" role="tabpanel">
		<?php 	}else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ ?>
		
				<?php		if(!isset($_POST['nb'])){ ?>

		<div class="tab-pane active" id="Etape_4" role="tabpanel">
		
<?php	}else if(isset($_POST['nb'])){
				$nb1=$_POST['nb'];
				
				if(isset($_POST['noactive'])){   ?>
					
				<div class="tab-pane active" id="Etape_4" role="tabpanel">
			
					
				<?php }else{ ?>
				
				<div class="tab-pane" id="Etape_4" role="tabpanel">
			
			
<?php } }
				
 ?>	
		
		
		
		
		
		
		
		
	<?php		}else if((isset($_GET['etape_3']) and isset($_POST['Suivant']))){ ?>
	
		<div class="tab-pane active" id="Etape_4" role="tabpanel">
	
	<?php   } 
  

?> 
	 
		 
	 
      			<form id="formID" action="contrat.php?etape_4&a&dedant&id_user=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
				
						 <?php 
			 if(isset($_POST['nb'])){
	 $n=$nb_produit; ?>
	 <input name="nb_produit1" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>" class="form-control validate[required]" />
			
	<?php if(isset($_POST['Precedent'])){
	 
		  $t=$_POST['nb']+1;
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit;
		 }else{
		 $i=$nb_produit;
		 }
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 }
	 while($i!=0){
		 
		 $designation='designation'.$n;
		  
  ?>
			<input name="<?php echo $designation  ?>" type="hidden" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];}?>"   class="form-control validate[required]" />
											
		<?php $quantite='quantite'.$n;  
		?>
		 	<input name="<?php echo $quantite  ?>" type="hidden" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];}  ?>"   class="form-control validate[required]" />
		
	<?php	 $prix_unitaire='prix_unitaire'.$n;
		 
		  ?>
		 	<input name="<?php echo $prix_unitaire  ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){  echo $_POST[$prix_unitaire];} ?>"   class="form-control validate[required]" />
		
	<?php	
		$i=$i-1;
		 $n=$n-1;
		  
	 }
 }
if(isset($_POST['nb'])){
 
   ?>
			   
			   <input name="nb" type="hidden" value="<?php echo $nb_produit ?>" class="form-control validate[required]" />
             
			 
			<?php   
			

}

 
 ?>		   
	     	   
         <div class="col-md-4">
              <label class="">Source_Financement : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['source_finance'])){ ?>
							<input name="source_finance" type="text" value="<?php echo $_POST["source_finance"]; ?>"   class="form-control validate[required]" />
				  <?php }else{ ?>
							     <input name="source_finance" type="text" placeholder="" class="form-control validate[required]" />
				   <?php }   ?>
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">Exercice : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 	 <?php if(isset($_POST['exercice'])){ ?>
							<input name="exercice" type="text" value="<?php echo $_POST["exercice"]; ?>"   class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input name="exercice" type="text" placeholder="" class="form-control validate[required]" />
				
					 <?php }   ?>
			  </div>
			   </div>
			   
			   
			   
			    <div class="col-md-4">
              <label class="">Section : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="text" value="<?php echo $_POST["section"]; ?>"  class="form-control validate[required]" />
				<?php }else{ ?>
							       <input name="section" type="text" placeholder="" class="form-control validate[required]" />
                <?php }   ?>
			  </div>
			   </div>
			      
			    
			   
			      <div class="col-md-4"></br>
              <label class="">Chapitre : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="text" value="<?php echo $_POST["chapitre"]; ?>" class="form-control validate[required]" />
				 <?php }else{ ?>
							       <input name="chapitre" type="text" placeholder="" class="form-control validate[required]" />
              
				 <?php }   ?>
			  </div>
			   </div>
			   
			     <div class="col-md-4"></br>
              <label class="">Nature : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="text" value="<?php echo $_POST["nature"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input name="nature" type="text" placeholder="" class="form-control validate[required]" />
				   <?php }   ?>
              </div>
			   </div>
			    <div class="col-md-4"></br>
              <label class="">Nombre_Produit: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="number" value="<?php echo $_POST["nb_produit"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input name="nb_produit" type="number" placeholder="" class="form-control validate[required]" />
				   <?php }   ?>
              </div>
			   </div>
			   
			     
			    <br/><br/><br/>

		<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>" class="form-control validate[required]" />
				<?php } ?>			
		 <?php if(isset($_POST['objet_contrat'])){  ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
			  <?php if(isset($_POST['delai_execution'])){  ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
					<?php } ?>			
			  <?php if(isset($_POST['date_approbation'])){ ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
			<?php } ?>	
			<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
						   	 	   
 
				<?php } ?>	
				  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" type="hidden" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php } ?>
	 <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" type="hidden" value="<?php echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	             <?php } ?>
				   
 <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" type="hidden" value=" <?php		 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
 <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" type="hidden" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>			 
<?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" type="hidden" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }	?>	     
<?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" type="hidden" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	    
	<?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" type="hidden" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
 <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input name="nom_titulaire" type="hidden" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		 
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
			   
	

<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 <?php } ?>	
			   
 <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				   <?php } ?>
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				   
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>			   
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
				
			 
			   <div><center>
   
			   <input name="not" type="hidden" value="<?php if(isset($_POST['nb_produit'])){echo $_POST['nb_produit']; }?>" class="form-control validate[required]" />
             <br/><br/><br/><br/><br/><br/>
           <button type="submit" name="Precedent" class="mybtn mybtn-success" >Precedent</button> &nbsp;&nbsp; 
             <button type="submit" name="Suivant"  class="mybtn mybtn-success">Suivant</button>
          
			</center> 
	   </div>
	   
		 
	   
					</form>	   
		</div>
 
 
 
 
 
  
 
 <!--------------555555555555555555555--------------------------COMPTE---------------------------------------------------------------------------->
 
  		 
<?php 		 
		 
			if(!isset($_GET['etape_1']) and !isset($_GET['etape_2']) and  !isset($_GET['etape_3']) and !isset($_GET['etape_4']) and !isset($_GET['etape_5']) ){ ?>
						<div class="tab-pane" id="Etape_5" role="tabpanel">
			
			<?php }else if((isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_1'])  or isset($_GET['etape_2'])  or isset($_GET['etape_3']) )){ ?>
			
			 
		
		 <div class="tab-pane" id="Etape_5" role="tabpanel">
		
	<?php		} else if((isset($_GET['etape_4']) and isset($_POST['Suivant']))){ ?>
	<div class="tab-pane active" id="Etape_5" role="tabpanel">
	
	<?php	////////////////////////////////////// 
}else if(isset($_GET['etape_5']) and isset($_POST['sss'])){ ?>
 
		<div class="tab-pane active" id="Etape_5" role="tabpanel">
<?php }else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ 
	if(!isset($_POST['nb'])){ ?>
		<div class="tab-pane" id="Etape_5" role="tabpanel">
<?php	}else if(isset($_POST['nb'])){
				$nb1=$_POST['nb'];
				  
				if(isset($_POST['noactive'])){   ?>
					
				<div class="tab-pane" id="Etape_5" role="tabpanel">
					
				<?php }else{  ?>
				
					<div class="tab-pane active" id="Etape_5" role="tabpanel">
				<?php }
				
 ?>		
<?php	}  
	
	
} ?>
		 
						<form id="formID" action="contrat.php?etape_5&a&dedant&id_user=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">	 
					 
					  <?php 
			 if(isset($_POST['nb'])){
 
	  $n=$nb_produit;
	 if(isset($_POST['Precedent'])){
		 
		 $t=$_POST['nb']+1;
		
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit;  
		 }else{
		 $i=$nb_produit;
		
		 }
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 }
	 while($i!=0){
		 $designation='designation'.$n;
   ?>
			<input name="<?php echo $designation  ?>" type="hidden" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];}?>"   class="form-control validate[required]" />
											
		<?php $quantite='quantite'.$n; 
		?>
		 	<input name="<?php echo $quantite  ?>" type="hidden" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];}  ?>"   class="form-control validate[required]" />
		
	<?php	 $prix_unitaire='prix_unitaire'.$n;
		 
		  ?>
		 	<input name="<?php echo $prix_unitaire  ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){  echo $_POST[$prix_unitaire];} ?>"   class="form-control validate[required]" />
		
	<?php	 
		 $i=$i-1;
		 $n=$n-1;
		  
	 }
 } ?>		
	  
      			
		<?php if(!isset($_POST['nb']) and isset($_POST['nb_produit'])){
							$nb=$nb_produit;
							 
						}else if(isset($_POST['nb'])){
							if(isset($_POST['Precedent'])){
								if($_POST['nb']==$nb_produit){
									$nb=$_POST['nb'];
								}else{
								$nb=$_POST['nb']+1;
								}
							 
							}else{
							$nb=$_POST['nb'];
							 
							}
						} ?>
						
				 <label class="">Désignation: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <?php if(isset($_POST['nb'])){  $designation='designation'.$nb; ?>
						
							<input name="<?php echo "designation".$nb ?>" type="text" value="<?php if(isset($_POST[$designation])){ echo $_POST[$designation];} ?>" class="form-control validate[required]" />
				  <?php }else{    $designation='designation'.$nb; ?>
								<input name="<?php echo "designation".$nb ?>" type="text" placeholder="" class="form-control validate[required]" />
				  	<?php }   ?>
                  
              </div><br>
			  
			   <label class="">Quantité : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['nb'])){  $quantite='quantite'.$nb; $noactive=$_POST['nb'] ; ?>
						
							<input onkeyup="verif_nombre(this);" name="<?php echo "quantite".$nb ?>"    type="text" value="<?php if(isset($_POST[$quantite])){ echo $_POST[$quantite];} ?>" class="form-control validate[required]" />
				 
				 
				 
										<?php if(($noactive==$nb_produit and isset($_POST['Suivant'])) or ($nb==$nb_produit)){   ?>
											
											<input onkeyup="verif_nombre(this);" name="noactive" type="hidden"    value="<?php echo $noactive ;?>" class="form-control validate[required]" />
									<?php	}
				 						?>
											
				 <?php }else{  ?>
				 
				  			
											<input name="noactive" type="hidden"    value="<?php echo '$noactive' ;?>" class="form-control validate[required]" />
									 
								<input name="<?php echo "quantite".$nb ?>" type="text" placeholder="" class="form-control validate[required]" />
				  	<?php }   ?>
               </div><br>
			  
			  <label class="">Prix Unitaire: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				   <?php if(isset($_POST['nb'])){  $prix_unitaire='prix_unitaire'.$nb;  ?>
						
							<input onkeyup="verif_nombre(this);" name="<?php echo "prix_unitaire".$nb ?>" type="text" value="<?php if(isset($_POST[$prix_unitaire])){ echo $_POST[$prix_unitaire]; } ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
								<input onkeyup="verif_nombre(this);" name="<?php echo "prix_unitaire".$nb ?>" type="text" placeholder="" class="form-control validate[required]" />
				  	<?php }   ?>
                  
				   </div><br>
			  
  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>"   class="form-control validate[required]" />
			  <?php } ?>	 
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="hidden" value="<?php echo $_POST["nature"]; ?>"  class="form-control validate[required]" />
				   <?php } ?>
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="hidden" value="<?php echo $_POST["chapitre"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
			   <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="hidden" value="<?php echo $_POST["section"]; ?>"   class="form-control validate[required]" />
				 <?php } ?>
					 <?php if(isset($_POST['exercice'])){ ?>
							<input name="exercice" type="hidden" value="<?php echo $_POST["exercice"]; ?>"  class="form-control validate[required]" />
					 <?php } ?>
				  <?php if(isset($_POST['source_finance'])){ ?>
							<input name="source_finance" type="hidden" value="<?php echo $_POST["source_finance"]; ?>"   class="form-control validate[required]" />
				   <?php } ?>
				   
 

  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" type="hidden" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php } ?>
	 <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" type="hidden" value="<?php echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	             <?php } ?>
				   
 <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" type="hidden" value=" <?php		 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
 <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" type="hidden" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>			 
<?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" type="hidden" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }	?>	     
<?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" type="hidden" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	    
	<?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" type="hidden" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
 <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input name="nom_titulaire" type="hidden" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		 
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
			   
	

<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 <?php } ?>	
			   
 <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				   <?php } ?>
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				   
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>			   
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>		   
			   
		  
			   
			   
			    
			   
			   
			   
			   <div><center>
			 <?php
				if($nb==1){   ?>
				 <input name="nb" type="hidden" value="<?php echo $nb ?>" class="form-control validate[required]" />
             
				  <button type="submit" name="Precedent" class="mybtn mybtn-success" >Precedent</button> &nbsp;&nbsp; 
				 <button type="submit" name="Enregistrer"  class="mybtn mybtn-success">Enregistrer</button>
				
				 <?php  
	
                  if (isset($_GET['msg'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg=$_GET['msg'];?>
				  
	       </p></div> <?php }?>
				
				
			<?php }else{ 
					if(isset($_POST['Precedent'])){
						$nb=$nb;
					}else if(isset($_POST['Suivant']) and isset($_POST['not'])){
												$nb=$nb-1;
					}else{
						$nb=$nb-1;$suivant=$nb;
						
					}
				 	   ?>
			 <input name="nb" type="hidden" value="<?php echo $nb ?>" class="form-control validate[required]" />
             
           <button type="submit" name="Precedent" class="mybtn mybtn-success" >Precedent</button> &nbsp;&nbsp; 
		   
		   
             <button type="submit" name="sss"  class="mybtn mybtn-success">Suivant</button>
          <?php }  ?>
			</center> 
	   </div>
						
						
						
						
						</form>
		 
</div>
 <!------------------44444444----------------------GESTION---------------------------------------------------------------------------->
 

  <!--------------55555--------------------------------AAAARRRRRRIIIIIIIVVVVVVVAAAAAAAAGGGGGGEEEEEE------------------------------------------------------------>

 
   </div>
  
 <br>
        

</div>


 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          <table class="table table-striped table-bordered">
		  
          <tr class="tr-table">
             <th>N° Contrat</th>
            <th>Objet </th>
            <th>Delai d'execution</th>
			<th>Date d'approbation</th>
			 <th>Date Notification</th>
             
			 
          </tr>
 
  <?php 
 
 
  ?> 
            <tr>
               <td><?php if(isset($_POST['num_contrat'])){  echo $num_contrat= $_POST["num_contrat"]; }   ?></td>
              <td><?php if(isset($_POST['objet_contrat'])){  echo $objet_contrat= $_POST["objet_contrat"]; }  ?></td>
              <td><?php if(isset($_POST['delai_execution'])){  echo $delai_execution= $_POST["delai_execution"]; }  ?></td>
			   <td><?php if(isset($_POST['date_approbation'])){  echo $date_approbation= $_POST["date_approbation"]; }  ?></td>
			  <td><?php if(isset($_POST['date_notification'])){  echo $date_notification= $_POST["date_notification"]; }  ?></td>
               
			   
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
	 
	 

 
 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  
  
   
  ?>
		
          <table class="table table-striped table-bordered">
		  
          <tr class="tr-table">
             <th>Conclu_Par(N_C_D): </th>
            <th>Approuver_Par :  </th>
            <th>D'une_Part_Nom_Répesentant:</th>
			 
           

          </tr>
 
  <?php 
 
 
 
  ?> 
            <tr>
               <td><?php if(isset($_POST['conclu_par'])){  echo $conclu_par= $_POST["conclu_par"]; }   ?></td>
              <td><?php if(isset($_POST['approuv_par'])){  echo $approuv_par= $_POST["approuv_par"]; }  ?></td>
              <td><?php if(isset($_POST['representant_dfm'])){  echo $representant_dfm= $_POST["representant_dfm"]; }  ?></td>
			    
			   
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
 
 
 
  
  		 
	       
	 
	 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          <table class="table table-striped table-bordered">
		  
          <tr class="tr-table">
             <th>Titulaire</th>
            <th>NIF Titulaire  </th>
            <th>N°_RC:</th>
			<th>Numero_Titulaire_tel: </th>
			<th>Numero_Compte_Banque</th>
			 <th>Nom_Banque:</th>
			 <th>Nom_Répresentant:</th>
			 <th>Adresse_Titulaire  </th>
             
			 
          </tr>
 
  <?php 
 
 
 
  ?> 
            <tr>
               <td><?php if(isset($_POST['nom_titulaire'])){  echo $nom_titulaire= $_POST["nom_titulaire"]; }   ?></td>
              <td><?php if(isset($_POST['nif_titulaire'])){  echo $nif_titulaire= $_POST["nif_titulaire"]; }  ?></td>
              <td><?php if(isset($_POST['rc_titulaire'])){  echo $rc_titulaire= $_POST["rc_titulaire"]; }  ?></td>
			   <td><?php if(isset($_POST['tel_titulaire'])){  echo $tel_titulaire= $_POST["tel_titulaire"]; }  ?></td>
			  <td><?php if(isset($_POST['nom_banque'])){  echo $nom_banque= $_POST["nom_banque"]; }  ?></td>
                <td><?php if(isset($_POST['representant_titulaire'])){  echo $representant_titulaire= $_POST["representant_titulaire"]; }  ?></td>
                <td><?php if(isset($_POST['num_compte_banque'])){  echo $num_compte_banque= $_POST["num_compte_banque"]; }  ?></td>
                 <td><?php if(isset($_POST['adresse'])){  echo $adresse= $_POST["adresse"]; }  ?></td>
                
			   
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
 
 
 
 
 
 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          <table class="table table-striped table-bordered">
		   
          <tr class="tr-table">
             <th>Source de financement</th>
            <th>Exercice </th>
            <th>Section</th>
			<th>Chapitre</th>
			 <th>Nature</th>
			 <th>Nbr de produit</th>
             
			 
          </tr>
 
  <?php 
 
 
 
  ?> 
            <tr>
               <td><?php if(isset($_POST['source_finance'])){  echo $source_finance= $_POST["source_finance"]; }   ?></td>
              <td><?php if(isset($_POST['exercice'])){  echo $exercice= $_POST["exercice"]; }  ?></td>
              <td><?php if(isset($_POST['section'])){  echo $section= $_POST["section"]; }  ?></td>
			   <td><?php if(isset($_POST['chapitre'])){  echo $chapitre= $_POST["chapitre"]; }  ?></td>
			  <td><?php if(isset($_POST['nature'])){  echo $nature= $_POST["nature"]; }  ?></td>
                <td><?php if(isset($_POST['nb_produit'])){  echo $nb_produit= $_POST["nb_produit"]; }  ?></td>
                
			   
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
 
 
 
 
 
 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          <table class="table table-striped table-bordered">
	 <tr class="tr-table" colspan="8"><center><h2>Les produits</h2></center></tr>	  
          <tr class="tr-table">
             <th>Désignation:</th>
            <th>Quantité </th>
            <th>Prix Unitaire:</th>
			
             
			 
          </tr>
 
  <?php 
 
 
 
  ?> 
            
          </tr>
 
  <?php 
  if(isset($_POST['nb'])){
	 $n=$nb_produit;
	 
	 
	 if(isset($_POST['Precedent'])){
		
		  
		 if($_POST['nb']==$nb_produit){
			 $i=$nb_produit ;
			  echo $i;
		 }else{
		 $i=$nb_produit;
		 echo $i;
		 } 
	 }else if(isset($_POST['not'])){
		 $i=$nb_produit;
	 }else{
	 $i=$nb_produit;
	
	 } ?>
	 
	 
	  
	<?php while($i!=0){ ?>
	 <tr>
	<?php	 $designation='designation'.$n;
	 
		if(isset($_POST[$designation])){
			
			$designation=$_POST[$designation]; ?>
			     <td><?php    echo $designation ;?></td>

			 
	<?php	}
	  
	
		 $quantite='quantite'.$n; 
		 if(isset($_POST[$quantite])){ 
			$quantite=$_POST[$quantite]; ?>
	  <td><?php   echo $quantite;  ?></td>

	<?php	} 
		 
		 
		 $prix_unitaire='prix_unitaire'.$n;
		 if(isset($_POST[$prix_unitaire])){ 
			$prix_unitaire=$_POST[$prix_unitaire];?>
			              <td><?php echo $prix_unitaire;  ?></td>

	<?php	} ?>
		 
			    
			   
 
 
             

                 
       
		
		<?php
		 
		 
		 $i=$i-1;
		 $n=$n-1;?>
		 </tr> 
<?php	 } 
  }
 
 
  ?> 
		<?php  ?>       
      </table>
 </div> 
	 
 </div>
 
 <script src="js/bootstrap.min.js"></script>          
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>

</body>
</html>

 
	 	


