<?php
 

?>

 

<?php
	 
	//code1 kamate
require('../../connexion.php');
$num_contrat=$_GET['num_contrat'];
$id2=$_GET['id2'];
$id_titulaire=$_GET['id_titulaire'];

$id_cotation=$_GET['id_cotation'];

	$req=$pdo->prepare("select  count(*) from produit_contrat where num_contrat='$num_contrat'");
	$req->execute();
	$pointer=$req->fetchcolumn();
	$nb=$pointer;
	
	
	$req777=$pdo->prepare("select  count(*) from membre where ( id_cotation='$id_cotation' and type_membre='Membre' )");
	$req777->execute();
	$pointer77=$req777->fetchcolumn();
	$nb77=$pointer77;
		 
// fin1















   // TTAABBBBBBBBBBBBBBBBBBBBBBBBBB
		
		
		$req_cotation1=$pdo->prepare("select * from cotation_fours where( id_cotation='$id_cotation' and rang_fours='1' ) ");
		$req_cotation1->execute();
		$base_cotation1=$req_cotation1->fetch();
		$id_titulaire1=$base_cotation1['id_titulaire'];
		$montant11=$base_cotation1['montant'];
		$etatFacure1=$base_cotation1['etatFacure'];
		$etatPieces1=$base_cotation1['etatPieces'];
		
		$req_cotation11=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire1'  ");
		$req_cotation11->execute();
		$base_cotation11=$req_cotation11->fetch();
		$nom_titulaire11=trim($base_cotation11['nom_titulaire']);
		$adresse11=$base_cotation11['adresse'];
		
		
	 
		
		
		
		
		$req_cotation2=$pdo->prepare("select * from cotation_fours where ( id_cotation='$id_cotation' and rang_fours='2' ) ");
		$req_cotation2->execute();
		$base_cotation2=$req_cotation2->fetch();
		$id_titulaire2=$base_cotation2['id_titulaire'];
		$montant22=$base_cotation2['montant'];
		$montant22=$base_cotation2['montant'];
		$etatFacure2=$base_cotation2['etatFacure'];
		$etatPieces2=$base_cotation2['etatPieces'];
		
		$req_cotation22=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire2' ");
		$req_cotation22->execute();
		$base_cotation22=$req_cotation22->fetch();
		$nom_titulaire22=$base_cotation22['nom_titulaire'];
		$adresse22=$base_cotation22['adresse'];
		
		
		
		
		
		$req_cotation3=$pdo->prepare("select * from cotation_fours where ( id_cotation='$id_cotation' and rang_fours='3' ) ");
		$req_cotation3->execute();
		$base_cotation3=$req_cotation3->fetch();
		$id_titulaire3=$base_cotation3['id_titulaire'];
		$montant33=$base_cotation3['montant'];
		$etatFacure3=$base_cotation3['etatFacure'];
		$etatPieces3=$base_cotation3['etatPieces'];
		
		$req_cotation33=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire3' ");
		$req_cotation33->execute();
		$base_cotation33=$req_cotation33->fetch();
		$nom_titulaire33=$base_cotation33['nom_titulaire'];
		$adresse33=$base_cotation33['adresse'];
		
		
		
		//FINNNNNNNNNNN TAAAAAAAAAAAAAAAABBB



// MEMBRE COTATIONNN
        $req_cotation55=$pdo->prepare("select * from membre where( id_cotation='$id_cotation' and type_membre='President' )");
		$req_cotation55->execute();
		$base_cotation55=$req_cotation55->fetch();
		$nom_president=$base_cotation55['nom_membre'];
		$prenom_president=$base_cotation55['prenom_membre'];
		$fonction_president=$base_cotation55['fonction_membre'];
		
		 $req_cotation66=$pdo->prepare("select * from membre where( id_cotation='$id_cotation' and type_membre='Rapporteur' )");
		$req_cotation66->execute();
		$base_cotation66=$req_cotation66->fetch();
		$nom_reporteur=$base_cotation66['nom_membre'];
		$prenom_reporteur=$base_cotation66['prenom_membre'];
		
		 
		 
		 

// FIN MEMBRE COTATIONNN DEBUT HORAIRE COTATION

        $reqHoraire=$pdo->prepare("select * from cotation_contrat where id_cotation='$id_cotation'");
		$reqHoraire->execute();
		$horaire=$reqHoraire->fetch();
		
		    $dateDepot=$horaire['dateDepot'];
			$heureDepot=$horaire['heureDepot'];
			$dateOuverture=$horaire['dateOuverture'];
			$heureOuverture=$horaire['heureOuverture'];

// FIN HORAIRE COTATION


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

 $conclu_par=$data["conclu_par"];	  
 $approuv_par=$data["approuv_par"];
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
 $adresse=$pointer4['adresse'];
 $annee=date("Y");
 
 
  
 
 
 
 
 
 
 
 
 
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
	$document->setValue('{var18}',$conclu_par);
	$document->setValue('{var19}',$approuv_par);
	$document->setValue('{var20}',$nature);
	$document->setValue('{var21}',$chapitre);
	$document->setValue('{var25}',$enlettre);
	$document->setValue('{var26}',$nom_user);
	$document->setValue('{var27}',$prenom_user);
	$document->setValue('{var28}',$annee);
	$document->setValue('{var29}',$adresse);
 
	$document->setValue('{var31}',$fonction);
	$document->setValue('{var32}',$fonction_approuv);
	$document->setValue('{var33}',$conclu_par);
	$document->setValue('{var34}',$nom_conlu_par);
	$document->setValue('{var35}',$profession_conclu);
	$document->setValue('{var36}',$tvapourcent);
	
	
	
	
	
	$document->setValue('{var40}',$nom_titulaire11);
	$document->setValue('{var41}',$adresse11);
	$document->setValue('{var48}',$montant11);
	
	$document->setValue('{var42}',$nom_titulaire22);
	$document->setValue('{var43}',$adresse22);
	$document->setValue('{var49}',$montant22);
	
	$document->setValue('{var44}',$nom_titulaire33);
	$document->setValue('{var45}',$adresse33);
	$document->setValue('{var50}',$montant33);
	
	$document->setValue('{var46}',$nom_president);
	$document->setValue('{var47}',$prenom_president);
	$document->setValue('{var51}',$fonction_president);
	$document->setValue('{var52}',$nom_reporteur);
	$document->setValue('{var53}',$prenom_reporteur);
	
	$document->setValue('{var54}',$id_cotation);
	
	$document->setValue('{var56}',$dateDepot);
	$document->setValue('{var57}',$heureDepot);
	$document->setValue('{var58}',$dateOuverture);
	$document->setValue('{var59}',$heureOuverture);
	
	$document->setValue('{var60}',$etatFacure1);
	$document->setValue('{var61}',$etatPieces1);
	$document->setValue('{var62}',$etatFacure2);
	$document->setValue('{var63}',$etatPieces2);
	$document->setValue('{var64}',$etatFacure3);
	$document->setValue('{var65}',$etatPieces3);
	 
	
	         
	
	 
	
	
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
		
		 
		$req7777=$pdo->prepare("select  * from membre where ( id_cotation='$id_cotation' and type_membre='Membre' )");
	     $req7777->execute();
		 
	$k=1;
	
	while($pointer777=$req7777->fetch()){
		if($k!=1){
			$document = $PHPWord->loadTemplate('result.docx');
		}
		if($nb77!=1){
			
 	 
	
	  $nom_simple=$pointer777['nom_membre'];
		$prenom_simple=$pointer777['prenom_membre'];
	
	  
	
	$data5 = array(
		'val5' => array('{T5.val5}', $nom_simple.' '.$prenom_simple),
		'val6' => array('{T5.val6}', '')
		 
		 
	);
	 
		 
	
		
	// clone rows	
	$document->cloneRow('TBL1', $data1);
	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	
	 
	$document->cloneRow('T5', $data5);
	 
	 
	 
	 
	$document->cloneRow('DinamicTable', $data5);
	 
	 
	
	// save file
	$tmp_file = 'result.docx';
	$document->save($tmp_file);
	
	
	
	
 }else{
			
			 
	
	$nom_simple=$pointer777['nom_membre'];
		$prenom_simple=$pointer777['prenom_membre'];
		 
	 
	
	$data5 = array(
		'val5' => array($nom_simple.' '.$prenom_simple),
		'val6' => array('')
		 
		    
		 
	);
	
	 
		
	// clone rows	
	$document->cloneRow('TBL1', $data1);
	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	
	 
	$document->cloneRow('T5', $data5);
	 
	 
	 
	$document->cloneRow('DinamicTable', $data5);
	 
	
	// save file
	 
	if(is_dir("C:\wamp64\www\Contrats_generes\COTATIONS\Contrat_".$num_contrat)=='true'){
		 
	 }else{
		 mkdir("C:\wamp64\www\Contrats_generes\COTATIONS\Contrat_".$num_contrat);
	 }
	 
	 $file=glob("C:\wamp64\www\Contrats_generes\COTATIONS\Contrat_".$num_contrat."/*.*");
	  $count=count($file)+1;
	$tmp ="otation" ;
	$date1=date("d-m-Y_H:i");
	$document->save("C:\wamp64\www\Contrats_generes\COTATIONS\Contrat_".$num_contrat."\C".$tmp.'_'.$id_cotation.'_'.$nom_titulaire11.".docx");
	
	
	  
		}
	$nb77=$nb77-1;
	$k=$k+1;
	
	}
	 
	
	 $msg_create=" <h2>Contrat generé avec succès. (＾_＾).</h2> <br/>";
    $open="Contrat_".$num_contrat."/C".$tmp.'_'.$id_cotation.'_'.$nom_titulaire11.".docx";
	header("location:../../../Contrats_generes/COTATIONS/$open");
	
	 
	
	
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	 
	print "complete.";
	 
?>

  














  	 