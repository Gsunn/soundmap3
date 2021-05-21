
<?php   
	//include("../configSQL.php");

	$buscar = $_POST['b'];
	  	echo  $buscar; 
	//variable de session para recogerla en enviar para indicar la idArticculo del comentario
	//session_start();
	//$_SESSION["articulo"]=$_POST['b'];	//se pasa a enviar.php 
	if(!empty($buscar)) {
            buscar($buscar);
     }
			
	function buscar($b){
		
		include("../conexion.php");	  
		
		$sql ="SELECT * FROM tbl_sitios WHERE id=" . $b;
	
		$resultado = $conexion->query($sql);  
		$fila = $resultado->fetch_assoc(); 
		
		
		//DIALOGO MODAL OCULTO INICIALMETE -->
         echo'   <div class="modal-dialog">';
         echo'       <div class="modal-content" id="vistaDetalle">';
		 echo'		 	<div class="modal-header">';
         echo'              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cerrarse()">&times;</button>';
         echo'              <h2 class="modal-title" id="miModalTitulo">'.$fila['nombre'].'</h2>';
		 echo'              <h3>'.$fila['direccion'].'</h3>';
		 echo'				<img class="img-rounded img-responsive" alt="" src="images/'.$fila['logo'].'"/>';
         echo'          </div>';
         echo'          <div class="modal-body">'.$fila['id'].'</div>';
		 echo'          <div class="modal-body" style="padding-bottom: 0px;">';
		 echo'      		    <div class="widget-container widget_gallery boxed">
									<div class="inner">
										<div id="myCarousel" class="carousel slide auto" data-interval="2500">
											<!-- Carousel items -->
											<div class="carousel-inner">
												
												<div class="active item">
													<img class="img-responsive center-block" src="images/temp/top-slider-5.jpg" alt=""/>
													<div class="carousel-title">
														<h6>Brave animated series</h6>
														<p>Disney Pixar</p>
													</div>
												</div>
												
												<div class="item">
													<img class="img-responsive center-block" src="images/temp/top-slider-2.jpg" alt="" />
													<div class="carousel-title">
														<h6>Horton</h6>
														<p>Change your fate</p>
													</div>
												</div>
												
											</div>
											<!-- Carousel indicators -->
											<ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1"></li>
											</ol>
											<!-- Carousel nav -->
											<a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
											<a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
										</div>
									</div>
								</div>';
		 echo'          </div>';						
		 echo'			<div class="modal-body" style="min-height: 48px; padding-top: 0px;">';
         echo'               	<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span>Cerrar</span></button>';
		 echo'               	<button type="button" class="btn btn-default pull-left" onClick="verComentarios()"><span>Ver comentarios</span></button>';
		 echo'               	<button type="button" class="btn btn-default pull-left" onClick="verFormulario()"><span>Comentar</span></button>';
		 echo'			</div>';				
		 echo'			<div class="modal-footer">';  
		  echo'				<div id="formulario"  style="display: none">';
		 echo'					<div class="add-comment styled boxed" id="addcomments">
									<div class="add-comment-title"><h3></h3></div>
									<div class="comment-form">
										<form action="#" method="post" id="commentForm" class="ajax_form">
											<div class="form-inner">
												<div class="field_select">
													<label for="contact_name" class="label_title">Name:</label>
													<input type="text" name="contact_name" id="contact_name"  data-placeholder="Your name"/>
												</div>
												<div class="field_text">
													<label for="subject" class="label_title">Subject:</label>
													<input type="text" name="subject" id="subject" value="" placeholder="Wireframe" class="inputtext input_middle required" />
												</div>
												<div class="clear"></div>
												<div class="field_text field_textarea">
													<div id="edit_buttons" class="edit_buttons"></div>
													<label for="styled_message" class="label_title">Message:</label>
													<textarea cols="30" rows="10" name="styled_message" id="styled_message" class="textarea textarea_middle"></textarea>
												</div>
												<div class="clear"></div>
											</div>
								
											<div class="rowSubmit">
												<a onclick="document.getElementById("commentForm").reset();return false" href="#" class="link-reset btn"><span>Discard</span></a>
												<span class="btn btn-red">
													<input type="submit" id="send" value="Send Message" />
												</span>
											</div>
										</form>
									</div>
								</div> ';
		 echo'				</div>';   //idformulario  
		 echo'				<div id="comentarios" style="display: none">';   
		 echo'					<div class="comment-list clearfix" id="comments">
									<ol>
										<li class="comment">
											<div class="comment-body">
												<div class="inner">
													<div class="comment-arrow"></div>
													<div class="comment-avatar">
														<div class="avatar">
															<img src="images/temp/avatar1.png" alt="" />
														</div>
													</div>
													<div class="comment-text">
														<div class="comment-author clearfix">
															<a href="#" class="link-author">Brad Pit</a>
															<span class="comment-date">June 26, 2013</span> | 
															<a href="#addcomments" class="link-reply anchor">Reply</a>
														</div>
														<div class="comment-entry">
															William Bradley "Brad" Pitt is an American actor and film producer. Pitt has received four Academy nominations and five Award nominations.
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>
										</li>
									</ol>
								</div>';        
		 echo'				</div>';  //comentarios  
		 echo'			</div>';//modal-footer
		 
		 //DESTRUYE LOS ARRAY UTILIZADOS
		unset($resultado);
		unset($fila);
		
	
		$conexion->close(); //cierra conexion
		
		}//buscar	
		
		
?>
<script>
	//cuando la pagina se ha cargado ejecuta el metodo ajustarSlider()
    $(document).ready(function(){
		 ajustarSlider();
});

function verComentarios(){
		$('#comentarios').toggle();
	}
	
function verFormulario(){
		$('#formulario').toggle();
	}
</script>
