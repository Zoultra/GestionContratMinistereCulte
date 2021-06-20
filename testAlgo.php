 
 
 <?php 
 
  $jrs = '2'; //-->Nombres de jours a ajouter a la date du jour.--//

//-->Zone horraire utiliser ici Europe/Paris.--//
date_default_timezone_set('UTC');

//-->La date de reference.--//
$NewDate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

//-->Ici affiche le resultat.--//
echo 'Dans '.$jrs .' jours nous serons le : '.strftime('%d/%m/%Y', strtotime('+ '.$jrs .' days', $NewDate));

 

  ?>
               <br/>  <br/>  <br/>
   <?php 
 
  

 
$date = Array('annee'=>date('Y'), 'mois'=>date('m'), 'jour'=>date('d'));
$N = 1; // Le nombre de jours

$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
$dansNjours = date('d/m/Y', $time);
echo $dansNjours;

  ?>