<?php
	require 'database.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rich Entitled Fucks</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <section class="hero is-medium has-background-success">
        <div class="container is-max-desktop has-text-centered">
              <img src="ref_logo.png" width="25%"/>
        </div>
    </section>
    <section class="section">
      <div class="container">
        <h2>Call Dibs on Your REF!</h2>
      </div>
    
    <?php
    	$path = getenv('ITEMS_PATH');

		$dir = new DirectoryIterator($path);
		foreach ($dir as $fileinfo) {
    		if (!$fileinfo->isDot()) {
    			echo "<img src='".$fileinfo->getFilename()."'/>";
    			}
		}
    ?>

    </section>


</body>
</html>