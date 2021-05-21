<?php
// open log file
$lineas = file('../log/hacklog.log');
// Recorrer nuestro array, mostrar el código fuente HTML como tal y mostrar tambíen los números de línea.
?>
<script>
    var ch = ($('#page-wrapper').height());
    $('#logContent').height(ch);
</script>
<div id="logContent" class="container "style="width:80%; overflow:scroll;">
<?php
foreach ($lineas as $num_linea => $linea) {
    //var_dump($linea);
    //$linea = substr ($linea, 0, -1);
    //var_dump(trim($linea));
    if(trim($linea) == "<<<LOG"){
        echo '<div class="well">';
    }else if(trim($linea) == "LOG>>>"){
        echo '</div>';
    }else{
        echo "Línea #<b>{$num_linea}</b> : " . htmlspecialchars(trim($linea)) . "<br />\n";
    }
}
?>
</div>
