<?php

 $montant=$total_ttc;
 $devise1='';
 $devise2='' ;
 
    if(empty($devise1)) $dev1=' ';
    else $dev1=$devise1;
	 if(empty($devise2)) $dev2='Centimes';
    else $dev2=$devise2;
    
	
	if($montant>1000000000){
	
	
   $v1=substr($montant,-1,1);
     $v2=substr($montant,-2,1);
      $v3=substr($montant,-3,1);
	  
    $dix_c=0;
    $cent_c=0;
	
   $unite[1]=$v1;
    $dix[1]=$v2;
     $cent[1]=$v3;
	   $reste=substr($montant,0,-3);
	$valeur_entiere=intval($reste);
	
    $valeur_decimal=intval(round($reste-intval($reste), 2)*100);
      $unite[2]=$valeur_entiere%10;
    $dix[2]=intval($valeur_entiere%100/10);
    $cent[2]=intval($valeur_entiere%1000/100);
    
	 $unite[3]=intval($valeur_entiere%10000/1000);
    $dix[3]=intval($valeur_entiere%100000/10000);
    $cent[3]=intval($valeur_entiere%1000000/100000);
	
	  $unite[4]=intval($valeur_entiere%10000000/1000000);
	   $dix[4]=intval($valeur_entiere%100000000/10000000);
	   $cent[4]=intval($valeur_entiere%1000000000/100000000);
	  
		
	}else{
	$valeur_entiere=intval($montant);
	
    $valeur_decimal=intval(round($montant-intval($montant), 2)*100);
 
    $dix_c=intval($valeur_decimal%100/10);
    $cent_c=intval($valeur_decimal%1000/100);
	
    $unite[1]=$valeur_entiere%10;
    $dix[1]=intval($valeur_entiere%100/10);
    $cent[1]=intval($valeur_entiere%1000/100);
    $unite[2]=intval($valeur_entiere%10000/1000);
    $dix[2]=intval($valeur_entiere%100000/10000);
    $cent[2]=intval($valeur_entiere%1000000/100000);
    
	 $unite[3]=intval($valeur_entiere%10000000/1000000);
    $dix[3]=intval($valeur_entiere%100000000/10000000);
    $cent[3]=intval($valeur_entiere%1000000000/100000000);
	
	  $unite[4]=intval($valeur_entiere%10000000000/1000000000);
	   $dix[4]=intval($valeur_entiere%100000000000/10000000000);
	   $cent[4]=intval($valeur_entiere%1000000000000/100000000000);
	  
	}
    $chif=array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix sept', 'dix huit', 'dix neuf');
        $secon_c='';
        $trio_c='';
    for($i=1; $i<=4; $i++){
        $prim[$i]='';
        $secon[$i]='';
        $trio[$i]='';
        if($dix[$i]==0){
            $secon[$i]='';
        $prim[$i]=$chif[$unite[$i]];
        }
        else if($dix[$i]==1){
            $secon[$i]='';
            $prim[$i]=$chif[($unite[$i]+10)];
        }
        else if($dix[$i]==2){
            if($unite[$i]==1){
            $secon[$i]='vingt et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='vingt';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==3){
            if($unite[$i]==1){
            $secon[$i]='trente et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='trente';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==4){
            if($unite[$i]==1){
            $secon[$i]='quarante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='quarante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==5){
            if($unite[$i]==1){
            $secon[$i]='cinquante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='cinquante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==6){
            if($unite[$i]==1){
            $secon[$i]='soixante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='soixante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==7){
            if($unite[$i]==1){
            $secon[$i]='soixante et';
            $prim[$i]=$chif[$unite[$i]+10];
            }
            else {
            $secon[$i]='soixante';
            $prim[$i]=$chif[$unite[$i]+10];
            }
        }
        else if($dix[$i]==8){
            if($unite[$i]==1){
            $secon[$i]='quatre-vingts et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='quatre-vingt';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==9){
            if($unite[$i]==1){
            $secon[$i]='quatre-vingts et';
            $prim[$i]=$chif[$unite[$i]+10];
            }
            else {
            $secon[$i]='quatre-vingts';
            $prim[$i]=$chif[$unite[$i]+10];
            }
        }
		 
        if($cent[$i]==1)  $trio[$i]='cent';
        else if($cent[$i]!=0 || $cent[$i]!='')  $trio[$i]=$chif[$cent[$i]] .' cents';
    }
     
     
$chif2=array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingts', 'quatre-vingts dix');
    $secon_c=$chif2[$dix_c];
    if($cent_c==1) $trio_c='cent';
    else if($cent_c!=0 || $cent_c!='') $trio_c=$chif[$cent_c] .' cents';
	
	 
	 if(($cent[4]==0 || $cent[4]=='') && ($dix[4]==0 || $dix[4]=='') && ($unite[4]==1))
        $q= $trio[4]. '  ' .$secon[4]. ' ' . $prim[4]. ' milliard';
    else if(($cent[4]!=0 && $cent[4]!='') || ($dix[4]!=0 && $dix[4]!='') || ($unite[4]!=0 && $unite[4]!=''))
        $q= $trio[4]. ' ' .$secon[4]. ' ' . $prim[4]. ' milliards ';
    else
        $q= $trio[4]. ' ' .$secon[4]. ' ' . $prim[4];
	 
	
     
    if(($cent[3]==0 || $cent[3]=='') && ($dix[3]==0 || $dix[3]=='') && ($unite[3]==1))
        $t= $trio[3]. '  ' .$secon[3]. ' ' . $prim[3]. ' million ';
	
    else if(($cent[3]!=0 && $cent[3]!='') || ($dix[3]!=0 && $dix[3]!='') || ($unite[3]!=0 && $unite[3]!=''))
        $t= $trio[3]. ' ' .$secon[3]. ' ' . $prim[3]. ' millions ';
    else
        $t= $trio[3]. ' ' .$secon[3]. ' ' . $prim[3];
     
    if(($cent[2]==0 || $cent[2]=='') && ($dix[2]==0 || $dix[2]=='') && ($unite[2]==1))
        $d= ' mille ';
    else if(($cent[2]!=0 && $cent[2]!='') || ($dix[2]!=0 && $dix[2]!='') || ($unite[2]!=0 && $unite[2]!=''))
        $d= $trio[2]. ' ' .$secon[2]. ' ' . $prim[2]. ' milles ';
    else
        $d= $trio[2]. ' ' .$secon[2]. ' ' . $prim[2];
     
    $u= $trio[1]. ' ' .$secon[1]. ' ' . $prim[1];
     
    $u1= ' '. $dev1 .' ' ;
     
    if(($cent_c=='0' || $cent_c=='') && ($dix_c=='0' || $dix_c==''))
        $z= '  ';
    else
        $z= $trio_c. ' ' .$secon_c. ' ' . $dev2;  
	      
 $enlettre1=$q.$t.$d.$u.$u1.$z;
  	  
	 	  
	  
	  
?>