<?php include_once 'includes/templates/header.php';?>

<!--CALENDARIO-->

<div class="linea contenedor">
    <p></p>
  </div>
	
	<section class="seccion-calendario clearfix">
			<title>¿PARA CUANDO QUIERES TUS FLORES?</title>
			<style>
				html {
					box-sizing: border-box;
				}
	
				body {
	
					font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
					color: #333;
					background-color: white;
					-webkit-font-smoothing: antialiased;
				}
	
				footer {
					text-align: center;
					margin: 1.6rem 0;
				}
	
				h1 {
					text-align: center;
				}
	
				.container {
					width: 100%;
					margin: 1.6rem auto;
					max-width: 60rem;
					text-align: center;
				}
	
				.demo-picked {
					font-size: 1.2rem;
					text-align: center;
				}
	
				.demo-picked span {
					font-weight: bold;
				}
			</style>
		</section>
	
		<section>
                <input type="text" hidden id="datepicker">

				<div class="flores_destacadas container">					
					<div class="row"> 
	    				
						<?php include 'includes/funciones/querysql.php';?>
						
					</div>
					
				</div>
		
		</section>
	
        
        <script>
            var picker = new Pikaday({ 
                reposition : true,
                position : 'top right',
                field: $('#datepicker')[0],                
                format: 'YYYY-MM-DD',                 
                bound : false,               
                toString(date, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    return `${day}-${month}-${year}`;
                },   
                
                parse(dateString, format) {
                    // dateString is the result of `toString` method
                    const parts = dateString.split('/');
                    const day = parseInt(parts[0], 10);
                    const month = parseInt(parts[1], 10) - 1;
                    const year = parseInt(parts[2], 10);
                    return new Date(year, month, day);
                },
                i18n: {
                    previousMonth : 'Mes Anterior',
                    nextMonth     : 'Siguiente mes',
                    months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                    weekdays      : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
                    weekdaysShort : ['Dom','Lun','Mar','Mier','Jue','Vier','Sab']
                },
                onSelect: function() {
                    console.log(this.getMoment().format('YYYY-MM-DD'));
                    var parametros = {
                        "fecha" : this.getMoment().format('YYYY-MM-DD'),                
                    };
                    $.ajax({
                                data:  parametros, //datos que se envian a traves de ajax
                                url:   'includes/funciones/getAgenda.php', //archivo que recibe la peticion
                                type:  'post', //método de envio
                            
                                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    console.log("respuesta "+ response);
                                        $("#resultado").html(response);
                                }
                    });
                }

            });
        </script>
	

		<!--FINALCALENDARIO-->




<section  class="seccion">
    <h2>NOSOTROS</h2>
    <div class="contenedor">
  
    </div>
  </section>
<section class="contenedor-nosotros">
    <div class="contenedor clearfix">
        <article class="contenedor-nosotros clearfix">
            <img src="img/Corazon-Woo-1x1.jpg" alt="Imagen Puente De la torre">
            <br>
            <p>Somos un equipo de personas que nos encantan las flores y para quienes las combinaciones de flores se estaban volviendo algo muy común, las flores del día busca la satisfacción del cliente tanto en calidad como en su dedicación y amor en el proceso de producción de los ramos.
                <br><br>Quien buscan la variedad y salir de la cotidianidad en regalar flores las cuales son más que un te quiero o un porque si … es amor en una flor.</p>
        </article>
    </div>
</section>

<section class="conocenos contenedor">
  <h2>CONOCENOS</h2>
  <ul class="lista-conocenos clearfix">
      <li>
          <div class="invitado">
            <img src="img/Foto-Andres.jpg" alt="imagen andres">
            <h3>Andres Angel</h3>
            <p>La fuerza bruta de la empresa</p>
          </div>
      </li>
      <li>
          <div class="invitado">
              <img src="img/Foto-Cata.jpg" alt="imagen cata">
              <h3>Catalina Correra</h3>
              <p>La disque diseñadora</p>
            </div>
      </li>
      <li>
          <div class="invitado">
              <img src="img/Foto-Felipe-1.jpg" alt="imagen felipe">
              <h3>Felipe Romero</h3>
              <p>El maleteador Online</p>
            </div>
      </li>
  </ul>
</section>
<?php include_once 'includes/templates/footer.php';?>