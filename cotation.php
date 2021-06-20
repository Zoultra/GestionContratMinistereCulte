<?php 
require'connexion.php';

   $id2=$_GET['id2']; 
  $num_contrat=$_GET['num_contrat'];
  $id_cotation=$_GET['id_cotation']; 
	 
  
	$etat='nonChoisi';  
		 
	
  
 
   if(isset($_GET['Requette'])){
			   
			   
			    $num_contrat=$_GET['num_contrat'];
				$id_titulaire1=$_POST['id_titulaire'];
				$id_cotation=$_GET['id_cotation']; 
				$prix=$_POST['prix'];
				$cpt=$_POST['cpt'];
				$code_produit=$_POST['code_produit'];
				$quantite=$_POST['quantite'];
				
				
				  $u123=0;
				   while($u123<$cpt){
				    $req_add=$pdo->prepare('select max(code_fours_produit) from fours_produit');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	
			$code_fours_produit=$pointer_add['max(code_fours_produit)']+1;
			if($code_fours_produit<=9){
				$code_fours_produit='00000'.$code_fours_produit;
			}else if($code_fours_produit<=99){
				$code_fours_produit='0000'.$code_fours_produit;
			}else if($code_fours_produit<=999){
				$code_fours_produit='000'.$code_fours_produit;
			}else if($code_fours_produit<=9999){
				$code_fours_produit='00'.$code_fours_produit;
			}else if($code_fours_produit<=99999){
				$code_fours_produit='0'.$code_fours_produit;
			}
			   
				 $montant_int=$quantite[$u123]*$prix[$u123];
				 
			  $req=$pdo->prepare("insert into fours_produit(code_fours_produit,id_titulaire,num_contrat,code_produit,montant_int,prix)values(?,?,?,?,?,?)");
	                $params=array($code_fours_produit,$id_titulaire1,$num_contrat,$code_produit[$u123],$montant_int,$prix[$u123]);
				   $req->execute($params);$u123++; 
				   
	 
	
				   }
				   
				  
				
			$req_add=$pdo->prepare('select max(code_cot_fours) from cotation_fours');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	
			$code_cot_fours=$pointer_add['max(code_cot_fours)']+1;
			if($code_cot_fours<=9){
				$code_cot_fours='00000'.$code_cot_fours;
			}else if($code_cot_fours<=99){
				$code_cot_fours='0000'.$code_cot_fours;
			}else if($code_cot_fours<=999){
				$code_cot_fours='000'.$code_cot_fours;
			}else if($code_cot_fours<=9999){
				$code_cot_fours='00'.$code_cot_fours;
			}else if($code_cot_fours<=99999){
				$code_cot_fours='0'.$code_cot_fours;
			}
			
			
				
			 $rq_montant= "SELECT  sum(montant_int) FROM fours_produit where num_contrat='$num_contrat' AND id_titulaire='$id_titulaire1' ";	 
  
 $reponse = $pdo->prepare("$rq_montant");
  $reponse->execute();
	$data=$reponse->fetch();
	
	 $rq_tva= "SELECT * FROM contrat where num_contrat='$num_contrat'  ";	 
  
 $reponse_tva= $pdo->prepare("$rq_tva");
  $reponse_tva->execute();
	$data_tva=$reponse_tva->fetch();
	$tvapourcent=$data_tva['pourcentage_tva'];
	
	
				  
				   $total_ht=($data["sum(montant_int)"]);
                  $tva=($total_ht*$tvapourcent)/100;
                  $total_ttc=intval($tva+$total_ht); 
				  
				 
			   
			   
				    $req_limite=$pdo->prepare("select * from cotation WHERE id_cotation='$id_cotation' ");
			$req_limite->execute();
			$pointer_limite=$req_limite->fetch();
			$nbre=$pointer_limite['nombre_cotation']; 
			$nbre++;
			
			$rq_edite=$pdo->prepare('update cotation SET nombre_cotation=?WHERE(id_cotation=?)');
	$params=array($nbre,$id_cotation);
	$rq_edite->execute($params);
			 
			 $req_verif=$pdo->prepare("select * from cotation WHERE id_cotation='$id_cotation' ");
			$req_verif->execute();
			$pointer_verif=$req_verif->fetch();
			$nbre_verif=$pointer_verif['nombre_cotation']; 
			
			
	 
	 
	  
				   
				 $req_verif1=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation' AND id_titulaire='$id_titulaire1' AND etat='choisi' ");
			$req_verif1->execute();
			$data_verif1=$req_verif1->fetch();
			  
			   
	 
				if(empty($data_verif1['id_cotation']) AND $nbre_verif<=3 ){
					
					 $etatFacure=$_POST['etatFacure'];
				$etatPieces=$_POST['etatPieces'];
			
			  $req=$pdo->prepare("insert into cotation_fours(code_cot_fours,id_titulaire,id_cotation,montant,etat,etatFacure,etatPieces)values(?,?,?,?,?,?,?)");
	                $params=array($code_cot_fours,$id_titulaire1,$id_cotation,$total_ttc,'choisi',$etatFacure,$etatPieces);
				   $req->execute($params);
				   
				    
				   
				    $req_verif3=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation'  AND etat='choisi' ORDER BY `cotation_fours`.`montant` ASC ");
			$req_verif3->execute();
			 
			$data_verif3=$req_verif3->fetchAll();
			
                $i=0;			
				
	          foreach ($data_verif3 as $data_verif4) {
				  
				  $i++;
				  
				  $code_cot_fours=$data_verif4['code_cot_fours'];
				  
			 $reqUpContrat=$pdo->prepare("update cotation_fours set rang_fours='$i' where code_cot_fours='$code_cot_fours' ");
      
                           $reqUpContrat->execute();	 
 	  
				  
			  }
		  	   
				   
		    $req_verif2=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation' AND rang_fours='1' AND etat='choisi' ");
			$req_verif2->execute();
			$data_verif2=$req_verif2->fetch();
			$id_titulaire_up=$data_verif2['id_titulaire'];
			 $total_ttc=$data_verif2['montant'];
			 
	 include_once('convert.php'); 
			
			 $reqUpContrat=$pdo->prepare("update contrat set id_titulaire='$id_titulaire_up', total_ttc='$total_ttc', enlettre='$enlettre1' where num_contrat='$num_contrat' ");
      
                  $reqUpContrat->execute();
						   $data_mont=$reqUpContrat->fetchAll();
						   
    
	   	
				   
				    }   
				   
		
		 // Mon code recent apres classement update contrat
		 if($nbre_verif==3){
		  $req_verif1=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation'  AND etat='choisi' AND rang_fours=1 ");
			$req_verif1->execute();
			$data_verif1=$req_verif1->fetch();
			$id_titulaire4=$data_verif1['id_titulaire'];   
			
			$req_verif2=$pdo->prepare("select * from fours_produit WHERE id_titulaire='$id_titulaire4' and num_contrat='$num_contrat' ");
			$req_verif2->execute();
			
			 while($data_verif2=$req_verif2->fetch())
			   { 
			echo $data_verif2['code_produit'];  echo'<br/>';
			$code_produita=$data_verif2['code_produit'];
			 $prix_unitaire=$data_verif2['prix'];
					   $montant_int=$data_verif2['montant_int'];
					   
                         include('convert_p.php');
			
			 $rqup=$pdo->prepare('UPDATE produit_contrat SET prix_unitaire=?,montant=?,p_enlettre=?WHERE(code_produit=?)');
	                   $params=array($prix_unitaire,$montant_int,$enlettre2,$code_produita);
	                      $rqup->execute($params);
			
			 
			   }
			   
			   //Update contrat
			   
			    $rqsum= "SELECT  sum(montant) FROM produit_contrat where num_contrat='$num_contrat' "; 
     $reponsesum = $pdo->prepare("$rqsum");
     $reponsesum->execute(); 
     $datasum=$reponsesum->fetch();
	
	 $rq_tva= "SELECT * FROM contrat where num_contrat='$num_contrat'  ";	 
  
 $reponse_tva= $pdo->prepare("$rq_tva");
  $reponse_tva->execute();
	$data_tva=$reponse_tva->fetch();
	$tvapourcent=$data_tva['pourcentage_tva'];
	
  $total_ht=($datasum["sum(montant)"]);
  $tva=($total_ht*$tvapourcent)/100;
  $total_ttc=intval($tva+$total_ht);
  
    include_once('convert.php'); 
	 
	$rqup=$pdo->prepare('UPDATE contrat SET total_ht=?, tva=?, total_ttc=?,enlettre=? WHERE(num_contrat=?)');
	$params=array($total_ht,$tva,$total_ttc,$enlettre1,$num_contrat);
	$rqup->execute($params);
  
  //Fin Update contrat
		 
	// debut faisabilite de contrate et cotation	
     if($total_ttc < 200000){
		   
	  $msg_cotation2 = 'Le montant du contrat est inferieur à 200000 FCFA.';
	   
 echo'<script>window.open("cotation.php?choix=addCotation&id_titulaire='.$id_titulaire4.'&id_cotation='.$id_cotation.'&num_contrat='.$num_contrat.'&id2='.$id2.'&msg_cotation2='.$msg_cotation2.'&back", "_self")</script>';
			
	   } if($total_ttc < 500000){
		   
	  $msg_cotation2 = 'Cotation seulement.';
	   
 echo'<script>window.open("cotation.php?choix=addCotation&id_titulaire='.$id_titulaire4.'&id_cotation='.$id_cotation.'&num_contrat='.$num_contrat.'&id2='.$id2.'&msg_cotation2='.$msg_cotation2.'&back", "_self")</script>';
			
	   } if($total_ttc >= 500000){
		   
	  $msg_cotation2 = ' Contrat et cotation';
	   
 echo'<script>window.open("cotation.php?choix=addCotation&id_titulaire='.$id_titulaire4.'&id_cotation='.$id_cotation.'&num_contrat='.$num_contrat.'&id2='.$id2.'&msg_cotation2='.$msg_cotation2.'&back", "_self")</script>';
			
	   }
	   if($total_ttc >= 5000000){
		   
	  $msg_cotation2 = 'Le montant du contrat est supperieur à 5000000 FCFA donc pas de demande de cotation ni de contrat , marché';
	   
 echo'<script>window.open("cotation.php?choix=addCotation&id_titulaire='.$id_titulaire4.'&id_cotation='.$id_cotation.'&num_contrat='.$num_contrat.'&id2='.$id2.'&msg_cotation2='.$msg_cotation2.'&back", "_self")</script>';
			
	   }
	  
  //   $msg_cotation = 'NON';
	//   echo'<script>window.open("cotation.php?choix=addCotation&id_cotation='.$id_cotation.'&num_contrat='.$num_contrat.'&id2='.$id2.'&msg_cotation='.$msg_cotation.'", "_self")</script>';
		 
		 }
			
		//fin  Mon code recent	 
	   	
		   }
      
	 
	 
	  
		  ?> 
		  
		  
		   
 
    

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
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

                <h2 class="h1_title">Gestion de contrats</h2>
 
           </div>

         

 <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				
    <?php
	
	  
 
		   $req_verif=$pdo->prepare("select * from cotation WHERE id_cotation='$id_cotation' ");
			$req_verif->execute();
			$pointer_verif=$req_verif->fetch();
			$nbre_verif=$pointer_verif['nombre_cotation']; 
		 
			
			?>
	 
			 <?php 	if($nbre_verif==3 ){  ?>
				<div class="btn-group">
				  <button   type="button" class="btn btn-success " onclick='window.location.href="cotation.php?id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>&choix=addMembre";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i style="color:white;" class="glyphicon glyphicon-plus">&nbsp; Gestion Membres</i></a></span>
				  </button>
				  
                 </div>
				 
				 <div class="btn-group">
				  <button   type="button" class="btn btn-success " onclick='window.location.href="cotation.php?id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>&choix=addHoraire";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i style="color:white;" class="glyphicon glyphicon-plus">&nbsp; Gestion Horaires </i></a></span>
				  </button>
				  
                 </div>
				 
				 <div class="btn-group">
				  <button    class="btn btn-success" data-toggle="modal" data-target="#<?=$pointer_verif['id_cotation'];?>" >
				    <i style="color:white;" class="glyphicon glyphicon-list">&nbsp; Classement </i></span>
				  </button>
				  </div>
				  
				  
				  
				  
               
			 <?php  }  ?>

				  
				  
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="liste_contrat.php?id2=<?php   echo $id2;?>&choix=private";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspMes_Contrats</i></a></span>
				  </button>
                 </div>
				 
				 
				  <div class="btn-group">
				  <button   type="button"  onclick='window.location.href="#";'   class="btn btn-default dropdown-toggle" >
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				
				
             </div>	 
        </div>

    </div>

</div>
   
   
  
<body> 

   
    <div class="container mainbg">
	
	
	 
	


 <div id="<?=$pointer_verif['id_cotation'];?>" class="modal fade" role="dialog">
	
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
       
          <?php 
          require_once('connexion.php');
		   
		   $id_cotation=$pointer_verif['id_cotation'];
 $rq= "SELECT  * FROM cotation_fours where id_cotation='$id_cotation' ORDER BY rang_fours";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   $cpt=0;
   
   $rq_contrat= "SELECT  * FROM contrat where num_contrat='$num_contrat'  ";	 
  
 $reponse_contrat = $pdo->prepare("$rq_contrat");
  $reponse_contrat->execute();
  $data_reponse_contrat=$reponse_contrat->fetch(); 
  
   
  ?>
  
  
   
       
	        <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div>
		  <tr class="tr-table" colspan="8"><center>
		   
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Classement des offres</h2></center></tr>
		  <br/>
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>N° PLI</th>
            <th>FOURNISSEURS</th>
			<th>PROPOSITION</th> 
			<th>DELAI DE LIVRAISON</th>
			<th>RANG</th>
			   
          </tr>
		  
		   <?php    foreach ($data_reponse as $data_reponse1 ) { 
          
    	    $cpt++;
			if($cpt==1){
				$rang= 'er';
				
				$rq= "SELECT  id_titulaire FROM cotation_fours where id_cotation='$id_cotation' and rang_fours='1' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse_find=$reponse->fetch(); 
  
				$id_ti=$data_reponse_find['id_titulaire'];
				  $rq1= "SELECT  * FROM titulaire where id_titulaire='$id_ti' ";	 
  
 $reponse1 = $pdo->prepare("$rq1");
  $reponse1->execute();
  $data_reponse2=$reponse1->fetch(); 
				
			}elseif($cpt==2){
				$rang = 'ème';
				
				  
				 
			 $rq= "SELECT  id_titulaire FROM cotation_fours where id_cotation='$id_cotation' and rang_fours='2' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse_find=$reponse->fetch(); 
  
				$id_ti=$data_reponse_find['id_titulaire'];
				  $rq1= "SELECT  * FROM titulaire where id_titulaire='$id_ti' ";	 
  
 $reponse1 = $pdo->prepare("$rq1");
  $reponse1->execute();
  $data_reponse2=$reponse1->fetch(); 
			 
			 
			 
			}elseif($cpt==3){
				$rang = 'ème'; 
				
				
				
				$rq= "SELECT  id_titulaire FROM cotation_fours where id_cotation='$id_cotation' and rang_fours='3' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse_find=$reponse->fetch(); 
  
				$id_ti=$data_reponse_find['id_titulaire'];
				  $rq1= "SELECT  * FROM titulaire where id_titulaire='$id_ti' ";	 
  
 $reponse1 = $pdo->prepare("$rq1");
  $reponse1->execute();
  $data_reponse2=$reponse1->fetch(); 
				
				 
			}
  ?> 
 
  
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $cpt ?></td>
              <td> <?php echo $data_reponse2['nom_titulaire']  ?></td>
			   <td style="font-family:tahoma;font-weight:bold;" > <?php echo $data_reponse1['montant'] ?></td>
           <td style="font-family:tahoma;font-weight:bold;" > <?php echo $data_reponse_contrat['delai_execution'].' '.'jours' ?></td>
             <td style="font-family:tahoma;font-weight:bold;" > <?php echo $cpt.''.$rang ?></td>		   
                  
        </tr> 
		<?php } ?>       
      </table> 
      </div>
  
   </div> 
 </div>
	   
	    <center>
	   
	 
		 <button type="button" class="mybtn mybtn-danger" data-dismiss="modal">Fermer</button> 
		 
		 </center><br/><br/>
	   
	      
	 
        
		
      </div>
	  
	
     
    </div>
 </div>
 
 <!-- DEBUT PIECES -->
   	
	
	 <?php 
  if(isset($_GET['choix']))
	  $choix=$_GET['choix'];
	  if($choix=="addCotation"){     
		                       
		  
	  ?>
    <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="liste_contrat.php?choix=private&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Sortir</button>
       
       <h1 style="font-size:20px;font-family:tahoma" class="btn btn-primary btn-block">Choix du fournisseur de la demande de cotation pour le contrat N°&nbsp;<strong><?php echo $num_contrat;?></strong></h1>
   
    <br>
    <br>
	
	<center><?php if(isset($_GET['msg_cotation'])){?>  
   
   
  <div  class="alert alert-success alert-dismissible" id="msg" style='width: 70%; font-family:Tahoma; font-size:14px; margin: auto;' role="alert" >
               <strong><script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('msg').innerHTML = "<B>Contrat crée avec succès.(' _ ')</B>";
    } );
	
	setTimeout(function() {
  document.getElementById('msg').innerHTML = "<B>Choisissez les fournisseurs pour enregistrer la demande de cotation.(' _ ')</B>";
},7000);
</script> </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span style='color:red' aria-hidden="true">&times;</span>
  </button>
    </div> 	   
					   
					   
					   <?php }?>
		  </center>
		  
		  <center><?php if(isset($_GET['msg_cotation2'])){?>  
   
   
  <div  class="alert alert-success alert-dismissible" style='width: 70%; font-family:Tahoma; font-size:14px; margin: auto;' >
             <p style='width:70%;font-family:Tahoma;font-size:22px;'><?php echo $_GET['msg_cotation2']; ?></p> <br/> 
			<div class="btn-group">
	 <button   type="button" class="btn btn-danger"  class="btn btn-default dropdown-toggle" >
	<a href="delete.php?choix=delc&num_contrat=<?php echo($_GET['num_contrat']) ?>&id_titulaire=<?php echo($_GET['id_titulaire']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php  echo($_GET['id_cotation']) ?>"><i style="color:white;" class="glyphicon glyphicon-remove"> Annuler le contrat</i></a></span>
 
	 </button>
				  
                 </div> 
   <div class="btn-group">
				  <button data-dismiss="alert" aria-label="Close" type="button" class="btn btn-success "  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i style="color:white;" class="glyphicon glyphicon-ok">&nbsp; Continuer</i></a></span>
				  </button>
				  
                 </div> 				 
			   
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span style='color:red' aria-hidden="true">&times;</span>
  </button>
    </div> 	   
					   
					   
					   <?php }?>
		  </center>
		  
		  
		  
    </div>
 
 
   
 
	  
  

 
 
 
 
 
   <br/> <br/> <br/><br/>
	<center><?php if(isset($_SESSION['ajoutFours'])){?><div  class='alert alert-danger center' style='width: 30%; font-family:Tahoma;height:5%; font-size:15px; margin:auto;'><B> <?php {echo  $_SESSION['ajoutFours']; unset($_SESSION['ajoutFours']);} ?>
		               </B></div>
					   <?php }?>
		  </center>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>Nom_Entreprise</th>
            <th>Répresentant</th>
			<th>Téléphone</th>
			 <th>Numéro_Compte_Banque</th>
            <th>Nom_Banque</th> 
             
			 <th>Choix_Prix_Unitaire</th>
			  
            </tr>
        </thead>
        <tbody>
            
          <?php
   $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

		  
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
  
$id2=$_GET['id2'];
    $sql= "SELECT  * FROM titulaire WHERE id_titulaire!='00000000_07'  ";	 
    foreach  ($conn->query($sql) as $pointer5) { 
	$nom_titulaire=$pointer5['nom_titulaire'];
	 
		  
		  
		  $num_contrat=$_GET['num_contrat'];
		   
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
		   $num_contrat=$pointer4['num_contrat'];
		  
		  
	 
		   
	?>
	
          <tr>
		  
              <td style="font-family:tahoma;font-weight:bold;">
                 
              
                  
                     <?php  echo $pointer5['nom_titulaire']; ?>
                  
                  
                  

                  
         <!-- FIN DU WHILE -->          
              </td>
             
 
               <td><?php echo $pointer5['representant_titulaire']  ?></td>
              
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $pointer5['tel_titulaire'] ?></td>
			  <td><?php echo $pointer5['num_compte_banque'] ?></td>
			   <td><?php echo $pointer5['nom_banque'] ?></td> 
			   
			   
              <td>  
			  
	 <?php  if(isset($_GET['Requette'])){
		 
		 $id_titulaire2=$pointer5['id_titulaire'] ; 
		 $req3=$pdo->prepare("select * from cotation_fours where id_titulaire='$id_titulaire2' AND id_cotation='$id_cotation'");
		           $req3->execute();
		           $data_verif=$req3->fetch();
		  
		             $etat=$data_verif['etat'];
					 $id_titulaire3=$data_verif['id_titulaire'];
		 
		 
		 ?>
		 
		  <?php  if(!empty($id_titulaire3)){?>   
	                        
	<button><a onclick="return confirm('Voulez vous vraiment enlever ?')"   href="delete.php?choix=delFours&id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>&id_titulaire=<?=$pointer5['id_titulaire'];?>"><i style="color:red;font-size:25px;" class="glyphicon glyphicon-remove"></i></a></button>
	
			    <?php }else{ ?>
			<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?=$pointer5['id_titulaire'];?>" >Choisir</button>
	
				<?php }?> 
				
				<?php }elseif(isset($_GET['back'])){

 $id_titulaire2=$pointer5['id_titulaire'] ; 
		 $req3=$pdo->prepare("select * from cotation_fours where id_titulaire='$id_titulaire2' AND id_cotation='$id_cotation'");
		           $req3->execute();
		           $data_verif=$req3->fetch();
		  
		             $etat=$data_verif['etat'];
					 $id_titulaire3=$data_verif['id_titulaire'];
				?>
				
				  <?php  if(!empty($id_titulaire3)){?>   
	                                 
		<button><a onclick="return confirm('Voulez vous vraiment enlever ?')"   href="delete.php?choix=delFours&id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&id_titulaire=<?php echo $pointer5['id_titulaire'] ?>&num_contrat=<?php echo $num_contrat ?>"><i style="color:red;font-size:25px;" class="glyphicon glyphicon-remove"></i></a></button>
	
			    <?php }else{ ?>
			<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?=$pointer5['id_titulaire'];?>" >Choisir</button>
	
				<?php }?> 
				<?php }else{ ?>
	<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?=$pointer5['id_titulaire'];?>" >Choisir</button>
			    
	
	<?php }?> 


 


 <div id="myModal<?=$pointer5['id_titulaire'];?>" class="modal fade" role="dialog">
	
 <!-- DEBUT DE WHILE-->
	
	
				  
  <div class="modal-dialog">
  
  <?php
  
		 $req_verif1=$pdo->prepare("select COUNT(code_cot_fours) from cotation_fours WHERE id_cotation='$id_cotation'  ");
			$req_verif1->execute();
			$data_verif1=$req_verif1->fetchcolumn();
             
 ?>
    <!-- Modal content-->
	
	
  
		   
 
	
	
    <div class="modal-content">
	
	
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
             ALERT.......
        </h3>
      </div>
	  
	   <?php if($data_verif1==3){ ?>
   
          <p style="font-family:tahoma;font-size:24" > <B> Le nombre de fournisseurs est limité à trois(3). </B></p>
		  
		  
		   <center>
  <button type="button" class="mybtn mybtn-danger" data-dismiss="modal">Fermer</button>
	  
      </center><br/><br/>
       

	   <?php  }else{ ?>
	  
      <div class="modal-body">
          
	   
	   
	   
	   
	   
	    <div class="tab-content" role="tablist">
  
    <div class="tab-pane active" id="home" role="tabpanel">
       
       <?php 
           require_once('connexion.php'); 
		   $num_contrat2=$pointer4['num_contrat'];
           $rq= "select  * from produit_contrat where num_contrat='$num_contrat2'"; 
           $reponse = $pdo->prepare("$rq");
           $reponse->execute(); 
          ?>
  
  
   
       
	  <form id="formID" action="cotation.php?choix=addCotation&id2=<?php echo $id2 ?>&Requette&id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>" method="post" enctype="multipart/form-data">	
          <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div> 
		  <tr class="tr-table" colspan="8"><center>
		   <br/>
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Saisie des prix unitaires proposés par <strong><?php echo ($pointer5['nom_titulaire']) ?></strong> </h2></center></tr>
		  <br/>
		  
		  
	
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Désignation</th>
            <th>Quantité</th>
			<th>Prix Unitaire</th>
			   
          </tr>
 
  <?php $cpt=0;   while ($pointer3=$reponse->fetch()) { $cpt++;
          $code_produit=$pointer3['code_produit'];
     $quantite=$pointer3['quantite'];
		  
    
  ?> 
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointer3['designation'] ?></td>
              <td> 
			  <?php echo $pointer3['quantite'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" >
			  
			  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">
	   	   <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
       
	    <input  name="quantite[]" type="hidden"  value="<?php echo  $pointer3['quantite'] ?>">
	   <input  name="code_produit[]" type="hidden"  value="<?php echo  $pointer3['code_produit'] ?>">
       <input  name="id_titulaire" type="hidden"  value="<?php echo $pointer5['id_titulaire'];?>">

		<input onkeyup="verif_nombre(this);" required type="text" name="prix[]">
      </span>
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
			  
			  
			  </td>
			  
                
			   
  
                  
        </tr> 
		<?php } ?> 

	<tr>
	 <th colspan="3">
	 Etat des pièces
	  </th>
	   
	</tr>	
	
    <tr>
	  <td colspan="2">
	      FACTURE PROFORMAT    
	  </td>
	  <td colspan="2">
	     PIECES FISCALES
	  </td>
	   
	</tr>
	<tr>
	  <td colspan="2">
	       <select  name="etatFacure" style="width:100%" id="cars" required >
				   <option  selected value="" >Selectionner l'état</option>
                  <option   value="Fournie" >Fournie</option>
				  <option   value="Non Fournie" >Non Fournie</option> 
           </select>   
	  </td>
	  <td colspan="2">
	     <select  name="etatPieces" style="width:100%" id="cars" required >
				   <option  selected value="" >Selectionner l'état</option>
                  <option   value="Fournies" >Fournies</option>
				  <option   value="Non Fournies" >Non Fournies</option> 
           </select>
	  </td>
	   
	</tr>
      </table>
	  
	  
	
	  
	  
 </div>
  
   </div>
  
  
	 
 </div>
	   
	    <center>
	    <button type="submit" name="b" class="mybtn mybtn-success"> Envoyer</button>
	 
		 <button type="button" class="mybtn mybtn-danger" data-dismiss="modal">Fermer</button> 
		 
	</center><br/><br/>
	 <?php } ?>    
	   
	   
		   
	</form>	 
        
		
      </div>
	  
	
     
    </div>

  </div>
  
</div>	
			
			
			
			
			
			
			
			
				</td>
			     
  
			  
			  
                </tr>  
            
    <?php  }  ?>
                 
               
        </tbody>
        <tfoot>
            <tr>
                <th>Nom_Entreprise</th>
               <th>Répresentant</th>
			   <th>Téléphone</th>
			    <th>Numéro_Compte_Banque</th>
                <th>Nom_Banque</th> 
             
			   <th>Choix_Prix_Unitaire</th>
			  
            </tr>
        </tfoot>
    </table>
      
	  <?php }
  
	  elseif($choix=="addMembre"){
		  
		  
		   
  ?>
  
  
   <?php 
  
	  if(isset($_GET['insert_membre'])){
		  
		  $nom_membre=$_POST['nom_membre'];
		  $prenom_membre=$_POST['prenom_membre'];
		    $type_membre=$_POST['type_membre'];
			 
			  
			if(empty($_POST['fonction_membre'])){
			     $fonction_membre='Non defini';
			}else{
				  $fonction_membre=$_POST['fonction_membre'];
			}
			 
			  
			  
		  
		  
	$req_membre=$pdo->prepare('select max(code_membre) from membre');
			$req_membre->execute();
			$pointer_membre=$req_membre->fetch();
	
			$code_membre=$pointer_membre['max(code_membre)']+1;
			if($code_membre<=9){
				$code_membre='00000'.$code_membre;
			}else if($code_membre<=99){
				$code_membre='0000'.$code_membre;
			}else if($code_membre<=999){
				$code_membre='000'.$code_membre;
			}else if($code_membre<=9999){
				$code_membre='00'.$code_membre;
			}else if($code_membre<=99999){
				$code_membre='0'.$code_membre;
			}
 		  
		   
			       
				   
				   
				   
				   
				     $type_membre=$_POST['type_membre'];
					 
					 
					
					 
				   
			$req_president_insert=$pdo->prepare("select * from membre WHERE id_cotation='$id_cotation' and type_membre='$type_membre' and type_membre!='Membre'");
			$req_president_insert->execute();
			$data_president_insert=$req_president_insert->fetch();  
			 $type_membre_find=$data_president_insert['type_membre'];
             			 
		   
             if(!empty($data_president_insert['type_membre'])){ 
					    
                    $msg_block="Le type existe déja (' _ ') "; 
			 }else{

    	 
					
	 $req=$pdo->prepare("insert into membre (code_membre,nom_membre,prenom_membre,type_membre,fonction_membre,id_cotation)values(?,?,?,?,?,?)");
	                $params=array($code_membre,$nom_membre,$prenom_membre,$type_membre,$fonction_membre,$id_cotation);
				   $req->execute($params);	
	
      
		 
	
		  $_SESSION['success']="Membre enregistré avec succès.(' _ ')"; 			
			 }        
		  
		  
	  }
		   
  ?>
  
     <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="cotation.php?id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>&choix=addCotation&back";' class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Enregistrement des membres de cotation pour le contrat N°&nbsp;<?php echo $num_contrat;?></h1>
   
    <br>
    <br>
    </div>
	 
	<?php if(isset($_SESSION['success'])){?><br/><br/><br/><br/><br/><br/>
	
	
	
	<div id="msg" class='alert alert-success center' style='width: 45%; height:40px; font-family:Tahoma; font-size:15px; margin: auto;'>



			 
			  <script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('msg').innerHTML = "<B>Membre enregistré avec succès.(' _ ')<B>";
    } );
	
	setTimeout(function() {
  document.getElementById('msg').innerHTML = "<B>Vous pouvez ajouter un autre membre.(' _ ')</B>";
},8000);
</script>  	
		               </div><br/>
					   
			 
					   <?php }if(isset($_GET['delMembre'])){?><br/><br/><br/><br/><br/><br/>
	  
	              
				    
	<div id="msg2" class='alert alert-warning center' style='width: 45%; height:40px; font-family:Tahoma; font-size:15px; margin: auto;'>



			 
			  <script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('msg2').innerHTML = "<B>Membre supprimé avec succès.(' _ ')<B>";
    } );
	
	setTimeout(function() {
  document.getElementById('msg2').innerHTML = "<B>Vous pouvez ajouter un autre membre.(' _ ')</B>";
},8000);
</script>  	
		               </div><br/>
					   
				 
					   

					 		   
				  
				  
				  <?php }?>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				 
	   <form id="formID" action="cotation.php?id2=<?php echo $id2 ?>&choix=addMembre&insert_membre&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>" method="post">
	   
	    <div class="col-sm-6">
			<label class="">Numéro cotation: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="id_cotation" value="<?php echo $id_cotation;?>" readonly type="text" placeholder="Entrez le prenom du membre" class="form-control" required />
              </div>
		  </div>
	   
	  <div class="col-sm-6">
			<label class="">Type du membre: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                 
                  
                  <select name="type_membre" class="form-control" required>
                      <option name="type_membre"  value="">Seclectionnez un type de membre</option>
					    <?php 
			$req_president=$pdo->prepare("select * from membre WHERE id_cotation='$id_cotation' and type_membre='President'");
			$req_president->execute();
			$data_president=$req_president->fetch(); ?>
						
		   
<?php if(empty($data_president['type_membre'])){ ?>
					   <option style="font-family:tahoma;font-weight:bold;font-size:18px"  name="type_membre" value="President" >President</option>
<?php } ?>


  <?php 
			$req_president=$pdo->prepare("select * from membre WHERE id_cotation='$id_cotation' and type_membre='Rapporteur'");
			$req_president->execute();
			$data_president=$req_president->fetch(); ?>
						
		   
<?php if(empty($data_president['type_membre'])){ ?>
					  <option style="font-family:tahoma;font-weight:bold;font-size:18px"  name="type_membre" value="Rapporteur" >Rapporteur</option>
<?php } ?>
					    
						 <option style="font-family:tahoma;font-weight:bold;font-size:18px;"  name="type_membre" value="Membre" >Membre</option>
                     
   
                  </select>
              </div>
		  </div>
		  
          <div class="col-sm-6"><br/><br/>
			<label class="">Nom : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="nom_membre" type="text" placeholder="Entrez le nom du membre" class="form-control" required />
              </div>
		  </div>
		  <div class="col-sm-6"><br/><br/>
			<label class="">Prénom : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="prenom_membre" type="text" placeholder="Entrez le prenom du membre" class="form-control" required />
              </div>
		  </div>
		  
	 
		   <div class="col-sm-12"><br/><br/>
			<label class="">Fonction : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="fonction_membre" type="text" placeholder="Obligatoire pour le président" class="form-control" />
              </div>
		  </div>
		  
		  
		   <center>
          <div class="col-sm-12" style="margin-bottom:20px;"><br/>
			  <label class=""></label>
			  <button type="submit"  class="mybtn mybtn-success btn-block">Ajouter</button>
		  </div>
             </center>   
              <br/> 

          <hr id='success'>

      </form>
	
	<br/><br/><br/>
	
	
	<?php  
	 
			$req_info2=$pdo->prepare("select * from membre where id_cotation='$id_cotation'");
			$req_info2->execute();
			$data_info1=$req_info2->fetchAll(); 
	?>
	
	 <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div><br/> 
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Type_Membre</th>
            <th>Nom</th>
			<th>Prénom</th>
			<th>Fonction</th>
			<th>Supprimer</th>
			  
			   
          </tr>
 
  <?php    foreach ($data_info1 as $data_info ) { 
           
    
  ?> 
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_info['type_membre'] ?></td>
              <td>
			  
			  
			  <?php echo $data_info['nom_membre'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_info['prenom_membre'] ?> </td>
			  
			   <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_info['fonction_membre'] ?> </td>
			  
			  
<td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delMembre&code_membre=<?php echo($data_info['code_membre']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			   
			 
                  
        </tr> 
		<?php } ?>       
      </table>
	
	
	
	
	
	
	  <?php } elseif($choix=="addHoraire"){?>
  
	  
	  <?php 
  
	  if(isset($_GET['insert_horaire'])){
		  
			$dateDepot=$_POST['dateDepot'];
			$heureDepot=$_POST['heureDepot'];
			$dateOuverture=$_POST['dateOuverture'];
			$heureOuverture=$_POST['heureOuverture'];
		 
			
		  $rqup=$pdo->prepare('update cotation_contrat set dateDepot=?, heureDepot=?, dateOuverture=?,heureOuverture=? WHERE(id_cotation=?)');
	$params=array($dateDepot,$heureDepot,$dateOuverture,$heureOuverture,$id_cotation);
	$rqup->execute($params);
	
		  $_SESSION['success']="Membre enregistré avec succès.(' _ ')"; 			
			 }        
		  
		  
	  
		   
  ?>
	   <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="cotation.php?id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>&choix=addCotation&back";' class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Enregistrement des Horaires de cotation pour le contrat N°&nbsp;<?php echo $num_contrat;?></h1>
   
    <br>
    <br>
    </div>
	  
	   <form id="formID" action="cotation.php?id2=<?php echo $id2 ?>&choix=addHoraire&insert_horaire&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>" method="post">
	       
		   <div class="col-sm-6"><br/><br/>
			<label class="">Date et Heure de depot : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				  <input name="dateDepot" type="date" required placeholder="Saisir date de depot" class="form-control" />
                  <input name="heureDepot" type="time" required placeholder="Saisir heure de depot" class="form-control" />
              </div>
		  </div>
		  
		   <div class="col-sm-6"><br/><br/>
			<label class="">Date et Heure d'ouverture : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;"></span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                 <input name="dateOuverture" required type="date" placeholder="Saisir date d'ouverture" class="form-control" />
				 <input name="heureOuverture" required type="time" placeholder="Saisir heure d'ouverture " class="form-control" />
              </div>
		  </div>
		  
 
		  
		  
		  
		 
		  
		   <center>
          <div class="col-sm-12" style="margin-bottom:20px;"><br/>
			  <label class=""></label>
			  <button type="submit"  class="mybtn mybtn-success btn-block">Ajouter</button>
		  </div>
             </center>   
              <br/> 

          <hr id='success'>

      </form></br></br></br>
		<?php  
	 
			$req_info2=$pdo->prepare("select * from cotation_contrat where id_cotation='$id_cotation'");
			$req_info2->execute();
			$data_info1=$req_info2->fetchAll(); 
	?>
	
	 <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div><br/> 
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Date depot</th>
            <th>Heure depot</th>
			<th>Date Ouverture</th>
			<th>Heure Ouverture</th>
			<th>Supprimer</th>
			  
			   
          </tr>
 
  <?php    foreach ($data_info1 as $data_info ) { 
           
    
  ?> 
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_info['dateDepot'] ?></td>
              <td style="font-family:tahoma;font-weight:bold;">
			  
			  
			  <?php echo $data_info['heureDepot'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_info['dateOuverture'] ?> </td>
			  
			   <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_info['heureOuverture'] ?> </td>
			  
			  
<td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delHorraire&code_cot_contrat=<?php echo($data_info['code_cot_contrat']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			   
			 
                  
        </tr> 
		<?php } ?>       
      </table>   
  
	<?php }?>
	
    <br/>
    <br/>
    <br/>
	
   
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
 <br/><br/><br/><br/>  
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>  
