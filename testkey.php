<?php
    require_once("connexion.php");
    $code=$_POST['code'];
    $id_code='00001';
    $ps=$pdo->prepare("SELECT * FROM codeur WHERE code='$code'  ");
    $ps->execute();
	$user_data=$ps->fetch();
	
    if(!empty($user_data['code'])){
		$nbre=$user_data['nbre'];
         
		   $nbre='0';
   $req=$pdo->prepare("update codeur set nbre='$nbre'   where id_code='$id_code'");
       $req->execute();
	   
	   
         $msg="Activation effectuée avec succès.(^ _ ^)";
         header("location:index.php?msg=$msg"); 	
	
 }else{
	 $msgblock="Activation echouée, contactez ce numéro 00223 66-94-60-01.(^ _ ^)";
	  header("location:block.php?msgblock=$msgblock");
 }



  ?>
 
 