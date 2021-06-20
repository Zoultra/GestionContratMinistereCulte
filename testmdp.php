<?php

    require_once("connexion.php");
    $login=trim($_POST['username']);
    $password=$_POST['password'];
	 
    $ps=$pdo->prepare("SELECT * FROM user WHERE USERNAME='$login' AND PASSWORD='$password' AND etat='1' ");
    $ps->execute();
	$user_data=$ps->fetch();
	
    if(!empty($user_data['password'])){
		$login=$user_data['id2'];
         
        
         header("location:index_user.php?id2=$login&choix=index_user"); 	
	
 }else{
	 $msg="Echec de connexion";
	  header("location:index.php?msg=$msg");
	  
 }



  ?>
 
 