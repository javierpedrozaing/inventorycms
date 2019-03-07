<?php include 'connect_db.php';?>
<?php 
date_default_timezone_set('America/Bogota');

$fecha = $_POST['fecha']; 
$date =  date_create($fecha);

?>
<p hidden><?php print_r($date); ?>  </p>

<?php
$year = explode("-", $date->date)[0];
$month = explode("-", $date->date)[1];
$day = substr(explode("-", $date->date)[2], 0,2);
?>
<!-- 
<p><#?php echo "año " . $year; ?></p>
<p><#?php echo "mes " . $month; ?></p>
<p><#?php echo "dia " . $day; ?></p> -->

<?php 
// $getFlores = $mysqli->query("SELECT * FROM flores f INNER JOIN agenda a 
// ON f.id = a.flores_id
// GROUP BY flores.id");	
$sql = "SELECT * FROM flores
INNER JOIN agenda ON flores.id = agenda.flores_id 
INNER JOIN imagen ON flores.imagen_id = imagen.id 
WHERE (agenda.dia = $day) AND (agenda.mes = $month);";
$getFlores = $mysqli->query($sql);	

?>

<div id="resultado">
<?php if (mysqli_num_rows($getFlores) > 0) : ?>
<table class="table table-striped table-dark" cellpadding="0" cellspacing="0" class="db-table">
	<thead class="thead-dark">
	<tr><th scope="col">NOMBRE</th><th scope="col">PRECIO</th><th scope="col">IMAGEN</th></tr>
	</thead>
	 <tbody>
	<?php while($row = mysqli_fetch_assoc($getFlores)) { ?>	    	
	<tr>
	<?php foreach($row as $key=>$value) { ?>		
			<?php if ($key == "nombre" || $key == "precio" || $key == "file_name" ) : ?>
				<td>
					<?php if ($key == "file_name"): ?>
						<img src="admin/uploads/products/<?php echo $value; ?>" alt="">
					<?php else : ?>
					<?php echo $value; ?>
					<?php endif; ?>
				</td>
			<?php endif; ?>
		
    <?php } 
     ?>
	</tr>

	</tbody>
    <?php  }  ?>
</table>
<?php 
else:
    echo "no se encontraron resultados";
    endif;
?>
</div>	
