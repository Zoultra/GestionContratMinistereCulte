


<div class="nav"> 

	<div class="navbar navbar-default navbar-fixed-top">
      
        <div class="container">
          
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    
                        <span class="sr-only">Toggle navigation</span>      
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>  
                        <span class="icon-bar"></span>          
                </button> 

                <h2 class="h1_title">Gestion de contrat</h2>

           </div>

            <div class="collapse navbar-collapse nav_right">
                                        
				<div class="btn-group">
 <button   type="button" class="btn btn-default dropdown-toggle" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=index_user";' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a class="return" href="#"><i class="glyphicon glyphicon-home"></i></a></span>
				  </button>
				 
				</div>
				<div class="btn-group">
				  <button   type="button" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=change_mdp";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-edit">&nbspChanger_Mot_Passe </i></a></span>
				  </button>
                 </div>
				 
				   
				  <?php if($type_comptea=="administrateur") {?>
				  <div class="btn-group">
				  <button   type="button" onclick='window.location.href="index_user.php?id2=<?php echo $id2 ?>&choix=create_compte";'  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <a   href="#"><i class="glyphicon glyphicon-user">&nbspCréer_Compte</i></a></span>
				  </button>
                 </div>
				  <?php } ?>
				 
				  <div class="btn-group">
				  <button        class="btn btn-default dropdown-toggle" >
				    <a onclick="return confirm('Voulez vous vraiment vous deconnectez ?')"  href="index.php"><i class="glyphicon glyphicon-sort">&nbspDeconnexion</i></a></span>
				  </button>
                 </div>
				 
				
             </div>

        </div>

    </div>

</div>

 