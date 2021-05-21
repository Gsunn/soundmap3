<?php 

$path    = 'images/fotos';
$files = array_diff(scandir($path), array('.', '..'));

?>
       <div id="thumbnail-slider">
        <div class="inner">
            <ul>
               <?php
                    for($i=2 ; $i<count($files);$i++){
                        echo '<li><a class="thumb" href="images/fotos/' . $files[$i] . '"></a></li>';
                    }
                ?>
              <!--  <li><a class="thumb" href="images/fotos/101~vena1.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/102~avdPaz.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/103~tren.jpg.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/104~plazaMayor.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/105~cSantander.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/106~plantio.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/108~camion1.jpg"></a></li>
                <li><a class="thumb" href="images/fotos/109~pentasa3.jpg"></a></li>-->
            </ul>
        </div>
    </div>
    
 