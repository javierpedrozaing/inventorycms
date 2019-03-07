<?php include_once 'includes/templates/header2.php';?>
<!--CALENDARIO-->
<!--------------------------------------------------------------------------------->
<div class="linea contenedor">
    <p></p>
  </div>
<!--------------------------------------------------------------------------------->

  <section class="seccion">
      <h2>CONTACTANOS</h2>
      <div class="contenedor">
          <iframe id="mapa"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.589816352483!2d-74.05700758007494!3d4.666986061437305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9af59b59b5dd%3A0x1ef37fb083eb59ce!2sAk.+15+%2380-36%2C+Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1550847209212" width="100%" height="450" frameborder="0"  allowfullscreen></iframe>
      </div>

    </section>
    
    <section class="form_wrap">
  <!---------------------------FORMULARIO DE CONTACTO---------------------------->
      <section class="cantact_info">
          <section class="info_title">
              <span class="fa fa-user-circle"></span>
              <h2>INFORMACION<br>DE CONTACTO</h2>
          </section>
          <section class="info_items">
              <p><span class="fa fa-envelope"></span> info.contact@gmail.com</p>
              <p><span class="fa fa-mobile"></span> +57</p>
          </section>
      </section>

      <form action="" class="form_contact">
          <h2>Envia un mensaje</h2>
          <div class="user_info">
              <label for="names">Nombres *</label>
              <input type="text" id="names">

              <label for="phone">Telefono / Celular</label>
              <input type="text" id="phone">

              <label for="email">Correo electronico *</label>
              <input type="text" id="email">

              <label for="mensaje">Mensaje *</label>
              <textarea id="mensaje"></textarea>

              <input type="button" value="Enviar Mensaje" id="btnSend">
          </div>
      </form>

  </section>
  <!--------------------------- FN FORMULARIO DE CONTACTO---------------------------->



  <?php include_once 'includes/templates/footer.php';?>