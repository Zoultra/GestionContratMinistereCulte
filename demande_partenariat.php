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

                <h2 class="h1_title">Demande de Partenariat</h2>

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
   
   
 
	
  <div class="container mainbg">
    <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Liste Fournisseurs </h1>
   
    <br>
    <br>
    </div> 
 
<div class="row col-md-12 col-md-offset-0">   
      
      
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
				  
             <td><button data-toggle="modal" data-target="#p<?php echo ($pointer5['id_titulaire']) ?>"><i  class="glyphicon glyphicon-save"></i></button>
			 
			  
      <!-- DEBUT ALERT  -->
  
   
<div id="p<?php echo($pointer5['id_titulaire']) ?>" class="modal fade" role="dialog">
 
 
 <form id="formID" action="../../contrat_a_1.1/v3/examples/index.php?id_titulaire=<?php echo ($pointer5['id_titulaire']) ?>" method="post" enctype="multipart/form-data">
	 
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
                  <center > 
				  <div class="col-md-6"> </br>
              <label class=""> Reference !!! : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  	 
	            <input name="reference" type="text" placeholder="Saisir la refernce" required class="form-control validate[required]" />
            
			</div>
			   </div>
        <div class="col-md-6"> </br>
              <label class=""> Type Entreprise: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			   
               <input name="typeentreprise" type="text" placeholder="Ex: Société" required class="form-control validate[required]" />  
			</div>
			   </div>
        <div class="col-md-6"> </br>
              <label class=""> Gerant Entreprise: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			   <select name="civilite" required  class="form-control" autofocus >
                <option name="civilite"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="" selected  >Choisir Titre</option>
				<option name="civilite"  style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="Le Directeur"   >Directeur </option>
				<option name="civilite"  style="font-family:Tahoma;font-size:15px;font-weight:bold;"  value="La Directrice"  >Directrice</option>
				
				</select>
                
			</div>
			   </div>
           <div class="col-md-6"> </br>
              <label class=""> Catégorie: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			   <select name="categorie" required  class="form-control" autofocus >
                <option   style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="" selected  >Choisir Catégorie</option>
				<option   style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="fournisseurs"   >Fournisseur </option>
				<option   style="font-family:Tahoma;font-size:15px;font-weight:bold;"  value="prestataires"  >Prestataire</option>
				<option   style="font-family:Tahoma;font-size:15px;font-weight:bold;"  value="partenaire"  >Partenaire</option>
				
				</select>
                
			</div>
			   </div>
             <div class="col-md-12"> </br>
              <p style="font-size:15px;"> Informations concernant le Directeur ou la Directrice du departement </p> 
			   </div>

  <div class="col-md-6"> </br>
              <label class=""> Nom et Prénom: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			   
               <input name="nomComplet" type="text" value="Oumar DOUMBIA" placeholder="Saisir nom et prenom" required class="form-control validate[required]" />  
			</div>
			   </div>
        <div class="col-md-6"> </br>
              <label class=""> Titre: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			   <select name="titre" required  class="form-control" autofocus >
                <option   style="font-family:Tahoma;font-size:15px;font-weight:bold;" value="Le Directeur" selected  >Directeur </option>
				<option   style="font-family:Tahoma;font-size:15px;font-weight:bold;"  value="La Directrice"  >Directrice</option>
				
				</select>
                
			</div>
			   </div>
           <div class="col-md-12"> </br>
              <label class=""> Proféssion: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			    <input name="profession" type="text" value="Inspecteur des Finances" placeholder="Saisir la profession" required class="form-control validate[required]" />  
			  
			</div>
			   </div>
			   
			   </center>
        </thead>
           <tbody>
                  
               
          </tbody>
         
       </table> 
        
      </div>
	  
	   <center>
	   
	       <button type="submit" name="b" class="mybtn mybtn-success">Telecharger</button>
		  		   
    </center><br/>
       
    </div>

  </div>
  </form>
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
    
    <br/>
    <br/>
    <br/>
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
