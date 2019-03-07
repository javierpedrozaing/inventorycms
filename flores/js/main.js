$(function(){

    //SCROLL PANTALLA MENU//
    /*var windowHeight = $(window).height();
    var barraAltura= $('.barra').innerHeight();
    console.log(barraAltura);

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('.body').css({'margin-top':barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('.body').css({'margin-top':0px'});
            
        }
    });*///FINAL PANTALLA FLOTANTE//

    //MENU RESPONSIVE//

    $('.menu-movil').on('click', function(){
        $('.navegacion-principal').slideToggle();
    });
    //FINAL MENU RESPONSIVE//


$(".demo-picked span").on("DOMSubtreeModified",function(){
    console.log( $(this).text());
     var parametros = {
                "fecha" : $(this).text(),                
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
});

});