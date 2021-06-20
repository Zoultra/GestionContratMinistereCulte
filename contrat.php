<!DOCTYPE html>
  

<?php

 require('connexion.php');
   $id2=$_GET['id2'];
  $ps=$pdo->prepare("SELECT * FROM user WHERE  id2='$id2' ");
    $ps->execute();
	$user_data=$ps->fetch();
  $id2=$user_data['id2']; 
  
if(isset($_GET['a'])){
	
 
 	  
      
  								  
 if(isset($_POST['num_contrat'])){
     $num_contrat= $_POST["num_contrat"];
  }if(isset($_POST['objet_contrat'])){	  
     $objet_contrat= $_POST["objet_contrat"];
  } 
  	  if(isset($_POST['code_programme'])){
     $code_programme=$_POST['code_programme'];
	 
	 
	  $ps=$pdo->prepare("SELECT * FROM programme WHERE  code_programme='$code_programme' ");
    $ps->execute();
	$user_data=$ps->fetch();
  $identifiant=$user_data['identifiant']; 
	 
	  }
   
  
  if(isset($_POST['delai_execution'])){
	 $delai_execution= $_POST["delai_execution"];
  }if(isset($_POST['date_approbation'])){
	 $date_approbation= $_POST["date_approbation"];   
  }if(isset($_POST['date_notification'])){
	 $date_notification= $_POST["date_notification"];
	 }if(isset($_POST['num_contrat'])){
	 $num_contrat= $_POST["num_contrat"]; 
  }if(isset($_POST['source_finance']))
  {
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
 $nb_produit= $_POST["nb_produit"];}
	if(isset($_POST['nb_produit1'])){
		 $nb_produit1= $_POST["nb_produit1"];
	}	
 if(isset($_POST['tel_titulaire'])){
		 $tel_titulairep= $_POST["tel_titulaire"];
	}
  
 if(isset($_POST['adresse'])){
     $adressep= $_POST["adresse"];
  }  
  if(isset($_POST['num_compte_banque'])){
		 $num_compte_banquep= $_POST["num_compte_banque"];
	}
  if(isset($_POST['representant_titulaire'])){
		 $representant_titulairep= $_POST["representant_titulaire"];
	}			 
	  if(isset($_POST['nom_banque'])){
		 $nom_banque_mp= $_POST["nom_banque"];
	}		     
	  if(isset($_POST['rc_titulaire'])){
		 $rc_titulairep= $_POST["rc_titulaire"];
	}		    
	 if(isset($_POST['nif_titulaire'])){
		 $nif_titulairep= $_POST["nif_titulaire"];
	}	
 if(isset($_POST['nom_titulaire'])){
		 $nom_titulairep= $_POST["nom_titulaire"];
	}if(isset($_POST['id_titulaire'])){
		 $id_titulaire= $_POST["id_titulaire"];
	}
 
  
	
 if(isset($_POST['representant_dfm'])){
		 $representant_dfm= $_POST["representant_dfm"];
	}		 
 if(isset($_POST['approuv_par'])){
		 $approuv_par= $_POST["approuv_par"];
	}			 
	 if(isset($_POST['fonction'])){
		 $fonction= $_POST["fonction"];
	}
	if(isset($_POST['fonction_approuv'])){
		 $fonction_approuv= $_POST["fonction_approuv"];
	}
	if(isset($_POST['conclu_par'])){
		 $conclu_par= $_POST["conclu_par"];
	}
	if(isset($_POST['nom_conlu_par'])){
		 $nom_conlu_par= $_POST["nom_conlu_par"];
	}
	if(isset($_POST['profession_conclu'])){
		 $profession_conclu= $_POST["profession_conclu"];
	}
	if(isset($_POST['tvapourcent'])){
		 $tvapourcent=$_POST["tvapourcent"];
	}
	if(isset($_POST['service_benef'])){
		 $service_benef=$_POST["service_benef"];
	}
	if(isset($_POST['type_produit'])){
		 $type_produit=$_POST["type_produit"];
	}
if(isset($_POST['localisation'])){
		 $localisation=$_POST["localisation"];
	}
	
	
  

  
   
  
  
       }
 $zou='oui';
 
  

 if(isset($_POST['nb'])){
	 $n=$nb_produit;
	 if(isset($_POST['Enregistrer'])){
		 
		 $req_add=$pdo->prepare('select max(num_contrat) from contrat');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	
			$num_contratp=$pointer_add['max(num_contrat)']+1;
			if($num_contratp<=9){
				$num_contratp='00000'.$num_contratp;
			}else if($num_contratp<=99){
				$num_contratp='0000'.$num_contratp;
			}else if($num_contratp<=999){
				$num_contratp='000'.$num_contratp;
			}else if($num_contratp<=9999){
				$num_contratp='00'.$num_contratp;
			}else if($num_contratp<=99999){
				$num_contratp='0'.$num_contratp;
			}
		     
		 
			    
			    
		        $date_contrat=date("Y-m-d");
		       
				
				 $num_contrat=$num_contratp;
		   
			 
		   if(empty($conclu_par) AND empty($nom_conlu_par)){
			   if($fonction=="le Directeur Administratif et Financier"){
			   $fonction_R="le Directeur Administratif et Financier";
			   }elseif($fonction=="le Chef de Division de Materiel et Equipement"){
				   $fonction_R="le Chef de Division de Materiel et Equipement";
			   }
			   
			   $conclu_par=$fonction_R;
			   $nom_conlu_par=$representant_dfm;
		   }     
				 
				
					    
				
				 
				$nom_banque_M = strtoupper($nom_banque_m);
				 
				 
		  $req=$pdo->prepare("insert into contrat(num_contrat,objet_contrat,code_programme,identifiant,delai_execution,pourcentage_tva,source_finance,service_benef,
				exercice,section,chapitre,nature,nb_produit,representant_dfm,id2,date_contrat,id_titulaire,fonction,nom_conlu_par,conclu_par,fonction_approuv,type_produit,localisation
													  
													  
										 ) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$params=array($num_contrat,$objet_contrat,$code_programme,$identifiant,$delai_execution,$tvapourcent,$source_finance,$service_benef,
		$exercice,$section,$chapitre,$nature,$nb_produit,$representant_dfm,$id2,$date_contrat,'00000000_07',$fonction,$nom_conlu_par,$conclu_par,$fonction_approuv,$type_produit,$localisation);
			$req->execute($params);	
          					
		 	 				
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
							 $nom_banque_M = strtoupper($nom_banque_m);
							
			$rq_edite=$pdo->prepare('UPDATE titulaire SET nom_titulaire=?,nif_titulaire=?,rc_titulaire=?,tel_titulaire=?,num_compte_banque=?,nom_banque=?,representant_titulaire=?,adresse=?WHERE(id_titulaire=?)');
	$params=array($nom_titulaire,$nif_titulaire,$rc_titulaire,$tel_titulaire,$num_compte_banque,$nom_banque_M,$representant_titulaire,$adresse,$id_titulaire);
	$rq_edite->execute($params);
			 
			 
		 
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
			  
           $montant="$prix_unitaire*$quantite";

 
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
  
  
//	$req=$pdo->prepare('select  count(*) from produit_contrat');
	//		$req->execute();
	//		$pointer=$req->fetchcolumn();
			

	 
	//$var3=$pointer +1;
	//		if($var3<=9){
		//		$var3='0'.$var3;
		//	}else if($var3<=99){
		//		$var3='00'.$var3;
		//	}else if($var3<=999){
		//		$var3='000'.$var3;
		//	}else if($var3<=9999){
		//		$var3='0000'.$var3;
       //  }else if($var3<=99999){
	//			$var3='00000'.$var3;
	//		}
		  
	//		  $desig=substr($designation,0,2);
			   
	/// $code_produit= $desig.'_'.$quantite.'_'.$var3;
	 
	 
	 
	/// 
		  
  
 	  include ('convert_p.php');
	 
		
     $req=$pdo->prepare("insert into produit_contrat (code_produit,designation,prix_unitaire,quantite,montant,p_enlettre,num_contrat) values(?,?,?,?,?,?,?)");
          $params=array($code_produit,$designation,$prix_unitaire,$quantite,$montant,$enlettre2,$num_contrat);
          $req->execute($params);
		
		
		$rq= "SELECT  sum(montant) FROM produit_contrat where num_contrat='$num_contrat' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
	  
	$data=$reponse->fetch();
	
	
	//  Concernant le titulaireeeeeeeeeeeeeeeeeeeeeee
	 
			
	
	 
	
	 
	
  $total_ht=($data["sum(montant)"]);
  $tva=($total_ht*$tvapourcent)/100;
  $total_ttc=intval($tva+$total_ht); 
  
  
		 
	 }
		   	  
	 }
if(isset($total_ttc)){	
	include_once('convert.php'); 
 
 
 
	$rq1=$pdo->prepare('UPDATE contrat SET total_ht=?, tva=?, total_ttc=?, enlettre=? WHERE(num_contrat=?)');
	$params=array($total_ht,$tva,$total_ttc,$enlettre1,$num_contrat);
	$rq1->execute($params);
	 

       $boucle=4;
   if($boucle==4){
	   
	    $req_add=$pdo->prepare('select max(id_cotation) from cotation');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	
			$id_cotation=$pointer_add['max(id_cotation)']+1;
			if($id_cotation<=9){
				$id_cotation='00000'.$id_cotation;
			}else if($id_cotation<=99){
				$id_cotation='0000'.$id_cotation;
			}else if($id_cotation<=999){
				$id_cotation='000'.$id_cotation;
			}else if($id_cotation<=9999){
				$id_cotation='00'.$id_cotation;
			}else if($id_cotation<=99999){
				$id_cotation='0'.$id_cotation;
			}
	   
	    $req1=$pdo->prepare("insert into cotation(id_cotation)values(?)");
	                $params=array($id_cotation);
				   $req1->execute($params);
				  
				  $req2=$pdo->prepare("select * from cotation where id_cotation='$id_cotation'");
		$req2->execute();
		$data=$req2->fetch();
		  $id_cotation=$data['id_cotation'];
									  
	   
	   
	    $req3=$pdo->prepare('select max(code_cot_contrat) from cotation_contrat');
			$req3->execute();
			$pointer1=$req3->fetch();
	
			$code_cot_contrat=$pointer1['max(code_cot_contrat)']+1;
			if($code_cot_contrat<=9){
				$code_cot_contrat='00000'.$code_cot_contrat;
			}else if($code_cot_contrat<=99){
				$code_cot_contrat='0000'.$code_cot_contrat;
			}else if($code_cot_contrat<=999){
				$code_cot_contrat='000'.$code_cot_contrat;
			}else if($code_cot_contrat<=9999){
				$code_cot_contrat='00'.$code_cot_contrat;
			}else if($code_cot_contrat<=99999){
				$code_cot_contrat='0'.$code_cot_contrat;
			}
				
			  $req=$pdo->prepare("insert into cotation_contrat(code_cot_contrat,num_contrat,id_cotation)values(?,?,?)");
	                $params=array($code_cot_contrat,$num_contrat,$id_cotation);
				   $req->execute($params);
			 
		
			
	   $msg_cotation='Contrat crée avec succès; choisissez les fournisseurs pour enregistrer la demande de cotation.';
	  
	    
	   header("location:cotation.php?choix=addCotation&id2=$id2&num_contrat=$num_contrat&id_cotation=$id_cotation&msg_cotation=$msg_cotation");
			 
   }else{
	   
	  
	header("location:liste_contrat.php?num_contrat=$num_contrat&id2=$id2&choix=ajoutFoursSingle&msg_eng=$msg_eng");
   }
}
  }
	 		  if(isset($_POST['Enregistrer'])){
		  
		                   
		
			  }
		
 
	
 


            if(isset($_GET['addprogramme'])){
            
             $req_add_p=$pdo->prepare('select max(code_programme) from programme');
			$req_add_p->execute();
			$pointer_add_p=$req_add_p->fetch();
	
			$code_programme=$pointer_add_p['max(code_programme)']+1;
			if($code_programme<=9){
				$code_programme='00000'.$code_programme;
			}else if($code_programme<=99){
				$code_programme='0000'.$code_programme;
			}else if($code_programme<=999){
				$code_programme='000'.$code_programme;
			}else if($code_programme<=9999){
				$code_programme='00'.$code_programme;
			}else if($code_programme<=99999){
				$code_programme='0'.$code_programme;
			}
       $identifiant=$_POST['identifiant'];
	  
	  $reqadd=$pdo->prepare("insert into programme (code_programme,identifiant) values(?,?)");
          $params=array($code_programme,$identifiant);
          $reqadd->execute($params); 
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

    <title>Smart_Tech</title>

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
<br><div class="btn-group">
<button aria-haspopup="true" class="btn btn-default dropdown-toggle" type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'  class="btn btn-primary" >
   <a class="return" href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i>Annuler</a>
   </button> 
   
 
   </div>
   
   <div class="btn-group">
 
   
	
	
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Ajouter programe
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Programme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	 

	  
	  
	  
	<form   action="contrat.php?addprogramme&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
	   
	 <div class="form-group">
           <label for="exampleInputEmail1">Identifiant programme</label>
          <input type="text" class="form-control" name="identifiant"    placeholder="Identifiant du programme">
       
       </div>
  
 
  
  
	
      </div>
      <div class="modal-footer">
        <button   type="submit"  name="addprogramme" class="btn btn-success" >Enregistrer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
	   </form>
    </div>
  </div>
</div>
	
	
	
	

   </div>
 
    <h1 class="h1_title">Creation de contrat</h1>
    <br> <br>
 
     <div class="clear"></div>
	 
	 
	 
	 
	 
	 
	 
	 
	 <!----- HHHHHHHHHHH----------------------------------------------------------------->
    <div class="row col-md-10 col-md-offset-1">

<ul class="nav nav-tabs text-capitalize" role="tablist" style="background-color:#999; text-justify:!important; color:#FFF;">

<?php if(!isset($_GET['dedant'])){ ?>
	
 <li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 1</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 2</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 3</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 5</a>
        </li>
		
		 
	
<?php }else{ ?>
 
 
              <!------------------1111---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_1']) and isset($_POST['Suivant']))  or (isset($_GET['etape_2']) and  isset($_POST['Suivant'])) or (isset($_GET['etape_3']) or isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#" role="tab">Etape 1</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_2']) and isset($_POST['Precedent']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 1</a>
        </li>
		
		<?php	} 
	 	
?>  
	 


              <!------------------2222222222---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_2']) and isset($_POST['Suivant'])) or (isset($_GET['etape_2']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_4']) or isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#" role="tab">Etape 2</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_1']) and isset($_POST['Suivant']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 2</a>
        </li>
		
			<?php

 
			}else if((isset($_GET['etape_3']) and isset($_POST['Precedent']))){ ?>
	
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 2</a>
        </li>
		
		<?php } 
	
	 
 ?>











	 


     <!------------------33333333333---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  
<?php 
			if((isset($_GET['etape_3']) and isset($_POST['Suivant'])) or (isset($_GET['etape_3']) and isset($_POST['Precedent'])) or (isset($_GET['etape_2']) and  isset($_POST['Precedent']))  or (isset($_GET['etape_4']) and  isset($_POST['Suivant'])) or ( isset($_GET['etape_1']) OR isset($_GET['etape_5']))){ ?>
			
		<li class="nav-item">
	       <a class="nav-link " data-toggle="tab" href="#" role="tab">Etape 3</a>
        </li>
		
		<?php	}else if((isset($_GET['etape_4']) and isset($_POST['Precedent']))){ ?>
		
		<li class="nav-item active">
	       <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 3</a>
        </li>
		
		 
		 
			<?php		}else if((isset($_GET['etape_2']) and isset($_POST['Suivant']))){ ?>
			
				<li class="nav-item active">
				   <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 3</a>
				</li>
	
				<?php
				}
 ?>


 

              <!------------------4444444444444444444444---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  		
        
		 <?php 
		 
		 
		 
		 
			if((isset($_GET['etape_4']) and isset($_POST['Suivant'])) or (isset($_GET['etape_5']) and isset($_POST['sss'])) or (isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_3']) and isset($_POST['Precedent'])) or isset($_GET['etape_1']) or isset($_GET['etape_2'])){ ?>
			
			 
		
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
		<?php 	}else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ ?>
		
				
<?php		if(!isset($_POST['nb'])){  ?>

		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
		
<?php	}else if(isset($_POST['nb'])){
	
				$nb1=$_POST['nb'];
				
				if(isset($_POST['noactive'])){   ?>
					
				<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
					
				<?php }else{ ?>
			<li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
					
				<?php }
				
 ?>		
<?php	} ?>
		
	 
	<?php		}else if((isset($_GET['etape_3']) and isset($_POST['Suivant']))){ ?>
	
		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 4</a>
        </li>
	
	<?php   } 
  

?> 
  
        

              <!------------------55555555555555555555---------------------LLLIIIISSSSSSTTTTTTTTTTTEEEEEEEEEEEEEEEEEEEEEEEEEEEEE----------------------------------------------------------------->
  		 
		 
		 
<?php 		 
		 
			if((isset($_GET['etape_4']) and isset($_POST['Precedent'])) or (isset($_GET['etape_1'])  or isset($_GET['etape_2'])  or isset($_GET['etape_3']) )){ ?>
			
			 
		
		 <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 5</a>
        </li>	
		
	<?php		} else if((isset($_GET['etape_4']) and isset($_POST['Suivant']))){ ?>
	
		<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 5</a>
        </li>
	
	<?php	////////////////////////////////////// 
}else if(isset($_GET['etape_5']) and isset($_POST['sss'])){ ?>

	<li class="nav-item active">
          <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 5</a>
        </li>
		
<?php }else if((isset($_GET['etape_5']) and isset($_POST['Precedent']))){ 
	if(!isset($_POST['nb'])){ ?>
		<li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 5</a>
        </li>
<?php	}else if(isset($_POST['nb'])){
				$nb1=$_POST['nb'];
				 
				
				if(isset($_POST['noactive'])){   ?>
					
					<li class="nav-item">
					  <a class="nav-link" data-toggle="tab" href="#" role="tab">Etape 5</a>
					</li>
					
				<?php }else{  ?>
				
					<li class="nav-item active">
					  <a class="nav-link active" data-toggle="tab" href="#" role="tab">Etape 5</a>
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
		
  
			<form id="formID" action="contrat.php?etape_1&a&dedant&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
					 
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
													if(isset($_POST["$id_titulaire"])){
													$id_titulaire=$_POST['id_titulaire'];
													}
			

}	 ?>
      			

				 
			 
	  <?php
				
	              $reqniveau=$pdo->prepare("select * from programme  ");
													$reqniveau->execute();
													$etreqniveau=$reqniveau->fetchAll(PDO::FETCH_ASSOC);
												
													 
												
	  ?>
	  
	 	
				
			  <div class="col-md-4">
              <label class="">Programme : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  
               <select name="code_programme"  required class="form-control" autofocus >
                			<?php   ?> 
											
													<option  value="" selected>Veillez choisir le programme</option>
													
											<?php  ?>
											
											
											<?php foreach($etreqniveau as $etreqniveau1){ 
														 
											?>
											
											
												<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="<?php echo $etreqniveau1['code_programme']  ?>" <?php if(isset($_POST['code_programme'])){ if($_POST['code_programme']==$etreqniveau1['code_programme']){ ?> selected <?php }} ?> >     <?php echo $etreqniveau1['identifiant']; ?>  </option>
												
												
												
											<?php  } ?>
										
										</select>
										
										
										
										
										
              </div>
			   </div> 
			   
			    <div class="col-md-4">
              <label class="">Objet_Contrat : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="text" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } else { ?>
							<input name="objet_contrat" required type="text" placeholder="" class="form-control validate[required]" />
				    <?php }   ?>
              </div>
			   </div> 
	 
			     <div class="col-md-4">
              <label class="">Délai_Execution : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution"  type="text" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } else { ?>
							  <input name="delai_execution"  required type="text" placeholder="" class="form-control validate[required]" />
				  
				    <?php }   ?> 
              </div> 
			   </div> 
			   
			   
		<!--	    <div class="col-md-4"></BR>
              <label class="">Date_Approbation : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="date" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				 <?php } else { ?>
							  <input name="date_approbation" type="date" placeholder="" class="form-control validate[required]" />
				  
				    <?php }   ?> 
              </div> 
			   </div>
			   
			    <div class="col-md-4"> </BR> 
              <label class="">Date_Notification : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['date_notification'])) { ?>
							<input name="date_notification" type="date" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
				 <?php } else { ?>
							  <input name="date_notification" type="date" placeholder="" class="form-control validate[required]" />
				  
				    <?php } ?> 
              </div> 
			   </div>  -->
			   
			    <div class="col-md-6"></br> 
              <label class="">Localisation des prestations: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['localisation'])) { ?>
							<input name="localisation" required type="text" value="<?php echo $_POST["localisation"]; ?>" class="form-control validate[required]" />
				 <?php } else{?>
							  <input name="localisation" required type="text" value="Les pieces seront livrées" class="form-control validate[required]" />
				  
				    <?php }   ?> 
              </div> 
			   </div> 
			   
			    <div class="col-md-6"></br> 
              <label class="">Service_Beneficiaire : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <?php if(isset($_POST['service_benef'])) { ?>
							<input name="service_benef" type="text" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
				 <?php } else { ?>
							  <input name="service_benef" required type="text" placeholder="Nom du service beneficiaire" class="form-control validate[required]" />
				  
				    <?php }   ?> 
              </div> 
			   </div> 
			   
			    <?php
				
	              $reqniveau=$pdo->prepare("select * from titulaire where id_titulaire!='00000000_07'  ");
													$reqniveau->execute();
													$etreqniveau=$reqniveau->fetchAll(PDO::FETCH_ASSOC);
													
													 $hidden=$pdo->prepare("select * from titulaire where id_titulaire='00000000_07'  ");
													$hidden->execute();
													$hidden2=$hidden->fetch();
												   $id_titulaire=$hidden2['id_titulaire'];
													 
												
	  ?>
	  
	  
	   <input name="id_titulaire" type="hidden" value="<?php echo $id_titulaire; ?>" class="form-control validate[required]" />
	
                 
				 
		 			  
			  
			   
			   </BR></BR></BR></BR></BR></BR></BR></BR></BR></BR> 
			   
			   
			     
			   
			     
			 
			     
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
<?php if(isset($_POST['fonction'])){ ?>
				<input name="fonction" type="hidden" value="<?php	 echo $_POST["fonction"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
	<?php if(isset($_POST['fonction_approuv'])){ ?>
				<input name="fonction_approuv" type="hidden" value="<?php	 echo $_POST["fonction_approuv"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php	 echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['nom_conlu_par'])){ ?>
				<input name="nom_conlu_par" type="hidden" value="<?php	 echo $_POST["nom_conlu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['profession_conclu'])){ ?>
				<input name="profession_conclu" type="hidden" value="<?php	 echo $_POST["profession_conclu"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['tvapourcent'])){ ?>
				<input name="tvapourcent" type="hidden" value="<?php	 echo $_POST["tvapourcent"]; ?>"   class="form-control validate[required]" />
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
	
 
		<form id="formID" action="contrat.php?etape_2&a&dedant&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
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
              <label class="">Source_Financement : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <select name="source_finance" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['source_finance'])){ ?>
				  
				    
				<option name="source_finance"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["source_finance"]; ?></option>
				
				<?php if($source_finance=='Budjet National'){ ?>
				<option name="source_finance" style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Financement Exterieur</option>
				    
				<?php }elseif($source_finance=='Financement Exterieur'){ ?>
				<option name="source_finance"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Budjet National</option>  
				  
				<?php }?>
				  
				  
				  <?php }else{ ?>
				  
				 <option value="" selected >Veillez choisir la source de financement</option> 
				 
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="Budjet National"> Budjet National</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="Financement Exterieur"> Financement Exterieur</option>
			 	
				<?php }   ?>
				   
				      </select>  

 
              </div>
			   </div>
			   
			   
			  <div class="col-md-4">
              <label class="">Exercice : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                 	 
	<select name="exercice" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
     <?php if(isset($_POST['exercice'])){ ?> 
				    
	<option name="exercice"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["exercice"]; ?></option>
                <option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2021">2021</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2022</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2023</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2024</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2025</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2026</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2027</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2028</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2029</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2030</option>	
				 
				  
				  
				  <?php }else{ ?>
				  
				 <option value="" selected>Veillez choisir la source de financement</option> 
				 
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2021">2021</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2022</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2023</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2024</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2025</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2026</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2027</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2028</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2029</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="2022">2030</option>
			 	
				<?php }   ?>
				   
				      </select> 
			  </div>
			   </div>
			   
			   
			   
			    <div class="col-md-4">
              <label class="">Section : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <?php if(isset($_POST['section'])){ ?>
							<input name="section" type="text" value="<?php echo $_POST["section"]; ?>"  class="form-control validate[required]" />
				<?php }else{ ?>
							       <input required name="section" type="text" value="<?php echo '340'; ?>" class="form-control validate[required]" />
                <?php }   ?>
			  </div>
			   </div>
			      
			    
			   
			      <div class="col-md-6"></br>
              <label class="">Chapitre : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                
				<?php if(isset($_POST['chapitre'])){ ?>
							<input name="chapitre" type="text" value="<?php echo $_POST["chapitre"]; ?>" class="form-control validate[required]" />
				 <?php }else{ ?>
							       <input required name="chapitre" type="text" placeholder="" class="form-control validate[required]" />
              
				 <?php }   ?>
			  </div>
			   </div>
			   
			     <div class="col-md-6"></br>
              <label class="">Nature : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              
				  <?php if(isset($_POST['nature'])){ ?>
							<input name="nature" type="text" value="<?php echo $_POST["nature"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input required name="nature" type="text" placeholder="" class="form-control validate[required]" />
				   <?php }   ?>
              </div>
			   </div>
			   
			  
 
			   
			   
			   
  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" type="hidden" value="<?php echo $_POST["nb_produit"]; ?>"   class="form-control validate[required]" />
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

			   
	

 
 <?php if(isset($_POST['service_benef'])) { ?>
							<input name="service_benef" type="hidden" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
				 <?php } ?>
<?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
<?php if(isset($_POST['date_notification'])) { ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
				 <?php } ?>			   
  
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				   
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
 <?php if(isset($_POST['code_programme'])) { ?>
							<input name="code_programme" type="hidden" value="<?php echo $_POST["code_programme"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>				  
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
<?php if(isset($_POST['id_titulaire'])){  ?>
							<input name="id_titulaire" type="hidden" value="<?php echo $_POST["id_titulaire"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>

<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		 
	<?php if(isset($_POST['fonction'])){ ?>
				<input name="fonction" type="hidden" value="<?php	 echo $_POST["fonction"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['fonction_approuv'])){ ?>
				<input name="fonction_approuv" type="hidden" value="<?php	 echo $_POST["fonction_approuv"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php	 echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['nom_conlu_par'])){ ?>
				<input name="nom_conlu_par" type="hidden" value="<?php	 echo $_POST["nom_conlu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
<?php if(isset($_POST['profession_conclu'])){ ?>
				<input name="profession_conclu" type="hidden" value="<?php	 echo $_POST["profession_conclu"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['tvapourcent'])){ ?>
				<input name="tvapourcent" type="hidden" value="<?php echo $_POST["tvapourcent"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
<?php if(isset($_POST['type_produit'])){ ?>
				<input name="type_produit" type="hidden" value="<?php echo $_POST["type_produit"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
			   
					   
			   
			   
			   
			    
			   <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
	

	
  
			
			<form id="formID" action="contrat.php?etape_3&a&dedant&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
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
             
			 
<?php }
	 ?>
	
	<?php {
		
		if(isset($_POST['id_titulaire']))
		{ $id_titulaire=$_POST["id_titulaire"];}
	
	
             
			$rqz= "SELECT  * FROM titulaire where id_titulaire='$id_titulaire'  ";	 

          $reponse1= $pdo->prepare("$rqz");
            $reponse1->execute();
			$data_titu=$reponse1->fetch();
			$nom_titulaire=$data_titu['nom_titulaire'];
			$nif_titulaire=$data_titu['nif_titulaire'];
			$rc_titulaire=$data_titu['rc_titulaire'];
			$num_compte_banque=$data_titu['num_compte_banque'];
			$nom_banque=$data_titu['nom_banque'];
			$representant_titulaire=$data_titu['representant_titulaire'];
			$representant_titulaire=$data_titu['representant_titulaire'];
			$nom_titulaire=$data_titu['nom_titulaire'];
			
    
		
 
    	 ?>
	
	
	 
	 
                  
                  <?php if(isset($_POST['nom_titulaire'])){ ?>
				<input readonly name="nom_titulaire" type="hidden" value=" <?php		echo $_POST["nom_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
		<input name="nom_titulaire" readonly  value=" <?php echo $data_titu["nom_titulaire"]; ?>"  type="hidden" placeholder="" class="form-control validate[required]" />
		<?php } ?>
              
			   
			  
                 
                  <?php if(isset($_POST['adresse'])){ ?>
				<input name="adresse" readonly type="hidden" value="<?php	echo $_POST["adresse"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
		<input name="adresse" readonly  type="hidden" value="<?php	echo $data_titu["adresse"]; ?>" placeholder="" class="form-control validate[required]" />
		<?php } ?>
              
			   
			   
			   
                 
                  <?php if(isset($_POST['nif_titulaire'])){ ?>
				<input name="nif_titulaire" readonly type="hidden" value=" <?php	 echo $_POST["nif_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
 <input name="nif_titulaire" readonly  type="hidden"value="<?php echo $data_titu["nif_titulaire"]; ?>"  placeholder="" class="form-control validate[required]" />
 <?php } ?>
              
			      
			   
                  
                  <?php	  if(isset($_POST['rc_titulaire'])){ ?>
				<input name="rc_titulaire" readonly type="hidden" value="<?php	 echo $_POST["rc_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
	<input name="rc_titulaire" readonly  value="<?php	 echo $data_titu["rc_titulaire"]; ?>"  type="hidden" placeholder="" class="form-control validate[required]" />
            <?php } ?>
			 
			   
			   
                  
                 			  	
<?php if(isset($_POST['tel_titulaire'])){ ?>
					<input name="tel_titulaire" readonly type="hidden"   autocomplete="on" placeholder="Ex: 70000000" value="<?php		 echo $_POST["tel_titulaire"];?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="tel_titulaire" readonly  value="<?php echo $data_titu["tel_titulaire"]; ?>"   type="hidden"  autocomplete="on" placeholder="Ex: 70000000" class="form-control validate[required]" />
	<?php } ?>
              
			    
			    
                 
                   <?php if(isset($_POST['num_compte_banque'])){ ?>
					<input name="num_compte_banque" readonly type="hidden" value=" <?php	 echo $_POST["num_compte_banque"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="num_compte_banque" readonly  value="<?php echo $data_titu["num_compte_banque"]; ?>" type="hidden" placeholder="" class="form-control validate[required]" />
	<?php } ?>
              
			  
			      
                  
                  <?php	  if(isset($_POST['nom_banque'])){ ?>
					<input name="nom_banque" readonly type="hidden" value="<?php	 echo $_POST["nom_banque"]; ?>"   class="form-control validate[required]" />
	<?php }else{	?>
	<input name="nom_banque" readonly  value="<?php echo $data_titu["nom_banque"]; ?>" type="hidden" placeholder="" class="form-control validate[required]" />
	<?php }	?>
              
			   
			   
                   
                  <?php if(isset($_POST['representant_titulaire'])){ ?>
					<input name="representant_titulaire" readonly type="hidden" value="<?php	 echo $_POST["representant_titulaire"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
	<input name="representant_titulaire" readonly  value="<?php echo $data_titu["representant_titulaire"]; ?>" type="hidden" placeholder="" class="form-control validate[required]" />
            <?php } ?>
			 
	
	
	
	<?php }
 
    	 ?>
	
	
	 
	  <div class="col-md-6"></br>
              <label class="">Répesentant_dfm(Fontion): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group"> 
                <select name="fonction" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['fonction'])){ ?>
				  
				    
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["fonction"]; ?></option>
				
				<?php if($fonction=='le Directeur des finances et du materiel'){ ?>
				<option name="fonction" style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 2</option>     
				   
				<?php }elseif($fonction=='le Chef de Division Approvisionnement et Marchés Publics'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction=='la Directrice des finances et du materiel'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction=='Responsable du programme 1'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction=='Responsable du programme 2'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				
				<?php }?>
				 
			  
				  
				  <?php }else{ ?>
				  
							 <option value="" selected>Veillez choisir la fonction</option> 
				
				
				
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >le Chef de Division de Approvisionnement et Marchés Publics</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 2</option>     
				
				<?php }   ?>
				   
				      </select>
				    
              </div>  
			   </div>
			   
			    <div class="col-md-6"></br>
              <label class="">Répesentant_dfm(Nom_Prénom): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="text"  value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>	
	<input name="representant_dfm" required type="text" placeholder="Nom et Prenom"  class="form-control validate[required]" />
		<?php } ?>			   
              </div>
			   </div> 
			   <!--
			    <div class="col-md-6"></br> 
              <label class="">Approuver_Par(Nom_Prenom) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="text" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php }else{ ?>
                  <input name="approuv_par" required type="text" placeholder="Nom et Prenom de l'admin de credit" class="form-control validate[required]" />
              <?php } ?></div>
			   </div> 
			   -->
            
               
			    <div class="col-md-6"><br/>
              <label class="">Approuver_Par(Fonction) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
               <div class="input-group"> 
                <select name="fonction_approuv" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['fonction_approuv'])){ ?>
				  
				    
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["fonction_approuv"]; ?></option>
				
				<?php if($fonction_approuv=='le Directeur des finances et du materiel'){ ?>
				<option name="fonction" style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 2</option>     
				   
				<?php }elseif($fonction_approuv=='le Chef de Division Approvisionnement et Marchés Publics'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction_approuv=='la Directrice des finances et du materiel'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction_approuv=='Responsable du programme 1'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($fonction_approuv=='Responsable du programme 2'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				
				<?php }?>
				 
			  
				  
				  <?php }else{ ?>
				  
							 <option value="" selected>Veillez choisir la fonction</option> 
				
				
				
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >le Chef de Division de Approvisionnement et Marchés Publics</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 2</option>     
				
				<?php }   ?>
				   
				      </select>
				    
              </div>  
			  
			   </div> 
	
	          <div class="col-md-6"></br>
              <label class="">Type de produit: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
                           <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <select name="type_produit" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['type_produit'])){ ?>
				  
				    
				<option name="type_produit"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["type_produit"]; ?></option>
				
				<?php if($type_produit=='Durables'){ ?>
				<option name="type_produit" style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Consommables</option>
				    
				<?php }elseif($type_produit=='Consommables'){ ?>
				<option name="type_produit"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Durables</option>  
				  
				<?php }?>
				  
				  
				  <?php }else{ ?>
				  
				 <option value="" selected >Veillez choisir le type de produit</option> 
				 
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="Durables"> Durables</option>
				<option style="font-family:Tahoma;font-size:15px;font-weight:bold;"   value="Consommables"> Consommables</option>
			 	
				<?php }   ?>
				   
				      </select>  

 
              </div></br>
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
<?php if(isset($_POST['fonction'])){ ?>
				<input name="fonction" type="hidden" value="<?php	 echo $_POST["fonction"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
	<?php if(isset($_POST['fonction_approuv'])){ ?>
				<input name="fonction_approuv" type="hidden" value="<?php	 echo $_POST["fonction_approuv"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php	 echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['nom_conlu_par'])){ ?>
				<input name="nom_conlu_par" type="hidden" value="<?php	 echo $_POST["nom_conlu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['profession_conclu'])){ ?>
				<input name="profession_conclu" type="hidden" value="<?php	 echo $_POST["profession_conclu"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
 <?php if(isset($_POST['tvapourcent'])){ ?>
				<input name="tvapourcent" type="hidden" value="<?php	 echo $_POST["tvapourcent"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	 
<?php if(isset($_POST['service_benef'])) { ?>
							<input name="service_benef" type="hidden" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
				 <?php } ?>			    
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
<?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
<?php if(isset($_POST['date_notification'])) { ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
				 <?php } ?>				 
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
<?php if(isset($_POST['code_programme'])) { ?>
							<input name="code_programme" type="hidden" value="<?php echo $_POST["code_programme"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>				  
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
<?php if(isset($_POST['id_titulaire'])){  ?>
							<input name="id_titulaire" type="hidden" value="<?php echo $_POST["id_titulaire"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
<?php if(isset($_POST['type_produit'])){  ?>
							<input name="type_produit" type="hidden" value="<?php echo $_POST["type_produit"]; ?>"   class="form-control validate[required]" />
				  <?php } ?> 
			   
		 
			   <br/><br/><br/> 
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
	 
		 
	 
      			<form id="formID" action="contrat.php?etape_4&a&dedant&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
				
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
	     	   
			   
			   
			 
			   
			   
			 <!--
			    <div class="col-md-4"><br/>
              <label class="">Approuv_Par(Profession) : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  <?php if(isset($_POST['profession_conclu'])){ ?>
				<input name="profession_conclu" type="text" value="<?php	 echo $_POST["profession_conclu"]; ?>"   class="form-control validate[required]" />
	            <?php }else{ ?>
                  <input name="profession_conclu" type="text" placeholder="La profession de la personne qui conclu"  class="form-control validate[required]" />
              <?php } ?></div>
			   </div>
			   -->
                  <br/>	
				  
				  
				   <div class="col-md-6"><br/>        
              <label class="">Conclu_Par(Nom_Prenom): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group"> 
              
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['nom_conlu_par'])){ ?>
							<input name="nom_conlu_par" type="text" value="<?php echo $_POST["nom_conlu_par"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input required name="nom_conlu_par" type="text" placeholder="Nom de la personne qui conclu" class="form-control validate[required]" />
				   <?php }   ?>
				    
              </div> 
			   </div>
				  
				   <div class="col-md-6"><br/>
              <label class="">Conclu_Par(Fontion): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group"> 
                <select name="conclu_par" required  class="form-control" autofocus >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['conclu_par'])){ ?>
				  
				    
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" selected  ><?php echo $_POST["conclu_par"]; ?></option>
				
				<?php if($conclu_par=='le Directeur des finances et du materiel'){ ?>
				<option name="fonction" style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Responsable du programme 2</option>     
				   
				<?php }elseif($conclu_par=='le Chef de Division Approvisionnement et Marchés Publics'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($conclu_par=='la Directrice des finances et du materiel'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($conclu_par=='Responsable du programme 1'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 2</option>     
				
				<?php }elseif($conclu_par=='Responsable du programme 2'){ ?>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option>  
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Chef de Division Approvisionnement et Marchés Publics</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >Responsable du programme 1</option>     
				
				<?php }?>
				 
			  
				  
				  <?php }else{ ?>
				  
							 <option value="" selected>Veillez choisir la fonction</option> 
				
				
				
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >le Directeur des finances et du materiel</option>
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  >la Directrice des finances et du materiel</option> 
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >le Chef de Division de Approvisionnement et Marchés Publics</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 1</option>     
				<option name="fonction"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"   >Responsable du programme 2</option>     
				
				<?php }   ?>
				   
				      </select>
				    
              </div> 
			   </div><br/><br/>
			   
			   
	 <div class="col-md-6"><br/>
              <label class="">TVA( Pourcentage ): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group"> 
              
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['tvapourcent'])){ ?>
							<input name="tvapourcent" onkeyup="verif_nombre(this);" type="text" value="<?php echo $_POST["tvapourcent"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input required name="tvapourcent" onkeyup="verif_nombre(this);" type="text"  placeholder="Pourcentage TVA" class="form-control validate[required]" />
				   <?php }   ?>
				    
              </div> 
			   </div><br/><br/>

			   
			   
			    
       
			    <div class="col-md-6"><br/> 
              <label class="">Nombre_Produits: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <?php if(isset($_POST['nb_produit'])){ ?>
							<input name="nb_produit" onkeyup="verif_nombre(this);" required type="text" value="<?php echo $_POST["nb_produit"]; ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
							      <input required onkeyup="verif_nombre(this);" name="nb_produit" required type="text"  class="form-control validate[required]" />
				   <?php }   ?>
              </div>
			   </div>
			    
		<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>" class="form-control validate[required]" />
				<?php } ?>			
		 <?php if(isset($_POST['objet_contrat'])){  ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
				 <?php if(isset($_POST['code_programme'])) { ?>
							<input name="code_programme" type="hidden" value="<?php echo $_POST["code_programme"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>
			  <?php if(isset($_POST['delai_execution'])){  ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
					<?php } ?>
 <?php if(isset($_POST['service_benef'])){  ?>
							<input name="service_benef" type="hidden" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
					<?php } ?>					
			  <?php if(isset($_POST['date_approbation'])){ ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
			<?php } ?>	
			<?php if(isset($_POST['date_notification'])){ ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
					 	<?php } ?>
<?php if(isset($_POST['service_benef'])){ ?>
							<input name="service_benef" type="hidden" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
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
	
	 
  
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
<?php if(isset($_POST['code_programme'])) { ?>
							<input name="code_programme" type="hidden" value="<?php echo $_POST["code_programme"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>				 
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>			   
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
<?php if(isset($_POST['id_titulaire'])){  ?>
							<input name="id_titulaire" type="hidden" value="<?php echo $_POST["id_titulaire"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>
	
		
<?php if(isset($_POST['representant_dfm'])){ ?>
				<input name="representant_dfm" type="hidden" value="<?php	 echo $_POST["representant_dfm"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	 
 <?php if(isset($_POST['approuv_par'])){ ?>
				<input name="approuv_par" type="hidden" value="<?php	 echo $_POST["approuv_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
<?php if(isset($_POST['fonction'])){ ?>
				<input name="fonction" type="hidden" value="<?php	 echo $_POST["fonction"]; ?>"   class="form-control validate[required]" />
	<?php } ?>	
	<?php if(isset($_POST['fonction_approuv'])){ ?>
				<input name="fonction_approuv" type="hidden" value="<?php	 echo $_POST["fonction_approuv"]; ?>"   class="form-control validate[required]" />
	<?php } ?>		
	<?php if(isset($_POST['type_produit'])){ ?>
				<input name="type_produit" type="hidden" value="<?php echo $_POST["type_produit"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
			 
			   <div><center>
   
			   <input name="not" type="hidden" value="<?php if(isset($_POST['nb_produit'])){echo $_POST['nb_produit']; }?>" class="form-control validate[required]" />
           

		   <br/><br/><br/><br/><br/><br/><br/>
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
		 
						<form id="formID" action="contrat.php?etape_5&a&dedant&id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">	 
					 
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
				  <?php }else{    @$designation='designation'.$nb; ?>
								<input name="<?php echo "designation".$nb ?>" type="text" required class="form-control validate[required]" />
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
									 
								<input onkeyup="verif_nombre(this);" name="<?php echo "quantite".$nb ?>" type="text" required class="form-control validate[required]" />
				  	<?php }   ?>
               </div><br>
			  
			  <label class="">Prix Unitaire( Saisi lors du choix du fours ): <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">( Cliquer sur suivant )</span></label>
              <div class="input-group">
                  
				   <?php if(isset($_POST['nb'])){  $prix_unitaire='prix_unitaire'.$nb;  ?>
						
							<input onkeyup="verif_nombre(this);" name="<?php echo "prix_unitaire".$nb ?>" type="hidden" value="<?php if(isset($_POST[$prix_unitaire])){ echo $_POST[$prix_unitaire]; } ?>" class="form-control validate[required]" />
				  <?php }else{ ?>
								<input onkeyup="verif_nombre(this);" name="<?php echo "prix_unitaire".$nb ?>" type="hidden" required class="form-control validate[required]" />
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
	<?php if(isset($_POST['fonction'])){ ?>
				<input name="fonction" type="hidden" value="<?php	 echo $_POST["fonction"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	
	<?php if(isset($_POST['fonction_approuv'])){ ?>
				<input name="fonction_approuv" type="hidden" value="<?php	 echo $_POST["fonction_approuv"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['conclu_par'])){ ?>
				<input name="conclu_par" type="hidden" value="<?php	 echo $_POST["conclu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['nom_conlu_par'])){ ?>
				<input name="nom_conlu_par" type="hidden" value="<?php	 echo $_POST["nom_conlu_par"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['profession_conclu'])){ ?>
				<input name="profession_conclu" type="hidden" value="<?php	 echo $_POST["profession_conclu"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	<?php if(isset($_POST['tvapourcent'])){ ?>
				<input name="tvapourcent" type="hidden" value="<?php echo $_POST["tvapourcent"]; ?>"   class="form-control validate[required]" />
	<?php } ?>
	 
		 
<?php if(isset($_POST['service_benef'])) { ?>
							<input name="service_benef" type="hidden" value="<?php echo $_POST["service_benef"]; ?>" class="form-control validate[required]" />
				 <?php } ?>			   
  
<?php if(isset($_POST['delai_execution'])) { ?>
							<input name="delai_execution" type="hidden" value="<?php echo $_POST["delai_execution"]; ?>" class="form-control validate[required]" />
				 <?php } ?>
<?php if(isset($_POST['date_approbation'])) { ?>
							<input name="date_approbation" type="hidden" value="<?php echo $_POST["date_approbation"]; ?>" class="form-control validate[required]" />
				 <?php } ?>	
<?php if(isset($_POST['date_notification'])) { ?>
							<input name="date_notification" type="hidden" value="<?php echo $_POST["date_notification"]; ?>" class="form-control validate[required]" />
				 <?php } ?>					 
 <?php if(isset($_POST['objet_contrat'])) { ?>
							<input name="objet_contrat" type="hidden" value="<?php echo $_POST["objet_contrat"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>	
<?php if(isset($_POST['code_programme'])) { ?>
							<input name="code_programme" type="hidden" value="<?php echo $_POST["code_programme"]; ?>"  class="form-control validate[required]" />
				  <?php } ?>				  
	<?php if(isset($_POST['num_contrat'])){  ?>
							<input name="num_contrat" type="hidden" value="<?php echo $_POST["num_contrat"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>		   
<?php if(isset($_POST['id_titulaire'])){  ?>
							<input name="id_titulaire" type="hidden" value="<?php echo $_POST["id_titulaire"]; ?>"   class="form-control validate[required]" />
				  <?php } ?>			   
<?php if(isset($_POST['type_produit'])){ ?>
				<input name="type_produit" type="hidden" value="<?php echo $_POST["type_produit"]; ?>"   class="form-control validate[required]" />
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
					}elseif(isset($_POST['Suivant']) and isset($_POST['not'])){
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
 
  

  if(isset($_POST['code_programme'])){
	   $code_programmeq=$_POST["code_programme"];
  $req_add_p=$pdo->prepare("select  * from programme where code_programme='$code_programmeq' ");
			$req_add_p->execute();
			$pointer_add_p=$req_add_p->fetch();
	              $identifiant=$pointer_add_p['identifiant'];
              }
   
  ?>
		
          <table class="table table-striped table-bordered">
		  
          <tr class="tr-table">
             
            <th>OBJET </th>
			 <th>PROGRAMME </th>
            <th>DELAI_EXECUTION</th>
			 <th>TYPE DE PRODUIT</th>
			 <th>SERVICE_BENEFICIAIRE</th>
			 
             
			 
          </tr>
 
  <?php 
  ?> 
            <tr> 
              <td><?php if(isset($_POST['objet_contrat'])){  echo $objet_contrat= $_POST["objet_contrat"]; }  ?></td>
			   <td><?php if(isset($_POST['objet_contrat'])){    echo $identifiant; } ?></td>
              <td><?php if(isset($_POST['delai_execution'])){  echo $delai_execution= $_POST["delai_execution"]; }  ?></td>
			  <td><?php if(isset($_POST['type_produit'])){  echo $type_produit= $_POST["type_produit"]; }   ?></td>
             <td><?php if(isset($_POST['service_benef'])){  echo $service_benef= $_POST["service_benef"]; }   ?></td>
             
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
	 
	 

 
 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          <table class="table table-striped table-bordered">
		   
          <tr class="tr-table">
             <th>SOURCE_FINANCEMENT</th>
            <th>EXERCICE </th>
            <th>SECTION</th>
			<th>CHAPITRE</th>
			 <th>NATURE</th>
			
             
			 
          </tr>
 
  <?php 
 
 
 
  ?> 
            <tr>
               <td><?php if(isset($_POST['source_finance'])){  echo $source_finance= $_POST["source_finance"]; }   ?></td>
              <td><?php if(isset($_POST['exercice'])){  echo $exercice= $_POST["exercice"]; }  ?></td>
              <td><?php if(isset($_POST['section'])){  echo $section= $_POST["section"]; }  ?></td>
			   <td><?php if(isset($_POST['chapitre'])){  echo $chapitre= $_POST["chapitre"]; }  ?></td>
			  <td><?php if(isset($_POST['nature'])){  echo $nature= $_POST["nature"]; }  ?></td>
               
                
			   
 
 
             

                 
        </tr> 
		<?php  ?>       
      </table>
 </div> 
 
 
 
  
  		 
	       
	 
	 
 <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  

  
   
  ?>
		
          
 </div> 
 
 
 
 
 
 
  <div class="tab-pane " id="paye" role="tabpanel">
        
          <?php 
 
  
  
   
  ?>
		
          <table class="table table-striped table-bordered">
		  
          <tr class="tr-table">
             
            <th>APPROUVER_PAR </th>
            <th>RÉPESENTANT_PRESIDENCE</th>
			<th>FONCT°_RÉPRESENTANT_PRESI</th>
			<th>TVA( POURCENTAGE )</th>
			  <th>NOMBRE_PRODUITS</th>
           

          </tr>
 
  <?php 
 
 
 
  ?> 
            <tr>
               
              <td><?php if(isset($_POST['approuv_par'])){  echo $approuv_par= $_POST["approuv_par"]; }  ?></td>
              <td><?php if(isset($_POST['representant_dfm'])){  echo $representant_dfm= $_POST["representant_dfm"]; }  ?></td>
			   <td><?php if(isset($_POST['fonction'])){  echo $representant_dfm= $_POST["fonction"]; }  ?></td>
			    <td><?php if(isset($_POST['tvapourcent'])){  echo $tvapourcent= $_POST["tvapourcent"]; }  ?></td> 
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
             <th>DÉSIGNATION:</th>
            <th>QUANTITÉ </th>
            <th>PRIX_UNITAIRE:</th>
			
             
			 
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
	 }elseif(isset($_POST['not'])){
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
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  
  
           
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>

   





</body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>


</html>

 
	 	


