<meta charset="UTF-8">

<?php
session_start();
include('../seguridad.php');
?>

<div class="box">
	<i class="cerrar">Cerrar</i>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form id="datos2" class="pasos pasos--box" action="../../controllers/actualizarreferencia.php" method="post">					
					<input type="hidden" name="accion" value="1">
		
					<a id="errores"></a>
		
					<div  class="errores clearfix">
						<div class="revisar">
							<p>Por favor revisar los siguientes campos:</p>
							<ul></ul>
						</div>
					</div>

					 <!-- Grupo -->
                    <div class="col-lg-12 col-sm-12">
                        <div class="grupo">
                            <div class="row">

                                <!-- Item -->
                                <div class="col-sm-4">
                                    <div class="n_grupo"><span>Descripción</span></div>
                                </div>

                                <!-- Item -->
                                 <div class="col-sm-8">
                                        <div class="item">
                                            <label>
                                                <input type="text" name="txt_descripcion" id="txt_descripcion" value="" title="Descripción es requerido" required>
                                            </label>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <div class="row">
                                <!-- Item -->
		                     <div class="col-sm-3 filtrar">
		                        <label class="btnFull">
		                            <!-- <input type="submit" value="Enviar" Onclick="Validargestionproceso()" > -->
		                            <input id="Enviarformt" type="submit" value="Guardar" >
		                        </label>
		                    </div>
                		</div>

                    </div>
                    <!-- / Grupo -->                  


				</form>
			</div>
		</div>

	</div>
</div>