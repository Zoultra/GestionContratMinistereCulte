 <?PHP 
require'connexion.php';
 
          require_once('connexion.php');
		  if(isset($_GET['id2'])){
		  $id2=$_GET['id2'];}
		  
		   
  
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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
<body  >







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









 


<div style="margin-top: 75px;">
 
  

  
   <?php 
  if(isset($_GET['choix']))
	  $choix=$_GET['choix'];
	  if($choix=="private"){     
		                       
		  
	  ?>
	  
 
	
  <div class="container-fluid mainbg">
    <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
    <h1 style='font-family:Tahoma; font-size:18px' class="btn btn-primary btn-block">Mes contrats</h1>
   
    <br>
    <br>
	
	 <center><?php if(isset($_GET['msg_sup_cont'])){?><div class='alert alert-success center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_GET['msg_sup_cont']; unset($_GET['msg_sup_cont']);} ?>
		               </B></div><br/>
					   <?php }?>
		  </center>
	
    </div>
 
<div class="row col-md-12 col-md-offset-0">  
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NUM_CONTRAT</th>
            <th>DATE_CONTRAT</th>
			<th>OBJET_DEPENSE</th>
			<th>PROGRAMME</th>
            
             
			 <th>MONTANT</th>
           
            
             <th>PREST/FOURS</th>
			  <th>PRODUITS</th>
			  
			 <th>GENERER</th>
			     <th>MODIFIER</th> 
			  <th>SUP</th>
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
      $sql= "SELECT  * FROM contrat where id2='$id2' ORDER BY num_contrat DESC ";	 
       foreach  ($conn->query($sql) as $data) { 
	
	 $id2=$data['id2'];
		$req1=$pdo->prepare("select * from user where id2='$id2'");
		$req1->execute();
		$pointer2=$req1->fetch();
		  $id2=$pointer2['id2'];
		  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  
		  
		  
		   $num_contrat=$data['num_contrat'];
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
	
	
	 $id_titulaire=$data['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
	?>
          <tr>
              <td>
                 
                      <B><?php echo $data['num_contrat'];?></B>
                 
                  
                  <div id="myModal<?=$data['num_contrat'];?>" class="modal fade" role="dialog">
	
 <!-- DEBUT DE WHILE-->
	
	
				  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
            DETAIL : <?php echo $data['date_contrat'];?>   <?php echo $data['delai_execution'];?>   <?php echo $data['num_contrat'];?>
        </h3>
      </div>
      <div class="modal-body">
          
	  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block btn-xs" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

                  
         <!-- FIN DU WHILE -->          
              </td> 
               <td ><?php echo $data['date_contrat'] ?></td> 
			   <td ><?php echo $data['objet_contrat'] ?></td> 
			    <td ><?php echo $data['identifiant'] ?></td>
			   <td><?php echo $data['total_ttc'].' '.'FCFA' ?></td>  
			  <td><?php echo $pointer3['nom_titulaire'] ?></td>
			 <?php    
		$verif2=$pdo->prepare("select * from cotation_contrat where num_contrat='$num_contrat'");
		$verif2->execute();
		$pointer6=$verif2->fetch();
		 $id_cotation=$pointer6['id_cotation'];  
		  
		  ?>   
		  <td>
		  
	<button data-toggle="modal" data-target="#MyModal<?=$data['num_contrat'];?>" ><i class="glyphicon glyphicon-eye-open"></i></button>



      <div id="MyModal<?=$data['num_contrat'];?>" class="modal fade" role="dialog">
	
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
		   
		   $num_contrat=$data['num_contrat'];
 $rq= "SELECT  * FROM produit_contrat where num_contrat='$num_contrat' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   
  
   
  ?>
  
  
   
       
	        <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div> 
		  <tr class="tr-table" colspan="8"><center>
		  
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Liste des produits </h2></center></tr>
		  <br/>
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Désignation:</th>
            <th>Quantité </th>
            <th>Prix Unitaire:</th> 
			 <th>Supprimer</th>
			   
          </tr>
		  
		   <?php    foreach ($data_reponse as $data_reponse1 ) { 
          
    	   
  ?> 
 
  
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_reponse1['designation'] ?></td>
              <td>
			  
			  
			  <?php echo $data_reponse1['quantite'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_reponse1['prix_unitaire'] ?> </td>
			  
			   <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delPro&num_contrat=<?php echo($data['num_contrat']) ?>&id2=<?php echo $id2 ?>&code_produit=<?php echo($data_reponse1['code_produit']) ?>&fonction=<?php echo $fonction ?>&id_titulaire=<?php echo $id_titulaire ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
	 
			  
                   
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
			  
			    
			  <td> 
					 
			       <button  ><a data-toggle="modal" data-target="#<?php echo($data['num_contrat']) ?>"><i class="glyphicon glyphicon-save"></i></a></button>
			    







  
 <!-- DEBUT ALERT  -->
 
   
   
<div id="<?php echo($data['num_contrat']) ?>" class="modal fade" role="dialog">


 
 
 <?php   
 
   
        $id2=$data['id2'];
		$req1=$pdo->prepare("select * from user where id2='$id2'");
		$req1->execute();
		$pointer2=$req1->fetch();
		$id2=$pointer2['id2'];
		$nom_user=$pointer2['nom_user'];
		$prenom_user=$pointer2['prenom_user'];
		  
		   $id_titulaire=$data['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
	
		   $num_contratp=$data['num_contrat'];
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contratp'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
		  $num_alert=$pointer4['num_contrat']; 
		  $total_ttc_verif = $pointer4['total_ttc']; 
		  
		    $num_contrat_verif=$num_alert;
		$verif3=$pdo->prepare("select * from membre where id_cotation='$id_cotation'");
		$verif3->execute();
		$pointer7=$verif3->fetch();
		  
		  
		 
		  
		  
    
  ?>  
 
 
 
 

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
	   <?php if($total_ttc_verif==0){?> <p style="color:red;">Veuillez completer les documents.</p> <?php } else{?>
	       <?php if($total_ttc_verif>500000) {?>
	       <button type="submit" name="b" class="mybtn mybtn-success" onclick='window.location.href="../../contrat_a_1.1/v1/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>"'>
		   
	
    <a href="../../contrat_a_1.1/v1/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>">		
		</a>Contrat	   
		   
		  </button>
		   <?php }else{?><?php }?>
		  
		 <?php if(!empty($pointer7['id_cotation'])) {?>
   <button type="button" name="submit" class="mybtn mybtn-primary" onclick='window.location.href="../../contrat_a_1.1/v2/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>&id_cotation=<?php echo $id_cotation; ?>";'>
		  
   <a href="../../contrat_a_1.1/v2/examples/index.php?chargement&num_contrat=<?php echo $num_alert; ?>&id_cotation=<?php echo $id_cotation; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>">		
		</a>Cotation
		   
		   </button>  
		
		  <?php }else{?> <p style="color:red;font-size:15px;">Veuillez choisir les memtres de la cotation et fixer les horaires pour generer la cotation.</p> <?php }?>
		  
		  		 <?php }?>   
    </center><br/>
       
    </div>

  </div>
  
</div>
 

 
  <!-- FIN ALERT -->


























				
			  </td>
			   
			 <td ><button ><a onclick="return confirm('Voulez vous vraiment modifier ?')"   href="modifier_contrat.php?num_contrat=<?php echo($data['num_contrat']) ?>&id_titulaire=<?php echo($pointer3['id_titulaire']) ?>&id2=<?php echo $id2 ?>&fonction=<?php echo $fonction ?>&id_cotation=<?php echo $id_cotation; ?>"> <i class="glyphicon glyphicon-edit"></i> </a></button></td>
			  
			  <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delc&num_contrat=<?php echo($data['num_contrat']) ?>&id_titulaire=<?php echo($pointer3['id_titulaire']) ?>&id2=<?php echo $id2 ?>&id_cotation=<?php  echo($pointer6['id_cotation']) ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png"/></a></button></td>
			    		
			  
                </tr>  
            
    <?php  }  ?>
                 
               
        </tbody>
        <tfoot>
            <tr>
                <th>NUM_CONTRAT</th>
            <th>DATE_CONTRAT</th>
			<th>OBJET_DEPENSE</th>
            <th>PROGRAMME</th>
             
			 <th>MONTANT</th>
           
            
             <th>PREST/FOURS</th>
			  <th>PRODUITS</th>
			  
			    <th>GENERER</th> 
			  <th>MODIFIER</th>
			  <th>SUP</th>
            </tr>
        </tfoot>
    </table>
      
    <?php 
    if(!empty($_POST['deleteData'])){
   $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
 try{
     $id=$_POST['id_patient'];
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM patient WHERE id_patient='$id'";
    // use exec() because no results are returned
                /* @var $conn type */
    $ok= $conn->exec($sql);
    echo'<script>window.open("patient.php","_self")</script>';
 } catch (PDOException $e){
     echo $e;
     
 }
    
       }
    ?>
    
    <br/>
    <br/>
    <br/>
</div>  
</div>  
    
	
	
	<div class="row col-md-12 col-md-offset-1">
  
   <?php } ?>
  
   <?php 
  
	  if($choix=="public"){
		   
  ?>
  
    
   <div class="container-fluid mainbg">
    <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
    <h1 style='font-family:Tahoma; font-size:18px' class="btn btn-primary btn-block">Livre journal des contrats</h1>
   
    <br>
    <br>
	
    </div>
 
  
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NUM_CONTRAT</th>
            <th>DATE_CONTRAT</th>
			<th>OBJET_DEPENSE</th>
			<th>PROGRAMME</th>
            
             
			 <th>MONTANT</th>
           
            
             <th>PREST/FOURS</th>
			  <th>PRODUITS</th>
			 <th>GENERER</th>
			   <!--    <th>MODIFIER</th>  -->
			  <th>SUP</th>
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
    $sql= "SELECT  * FROM contrat  ORDER BY num_contrat DESC ";	 
    foreach  ($conn->query($sql) as $data) { 
	
	 $id2=$data['id2'];
		$req1=$pdo->prepare("select * from user where id2='$id2'");
		$req1->execute();
		$pointer2=$req1->fetch();
		  $id2=$pointer2['id2'];
		  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  
		  
		  
		   $num_contrat=$data['num_contrat'];
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
	
	
	 $id_titulaire=$data['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
	?>
          <tr>
              <td>
                 
                      <B><?php echo $data['num_contrat'];?></B>
                 
                  
                  <div id="myModal<?=$data['num_contrat'];?>" class="modal fade" role="dialog">
	
 <!-- DEBUT DE WHILE-->
	
	
				  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
            DETAIL : <?php echo $data['date_contrat'];?>   <?php echo $data['delai_execution'];?>   <?php echo $data['num_contrat'];?>
        </h3>
      </div>
      <div class="modal-body">
          
	  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block btn-xs" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

                  
         <!-- FIN DU WHILE -->          
              </td>
             
 
               <td ><?php echo $data['date_contrat'] ?></td>
			   <td ><?php echo $data['objet_contrat'] ?></td> 
			   <td ><?php echo $data['identifiant'] ?></td>
			   <td><?php echo $data['total_ttc'].' '.'FCFA' ?></td>  
			  <td><?php echo $pointer3['nom_titulaire'] ?> <input name="tel_titulaire" value="<?php echo $pointer3['tel_titulaire'] ?>" type="hidden"    placeholder="Image du document"  class="form-control validate[required]" />
		</td>
		
		 <td>
		  
	<button data-toggle="modal" data-target="#MyModal<?=$data['num_contrat'];?>" ><i class="glyphicon glyphicon-eye-open"></i></button>



      <div id="MyModal<?=$data['num_contrat'];?>" class="modal fade" role="dialog">
	
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
		   
		   $num_contrat=$data['num_contrat'];
 $rq= "SELECT  * FROM produit_contrat where num_contrat='$num_contrat' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  $data_reponse=$reponse->fetchAll(); 
  
   
  
   
  ?>
  
  
   
       
	        <table  class="table table-striped table-bordered">
	 <div class="row col-md-1 col-md-offset-0">
  
				  
                 </div> 
		  <tr class="tr-table" colspan="8"><center>
		  
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-success btn-block">Liste des produits </h2></center></tr>
		  <br/>
		   
          <tr style="font-family:tahoma;font-weight:bold;font-size:15px;" class="tr-table">
            
            <th>Désignation:</th>
            <th>Quantité </th>
            <th>Prix Unitaire:</th> 
			 <th>Supprimer</th>
			   
          </tr>
		  
		   <?php    foreach ($data_reponse as $data_reponse1 ) { 
          
    	   
  ?> 
 
  
        <tr>
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $data_reponse1['designation'] ?></td>
              <td>
			  
			  
			  <?php echo $data_reponse1['quantite'] ?>
			  
			  </td>
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $data_reponse1['prix_unitaire'] ?> </td>
			  
			   <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delPro&num_contrat=<?php echo($data['num_contrat']) ?>&id2=<?php echo $id2 ?>&code_produit=<?php echo($data_reponse1['code_produit']) ?>&fonction=<?php echo $fonction ?>&id_titulaire=<?php echo $id_titulaire ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
	 
			  
                   
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
			 
			 
			  <td> 
					 
			       <button  ><a data-toggle="modal" data-target="#<?php echo($data['num_contrat']) ?>"><i class="glyphicon glyphicon-save"></i></a></button>
		


 





  
 <!-- DEBUT ALERT  -->
 
   
   
<div id="<?php echo($data['num_contrat']) ?>" class="modal fade" role="dialog">


 
 
 <?php   
 
   
        $id2=$data['id2'];
		$req1=$pdo->prepare("select * from user where id2='$id2'");
		$req1->execute();
		$pointer2=$req1->fetch();
		$id2=$pointer2['id2'];
		$nom_user=$pointer2['nom_user'];
		$prenom_user=$pointer2['prenom_user'];
		  
		   $id_titulaire=$data['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
	
		   $num_contratp=$data['num_contrat'];
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contratp'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
		  $num_alert=$pointer4['num_contrat']; 
		  $total_ttc_verif=$pointer4['total_ttc'];
		  
		    $num_contrat_verif=$num_alert;
		$verif3=$pdo->prepare("select * from cotation_contrat where num_contrat='$num_contrat_verif'");
		$verif3->execute();
		$pointer7=$verif3->fetch();
		 $id_cotation=$pointer7['id_cotation'];  
		  
		 
		  
		  
    
  ?>  
 
 
 
 

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
	    <?php if($total_ttc_verif>500000) {?>
	       <button type="submit" name="b" class="mybtn mybtn-success" onclick='window.location.href="../../contrat_a_1.1/v1/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>"'>
		   
	
    <a href="../../contrat_a_1.1/v1/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>">		
		</a>Contrat	   
		   
		  </button>
		   <?php }else{?>  <?php }?>
		  
		 <?php if(!empty($pointer7['num_contrat'])) {?>
           <button type="button" name="submit" class="mybtn mybtn-primary" onclick='window.location.href="../../contrat_a_1.1/v2/examples/index.php?num_contrat=<?php echo $num_alert; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>&id_cotation=<?php echo $id_cotation; ?>";'>
		  
   <a href="../../contrat_a_1.1/v2/examples/index.php?chargement&num_contrat=<?php echo $num_alert; ?>&id_cotation=<?php echo $id_cotation; ?>&id2=<?php echo $id2 ?>&id_titulaire=<?php echo ($pointer3['id_titulaire']) ?>">		
		</a>Cotation
		   
		   </button>  
		
		  <?php }else{?>  <?php }?>
		  
		  		   
    </center><br/>
       
    </div>

  </div>
  
</div>
 

 
  <!-- FIN ALERT -->




 


		
			  </td>
			 <!--     
			 <td ><button ><a onclick="return confirm('Voulez vous vraiment modifier ?')"   href="modifier_contrat.php?num_contrat=<?php echo($data['num_contrat']) ?>&id_titulaire=<?php echo($pointer3['id_titulaire']) ?>&id2=<?php echo $id2 ?>&fonction=<?php echo $fonction ?>"> <i class="glyphicon glyphicon-edit"></i> </a></button></td>
			  -->
			  <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delc&num_contrat=<?php echo($data['num_contrat']) ?>&id2=<?php echo $id2 ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png"/></a></button></td>
			    		
			  
                </tr>  
            
    <?php  }  ?>
                 
               
        </tbody>
        <tfoot>
            <tr>
                <th>NUM_CONTRAT</th>
            <th>DATE_CONTRAT</th>
			<th>OBJET_DEPENSE</th>
            <th>PROGRAMME</th>
             
			 <th>MONTANT</th> 
             <th>PREST/FOURS</th>
			  <th>PIECE_JOINTE</th>
			 <th>GENERER</th>
			 <!--    <th>MODIFIER</th>  -->
			  <th>SUP</th>
            </tr>
        </tfoot>
    </table>
      
    <?php 
    if(!empty($_POST['deleteData'])){
   $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
 try{
     $id=$_POST['id_patient'];
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM patient WHERE id_patient='$id'";
    // use exec() because no results are returned
                /* @var $conn type */
    $ok= $conn->exec($sql);
    echo'<script>window.open("patient.php","_self")</script>';
 } catch (PDOException $e){
     echo $e;
     
 }
    
       }
    ?>
    
    <br/>
    <br/>
    <br/>
	

</div>  
   
   
   
  
	  <?php } elseif($choix=="rech"){
		    
		  $search=trim($_POST['search']);
		  $id2=$_GET['id2'];
		  
		  ?>
	  
	  
  
 

 
 
 
 
 
 
 
 
 
 
  			 
	  
	  
	  
  <div class="tab-content" role="tablist">  
   <center>   
   <div class="col-md-18"> 
        <div class="input-group">		 
	 <form class="form-inline mt-2 mt-md-0" method="POST" action="liste_contrat.php?id2=<?php echo $id2 ?>&choix=rech">
   <input class="form-control mr-sm-2" type="text" name="search" placeholder="Recherche..." aria-label="Search"> <br/><br/>
    
            <button class="btn btn-default dropdown-toggle"   type="submit">Rechercher</button> 
          </form> 
		   </div>  
		    </div> 
			</center>    
    <div class="tab-pane active" id="home" role="tabpanel">
       
          <?php 
         
		 
 
      if(!empty($search)){
		  
		  $telephone=substr($search,0,2).'-'.substr($search,2,2).'-'.substr($search,4,2).'-'.substr($search,6,2);
				
						
		$reqrech=$pdo->prepare("select * from contrat where id2='$id2' AND (num_contrat like '$search%' or date_contrat like '$search%' or id_titulaire IN ( select id_titulaire from titulaire where 
		
		 tel_titulaire like '$search%' or tel_titulaire like '$telephone%' or nom_titulaire like '%$search%' or representant_titulaire  like '$search%'   ))  
		  
           	");
			$reqrech->execute();
			
		$reqrech1=$pdo->prepare("select * from contrat where id2='$id2' AND (num_contrat like '$search%' or date_contrat like '$search%' or id_titulaire IN ( select id_titulaire from titulaire where 
		 tel_titulaire like '$search%' or tel_titulaire like '$telephone%' or nom_titulaire like '%$search%' or representant_titulaire  like '$search%'   ))  
		  
           	");
		    $reqrech1->execute();
		
		$data_verif=$reqrech1->fetch();
		if(empty($data_verif)){
			 $_SESSION['echec']="Contrat introuvable, veuillez verifier vos données.(' _ ')"; 
		}else{  $_SESSION['success']="Contrat retouvé.(' _ ')";}
		
		
		
		    
		
	  }else{
		       $reqrech=$pdo->prepare("select * from contrat where id2='00000000' 
			  
           	");
		$reqrech->execute();
		
		 $_SESSION['error']="Contrat introuvable veuillez saisir dans le champ de recherche.(' _ ')";
			  
  
	  }
		  
   
  
   
  ?>
  
 
    
        <div class="col-md-18">
     
   
		 
          
		  
		   <table class="table table-striped table-bordered">
		    <div class="row col-md-1 col-md-offset-0">
  
				  <button   type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'  class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a  class="return"   href="#"><i class="glyphicon glyphicon-arrow-left">&nbsp;Retour</i></a></span>
				  </button>
                 </div><br/>
		    <tr class="tr-table" colspan="8">
		   <br/>
		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-primary btn-block">Liste contrats recherchés</h2></center></tr>
		  <br/>
		  </tr>
          <tr style="text-decoration:underline"  class="tr-table">
            <th >NUM_CONTRAT</th>
            <th>DATE_CONT</th>
            <th>PREST/FOURS</th>
             <th>OBJET_DE_DEPENSE</th>
			 
            <th>SERVICE_BENEF</th>
            
             <th>MONTANT</th>
			 <th>GENERER</th>
			<!--    <th>MODIF</th>  -->
			  <th>SUP</th> 
          </tr>
		  
		  <center><?php if(isset($_SESSION['error'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['error']; unset($_SESSION['error']);} ?>
		               </B></div><br/>
					   <?php }?>
		  </center>
          <center><?php if(isset($_SESSION['echec'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['echec']; unset($_SESSION['echec']);} ?>
		               </B></div><br/>
					   <?php }?>
		  </center> 
		  
		   <center><?php if(isset($_GET['msg_sup_cont'])){?><div class='alert alert-success center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_GET['msg_sup_cont']; unset($_GET['msg_sup_cont']);} ?>
		               </B></div><br/>
					   <?php }?>
		  </center>
		 
  <?php  
      
              	  while($pointerrech=$reqrech->fetch()) { 
				
	    
		  $id2=$_GET['id2'];
 $rq= "SELECT  * FROM contrat  where id2='$id2'  ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
	 $data1=$reponse->fetch();
	 
	  $id2=$data1['id2'];
		$req1=$pdo->prepare("select * from user where id2='$id2'");
		$req1->execute();
		$pointer2=$req1->fetch();
		  $id2=$pointer2['id2'];
		  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  
		   $id_titulaire=$pointerrech['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
		  
		   $num_contrat=$pointerrech['num_contrat'];
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
	 
	 
				  
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
  ?> 
  
   <center><?php if(isset($_SESSION['success'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['success']; unset($_SESSION['success']);} ?>
		               </B></div><br/>
					   <?php }?>
		  </center>
            <tr>
			
			   <td ><B><?php echo $pointerrech['num_contrat'] ?></B></td>
               <td ><B><?php echo $pointerrech['date_contrat'] ?></B></td>
               <td ><B><?php echo $pointer3['nom_titulaire'] ?></B></td>
			   <td ><B><?php echo $pointerrech['objet_contrat'] ?></B></td>
               
			   
               <td ><B><?php echo $pointerrech['service_benef'] ?></B></td>
              
			  <td ><B><?php echo $pointerrech['total_ttc'].' '.'FCFA' ?></B></td>
			   <td> 
					 
			       <button  ><a data-toggle="modal" data-target="#<?php echo($pointerrech['num_contrat']) ?>"><img style="width: 25px; height: 20px;" src="img/png/generer.png" /></a></button>
			   
      
			  </td>
			  <!--   
			    <td ><button ><a onclick="return confirm('Voulez vous vraiment modifier ?')"   href="modifier_contrat.php?num_contrat=<?php echo($pointerrech['num_contrat']) ?>&id_titulaire=<?php echo($pointer3['id_titulaire']) ?>&id2=<?php echo $id2 ?>&fonction=<?php echo $fonction ?>"> <i class="glyphicon glyphicon-edit"></i> </a></button></td>
			  -->
			  <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delc&num_contrat=<?php echo($pointerrech['num_contrat']) ?>&id2=<?php echo $id2 ?>"><img style="width: 25px; height: 20px;" src="img/png/rejetter.png" /></a></button></td>
			  
                   
        </tr> 
		<?php } ?>    
	  		 
      </table>
 
		  
		 
     
	   </div>
	  
	
	   
	 
	
 </div>
  
   </div>
 
  
  
   
   
   
   <?php }elseif($choix=="ajoutFoursSingle"){  $num_contrat=$_GET['num_contrat'];?>
   
   
   
    <div class="container mainbg">
    <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Choix du fournisseur pour le contrat N°&nbsp;<?php echo $num_contrat;?></h1>
   
    <br>
    <br>
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
             
			 <th>Choix_Fours</th>
			  
            </tr>
        </thead>
        <tbody>
            
          <?php
   $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

		   if(isset($_GET['add'])){
			    $num_contrat=$_GET['num_contrat'];
				$id_titulaire1=$_GET['id_titulaire'];
			   $rq1=$pdo->prepare('UPDATE contrat SET id_titulaire=?WHERE(num_contrat=?)');
	$params=array($id_titulaire1,$num_contrat);
	$rq1->execute($params);
	  $_SESSION['ajoutFours']="Contrat";
		   }elseif(isset($_GET['update_c'])){
			    $num_contrat=$_GET['num_contrat'];
				$id_titulaire1="undifinied";
			   $rq1=$pdo->prepare('UPDATE contrat SET id_titulaire=?WHERE(num_contrat=?)');
	$params=array($id_titulaire1,$num_contrat);
	$rq1->execute($params);
	  $_SESSION['ajoutFours']="Contrat";
		   }
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
  
$id2=$_GET['id2'];
    $sql= "SELECT  * FROM titulaire   ";	 
    foreach  ($conn->query($sql) as $pointer5) { 
	$nom_titulaire=$pointer5['nom_titulaire'];
	 
		  
		  
		  $num_contrat=$_GET['num_contrat'];
		   
		$req3=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req3->execute();
		$pointer4=$req3->fetch();
		  $fonction=$pointer4['fonction'];
		  
		  
		  
	 
		   
	?>
	
          <tr>
		  
              <td style="font-family:tahoma;font-weight:bold;">
                 
                     <?php echo $pointer5['nom_titulaire'] ?>
                 
                  
                  <div id="myModal<?=$pointer5['id_titulaire'];?>" class="modal fade" role="dialog">
	
 <!-- DEBUT DE WHILE-->
	
	
				  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
            DETAIL : <?php echo $pointer5['nom_titulaire'];?>   <?php echo $data['nom_titulaire'];?>   <?php echo $data['nom_titulaire'];?>
        </h3>
      </div>
      <div class="modal-body">
          
	   
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block btn-xs" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

                  
         <!-- FIN DU WHILE -->          
              </td>
             
 
               <td ><?php echo $pointer5['representant_titulaire'] ?></td>
              
              <td style="font-family:tahoma;font-weight:bold;" ><?php echo $pointer5['tel_titulaire'] ?></td>
			  <td><?php echo $pointer5['num_compte_banque'] ?></td>
			   <td><?php echo $pointer5['nom_banque'] ?></td> 
              <td>  
		<?php  if(isset($_GET['id_titulaire'])){?>
		  <?php  if($pointer5['id_titulaire']==$id_titulaire1){?>   
	 <i style="color:green;font-size:25px;" class="glyphicon glyphicon-ok"></i>                              
			    <?php }else{ ?>
				<button class="btn btn-primary btn-xs" ><a onclick="return confirm('Voulez vous vraiment choisir<?php echo $nom_titulaire ?> pour le contrat numéro<?php echo $num_contrat ?> ?')"   href="liste_contrat.php?choix=ajoutFoursSingle&id2=<?php echo $id2 ?>&add&id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>&num_contrat=<?php echo $num_contrat ?>"><p style="color:white;height:22px;margin:auto;font-size:18px" >Choisir</p></a></button>  
	
				<?php }?> 
	<?php }else{ ?>
	<button class="btn btn-primary btn-xs" ><a   onclick="return confirm('Voulez vous vraiment choisir<?php echo $nom_titulaire ?> pour le contrat numéro<?php echo $num_contrat ?> ?')"   href="liste_contrat.php?choix=ajoutFoursSingle&id2=<?php echo $id2 ?>&add&id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>&num_contrat=<?php echo $num_contrat ?>"><p style="color:white;height:22px;margin:auto;font-size:18px" >Choisir</p></a></button>
			    
	
	<?php }?> 		
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
             
			 <th>Choix_Fours</th>
			  
            </tr>
        </tfoot>
    </table>
      
    <?php 
    if(!empty($_POST['deleteData'])){
   $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
 try{
     $id=$_POST['id_patient'];
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM patient WHERE id_patient='$id'";
    // use exec() because no results are returned
                /* @var $conn type */
    $ok= $conn->exec($sql);
    echo'<script>window.open("patient.php","_self")</script>';
 } catch (PDOException $e){
     echo $e;
     
 }
    
       }
    ?>
    
    <br/>
    <br/>
    <br/>
	

</div>  
   
   
   
   
   
   
   
   
   
   
   
   
    <?php }?>
	 
 </div>
 
 
 
  
  
 
 
 

  
    

</div>
		
                           
 
 
    
    
  
           

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
 <br/><br/><br/><br/> <br/> <br/> <br/> <br/> <br/>  
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>  
