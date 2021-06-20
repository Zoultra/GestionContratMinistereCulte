

<?php
	 
	//code1 kamate
require('../../connexion.php');

$id2=$_GET['id2'];
$id_titulaire=$_GET['id_titulaire'];
$reference=$_POST['reference'];
$typeentreprise= $_POST['typeentreprise'];
  $civilite= $_POST['civilite'];
   $categorie= $_POST['categorie'];
   $nomComplet= $_POST['nomComplet'];
   $titre= $_POST['titre'];
   $profession=$_POST['profession'];
   
  if($civilite=='Le Directeur'){
      $titrePartenaire = 'Monsieur Le Directeur général';
  }elseif($civilite=='La Directrice'){
      $titrePartenaire = 'Madame La Directricer générale';}
   
	 
// examples
	header ("Content-type: text/html; charset=utf-8");
	
	require_once '../PHPWord.php';
	
	$PHPWord = new PHPWord();	
	$document = $PHPWord->loadTemplate('source.docx');
	 
		   
		$req=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req->execute();
		$data=$req->fetch();
		
	  
 $nom_titulaire=trim($data["nom_titulaire"]);	  
 $nif_titulaire= $data["nif_titulaire"];
 $rc_titulaire= $data["rc_titulaire"];
 $tel_titulaire= $data["tel_titulaire"];   
 $num_compte_banque= $data["num_compte_banque"];
  $nom_banque= $data["nom_banque"];
  $adresse= $data["adresse"];  
  
	
 
    
	$document->setValue('{var1}',$nom_titulaire);
	$document->setValue('{var2}',$nif_titulaire);
	$document->setValue('{var3}',$rc_titulaire);
	$document->setValue('{var4}',$tel_titulaire);
    $document->setValue('{var5}',$num_compte_banque);
	$document->setValue('{var6}',$nom_banque);
	$document->setValue('{var7}',$adresse);
	$document->setValue('{var8}',$reference);
	$document->setValue('{var9}',$typeentreprise);
    $document->setValue('{var10}',$titrePartenaire);
    $document->setValue('{var11}',$categorie);	
	$document->setValue('{var12}',$nomComplet);
	$document->setValue('{var13}',$titre);
	$document->setValue('{var14}',$profession);
	// save file
	 
	if(is_dir("C:\wamp64\www\Contrats_generes\FOURNISSEURS\Fournisseur_".$nom_titulaire)=='true'){
		 
	 }else{
		 mkdir("C:\wamp64\www\Contrats_generes\FOURNISSEURS\Fournisseur_".$nom_titulaire);
	 }
	 
	 $file=glob("C:\wamp64\www\Contrats_generes\FOURNISSEURS\Fournisseur_".$nom_titulaire."/*.*");
	  $count=count($file)+1;
	$tmp ="ournisseur" ;
	$date1=date("d-m-Y_H:i");
	$document->save("C:\wamp64\www\Contrats_generes\FOURNISSEURS\Fournisseur_".$nom_titulaire."\F".$tmp.'_'.$tel_titulaire.'_'.$nif_titulaire.".docx");
	  
	
	 $msg_create=" <h2>Contrat generé avec succès. (＾_＾).</h2> <br/>";
    $open="Fournisseur_".$nom_titulaire."/F".$tmp.'_'.$tel_titulaire.'_'.$nif_titulaire.".docx";
	header("location:../../../Contrats_generes/FOURNISSEURS/$open");
	
	  
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	 
	print "complete.";
	 
?>

  














  	 