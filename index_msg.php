 

   <?php
          
require'connexion.php'; 
 $id2=$_GET['id2']; 
 $req_add=$pdo->prepare('select * from user where id2="$id2"');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	 
		  if(isset($_GET['a'])){
		   $req_add=$pdo->prepare('select max(code_msg) from message');
			$req_add->execute();
			$pointer_add=$req_add->fetch();
	
			$num_contratp=$pointer_add['max(code_msg)']+1;
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
			
			$code_msg=$num_contratp;
		  
		  
		   
		    $nom_expedi=$_POST['nom_expedi'];
			 $date_msg=date("Y-m-d");
			  $msg=$_POST['msg'];
			  
			   $tel=$_POST['tel'];
		   $id2=$_GET['id2']; 
		  
			 
			   $req=$pdo->prepare("insert into message(id2,nom_expedi,date_msg,msg,tel,code_msg)values(?,?,?,?,?,?)");
	           $params=array($id2,$nom_expedi,$date_msg,$msg,$tel,$code_msg); 
			   $req->execute($params);
		
    $msgk='Message envoyé !!!';
	
	  
		   header("location:index.php?msgk=$msgk");  
		  
		  
		
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

 
<div class="navbar navbar-default navbar-fixed-top">
<center>
    <div class="col-md-12">
      <a href="#">
          <div class="link">
           
            <div class="h4_title" ></div><span><h1><img style="width:100px; height:70px;" src="img/drapeau.png"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SmarTech  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img style="width:100px; height:70px;" src="img/drapeau.png"/> <br/> GeCO</h1></span>
         </div>
      </a>
    </div>
	</center>
	</div>

 
 

<div class="container main" style="margin-top: 130px;">
  
<div class="row">

 
       
</div>
 <div class="clear"></div><br>


    
  
     
<div class="row col-md-12 col-md-offset-2">
  
  
  
  
  
  
  
   <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="index_msg.php?a&id2=<?php echo  $id2 ?>" method="post" enctype="multipart/form-data">
	   
	    
			   
			   <div class="col-md-7"> 
              <label class="">Nom_Prénom :<span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input name="id2" value="<?php echo $pointer_add['id2'] ?>"  type="hidden"   class="form-control validate[required]" />
	 
				    <input name="nom_expedi"   type="text" placeholder="" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			    
			     <div class="col-md-7"> 
              <label class=""> Tel : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   
					 
	            <input name="tel" type="text" placeholder="" required class="form-control validate[required]" />
	 
              </div>
			   </div>
			  
			     <div class="col-md-7"> 
              <label class="">Message : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <textarea name="msg" class="form-control md-textarea pl-0" required rows="5" placeholder="Ecrivez votre message ici." aria-describedby="with-textarea"></textarea>
                   
              </div>
			   </div>
			   
		 
	    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
	   
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	    &nbsp; &nbsp; &nbsp; &nbsp;
	  <button type="submit" name="save" class="mybtn mybtn-success">Envoyer</button>
	 <button  onclick='window.location.href="index.php"' class="mybtn mybtn-danger">Annuler</button>
 
	   
	   

      </form>
  
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
   
 <footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
</html>  
