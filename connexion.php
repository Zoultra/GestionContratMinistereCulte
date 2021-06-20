<?php 
  try {
    $strConnection= 'mysql:host=localhost:3308;dbname=db_contrat_agri_1.1';
    $pdo= new PDO ($strConnection,'root','');

  } 
  catch (PDOException $e) {
    $msg = 'ERREUR PDO dans'  . $e->getMessage();
    die ($msg);
  }
?>



