<?php
ob_start();
  $page_title = 'Agregar Producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(2);
  $all_categories = find_all('categorias');
  $all_photo = find_all('imagen');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','buying-price');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_agenda   = remove_junk($db->escape($_POST['agenda']));
     
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     
     //$date    = make_date();
     $date = date_create($p_agenda);
     
     $year = date_format($date, 'Y');
     $month = date_format($date, 'm');
     $day = date_format($date, 'd');
     
     $query  = "INSERT INTO flores (";
     $query .="nombre,cantidad,precio,categorias_id,imagen_id";
     $query .=") VALUES (";
     $query .="'{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_cat}', '{$media_id}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE nombre='{$p_name}'";

     if($db->query($query)){
      $flor_id = find_product_by_title($p_name);
      
      $query_agenda = "INSERT INTO agenda (";
      $query_agenda .= "anio, mes, dia, flores_id";
      $query_agenda .= ") VALUES (";
      $query_agenda .= "'{$year}', '{$month}', '{$day}', '{$flor_id[0]['id']}'";
      $query_agenda .= ")";

      if ($db->query($query_agenda)) {
        $session->msg('s',"Producto agregado ");
        redirect('add_product.php', false); 
      }
       
     } else {
       $session->msg('d',' Ocurrio un problema, intentanlo nuevamente! ');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar nuevo producto</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Titulo del producto">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Seleccionar categoría</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['nombre'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="product-photo">
                      <option value="">Seleccionar imagen</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Cantidad">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                     <input type="number" class="form-control" name="buying-price" placeholder="Precio">
                     <span class="input-group-addon">.00</span>
                  </div>
                 </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="date" class="form-control" name="agenda" placeholder="Fecha Agenda">
                      
                   </div>
                  </div>
               </div>
              </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
