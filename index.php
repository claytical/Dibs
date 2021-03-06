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
    <section class="hero is-medium has-background is-dark">
        <div class="container is-max-desktop has-text-centered">
              <img src="ref_logo.png" width="25%"/>
        </div>
    </section>
    <section class="section">
      <div class="container">
        <h2 class="title">Call Dibs on Your REF!</h2>
    	<div class="columns is-multiline">

		    <?php 

				$items = $database->select("items", "filename", [
					"id[!]" => $database->select("claimed_items", "item_id")
				]);

		    ?>
		    <?php foreach($items as $item): ?>
		    		<div class="column is-one-fifth">

						<a class="modal-button" href="#" data-target="#modal-<?php echo substr($item, 0, -4)?>">
							<img src="items/<?php echo $item;?>" alt="Image" class="image is-128x128"/>
						</a>

						<div class="modal" id="modal-<?php echo substr($item, 0, -4)?>">
						  <div class="modal-background"></div>
						  <div class="modal-content">
							<div class="box">
							    <form action="claim.php" method="post">

							      <article class="media">
							        <div class="media-left">
							          <figure class="image is-64x64">
							            <img src="items/<?php echo $item ?>" alt="Image"/>
							          </figure>
							        </div>
							        <div class="media-content">
							          	<div class="content">
							            	<div class="field">
							            		<label class="label">Name</label>
							            		<div class="control">
							            			<input class="input" type="text" placeholder="Your Name" name="name">
							            		</div>
							            	</div>
							            	<input type="hidden" name="filename" value="<?php echo $item;?>">
							          	</div>
							          
							          <nav class="level-right">
							              <input type="submit" class="level-item button is-primary" aria-label="claim">
							          </nav>
							        </div>
							      </article>
							    </form>
							</div>
						  </div>
						  <button class="modal-close is-large" aria-label="close"></button>
						</div>
					</div>
		    <?php endforeach;?>
		</div>
      </div>
    </section>

<script>
document.querySelectorAll('.modal-button').forEach(function(el) {
  el.addEventListener('click', function() {
    var target = document.querySelector(el.getAttribute('data-target'));
    target.classList.add('is-active');    
    target.querySelector('.modal-close').addEventListener('click',   function() {
        target.classList.remove('is-active');
     });
  });
});

</script>
</body>
</html>