<?php include 'connect_db.php';
?>

<?php  if (mysqli_num_rows($flores) > 0) { ?>
	<div id="resultado">
	<h3 style="text-align: center;">Flores destacadas</h3>	
	<table class="table table-striped table-dark" cellpadding="0" cellspacing="0" class="db-table">
	<thead class="thead-dark">
	<tr><th scope="col">NOMBRE</th><th scope="col">PRECIO</th><th scope="col">IMAGEN</th></tr>
	</thead>
	 <tbody>
	<?php 	
		// var_dump( mysqli_fetch_assoc($flores));
	    while($row = mysqli_fetch_assoc($flores)) { ?>	      	
	<tr>
	<?php foreach($row as $key=>$value) { ?>		
			<?php if ($key == "id"):
				$imagen = $mysqli->query("SELECT * FROM agenda WHERE id = $key");					
			 endif; ?>

			<?php if ($key == "nombre" || $key == "precio" || $key == "file_name" ) : ?>			
				<td>
					<?php if ($key == "file_name"): ?>					
						<img src="admin/uploads/products/<?php echo $value; ?>" alt="">
					<?php else : ?>
					<?php echo $value; ?>
					<?php endif; ?>
				</td>
			<?php endif; ?>
		
	<?php }  ?>
	</tr>

	</tbody>
	<?php  }  ?>
	</table>
	</div>	
<?php   } else {
      echo "0 resultados";
   }
?>

