 <?php 
      require('connexion.php');
    $id2=$_GET['id2'];
   
  $ps=$pdo->prepare("SELECT * FROM user WHERE  id2='$id2' ");
    $ps->execute();
	$user_data=$ps->fetch();
  $id2=$user_data['id2'];
  $type_comptea=$user_data['type_compte'];
  
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

    <title>Gestion de contrats</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


   
     
      <script src="js/jquery-1.11.3.min.js"></script>
	    <SCRIPT LANGUAGE="JavaScript">
		function checkPw(form) {
			pw1 = form.password.value;
			pw2 = form.password1.value; 
			if (pw1 != pw2) { 
			alert ("\erreur: les mots de passes ne correspondent pas")
			return false; } else return true; } 
			</script> 
			
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
<body   >
 <?php 
  if(isset($_GET['choix']))
    $choix=$_GET['choix'];
    
	  if($choix=="index_user"){     
		                       
		  
	  ?>


 
  <?php include('nav_index_user.php'); ?>
	 

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
				  <button   type="button" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=change_mdp";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-edit">&nbspChanger_Mot_Passe </i></a></span>
				  </button>
                 </div>
				 
				   
				 
				  <?php if($type_comptea=="administrateur") {?>
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=create_compte";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspCréer_Compte</i></a></span>
				  </button>
                 </div>
				  <?php } ?>
				 
				  <div class="btn-group">
				  <button        class="btn btn-default dropdown-toggle" >
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"  href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				
				
             </div>

        </div>

    </div>

</div>







<div class="container main" style="margin-top: 55px;">
<div class="row">
<div class="row">



 <div class="clear"></div><br>

<div class="navbar navbar-default navbar-fixed">
    <div class="col-md-12">
      <a href="#">
          <div class="link">
           
           <div class="h4_title" ></div><span><h1><img style="width:100px; height:70px;" src="img/drapeau.png"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SmarTech  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img style="width:100px; height:70px;" src="img/drapeau.png"/> <br/> GeCO</h1></span>
          </div>
      </a>
    </div>
	</div>
	
	</div>
 
	 <?php  if($type_comptea=="administrateur"){ ?> 	   
    <div class="col-md-4">
      <a href="contrat.php?id2=<?php echo $id2 ?>">
          <div class="link">
           <i class="fa fa-plus"></i>
            <div class="clear"></div><span>Gestion de Contrat</span>
         </div>
      </a>
    </div>
	 <?php } else{?>
	 
	  <div class="col-md-6">
      <a href="contrat.php?id2=<?php echo $id2 ?>">
          <div class="link">
           <i class="fa fa-plus"></i>
            <div class="clear"></div><span>Gestion de Contrat</span>
         </div>
      </a>
    </div>
	 
	  <?php }?>
	  <!-- 
	 <?php  if($type_comptea=="administrateur"){ ?> 
	 <div class="col-md-4">
      <a href="demande_partenariat.php?id2=<?php echo $id2 ?>&choix=liste">
          <div class="link">
           <i class="fa fa-user"></i>
            <div class="clear"></div><span>Demande de partenariat</span>
         </div>
      </a>
    </div>
	<?php } ?>
	
	 <div class="col-md-4">
      <a href="liste_contrat.php?id2=<?php echo $id2 ?>&choix=private">
          <div class="link">
            <i class="fa fa-book"></i>
            <div class="clear"></div><span>Mes Contrats</span>
         </div>
      </a>
    </div>
	   <?php if($type_comptea=="administrateur"){ ?> 
	  <div class="col-md-4">
      <a href="liste_contrat.php?id2=<?php echo $id2 ?>&choix=public">
          <div class="link">
            <i class="fa fa-list"></i>
            <div class="clear"></div><span>Livre journal des contrats</span>
         </div>
      </a>
    </div>
	<?php } ?>
	 -->
	 <?php  if($type_comptea=="administrateur"){ ?> 
	 <div class="col-md-4">
      <a href="prestataire.php?id2=<?php echo $id2 ?>&choix=liste">
          <div class="link">
            <i class="fa fa-list"></i>
            <div class="clear"></div><span>Gestion fournisseurs</span>
         </div>
      </a>
    </div>
	 <?php } ?>
	
	 <?php if($type_comptea=="administrateur"){ ?> 
   
	      
	 
	 <div class="col-md-4">
      <a href="index_user.php?id2=<?php echo $id2 ?>&choix=liste_user">
          <div class="link">
            <i class="fa fa-users"></i>
            <div class="clear"></div><span>Gestion des utilisateurs</span>
         </div>
      </a>
    </div>
	 <?php } ?>
	 <?php  if($type_comptea=="administrateur"){ ?> 
	   <div class="col-md-4">
      <a href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listeCotation">
          <div class="link">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            <div class="clear"></div><span>Cotation / Contrat</span>
         </div>
      </a>
    </div><br/>

	<?php } else{?>
    <div class="col-md-6">
      <a href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listeCotation">
          <div class="link">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            <div class="clear"></div><span>Cotation / Contrat</span>
         </div>
      </a>
    </div><br/>

	<?php }?>
	
	<?php  if($type_comptea=="administrateur"){ ?> 
	 <div class="col-md-4">
      <a href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listePj">
          <div class="link">
            <i class="fa fa-envelope-o "></i>
            <div class="clear"></div><span>Pièce justificative / Contrat</span>
         </div>
      </a>
    </div><br/>
	  <?php } else{?>
	 <div class="col-md-6">
      <a href="cotation_pj.php?id2=<?php echo $id2 ?>&choix=listePj">
          <div class="link">
            <i class="fa fa-envelope-o "></i>
            <div class="clear"></div><span>Pièce justificative / Contrat</span>
         </div>
      </a>
    </div><br/>  
	  
	  
	  
	  
	  
	   <?php }?>
	 
	  <?php  if($type_comptea=="administrateur"){ ?> 
	  <div class="col-md-4">
      <a href="search_av.php?id2=<?php echo $id2 ?>">
          <div class="link">
            <i class="fa fa-search"></i>
            <div class="clear"></div><span>Recheche par date</span>
         </div>
      </a>
    </div><br/>
    <?php } else{?>
	 <div class="col-md-6">
      <a href="search_av.php?id2=<?php echo $id2 ?>">
          <div class="link">
            <i class="fa fa-search"></i>
            <div class="clear"></div><span>Recheche par date</span>
         </div>
      </a>
    </div><br/>
	
	 <?php } ?>
</div>

<br/><br/><br/><br/><br/> 

 



</div>
 
<footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
 
 <?php }elseif($choix=="create_compte") {?>
 
   


  

  <?php include('nav_index_user1.php'); ?>



  
  
  
   <?php
	require('connexion.php');
	 
	 
		  $id3=$user_data['id2'];  
		    $i=0;
			$v=0;
			$w=0;
	 
		if(isset($_GET['a'])){
			
			
if(isset($_POST['type_compte'])){
     $type_compte=$_POST["type_compte"];
 }  
			
			   if($type_compte!='Veuillez choisir le type de compte !!!'){
			
			$req=$pdo->prepare('select  count(*) from user');
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
			
			 
	    
	      
  								  
 if(isset($_POST['username'])){
     $username= $_POST["username"];
 }
  								  
 if(isset($_POST['nom_user'])){
     $nom_user= $_POST["nom_user"];
 }
  								  
 if(isset($_POST['prenom_user'])){
     $prenom_user= $_POST["prenom_user"];
 }
  								  
 if(isset($_POST['tel_user'])){
     $tel_user= $_POST["tel_user"];
 }  
  								  
 if(isset($_POST['email_user'])){
     $email_user= $_POST["email_user"];
 }
  
	       $etat='1';
         $password = $_POST['password'];
		 $password1 = $_POST['password1'];
		    $user_s =trim($username);
			$nom_s=trim($nom_user);
          $username1=substr($username,0,2);
			   $nom_user1=substr($nom_user,0,2);
			    $prenom_user1=substr($prenom_user,0,2);
	  $id4=strtolower($username1).'_'.strtolower($nom_user1).'_'.strtolower($prenom_user1).'_'.$username.'_'.strtolower($var3);
	  
		 $req=$pdo->prepare("select  count(*) from user where username = '".$user_s."' " );
			$req->execute();
			$pointer2=$req->fetchcolumn();
			$var4=$pointer2;
           

		
				   





		  
	
	 
		
		
			
		
		
     if($var4!='0'){
          
			  $_SESSION['verif_name']="Ce nom d'ulisateur existe déja choisissez un autre svp. (＾_＾)";
			 
	    
	 }else{
			 
		 
		 if($password!=$password1){
			  $_SESSION['echec']="Svp saisissez le meme mot de passe pour les deux champs.(＾_＾)";
		 }else{
		  $req=$pdo->prepare("insert into user (id2,username,password,nom_user,prenom_user,tel_user,email_user,type_compte,etat) values(?,?,?,?,?,?,?,?,?)");
          $params=array($id4,$user_s,$password,$nom_s,$prenom_user,$tel_user,$email_user,$type_compte,$etat);
          $req->execute($params);
		  
		  $_SESSION['create_compte']="Compte crée avec succès.(' _ ')";
		   
		 }
	 }
		  	 
	}else{
			 $_SESSION['echec_type_compte']=" Choisissez le type de compte svp.(＾_＾)";
			
		}
	
	}	
		
 
		
		    
?>
  
  
  
  
  
  
   
  
	  
	  
	  
	  <div class="container mainbg">
	  <br/>
				  <div class="row col-md-1 col-md-offset-0">
  
				  <button   type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'  class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a  class="return"   href="#"><i class="glyphicon glyphicon-arrow-left">&nbsp;Retour</i></a></span>
				  </button>
                 </div><br/>
                
<br>

    <h1 class="h1_title">Creation de compte</h1>
    <hr> <br>
	
	 <center><?php if(isset($_SESSION['verif_name'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['verif_name']; unset($_SESSION['verif_name']);} ?>
		               </B></div><br/>
					   <?php $i=1;  }?>
		  </center> 

             <center><?php if(isset($_SESSION['create_compte'])){?><div class='alert alert-success center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['create_compte']; unset($_SESSION['create_compte']);} ?>
		               </B></div><br/>
					   <?php  }?>
		  </center> 
<br>

 <center><?php if(isset($_SESSION['echec'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['echec']; unset($_SESSION['echec']);} ?>
		               </B></div><br/>
					   
					   <?php $v=1;}?>
		  </center>


<center><?php if(isset($_SESSION['echec_type_compte'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><B> <?php {echo   $_SESSION['echec_type_compte']; unset($_SESSION['echec_type_compte']);} ?>
		               </B></div><br/>
					   
					   <?php $w=1;}?>
		  </center>		  
		  
		  
		  
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="index_user.php?a&id2=<?php echo $id2?>&choix=create_compte" method="post" enctype="multipart/form-data">
          
		  
		  
		   
           <label class="">Type de compte  :<span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
             <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                   <select name="type_compte"   class="form-control" autofocus >
          <option value="Veuillez choisir le type de compte !!!" selected style="font-family:Tahoma;font-size:15px;font-weight:bold;" >Veuillez choisir le type de compte !!!</option>	       			 
	   <option value="administrateur" style="font-family:Tahoma;font-size:15px;font-weight:bold;" >  Administrateur   </option>		
										 
											
										 
											
      <option value="user" style="font-family:Tahoma;font-size:15px;font-weight:bold;" > Utilisateur  </option>
												
												
												
										 
										
										</select>
			   
			   
			   </div><br>
			         
		  
		  
		  
              <label class="">Nom: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 <?php if(isset($_POST['nom_user']) AND $v=='1' OR $i=='1' OR $w=='1' ){ ?>
							<input name="nom_user" type="text" value="<?php echo $_POST["nom_user"]; ?>" required  class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input name="nom_user" type="text" placeholder="" required class="form-control validate[required]" />
				
					 <?php }   ?>
                  
              </div><br>
			   
              
			  <label class="">Prenom : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				   <?php if(isset($_POST['prenom_user']) AND $i=='1' OR $v=='1' OR $w=='1'  ){ ?>
							<input name="prenom_user" type="text" value="<?php echo $_POST["prenom_user"]; ?>" required  class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input name="prenom_user" type="text" placeholder="" required class="form-control validate[required]" />
				
					 <?php }   ?>
                  
              </div><br>
			  <label class="">Tel : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <?php if(isset($_POST['tel_user'])  AND $i=='1' OR $v=='1' OR $w=='1' ){ ?>
							<input name="tel_user" onkeyup="verif_nombre(this);" type="text" value="<?php echo $_POST["tel_user"]; ?>"  required class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input onkeyup="verif_nombre(this);" name="tel_user" type="text" placeholder="" required class="form-control validate[required]" />
				
					 <?php }   ?>
                  
              </div><br> 
			   <label  class="">E-mail : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				   <?php if(isset($_POST['tel_user']) AND $i=='1' OR $v=='1' OR $w=='1'  ){ ?>
							<input name="email_user" type="text" value="<?php echo $_POST["email_user"]; ?>" required  class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input name="email_user" type="text" placeholder="" required class="form-control validate[required]" />
				
					 <?php }   ?>
                 
              </div><br> 
			  
			    <label  class="">Nom D'utilisateur : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		  <?php if(isset($_POST['username']) AND $i=='1' OR $v=='1' OR $w=='1' ){ ?>
							<input name="username" type="text" value="<?php echo $_POST["username"]; ?>" required onkeydown="if(event.keyCode==32) return false;" class="form-control validate[required]" />
					 <?php }else{ ?>
							      <input name="username" type="text" placeholder="" onkeydown="if(event.keyCode==32) return false;" required class="form-control validate[required]" />
				
					 <?php }   ?>
                
			  
              </div><br> 
			  
			   
			  
			    <label  class="">Mot de passe : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="password" type="password" id="files elect1" required placeholder="" class="form-control validate[required]" />
              </div><br> 
			   <label  class="">Re-saisissez mot de passe: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="password1" type="password" id="files elect1" required placeholder="" class="form-control validate[required]" />
              </div><br> 
              
               
    
 
            

          <button type="submit" name="b" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-danger" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";'>Annuler</button>     

          <hr id='success'>

      </form>
  
  </div>


  

</div> <br/><br/>  <br/>  <br/>    
	  
	  
	  
	  
	  
	  
	  
	  

 <?php }elseif($choix=="change_mdp") {?>


 
   

  <?php include('nav_index_user1.php'); ?>










  <?php
   $id2=$_GET['id2']; 
  $reponse=$pdo->prepare("SELECT * FROM user WHERE(id2=?)");
$params=array($id2);
$reponse->execute($params);
$data=$reponse->fetch(); ?>
  
   <?php require('connexion.php');
         if(isset($_GET['c'])){
  
	     $id2= $_GET["id2"];
         $username= $_POST["username"];
		  $password= $_POST["password"];
		   $user_s =trim($username);
		   
		  
		  
		   $req1=$pdo->prepare("select  count(*) from user where username = '".$user_s."' " );
			$req1->execute();
			$pointer3=$req1->fetchcolumn();
			$var5=$pointer3;
			
			 $req3=$pdo->prepare("select * from user where id2='$id2' " );
			$req3->execute();
			$pointer4=$req3->fetch();
		  
		 } if(isset($_POST['d'])){
			 
			 
			if($user_s!==$pointer4['username']){
			 
			 
			 
			 if($var5!='0'){
          
			 
			$msg="Ce nom d'ulisateur existe déja choisissez un autre svp. (＾_＾)";
			 header("location:index_user.php?id2=$id2&choix=change_mdp&msg=$msg");
	 }else{
			
		 
		 $req=$pdo->prepare("update user set username='$user_s', password='$password'  where id2='$id2' ");
      
     $req->execute();
		            $msg="Compte modifié avec succès reconnectez-vous avec vos nouvelles coordonnées. (＾_＾)";
	         header("location:index.php?msg=$msg");
			 
	 }
			}else{
				
				 $req=$pdo->prepare("update user set username='$user_s', password='$password'  where id2='$id2'");
      
                 $req->execute();
		            $msg="Compte modifié avec succès reconnectez-vous avec vos nouvelles coordonnées. (＾_＾)";
	         header("location:index.php?msg=$msg");
			}


			
			 
		 }
		 
?>
  
   <div class="container mainbg">
<br><a class="return" href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>"><i class="glyphicon glyphicon-arrow-left"></i> Retour</a>

    <h1 class="h1_title">Modification de compte</h1>
    <hr> <br>
      <?php  
	
                  if (isset($_GET['msg'])){?><div class='alert alert-danger center' style='width: 70%; font-family:Tahoma; font-size:15px; margin: auto;'><p><?php  echo $msg=$_GET['msg'];?>
				  
	       </p></div> <?php }?> </br>


    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="index_user.php?c&id2=<?php echo $id2 ?>&choix=change_mdp" method="post" enctype="multipart/form-data">
          
              
               
			  <label class="">Nom d'utilisateur : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="username" value="<?php echo($data['username'])  ?>"  type="text" required class="form-control " />
              </div><br>
			  
			   
			  
			  <label class="">Nouveau mot de passe : <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="password"   type="password"  required  class="form-control validate[required]" />
              </div><br> 
			  
			  

          <button type="submit" name="d" class="mybtn mybtn-success">Envoyer</button>
           <button type="button" name="submit" class="mybtn mybtn-success" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'>Annuler</button>     

          <hr id='success'>

      </form>
  
  </div>


  

</div> 
  
   
         
<script src="js/popper.min.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/tab.js"></script>
<script src="js/util.js"></script>
 
</body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<footer style="margin-botton:0px;">
<div  id="footer">
  
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  
	</div>
	</footer>
 
</html>

























  
  
   
   
   
   
   
  
   <?php }
   
	  elseif($choix=="liste_user" AND $type_comptea=="administrateur"){     
		                       
		  
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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>

     
  </head>
  
  
<body>

  

<?php include('nav_index_user1.php'); ?>
 
 
    <!-- DEBUT DU TABLEAU ELEG -->   
 
 
  <div class="container mainbg">
 
 
 
 
  
  <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       <h1 class="btn btn-primary btn-block">Liste des utilisateurs du logiciel  </h1>
   
    <br>
    <br>
	
	<center><?php if(isset($_GET['msg_sup_user'])){?>  
   
   
  <div  class="alert alert-success alert-dismissible" id="msg_sup_user" style='width: 70%; font-family:Tahoma; font-size:14px; margin: auto;' role="alert" >
               <strong><script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('msg_sup_user').innerHTML = "<B>Utilisateur supprimé.(' _ ')</B>";
    } );
	
	setTimeout(function() {
  document.getElementById('msg_sup_user').innerHTML = "<B>Les contrats etablis par cet individu sont toujours dispomibles.</B>";
},6000);
</script> </strong>
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
		  
		  
		  
		  <?php
   
     $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
  
$id2=$_GET['id2'];


  
  
    $sql= "select * from user where type_compte!='administrateur' and etat='1' ";	 
   
 $reponse = $pdo->prepare("$sql");
  $reponse->execute(); 
  
  
 
   
	 
	 ?>  
		  
		  
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>NOM</th>
            <th>PERNOM</th>
			<th>TEL</th>
			 <th>E-MAIL</th>
			
            <th>NOM_UTILISATEUR</th> 
              
			 <th>MOT_DE_PASSE</th>
			  <th>VOIR_CONTRAT</th>
			  <th>SUP</th>
			  
            </tr>
        </thead>
        <tbody>
            
        
		  
		   
		    <?php    foreach  ($conn->query($sql) as $pointer5) {  



			?> 
         
   
  
		
  	
    
 
	
          <tr>
		   
                  
        <td style="font-family:tahoma;font-size:20;" ><?php echo $pointer5['nom_user'] ?></td>
              <td style="font-family:tahoma;font-size:20;"><?php echo $pointer5['prenom_user'] ?></td>
              <td style="font-family:tahoma;font-size:20;" ><?php echo $pointer5['tel_user'] ?></td>
			  <td style="font-family:tahoma;font-size:20;"><?php echo $pointer5['email_user'] ?></td>
 	     <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointer5['username'] ?></td> 
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointer5['password'] ?></td> 
			   
			     
				
				<td>
		   
<button><a href="index_user.php?choix=contrat_user&id2click=<?php  echo $pointer5['id2']; ?>&id2=<?php  echo $id2 ?>"><i class="glyphicon glyphicon-eye-close"></i></a></button>
 
			 

	<!-- DEBUT DE MODALLLLLLLLLLLLLLLLL-->	    
	  


 <div id="myModal<?=$pointer5['username'];?>" class="modal fade" role="dialog">
	
 
	
	
				  
  <div class="modal-dialog"> 
    <div class="modal-content 
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
             ALERT.......
        </h3>
      </div 
      <div class="modal-body">
              <div class="tab-content" role="tablist">   
	   
	   
	   
	   
	   
	  
  
    
  
               </div>

          </div>
  
   </div> 
              </td> 
			  
	 <td ><button><a onclick="return confirm('Voulez vous vraiment supprimer ?')"   href="delete.php?choix=delU&username=<?php  echo $pointer5['username'] ?>&id2=<?php  echo $id2 ?>"><i class="glyphicon glyphicon-trash"></i></a></button></td>
			    
                </tr>  
				
				<?php } ?>  
               
        </tbody>
        <tfoot>
            <tr>
              <th>NOM</th>
            <th>PERNOM</th>
			<th>TEL</th>
			 <th>E-MAIL</th>
			
            <th>NOM_UTILISATEUR</th> 
              
			 <th>MOT_DE_PASSE</th>
			  <th>VOIR_CONTRAT</th>
			  <th>SUP</th>
			  
            </tr>
        </tfoot>
    </table> 
	
	
  </div>
 
 </div>
 
 
 <!-- FIN DE MODALLLLLLLLLLLLLLLLL-->	
 
 </div>
 
 
   <!-- FIN DU TABLEAU ELEG -->  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   




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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
 
<footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
	  
</html>





	  <?php }



  
   
	  elseif($choix=="contrat_user" AND $type_comptea=="administrateur"){     
		                       
		  
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
      <link href="css/dataTables.bootstrap.min.css.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
   

      <script src="js/jquery-1.11.3.min.js"></script>

     
  </head>
  
  
<body >

  

<?php include('nav_index_user1.php'); ?>
 
 
 
 
 
 
 
 
   <!-- DEBUT DU TABLEAU ELEG -->   
 
 
  <div class="container mainbg">
 
   <?php
   
     $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "db_contrat_agri_1.1";
  

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
  
    


  
    $id2=$_GET['id2'];
   
 $rq= "SELECT  * FROM user where type_compte!='administrateur' ";	 
  
 $reponse = $pdo->prepare("$rq");
  $reponse->execute();
  
$id2click=$_GET['id2click'];  
 $rqclick= "SELECT  * FROM contrat where id2='$id2click' ";	 
  
 $reponseclick= $pdo->prepare("$rqclick");
  $reponseclick->execute();
  
  $rqclickuser= "SELECT  * FROM user where id2='$id2click' ";	 
  
 $reponseclickuser= $pdo->prepare("$rqclickuser");
  $reponseclickuser->execute();
   $pointerclickuser=$reponseclickuser->fetch()
  
   
 
   
	 
	 ?>  
 
 
  
  <div class="row col-md-12 col-md-offset-0"> <br>
	 <button type="button" onclick='window.location.href="index_user.php?choix=index_user&id2=<?php echo $id2 ?>&choix=liste_user";'class="btn btn-primary  btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i>Retour</button>
       
       
   		  <h2 style="font-size:20px;font-family:tahoma" class="btn btn-primary btn-block"><B>Les contrats de:&nbsp<?php echo $pointerclickuser['nom_user'] ?>&nbsp<?php echo $pointerclickuser['prenom_user'] ?>&nbsp<?php echo '+223'.' '.$pointerclickuser['tel_user'] ?></B> </h2></center></tr>
		  
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
                 <th>NUMERO</th>
            <th>DATE_CONTRAT</th>
            <th>NBRE_PRODUITS</th>
            <th>TOTAL_HT</th>
			<th>TVA</th>
			 <th>TOTAL_TTC</th>
            <th>DELAI_EXEC</th>
            
             <th>FOURNISSEUR</th>
			  
            </tr>
        </thead>
        <tbody>
            
        
		  
		   
		    <?php    

 while ($pointerclick=$reponseclick->fetch()) { 
             $id_titulaire=$pointerclick['id_titulaire'];
			  $rqclicktitu= "SELECT  * FROM titulaire where id_titulaire='$id_titulaire' "; 
               $reponseclicktitu= $pdo->prepare("$rqclicktitu");
                $reponseclicktitu->execute();
				$pointerclicktitu=$reponseclicktitu->fetch()

			?> 
         
   
  
		
  	
    
 
	
          <tr>
		   
                  
        <td style="font-family:tahoma;font-size:20;font-weight:bold" ><?php echo $pointerclick['num_contrat'] ?></td>
              <td style="font-family:tahoma;font-size:20;font-weight:bold"><?php echo $pointerclick['date_contrat'] ?></td>
              <td style="font-family:tahoma;font-size:20;font-weight:bold" ><?php echo $pointerclick['nb_produit'] ?></td>
			  <td style="font-family:tahoma;font-size:20;font-weight:bold"><?php echo $pointerclick['total_ht'] ?></td>
			   <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointerclick['tva'] ?></td> 
               <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointerclick['total_ttc'] ?></td> 
			    <td style="font-family:tahoma;font-weight:bold;"><?php echo $pointerclick['delai_execution'] ?></td> 
				 
			   
				
				<td  style="font-family:tahoma;font-weight:bold;" ><?php echo $pointerclicktitu['nom_titulaire'] ?>
		   
 			 

	<!-- DEBUT DE MODALLLLLLLLLLLLLLLLL-->	    
	  


 <div id="myModal<?=$pointerclick['num_contrat'];?>" class="modal fade" role="dialog">
	
 
	
	
				  
  <div class="modal-dialog"> 
    <div class="modal-content 
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color: red;font-size: 20px;font-weight: bold;">&times;</button>
        <h3 class="modal-title pull-left">
             ALERT.......
        </h3>
      </div 
      <div class="modal-body">
              <div class="tab-content" role="tablist">   
	   
	   
	   
	   
	   
	  
  
    
  
               </div>

          </div>
  
   </div> 
              </td> 
			  
	 		    
                </tr>  
				
				<?php } ?>  
               
        </tbody>
        <tfoot>
            <tr>
                 <th>NUMERO</th>
            <th>DATE_CONTRAT</th>
            <th>NBRE_PRODUITS</th>
            <th>TOTAL_HT</th>
			<th>TVA</th>
			 <th>TOTAL_TTC</th>
            <th>DELAI_EXEC</th>
            
             <th>FOURNISSEUR</th>
			  
            </tr>
        </tfoot>
    </table> 
  </div>
 
 </div>
 
 
 <!-- FIN DE MODALLLLLLLLLLLLLLLLL-->	
 
 </div>
 
 
   <!-- FIN DU TABLEAU ELEG -->  
 
 
 
 
  
 
  

		    

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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
<footer>
<div  class="navbar navbar-default navbar-fixed-bottom">
 <center>
  Copyright &copy; <?php echo date("Y"); ?> | <a href="#" title="Cliquez sur le lien pour acceder a notre site web">Smart_Tech</a><br/>Contacts: 76975136 / 72858678 / 70636247
  </center>
	</div>
	</footer>
	 <?php } ?>
</html>