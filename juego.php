<?php


include ('./misFunciones.php');
$vidas = $_POST['vidas'];
$correctas = $_POST['correctas'];
$temas = $_POST['tema'];

$mysqli = conectaBBDD();
$resultadoQuery = $mysqli ->query("SELECT * FROM preguntas WHERE tema = '$temas'");
$numPreguntas = $resultadoQuery -> num_rows;

//declaro un array en php para guardar el resultado de la query
$listaPreguntas = array();


for($i=0; $i < $numPreguntas; $i++){
    $r = $resultadoQuery -> fetch_array(); // leo una fila del resultado de la query
    $listaPreguntas[$i][0] = $r['numero'];
    $listaPreguntas[$i][1] = $r['enunciado'];
    $listaPreguntas[$i][2] = $r['r1'];
    $listaPreguntas[$i][3] = $r['r2'];
    $listaPreguntas[$i][4] = $r['r3'];
    $listaPreguntas[$i][5] = $r['r4'];
    $listaPreguntas[$i][6] = $r['correcta'];
    
}

$preguntaActual = rand(0, $numPreguntas);

?>
<div>
    <p></p>
    <p<a class="btn btn-block btn-dark disabled">Demuestra que estas listo para la EVAU</a></p>
    <p><a class="btn btn-block btn-warning" onclick="volver();" > Volver al menu</a></p>
    <p><a id="sigue1" class="btn btn-block btn-primary"><?php echo $temas; ?></a></p>
    
    <p><a class="btn btn-block btn-primary"> <?php echo $listaPreguntas[$preguntaActual][1]; ?></a></p>
    <p><a class="btn btn-block btn-success" ><?php echo $listaPreguntas[$preguntaActual][2]; ?></a></p>
    <p><a class="btn btn-block btn-success"><?php echo $listaPreguntas[$preguntaActual][3]; ?></a></p>
    <p><a class="btn btn-block btn-success"><?php echo $listaPreguntas[$preguntaActual][4]; ?></a></p>
    <p><a class="btn btn-block btn-success"><?php echo $listaPreguntas[$preguntaActual][5]; ?></a></p>
    
    
</div>

<script> 
    function volver(){
        $('#principal').load('app.php');
    }

    var listaPreguntas = <?phpecho json_encode($listaPreguntas); ?>
    var numeroPregunta = Math.floor(Math.random() * listaPreguntas.length);
    
    $('#enunciado').text(listaPreguntas[0][1]);
    $('#r1').text(listaPreguntas[0][2]).onClick;
    $('#r2').text(listaPreguntas[0][3]);
    $('#r3').text(listaPreguntas[0][4]);
    $('#r4').text(listaPreguntas[0][5]);
    
    
</script>
