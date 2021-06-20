<?php
 

?>








<?php
	 
	//code1 kamate
require('../../connexion.php');
$num_contrat=$_GET['num_contrat'];
$id2=$_GET['id2'];
$id_titulaire=$_GET['id_titulaire'];


	$req=$pdo->prepare("select  count(*) from produit_contrat where num_contrat='$num_contrat'");
	$req->execute();
	$pointer=$req->fetchcolumn();
	$nb=$pointer;
		 
// fin1

 $contrat='Contrat';
	$code1=$contrat.'_'.date("d").'_'.date("m").'_'.date("Y").'_'.date("H").'_'.date("i").'_'.date("s");  
     
	 
	 
	 
// examples
	header ("Content-type: text/html; charset=utf-8");
	
	require_once '../PHPWord.php';
	
	$PHPWord = new PHPWord();	
	$document = $PHPWord->loadTemplate('source.docx');
	
	$req=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req->execute();
		$data=$req->fetch();
		
		$req=$pdo->prepare("select * from produit_contrat where num_contrat='$num_contrat'");
		$req->execute();
		$pointer1=$req->fetch();
		
		$req=$pdo->prepare("select * from contrat where id2='$id2'");
		$req->execute();
		$pointer3=$req->fetch();
		
		$id2=$pointer3['id2'];
		$req=$pdo->prepare("select * from user where id2='$id2'");
		$req->execute();
		$pointer2=$req->fetch();
		  $id2=$pointer2['id2'];
		  $nom_user=$pointer2['nom_user'];
		  $prenom_user=$pointer2['prenom_user'];
		  
		  $id_titulaire=$data['id_titulaire'];
		$req=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req->execute();
		$pointer4=$req->fetch();
		
		 $req1=$pdo->prepare('select  count(*) from contrat');
			$req1->execute();
			$pointerz=$req1->fetchcolumn();
		 
		   
	 
	      $varz=$pointerz;
			if($varz<=9){
				$varz='0'.$varz;
			}else if($varz<=99){
				$varz='00'.$varz;
			}else if($varz<=999){
				$varz='000'.$varz;
			}else if($varz<=9999){
				$varz='0000'.$varz;
			}else if($varz<=99999){
				$varz='00000'.$varz;
			}
		  
		 
		 
		  
		$total_ttc=$data['total_ttc'];
	$total_ht=$data['total_ht'];
	$tva=$data['tva'];
	
	$objet_contrat=$data["objet_contrat"];

	 $code_programme= $data["code_programme"];

	  $reqpro=$pdo->prepare("select * from programme where code_programme='$code_programme'");
		$reqpro->execute();
		$pointerpro=$reqpro->fetch();
		 $identifiant= $data["identifiant"];

  $delai_execution= $data["delai_execution"];
  $date_approbation= $data["date_approbation"];
  $date_notification= $data["date_notification"]; 
  $tvapourcent= $data["pourcentage_tva"]; 
  $montant=$pointer1['montant'];
  
  $source_finance= $data["source_finance"];
  $exercice= $data["exercice"];	  
  $section= $data["section"];
  $chapitre= $data["chapitre"];
  $nature= $data["nature"];   
  $service_benef = $data['service_benef'];
  $type_produit = $data['type_produit'];

 //$conclu_par=$data["conclu_par"];	  
// $approuv_par=$data["approuv_par"];
 $representant_dfm=$data["representant_dfm"];
 $fonction=$data["fonction"]; 
 $fonction_approuv=$data["fonction_approuv"];
 $conclu_par=$data["conclu_par"];
 $nom_conlu_par=$data["nom_conlu_par"];
$profession_conclu=$data["profession_conclu"];
 $nom_titulaire=trim($pointer4["nom_titulaire"]);	  
 $nif_titulaire= $pointer4["nif_titulaire"];
 $rc_titulaire= $pointer4["rc_titulaire"];
 $tel_titulaire= $pointer4["tel_titulaire"];   
 $num_compte_banque= $pointer4["num_compte_banque"];
  $nom_banque= $pointer4["nom_banque"];
  $representant_titulaire= $pointer4["representant_titulaire"];
 $enlettre=$data['enlettre'];
 $localisation=$data['localisation'];
 $adresse=$pointer4['adresse'];
 $annee=date("Y");
 $mois=date("m");
 
 
 
 if($mois=='01'){
	 $moisenlettre='JANVIER';
 }elseif($mois=='02'){
	 $moisenlettre='FEVRIER';
 }elseif($mois=='03'){
	 $moisenlettre='MARS';
 }elseif($mois=='04'){
	 $moisenlettre='AVRIL';
 }elseif($mois=='05'){
	 $moisenlettre='MAI';
 }elseif($mois=='06'){
	 $moisenlettre='JUIN';
 }elseif($mois=='07'){
	 $moisenlettre='JUILLET';
 }elseif($mois=='08'){
	 $moisenlettre='AOUT';
 }elseif($mois=='09'){
	 $moisenlettre='SEPTEMBRE';
 }elseif($mois=='10'){
	 $moisenlettre='OCTOBRE';
 }elseif($mois=='11'){
	 $moisenlettre='NOVEMBRE';
 }elseif($mois=='12'){
	 $moisenlettre='DECEMBRE';
 }
 
 
  
 
 
 
 
 
 
 
 
 
		$document->setValue('{var22}',$total_ttc);
	$document->setValue('{var23}',$total_ht);
	$document->setValue('{var24}',$tva);
	 
	
	// simple parsing
	
	
	$document->setValue('{var1}',$num_contrat);
	$document->setValue('{var2}',$objet_contrat);
	$document->setValue('{var3}',$nom_titulaire);
	$document->setValue('{var4}',$nif_titulaire);
	$document->setValue('{var5}',$rc_titulaire);
	$document->setValue('{var6}',$tel_titulaire);
	$document->setValue('{var7}',$montant);
	$document->setValue('{var8}',$source_finance);
	$document->setValue('{var9}',$exercice);
	$document->setValue('{var10}',$section);
	$document->setValue('{var11}',$delai_execution);
	$document->setValue('{var12}',$date_approbation);
	$document->setValue('{var13}',$date_notification);
	 
	 
	$document->setValue('{var14}',$num_compte_banque);
	$document->setValue('{var15}',$nom_banque);
	$document->setValue('{var16}',$representant_titulaire);
	$document->setValue('{var17}',$representant_dfm);
	//$document->setValue('{var18}',$conclu_par);
	//$document->setValue('{var19}',$approuv_par);
	$document->setValue('{var20}',$nature);
	$document->setValue('{var21}',$chapitre);
	$document->setValue('{var25}',$enlettre);
	$document->setValue('{var26}',$nom_user);
	$document->setValue('{var27}',$prenom_user);
	$document->setValue('{var28}',$annee);
	$document->setValue('{var29}',$adresse);
	$document->setValue('{var30}',$moisenlettre);
	$document->setValue('{var31}',$fonction);
	$document->setValue('{var32}',$fonction_approuv);
	$document->setValue('{var33}',$conclu_par);
	$document->setValue('{var34}',$nom_conlu_par);
	$document->setValue('{var35}',$profession_conclu);
	$document->setValue('{var36}',$tvapourcent);
	$document->setValue('{var37}',$identifiant);
	$document->setValue('{var38}',$service_benef);
	$document->setValue('{var39}',$type_produit);
	$document->setValue('{var40}',$localisation);
	
	
	// prepare data for tables
	$data1 = array(
		'num' => array(1,2,3),
		'color' => array('red', 'blue', 'green'),
		'code' => array('ff0000','0000ff','00ff00')
	);	
	$data2 = array(
		'val1' => array(1,2,3),
		'val2' => array('red', 'blue', 'green'),
		'val3' => array('a','b','c')
	);
	$data3 = array(
		'day' => array('Mon','Tue','Wed','Thu','Fri'),
		'dt' => array(12,14,13,11,10),
		'nt' => array(0,2,1,2,-1),
		'dw' => array('SSE at 3 mph', 'SE at 2 mph', 'S at 3 mph', 'S at 1 mph', 'Calm'),
		'nw' => array('SSE at 1 mph', 'SE at 1 mph', 'S at 1 mph', 'Calm', 'Calm')		
	);
 
 
 
		$req=$pdo->prepare("select * from produit_contrat where num_contrat='$num_contrat'");
		$req->execute();
		
		
		 
	$k=1;
	
	while($pointer=$req->fetch()){
		if($k!=1){
			$document = $PHPWord->loadTemplate('result.docx');
		}
		if($nb!=1){
 	$designation=$pointer['designation'];
	$prix_unitaire=$pointer['prix_unitaire'];
	$quantite=$pointer['quantite'];
	$montant=$pointer['montant'];
	$p_enlettre=$pointer['p_enlettre'];
	
	 
	
	$data4 = array(
		'val1' => array('{T4.val1}', $designation),
		'val2' => array('{T4.val2}', $quantite),
		'val3' => array('{T4.val3}', $prix_unitaire),
		'val4' => array('{T4.val4}', $montant)
	);
	
	$data5 = array(
		'val5' => array('{T5.val5}', $designation),
		'val6' => array('{T5.val6}', $prix_unitaire),
		'val7' => array('{T5.val7}', $p_enlettre),
		 
	);
	
	$data6 = array(
		'val8' => array('{T6.val8}', $designation),
		'val9' => array('{T6.val9}', $quantite)
	
	);	
     $data7 = array(
		'val10' => array('{T7.val10}', $designation)
		 
	
	);		
		 
	
		
	// clone rows	
	$document->cloneRow('TBL1', $data1);
	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	
	$document->cloneRow('T4', $data4);
	$document->cloneRow('T5', $data5);
	$document->cloneRow('T6', $data6);
	$document->cloneRow('T7', $data7);
	 
	$document->cloneRow('DinamicTable', $data4);
	$document->cloneRow('DinamicTable', $data5);
	$document->cloneRow('DinamicTable', $data6);
	$document->cloneRow('DinamicTable', $data7);
	
	// save file
	$tmp_file = 'result.docx';
	$document->save($tmp_file);
 }else{
			
			$designation=$pointer['designation'];
			$prix_unitaire=$pointer['prix_unitaire'];
	$quantite=$pointer['quantite'];
	$montant=$pointer['montant'];
	$p_enlettre=$pointer['p_enlettre'];
	 
	$data4 = array(
		'val1' => array($designation),
		'val2' => array($quantite),
		'val3' => array($prix_unitaire), 
		'val4' => array($montant)    
	);
	
	$data5 = array(
		'val5' => array($designation),
		'val6' => array($prix_unitaire),
		'val7' => array($p_enlettre)
		    
		 
	);
	
	$data6 = array(
		'val8' => array($designation),
		'val9' => array($quantite)
		 
		    
		 
	);
	   $data7 = array(
		'val10' => array($designation),
		 
		 
		    
		 
	);
		
	// clone rows	
	$document->cloneRow('TBL1', $data1);
	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	
	$document->cloneRow('T4', $data4);
	$document->cloneRow('T5', $data5);
	$document->cloneRow('T6', $data6);
	$document->cloneRow('T7', $data7);
	 
	$document->cloneRow('DinamicTable', $data4);
	$document->cloneRow('DinamicTable', $data5);
	$document->cloneRow('DinamicTable', $data6);
	$document->cloneRow('DinamicTable', $data7);
	
	// save file
	 $prop=$nom_titulaire.'_'.$tel_titulaire;
	if(is_dir("C:\wamp64\www\Contrats_generes\CONTRATS\Contrat_".$prop)=='true'){
		 
	 }else{
		 mkdir("C:\wamp64\www\Contrats_generes\CONTRATS\Contrat_".$prop);
	 }
	 
	 $file=glob("C:\wamp64\www\Contrats_generes\CONTRATS\Contrat_".$prop."/*.*");
	  $count=count($file)+1;
	$tmp ="ontrat_" ;
	$date1=date("d-m-Y_H:i");
	$document->save("C:\wamp64\www\Contrats_generes\CONTRATS\Contrat_".$prop."\C".$tmp.'_'.$representant_titulaire.'_'.$num_contrat.".docx");
	
	
	  
		}
	$nb=$nb-1;
	$k=$k+1;
	
	}
	 
	
	 $msg_create=" <h2>Contrat generé avec succès. (＾_＾).</h2> <br/>";
    $open="Contrat_".$prop."/C".$tmp.'_'.$representant_titulaire.'_'.$num_contrat.".docx";
	header("location:../../../Contrats_generes/CONTRATS/$open");
	
	 
	
	
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	 
	print "complete.";
	 
?>

  














  	 