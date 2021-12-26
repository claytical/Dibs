<?php
	require '../database.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dibs</title>
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <section class="hero is-medium has-background-success">
        <div class="container is-max-desktop has-text-centered">
        <h2>Adding Items to Claim Dibs On</h2>
        </div>
    </section>
    <section class="section">
      <div class="container">
    			<div class="columns is-multiline">
		    	<?php $dir = new DirectoryIterator(dirname(__FILE__).'/../items/'); ?>
		    	<?php foreach($dir as $fileinfo): ?>
		    		<?php if(!$fileinfo->isDot()):?>
		    			<div class="column is-one-fifth">

								<img src="../items/<?php echo $fileinfo->getFilename();?>" alt="Image" class="image is-128x128"/>
								
								<?php
									//CHECK IF ITEM ALREADY IN DATABASE
									$count = $database->count("items",[
										"filename" => $fileinfo->getFilename()
									]);


									//ADD ITEMS TO DATABASE
									if($count == 0) {
										$database->insert("items", [
											"filename" => $fileinfo->getFilename()
										]);
										echo "<p>New Item Added</p>";
									}
									else {
										echo "<p>Item Already Exists</p>";
									}
									
								?>
							
							</div>
		    		<?php endif;?>
		    	<?php endforeach;?>
				</div>
      </div>
    </section>

</body>
</html>