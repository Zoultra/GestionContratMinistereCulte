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
<body  class="text-center">

 
   
   <div class="container main" style="margin-top: 100px;">
<div class="navbar navbar-default navbar-fixed-top">
<center>
    <div class="col-md-12">
      <a href="#">
          <div class="link">
           
            <div class="h4_title" ></div><span><h1><img style="width:100px; height:55px;" src="img/drapeau.png"/>Présidence de la République du Mali<img style="width:100px; height:55px;" src="img/drapeau.png"/> <br/> Gestion de contrats</h1></span>
         </div>
      </a>
    </div>
	</center>
	</div><br/><br/><br/>



 <div class="row col-md-4 col-md-offset-4">
  
 <form  class="form-signin" method="POST" action="testkey.php">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Entrez le code d'activation</h1>
      <label for="inputEmail" class="sr-only">Code d'activation</label>
      <input type="text" id="inputEmail" name="code" class="form-control" placeholder="Code d'activation" required autofocus></br>
      
       
      <button class="btn btn-lg btn-primary btn-block" type="submit">Activer</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y");?> </p>
	  
	  
    <?php  
	
                  if (isset($_GET['msgblock'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg=$_GET['msgblock'];?>
				  
	       </p></div> <?php }?>
    </form>
	 
 </div>

</div>







 <script src="js/bootstrap.min.js"></script>          
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>
 
</body>
</html>