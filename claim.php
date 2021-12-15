<?php
	require 'database.php';
	$filename = $_POST["filename"];
	$name = $_POST["name"];

	$count = $database->count("items",[
		"filename" => $filename
	]);

	if($count == 1) {
		//VALID FILENAME, GRAB ID

		$rows = $database->select("items", "id", [
			"filename" => $filename
		]);
		foreach($rows as $id) {

							$count = $database->count("claimed_items", [
								"item_id" => $id
							]);

							if($count == 0) {
								//NO ONE HAS CLAIMED IT, CALL DIBS
								$database->insert("claimed_items", [
									"item_id" => $id,
									"owner" => $name
								]);
								$claimed = true;
							}
							else {
								$claimed = false;
							}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Claiming Dibs</title>
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
      	<?php if($claimed) :?>
	        <h2>Claimed!</h2>
      	<?php else:?>
  	      <h2>Someone else has already called dibs on that!</h2>  
      	<?php endif;?>
      	<img src="../items/<?php echo $filename?>"/>
      </div>
    </section>
</body>
</html>