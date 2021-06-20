 <?php
      require('connexion.php'); 
 $num_contrat= $_GET['num_contrat'];
		
if(isset($_GET['a'])){
 $num_contrat= $_POST["num_contrat"]; 
 $source_finance= $_POST["source_finance"];
$exercice= $_POST["exercice"];	  
$section= $_POST["section"];
$chapitre= $_POST["chapitre"];
$nature= $_POST["nature"];    
 

 
		  
}

   if(isset($_POST['b']) ){
		
	    $rq=$pdo->prepare('UPDATE contrat SET source_finance=?, exercice=?, section=?, chapitre=?, nature=?WHERE(num_contrat=?)');
	$params=array($source_finance,$exercice,$section,$chapitre,$nature,$num_contrat);
	$rq->execute($params);
		   header("location:produit.php?num_contrat=$num_contrat");
		  
   }
   
   $num_contrat= $_GET['num_contrat'];
	
	 $rq= "SELECT  * FROM contrat where num_contrat='$num_contrat'   ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
	  
	$data=$reponse->fetch();



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.png" />

    <title>Commandes</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

      <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/bootstrap.min.js"></script> 
     
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

                <h2 class="h1_title">Creation de contrat</h2>

           </div>

            <div class="collapse navbar-collapse nav_right">
                                          
				<div class="btn-group">
 <button   type="button" onclick='window.location.href="index.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="ndex.php"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				</div>
				<div class="btn-group">
 <button   type="button" onclick='window.location.href="titulaire.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="add_fournisseur.php">Titulaire</a></span>
				  </button>
				</div>
				<div class="btn-group">
				<button   type="button" onclick='window.location.href="imputation.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="transit.php">Imputation</a></span>
				  
				   </button>
				</div>
				<div class="btn-group">
 <button   type="button" onclick='window.location.href="dfm.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="fournisseur.php">DFM</a></span>
				  </button>
				</div>
				<div class="btn-group">
				<button   type="button" onclick='window.location.href="contrat.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="transit.php">Contrat</a></span>
				  
				   </button>
				</div>
				<div class="btn-group">
				<button   type="button" onclick='window.location.href="produit.php";' class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="transit.php">Ajouter_Produit</a></span>
				  
				   </button>
				</div>
				
				 

				
             </div>

        </div>

    </div>

</div>
   
   
    </header>
  
<body>



<div class="container mainbg">
<br> 
<a class="return" href="dfm.php"><i class="glyphicon glyphicon-arrow-left"></i>Retour</a>

    <h1 class="h1_title">Renseignement de l'imputation</h1>
      
    

   <form id="formID" action="imputation.php?a" method="post" enctype="multipart/form-data">

	<div class="container main" style="margin-top: 100px;">
<div class="row">


  
			   
			   
			   
         <div class="col-md-4">
              <label class="">Source_Financement : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="source_finance" type="text" placeholder="" class="form-control validate[required]" />
              </div>
			   </div>
			   
			   
			    <div class="col-md-4">
              <label class="">Exercice : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="exercice" type="text" placeholder="" class="form-control validate[required]" />
              </div>
			   </div>
			   
			   
			   
			    <div class="col-md-4">
              <label class="">Section : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="section" type="text" placeholder="" class="form-control validate[required]" />
              </div>
			   </div>
			      
			    
			   
			      <div class="col-md-4">
              <label class="">Chapitre : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="chapitre" type="text" placeholder="" class="form-control validate[required]" />
              </div>
			   </div>
			   
			     <div class="col-md-4">
              <label class="">Nature : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="nature" type="text" placeholder="" class="form-control validate[required]" />
				  <input name="num_contrat" type="hidden" value="<?php echo $num_contrat ?>" class="form-control validate[required]" />
              </div>
			   </div>
			   
			     
			   </div><br/><br/><br/>
			    
	
     
</div>  <br/><br/>
<center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <button type="reset" name="submit" class="mybtn mybtn-success" >Reinitialiser</button> &nbsp;&nbsp; 
             <button type="submit" name="b" class="mybtn mybtn-success">Suivant</button>
          
	</center>
</div>  <br/><br/>
       
</div>
 </form>	<br/><br/>  
  
  
  
  
 <br>
        

 


 


 <script src="js/bootstrap.min.js"></script>          
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>

</body>
</html>
 