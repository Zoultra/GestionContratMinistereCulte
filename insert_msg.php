
   <?php
          
require'connexion.php'; 
	 
		  
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
		  
		   $id2k=$_POST['id2']; 
		   
		    $nom_expedi=$_POST['nom_expedi'];
			 $date_msg=date("Y-m-d");
			  $msg=$_POST['msg'];
			  
			   $tel=$_POST['tel'];
		  
		  
			 
			   $req=$pdo->prepare("insert into message(id2,nom_expedi,date_msg,msg,tel,code_msg)values(?,?,?,?,?,?)");
	           $params=array($id2k,$nom_expedi,$date_msg,$msg,$tel,$code_msg); 
			   $req->execute($params);
		
    $msg_eng='Message envoyé !!!';
	
	  
		   header("location:index.php");  
		  
		  
		
 ?>