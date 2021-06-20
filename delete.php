<?php require_once('connexion.php');
  if(isset($_GET['id2'])){ 
		  $id2=$_GET['id2'];
		  $fonction=$_GET['fonction'];
		  }
if(isset($_GET['choix'])){
	
		$choixreach="null";
		$choix=$_GET['choix'];
		
		
		if($choix=="delc"){
			
			
	   $num_contrat=$_GET['num_contrat'];
	   $id_titulaire=$_GET['id_titulaire'];
	   $id_cotation=$_GET['id_cotation'];
	
	$cnx1=$pdo->prepare('DELETE FROM cotation_fours WHERE(id_cotation=?)');
          $params=array($id_cotation);
          $cnx1->execute($params); 
		  
		   $cnx=$pdo->prepare('DELETE FROM membre WHERE (id_cotation=?)');
         $params=array($id_cotation);
          $cnx->execute($params); 
		  
		  
		    $cnx=$pdo->prepare('DELETE FROM fours_produit WHERE(num_contrat=?)');
         $params=array($num_contrat);
          $cnx->execute($params); 

             
			 
			 $cnx=$pdo->prepare('DELETE FROM cotation_contrat WHERE(num_contrat=?)');
         $params=array($num_contrat);
          $cnx->execute($params);
		  
		   $cnx=$pdo->prepare('DELETE FROM cotation WHERE(id_cotation=?)');
         $params=array($id_cotation);
          $cnx->execute($params);
		  
		  
		  
		   $cnx=$pdo->prepare('DELETE FROM piece_jointe WHERE(num_contrat=?)');
         $params=array($num_contrat);
          $cnx->execute($params);
		  
		 $req_verif=$pdo->prepare("select * from cotation WHERE id_cotation='$id_cotation' ");
			$req_verif->execute();
			$pointer_verif=$req_verif->fetch();
	
	
	
	
	
				
				 
$cnx=$pdo->prepare('DELETE FROM produit_contrat WHERE(num_contrat=?)');
$params=array($num_contrat);
$cnx->execute($params);
 
							
                         $num_contrat=$_GET['num_contrat'];
$cnx=$pdo->prepare('DELETE FROM contrat WHERE(num_contrat=?)');
$params=array($num_contrat);
$cnx->execute($params);

$msg_sup_cont='Contrat supprimé avec succès';
header("location:liste_contrat.php?id2=$id2&choix=private&msg_sup_cont=$msg_sup_cont");   

} 

 if($choix=="delMembre"){
				
				 $num_contrat=$_GET['num_contrat'];
				 
				 $code_membre=$_GET['code_membre'];
				 $id_cotation=$_GET['id_cotation'];
$cnx=$pdo->prepare('DELETE FROM membre WHERE(code_membre=?)');
$params=array($code_membre);
$cnx->execute($params); 
 $delMembre="Membre supprimé avec succès.(' _ ')";
header("location:cotation.php?id2=$id2&choix=addMembre&id_cotation=$id_cotation&num_contrat=$num_contrat&delMembre=$delMembre");  
	 						
                         

} 
if($choix=="delHorraire"){
				
				 $num_contrat=$_GET['num_contrat'];
				 
				 $code_cot_contrat=$_GET['code_cot_contrat'];
				 $id_cotation=$_GET['id_cotation'];
$cnx=$pdo->prepare('delete from cotation_contrat where(code_cot_contrat=?)');
$params=array($code_cot_contrat);
$cnx->execute($params); 
 $delHorraire="Membre supprimé avec succès.(' _ ')";
header("location:cotation.php?id2=$id2&choix=addHoraire&id_cotation=$id_cotation&num_contrat=$num_contrat&delHorraire=$delHorraire");  
	 						
                         

}

 if($choix=="p_j"){
				
				 $num_contrat=$_GET['num_contrat'];
				 
				 $code_pj=$_GET['code_pj'];
				 
$cnx=$pdo->prepare('DELETE FROM piece_jointe WHERE(code_pj=?)');
$params=array($code_pj);
$cnx->execute($params); 
 $delMembre="Document supprimé avec succès.(' _ ')";
header("location:p_j.php?id2=$id2&num_contrat=$num_contrat&delMembre=$delMembre");  
	 						
                         

} 


 if($choix=="delFours"){
				
	
				 $num_contrat=$_GET['num_contrat'];
				  $id_cotation=$_GET['id_cotation']; 
				 $id_titulaire=$_GET['id_titulaire'];
				
 
		 
        
     




         
		  
		    $cnx=$pdo->prepare('DELETE FROM fours_produit WHERE (id_titulaire=? AND num_contrat=? )');
         $params=array($id_titulaire,$num_contrat);
          $cnx->execute($params); 

 $cnx1=$pdo->prepare('DELETE FROM cotation_fours WHERE(id_titulaire=? AND id_cotation=? )');
          $params=array($id_titulaire,$id_cotation);
          $cnx1->execute($params); 
		  
		  
		 $req_verif=$pdo->prepare("select * from cotation WHERE id_cotation='$id_cotation' ");
			$req_verif->execute();
			$pointer_verif=$req_verif->fetch();
			$nbre_verif=$pointer_verif['nombre_cotation']; 
			
          	 $nbre_verif--;
		 
		  $rq_edite=$pdo->prepare('UPDATE cotation SET nombre_cotation=?WHERE(id_cotation=?)');
	$params=array($nbre_verif,$id_cotation);
	$rq_edite->execute($params);
	
	
	 $req_verif3=$pdo->prepare("select * from cotation_fours WHERE id_cotation='$id_cotation'  AND etat='choisi' ORDER BY `cotation_fours`.`montant` ASC ");
			$req_verif3->execute();
			 
			$data_verif3=$req_verif3->fetchAll();
			
                $i=0;			
				
	          foreach ($data_verif3 as $data_verif4) {
				  
				  $i++;
				  
				  $code_cot_fours=$data_verif4['code_cot_fours'];
				  
			 $reqUpContrat=$pdo->prepare("update cotation_fours set rang_fours='$i' where code_cot_fours='$code_cot_fours' ");
      
                           $reqUpContrat->execute();	  
				  
				  
			  }
	
	
          $delMembre="Membre supprimé avec succès.(' _ ')";
          header("location:cotation.php?id2=$id2&choix=addCotation&id_cotation=$id_cotation&num_contrat=$num_contrat&back");  
		  
	 
			            

}

else if($choix=="delP") {

$id_titulaire=$_GET['id_titulaire'];
$cnx=$pdo->prepare('DELETE FROM titulaire WHERE(id_titulaire=?)');
$params=array($id_titulaire);
$cnx->execute($params);
header("location:prestataire.php?choix=liste&id2=$id2");


}

  else if($choix=="delU") {
	  
	  $username=$_GET['username'];
		 $etat='0';
 $req=$pdo->prepare("update user set etat='$etat' where username='$username'");
      
                 $req->execute();

  $msg_sup_user="deleted";
		  header("location:index_user.php?choix=liste_user&id2=$id2&msg_sup_user=$msg_sup_user");
	  

}

     else if($choix=="delPro") {
$fonction=$_GET['fonction']; 
$code_produit=$_GET['code_produit'];
$num_contrat=$_GET['num_contrat'];
$id_titulaire=$_GET['id_titulaire'];
$id_cotation=$_GET['id_cotation'];
$cnx=$pdo->prepare('DELETE FROM produit_contrat WHERE(code_produit=?)');
$params=array($code_produit);
$cnx->execute($params);


	  
	 $rqsum= "SELECT  sum(montant) FROM produit_contrat where num_contrat='$num_contrat' "; 
     $reponsesum = $pdo->prepare("$rqsum");
     $reponsesum->execute(); 
     $datasum=$reponsesum->fetch();
	
	
  $total_ht=($datasum["sum(montant)"]);
  $tva=($total_ht*18)/100;
  $total_ttc=intval($tva+$total_ht);



 $rqprd= "SELECT * FROM contrat where num_contrat='$num_contrat' "; 
     $reponseprd = $pdo->prepare("$rqprd");
     $reponseprd->execute(); 
     $dataprd=$reponseprd->fetch();
	$nb_produit1 = $dataprd['nb_produit'];
     $nb_produit = $nb_produit1-1;
	 
	  include_once('convert.php'); 
	 
	$rqup=$pdo->prepare('UPDATE contrat SET total_ht=?, tva=?, total_ttc=?,nb_produit=?, enlettre=? WHERE(num_contrat=?)');
	$params=array($total_ht,$tva,$total_ttc,$nb_produit,$enlettre1,$num_contrat);
	$rqup->execute($params);
	 
	 $rqup=$pdo->prepare('UPDATE contrat SET nb_produit=?WHERE(num_contrat=?)');
	$params=array($nb_produit,$num_contrat);
	$rqup->execute($params);
	 
$msg_sup="Produit supprimé avec succès. (＾_＾)";

 

 header("location:modifier_contrat.php?id2=$id2&msg_sup=$msg_sup&num_contrat=$num_contrat&fonction=$fonction&id_titulaire=$id_titulaire&id_cotation=$id_cotation");


} 

 else if($choix=="delP") {

$code=$_GET[code];
$cnx=$pdo->prepare('DELETE FROM membre_equipage WHERE(Code_Membre=?)');
$params=array($code);
$cnx->execute($params);
header("location:liste_membre_equipage_del.php");


}
   
 else if($choix=="delPiece") {
$id2=$_GET['id2'];
$code_pj=$_GET['code_pj'];
 $cnx=$pdo->prepare('DELETE FROM piece_jointe WHERE(code_pj=?)');
         $params=array($code_pj);
          $cnx->execute($params);
    $msg_sup_piece="deleted";
		  header("location:cotation_pj.php?choix=listePj&id2=$id2&msg_sup_piece=$msg_sup_piece");

}
					
}
?>