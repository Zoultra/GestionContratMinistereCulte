  <?php 
      require('connexion.php');
    $id2=$_GET['id2'];
   
  
  
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
	  
	  
	  <script type="text/javascript">
	
					function creerFenImage() {
					fiRef = window.open ( "", "fenlmage","width=350,height=600,scrollbars=no, toolbar=no, location=no,directories=no,status=no");
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
	 
	 
			 
			   
			     <div class="btn-group">
				  <button   type="button" onclick='window.location.href="contrat.php?id2=<?php echo $id2 ?>";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-plus">&nbspNouveau_Contrat</i></a></span>
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
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspCotation </i></a></span>
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
   
   
  
<body> 

   
    <div class="container mainbg">
	
	
	
	 
	 
	 
	 
	 
	  <?php 
  if(isset($_GET['choix']))
	  $choix=$_GET['choix'];
	  if($choix=="listeCotation"){     
		                       
		  
	  ?>
	 
	 
	 
	 
	  <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 style='font-family:Tahoma; font-size:18px' class="btn btn-primary btn-block"> Liste des contrats avec les informations concernant les demandes de cotation </h1>
   
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
	 
    $sql= " select  * FROM contrat where id2='$id2' ";	 
   
 $reponsea = $pdo->prepare("$sql");
  $reponsea->execute(); 
  $reponse_data=$reponsea->fetch();
  $numero=$reponse_data['num_contrat'];
  $id22=$reponse_data['id2'];
  
  $sql=" select * FROM user where id2='$id22' ";	 
   
 $reponseaa = $pdo->prepare("$sql");
  $reponseaa->execute(); 
  $reponse_dataa=$reponseaa->fetch();
  $type_compte=$reponse_dataa['type_compte'];
  
 
  
  if($type_compte=='administrateur'){
	  
	    $sqla= " select  * FROM cotation_contrat  ";	 
   
 $reponse = $pdo->prepare("$sqla");
  $reponse->execute();
  }else{
  
   $sqla= " select  * FROM cotation_contrat where num_contrat='$numero' ";	 
   
 $reponse = $pdo->prepare("$sqla");
  $reponse->execute(); 
  
  }
	 
	 ?>  
		  
		  
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>Numéro_contrat</th>
            <th>Numéro_cotation</th>
			<th>Date</th>
			 <th>Objet_contrat</th>
           
             
			 <th>Fours_Choisi</th>
			  <th>Saisir_Cotation</th>
			  <th>Classement</th> 
			  <th>Membre</th>
			  
            </tr>
        </thead>
        <tbody>
            
        
		  
		   
		    <?php $cpt=0;   foreach  ($conn->query($sqla) as $pointer5) {  $cpt++;
			
			$num_contrat=$pointer5['num_contrat'];
			$id_cotation=$pointer5['id_cotation'];

$req3=$pdo->prepare("select * from cotation_fours where id_cotation='$id_cotation' and rang_fours='1' ");
		$req3->execute();
		$pointer6=$req3->fetch();
		  $id_titulaire=$pointer6['id_titulaire'];
		  
		  
		  $req4=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'   ");
		$req4->execute();
		$pointer7=$req4->fetch();
		  $id_titulaire=$pointer7['id_titulaire'];
		  
		   $req5=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'   ");
		$req5->execute();
		$pointer8=$req5->fetch();
		
		
		  



			?> 
         
   
  
		
  	
    
 
	
          <tr>
		   
                  
         <td style="font-family:tahoma;font-weight:bold;"> <?php  echo $pointer5['num_contrat']; ?>  </td>
                  
           
 
               <td ><?php echo $pointer5['id_cotation']  ?></td>
              
             
			   <td >
			    <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
			   <?php echo $pointer8['date_contrat']  ?></td>
			  
			   <td >
			    <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
			   <?php echo $pointer8['objet_contrat']  ?></td>
	 
               
	       <td >
		      <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
		   <?php echo $pointer7['nom_titulaire']  ?></td>
		   
		   
		 <td>
 
	<button ><a onclick="return confirm('Voulez vous vraiment ajouter une cotation ?')"   href="cotation.php?num_contrat=<?php echo($pointer5['num_contrat']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php  echo($pointer5['id_cotation']) ?>&choix=addCotation&back"> <i class="glyphicon glyphicon-plus"></i> </a></button>
			  	  
		   
		</td>   
		   
		   
				
				<td>
		   <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
			     <button  data-toggle="modal" data-target="#myModal<?=$pointer5['id_cotation'];?>" ><i class="glyphicon glyphicon-eye-open"></i></button>
				 
				 
				 
	






		    
	  


 <div id="myModal<?=$pointer5['id_cotation'];?>" class="modal fade" role="dialog">
	
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
		   
		   $id_cotation=$pointer5['id_cotation'];
 $rq= "SELECT  * FROM cotation_fours where id_cotation='$id_cotation' ORDER BY rang_fours";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   $cpt=0;
   $num_contrat=$pointer5['num_contrat'];
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
  
</div>	
			
	 
				 
				 
				 
              </td> 
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			 <td>
		   <input  name="cpt" type="hidden"  value="<?php echo $cpt ?>">
			     <button  data-toggle="modal" data-target="#MyModal<?=$pointer5['id_cotation'];?>" ><i class="glyphicon glyphicon-eye-open"></i></button>
				 
				 
				 
	






		    
	  


 <div id="MyModal<?=$pointer5['id_cotation'];?>" class="modal fade" role="dialog">
	
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
		   
		   $id_cotation=$pointer5['id_cotation'];
 $rq= "SELECT  * FROM membre where id_cotation='$id_cotation' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   
  
   
  ?>
  
  
   
       
	        <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div> 
		  <tr class="tr-table" colspan="8"><center>
		  
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Liste des membre d'audience </h2></center></tr>
		  <br/>
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Type_Membre</th>
            <th>Nom</th>
			<th>Prénom</th>
			<th>Fonction</th>
			<th>Supprimer</th>
			   
          </tr>
		  
		   <?php    foreach ($data_reponse as $data_reponse1 ) { 
          
    	   
  ?> 
 
  
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_reponse1['type_membre'] ?></td>
              <td>
			  
			  
			  <?php echo $data_reponse1['nom_membre'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_reponse1['prenom_membre'] ?> </td>
			  
			   <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_reponse1['fonction_membre'] ?> </td>
			  
			  
<td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delMembre&code_membre=<?php echo($data_reponse1['code_membre']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php echo $id_cotation ?>&num_contrat=<?php echo $num_contrat ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			   		   
                  
        </tr> 
		<?php } ?>       
      </table> 
      </div>
  
   </div> 

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
               <th>Numéro_contrat</th>
            <th>Numéro_cotation</th>
			<th>Date</th>
			 <th>Objet_contrat</th>
           
             
			 <th>Fours_Choisi</th>
			  <th>Saisir_Cotation</th>
			  <th>Classement</th> 
			  <th>Membre</th>
			  
            </tr>
        </tfoot>
    </table>
	
	
	  <?php  }  elseif($choix=="listePj"){ ?>	
  

  
   
   
   
   
 
	  <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 style='font-family:Tahoma; font-size:18px' class="btn btn-primary btn-block">Liste des contrats avec pièces justificatives  </h1>
   
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


    $sql=" select * FROM user where id2='$id2' ";	 
   
 $reponseaa = $pdo->prepare("$sql");
  $reponseaa->execute(); 
  $reponse_dataa=$reponseaa->fetch();
  $type_compte=$reponse_dataa['type_compte'];
  
  
  
  
   if($type_compte=='administrateur'){
	  
	   $sql= "SELECT  * FROM contrat  ";	 
   
 $reponse = $pdo->prepare("$sql");
  $reponse->execute(); 
  }else{
  
   $sql= "SELECT  * FROM contrat where id2='$id2' ";	 
   
 $reponse = $pdo->prepare("$sql");
  $reponse->execute(); 
  
  }
  
  
  
  
  
  
  
  
	 
	 ?>  
	 
	 
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>Numéro_contrat</th>
            <th>Date</th>
			<th>Objet_contrat</th>
			 <th>Ajouter_Piece</th>
            
             
			 <th>Voir_Pièce</th>
			  
            </tr>
        </thead>
        <tbody>
            
          
		   
		  
	



  <?php  foreach  ($conn->query($sql) as $pointer5) { 
			
			 


			?> 	
		   
	
	
          <tr>
		  
              <td style="font-family:tahoma;font-weight:bold;">
                 
              
                  
                     <?php  echo $pointer5['num_contrat']; ?>
                  
                  
                  

                  
         <!-- FIN DU WHILE -->          
              </td>
             
 
               <td ><?php echo $pointer5['date_contrat']  ?></td>
              
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $pointer5['objet_contrat'] ?></td>
			  
		 <td ><button ><a onclick="return confirm('Voulez vous vraiment ajouter des pièces justificatifs ?')"   href="p_j.php?num_contrat=<?php echo($pointer5['num_contrat']) ?>&id2=<?php echo $id2 ?>"> <i class="glyphicon glyphicon-paperclip"></i> </a></button></td>
			 	  
              <td>  
	   
	                        
	 
	<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?=$pointer5['num_contrat'];?>" >Voir</button>
			    
	  


 <div id="myModal<?=$pointer5['num_contrat'];?>" class="modal fade" role="dialog">
	
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
		   
		   $num_contrat=$pointer5['num_contrat'];
 $rq= "SELECT  * FROM piece_jointe where num_contrat='$num_contrat' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   $cpt=0;
   $num_contrat=$pointer5['num_contrat'];
   $rq_contrat= "SELECT  * FROM contrat where num_contrat='$num_contrat'  ";	 
  
 $reponse_contrat = $pdo->prepare("$rq_contrat");
  $reponse_contrat->execute();
  $data_reponse_contrat=$reponse_contrat->fetch(); 
  
   
  ?>
  
  
   
       
	        <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div> 
		  <tr class="tr-table" colspan="8"><center>
		   
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Liste des pièces justificatives pour le contrat numero  <?php echo $pointer5['num_contrat'] ?>  </h2></center></tr>
		  <br/>
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Type</th>
            <th>N°_Reference</th>
			<th>Photo</th> 
			<th>N°_Contrat</th>
			<th>Supprimer</th>
			 
			   
          </tr>
		  
		   <?php    foreach ($data_reponse as $data_reponse1 ) { 
          
    	   
  ?> 
 
  
        <tr>
		          <?php $num="/Contrats_generes/PIECES_JUSTIFICATIFS/".$data_reponse1['num_contrat'] ?>
				  <td> <?php echo $data_reponse1['nom_piece']  ?></td>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_reponse1['num_ref'] ?></td>
              
<td> <a href="<?php echo $num.'/'.$data_reponse1['photo']  ?>" target='fenlmage' onClick='creerFenImage()' /> <?php echo "<img class=i alt=copi  style='width: 50px; height: 40px;'   src='".$num.'/'.$data_reponse1['photo']."'/>";  ?></a>
                  </td>
							
           <td style="font-family:tahoma;font-weight:bold;" > <?php echo $data_reponse1['num_contrat'] ?></td>
          		   
             <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delPiece&code_pj=<?php echo($data_reponse1['code_pj']) ?>&id2=<?php echo $id2 ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			      
        </tr> 
		<?php } ?>       
      </table> 
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
                 <th>Type</th>
            <th>N°_Reference</th>
			<th>Photo</th> 
			<th>N°_Contrat</th>
			<th>Supprimer</th>
            </tr>
        </tfoot>
    </table>  
   
   
   
   
   
  
  
  
  
  
 
	
	 <?php  }    ?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   
   
   
   
   
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
