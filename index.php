<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TRIVIAL DE PREGUNTAS EVAU</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="" href=""
    </head>
    <body style="background-color: white">
        
        
        <div class="container" style="background-color: blue" id="principal">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center" style="color: white"> TRIVIAL PREGUNTAS EVAU </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <br/><br/>

                          <input id="cajaNombre" class="form-control-plaintext" type="text" placeholder="Usuario" required="required" style="font-size: 25px" >'
                          <br/>

                          <input id="cajaPassword" class="form-control" type="password" placeholder="contraseña">
                          <br/>

                          <button id="boton1" class="btn btn-primary btn-block" type="submit">Primary</button>
                          <br/>
                          <br/>
                    
                    
                </div>
                <div class="col-4">
                    
                </div> 
            </div>
        </div>
        
    </body>
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    <script>
         // document ready se ejecuta cuando toda la pagina se ha cargado correctamente
//        $(document).ready(function() {
//            $('#cajaNombre').hide();
//        });
        
        $.validate({
            lang: 'es'
        });
        
        $('#boton1').click(function() {
            //leo el contenido de las cajas nombre y contraseña
              var _cajaNombre = $('#cajaNombre').val();
              var _cajaPassword = $('#cajaPassword').val();
              
              $('#principal').load("login.php", {
                  cajaNombre: _cajaNombre,
                  cajaPassword: _cajaPassword
              });
            
            
//            console.log("aqui si llega");
//            //$('#nombre').val("Why you are running?");
//            //$('input[name=usuario_nombre]').val("Why you running?");
//            $('#cajaNombre').show(500);
            
        });
        
    </script>
</html>
