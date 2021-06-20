 <?php
	require('connexion.php'); 
		  $id2=$_GET['id2'];  
		   
		   
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
  <script src="js/bootstrap.min.js"></script>
   <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">

   

      <script src="js/jquery-1.11.3.min.js"></script>
     
  </head>
  
  
   
  
  
  
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

                <h2 class="h1_title">Gestion de contrat</h2>

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
				  <button   type="button" onclick='window.location.href="#";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"   href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				  
				 
             </div>

        </div>

    </div>

</div> 
   
   
   
   
   
   
   
   
    </header>
  
<body>



<div class="container-fluid mainbg">
 
<br><div class="btn-group">
<button aria-haspopup="true" class="btn btn-default dropdown-toggle" type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'  class="btn btn-primary" >
   <a class="return" href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>
   </button>
   </div>
    <h1 class="h1_title">Recherche avancée de contrat</h1>
  

	
	
	 <?php               
                  if (isset($_GET['msg_eng'])){?><div class='alert alert-success center' style='width: 50%; height:80px; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg_eng=$_GET['msg_eng'];?>
				 
	       </p></div> <?php }?>  


   
    <div class="row col-md-10 col-md-offset-1">

  <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="search_av.php?id2=<?php echo $id2 ?>" method="post" enctype="multipart/form-data">
	   
	   
	   
	   <div class="col-md-6"> 
	   <label class="">Date de debut: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 
		<input name="date_debut" type="date" value="<?php if(isset($_POST['date_debut'])){echo $_POST['date_debut'];} ?>" placeholder="Nom de l'entreprise" required class="form-control validate[required]" />
		 
              </div>
			   </div>
			   
			   <div class="col-md-6"> 
	   <label class="">Date de fin : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  
		<input name="date_fin" type="date" placeholder="" value="<?php if(isset($_POST['date_fin'])){echo $_POST['date_fin'];} ?>" required class="form-control validate[required]" />
		 
              </div>
			   </div> 
			     <br/><br/> 
	    <br/><br/><br/>   
	   
	  
	   <center>
	       <button type="submit"  class="mybtn mybtn-success">Réchercher</button>
              </center>
	   <br/><br/>
	   

      </form>
  
  </div>
        
  
     </div>

	 
	<?php if(isset($_POST['date_fin'])){
		
		 if($id2=="ad_ad_ad_00_00_00"){
	 $date_debut=$_POST['date_debut']; 
	 $date_fin=$_POST['date_fin'];	


	 require_once('connexion.php');
		   
		  
 $rq= "SELECT  * FROM contrat  where  date_contrat BETWEEN '$date_debut' AND '$date_fin' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
		 }else{
			 $date_debut=$_POST['date_debut']; 
	 $date_fin=$_POST['date_fin'];	


	 require_once('connexion.php');
		   
		  
 $rq= "SELECT  * FROM contrat  where  id2='$id2' AND date_contrat BETWEEN '$date_debut' AND '$date_fin' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute(); 
			 
			 
		 }

  ?>  
   
   
   
   
   
 <br/><br/><br/><br/><br/><br/>
 <div class="tab-content" role="tablist">
	
	 
  
    <div class="tab-pane active" id="home" role="tabpanel">
       
           
       
		
          <table class="table table-striped table-bordered">
		     <br/>
		  
		  
	
		   
          <tr  class="tr-table">
		     <th>NUM_CONTRAT</th>
            <th>DATE_CONTRAT</th>
			  <th>PREST/FOURS</th>
            <th>OBJET_DE_DEPENSE</th>
			 <th>PROGRAMME</th>
            <th>TOTAL_HT</th>
			<th>TVA</th>
			 <th>MONTANT</th>
            <th>SERVICE_BENEFICIAIRE</th>
            <th>GENERER</th>
           
			 
			 
			  
			   
			  
			   
			   
          </tr>
 
  <?php   while ($data=$reponse->fetch()) { 
 
   
  
		  
		   $id_titulaire=$data['id_titulaire'];
		$req2=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req2->execute();
		$pointer3=$req2->fetch();
		  $nom_titulaire=$pointer3['nom_titulaire'];
    
  ?> 
            <tr>
			   <td ><?php echo $data['num_contrat']  ?></td>
               <td ><?php echo $data['date_contrat'] ?></td>
			    <td ><?php echo $pointer3['nom_titulaire'] ?></td>
              <td ><B><?php echo $data['objet_contrat'] ?></B></td>
			   <td ><B><?php echo $data['identifiant'] ?></B></td>
              <td><?php echo $data['total_ht'].' '.'FCFA' ?></td>
			  <td ><?php echo $data['tva'].' '.'FCFA' ?></td>
			   <td ><B><?php echo $data['total_ttc'].' '.'FCFA' ?></B></td> 
               <td ><?php echo $data['service_benef'] ?></td>
              <td> 
					 
			       <button  ><a data-toggle="modal" data-target="#<?php echo($data['num_contrat']) ?>"><i class="glyphicon glyphicon-save"></i></a></button>
			         
					  
					 
					 
			  </td>
			 
			  
			   
                   
        </tr> 
		<?php } ?>       
      </table>
	  
	
	
	  
	  
 </div>
  
   </div>


 
   
		 
<?php	} ?>   
	 
	 
	 
	 
	 
	 
	 
	 
   </div>
  
 <br>
      



	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	 
					 
	 
  
 <!-- DEBUT ALERT  -->
 <?php 
          require_once('connexion.php');
		   
		  $id2=$_GET['id2'];
 $rq= "SELECT  * FROM contrat where id2='$id2'  ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  
 
   while ($data=$reponse->fetch()) {   ?>
   
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
 

 <?php    } ?>
  <!-- FIN ALERT -->				 
					 


  

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

</body><br/><br/><br/>
<footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>



 
    