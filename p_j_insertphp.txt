<?PHP 
require'connexion.php';

   $id2=$_GET['id2']; 
 
	   $num_contrat=$_GET['num_contrat'];
		$req=$pdo->prepare("select * from contrat where num_contrat='$num_contrat'");
		$req->execute();
		$data=$req->fetch();
		  $num_contrat=$data['num_contrat'];
	 
		 $id_titulaire=$_GET['id_titulaire'];
		$req1=$pdo->prepare("select * from titulaire where id_titulaire='$id_titulaire'");
		$req1->execute();
		$data1=$req1->fetch();
		  $nom_titulaire=$data1['nom_titulaire'];
		   $tel_titulaire=$data1['tel_titulaire'];
	 
		
			   
	 
	 
		
		 
		   
		 
		  if(isset($_GET['a'])){
			  
		
		 
		 
			$num_ref=$_POST['num_ref'];
	 
		   $num_contrat=$_POST['num_contrat'];
	          
		 
		 	$nom_piece=$_POST['nom_piece'];
	 
	 
	
	
			  
			    $req_add_p=$pdo->prepare('select max(code_pj) from piece_jointe');
			$req_add_p->execute();
			$pointer_add_p=$req_add_p->fetch();
	
			$code_pj=$pointer_add_p['max(code_pj)']+1;
			if($code_pj<=9){
				$code_pj='00000'.$code_pj;
			}else if($code_pj<=99){
				$code_pj='0000'.$code_pj;
			}else if($code_pj<=999){
				$code_pj='000'.$code_pj;
			}else if($code_pj<=9999){
				$code_pj='00'.$code_pj;
			}else if($code_pj<=99999){
				$code_pj='0'.$code_pj;
			}
			
		 
			$photo=$_FILES["photo"]['name'];
			 $prop=$nom_titulaire.'_'.$tel_titulaire;
			 if(is_dir("C:\wamp\www\Contrats_generes\PIECES/".$num_contrat)=='true'){
		 
	 }else{
	 mkdir("C:\wamp\www\Contrats_generes\PIECES/$num_contrat");
	 }
	$dossier="C:\wamp\www\Contrats_generes\PIECES/$num_contrat";
	
	$target="$dossier/".basename($_FILES["photo"]['name']);
	$photo=$_FILES["photo"]['name'];
	
	if(move_uploaded_file($_FILES["photo"]['tmp_name'],$target)){
																										$msg="ok";
																									}else { $msg="no";}
			
			}
			   if(isset($_POST['save'])){
				   
				   if($nom_piece!='Veillez choisir le nom de la piece'){
	 $req_insert=$pdo->prepare("insert into piece_jointe (code_pj,num_ref,nom_piece,photo,num_contrat) values(?,?,?,?,?)");
          $params=array($code_pj,$num_ref,$nom_piece,$photo,$num_contrat);
          $req_insert->execute($params); 
		  
	    $msg_eng="Pièce ajoutée avec succès.";
		 header("location:p_j.php?id2=$id2&msg_eng=$msg_eng&num_contrat=$num_contrat&id_titulaire=$id_titulaire");  
		
				   }else{
					    $msg_eng_echec="Echec d'envoi, veuillez choisir un document!!!";
	    header("location:p_j.php?id2=$id2&msg_eng_echec=$msg_eng_echec&num_contrat=$num_contrat&id_titulaire=$id_titulaire");  
				   }
		  }
 
 
 
  
 
     
	  
		  ?> 