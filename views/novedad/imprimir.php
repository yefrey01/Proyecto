<?php

session_start();
include('../seguridad.php');
$ruta="../../models/";
include($ruta . 'novedad.php');
include($ruta . 'tiponovedad.php');
include($ruta . 'tratamiento.php');
include($ruta . 'seccion_reporta.php');
include($ruta . 'seccion_origen.php');
include($ruta . 'referencia_equipo.php');
include($ruta . 'proceso_origen.php');
include($ruta . 'causa_novedad.php');
include($ruta . 'causa_detallada.php');

$obj_novedad=new novedad();
$obj_tiponovedad=new tiponovedad();
$obj_tratamiento= new tratamiento();
$obj_seccionreporta= new seccion_reporta();
$obj_seccionorigen= new seccion_origen();
$obj_referenciaequipo= new referencia_equipo();
$obj_procesoorigen= new proceso_origen();
$obj_causanovedad= new causa_novedad();
$obj_causadetallada= new causa_detallada();

$var_idnovedad=$_GET['idnv'];
$V_datosnovedad=$obj_novedad->getnovedad($var_idnovedad);

$V_datostnovedad=$obj_tiponovedad->getalltiponovedad();
$tamtiponovedad=count($V_datostnovedad);

$V_datossreporta=$obj_seccionreporta->getallseccreporta();
$tamsecreporta=count($V_datossreporta);

$V_datosporigen=$obj_procesoorigen->getallprocesoorig();
$tamporigen=count($V_datosporigen);

$V_datossorigen=$obj_seccionorigen->getallsecorigen();
$tamsorigen=count($V_datossorigen);

$V_datosrequipo=$obj_referenciaequipo->getallrefequipo();
$tamrequipo=count($V_datosrequipo);

$V_datoscnovedad=$obj_causanovedad->getallcausanov();
$tamcnovedad=count($V_datoscnovedad);

$V_datostratamiento=$obj_tratamiento->getalltratamiento();
$tamtratamiento=count($V_datostratamiento);

$V_datoscdetallada=$obj_causadetallada->getallcausadet();
$tamcdetallada=count($V_datoscdetallada);

// Include the main TCPDF library (search for installation path).
require_once('../../dist/tcpdf/tcpdf_include.php');
require_once('../../dist/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('$_SESSION["ses_nombreuser"]');
$pdf->SetTitle('Reporte Novedad');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
	require_once(dirname(__FILE__).'/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();


$html ='
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Estilos Globales -->
	<link rel="stylesheet" href="../../dist/css/global.css">

	<!-- Estilos para las tablas -->
	<link rel="stylesheet" href="../../dist/js/datatables/datatables.css">

	<!-- Estilos jQuery UI para fechas -->
	<link rel="stylesheet" href="../../dist/js/jquery.ui/jquery-ui.min.css">

	<!-- Fancy -->
	<link rel="stylesheet" type="text/css" href="../../dist/fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />

</head>

<body>
		
		<div class="container">

			<div class="row">

				<div class="row">
						<div class="col-md-6">
							<h3 class="titulo">Novedad Nº:'; echo $var_idnovedad; $html='</h3>
						</div>
				</div>

				<div class="col-lg-5 col-sm-12">

							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Fecha: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">';  echo $V_datosnovedad['fecha']; $html='</div> 
								</div>
							</div>

						</div>	


						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tipo Novedad: </div>
								</div>';
								for($i=0;$i<$tamtiponovedad;$i++){
										if($V_datostnovedad[$i]['id_tiponovedad']==$V_datosnovedad['id_tiponovedad']){

							$html='<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datostnovedad[$i]['descripcion']; $html='</div> 
								</div>';

									} 
								}

					$html='	</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Sección Reporta: </div>
								</div>';
								for($i=0;$i<$tamsecreporta;$i++){
										if($V_datossreporta[$i]['id_seccionreporta']==$V_datosnovedad['id_seccionreporta']){
								
								$html='<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datossreporta[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}
						$html='	</div>
						</div>

						<div class="col-lg-5 col-sm-12" >
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Proceso Origen: </div>
								</div>';
								for($i=0;$i<$tamporigen;$i++){
										if($V_datosporigen[$i]['id_procesoorigen']==$V_datosnovedad['id_procesoorigen']){
								$html='
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datosporigen[$i]['descripcion']; $html=' </div> 
								</div>';	
									} 
								}

						$html='</div>								
						</div>	

						<div class="col-lg-12 col-sm-12">

							<div class="row">
								<div class="col-sm-2 col-xs-12 ">
									<div class="label">Sección Origen: </div>
								</div>';
								 for($i=0;$i<$tamsorigen;$i++){
										if($V_datossorigen[$i]['id_seccionorigen']==$V_datosnovedad['id_seccionorigen']){
								$html='
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info">'; echo $V_datossorigen[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}
						$html='</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Referencia Equipo: </div>
								</div>';
								 for($i=0;$i<$tamrequipo;$i++){
										if($V_datosrequipo[$i]['id_referenciaequipo']==$V_datosnovedad['id_referenciaequipo']){
								$html='
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datosrequipo[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}

						$html='</div>
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Núm. Piezas: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datosnovedad['num_piezas']; $html='</div> 
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">


							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Causa Novedad: </div>
								</div>';
								for($i=0;$i<$tamcnovedad;$i++){
										if($V_datoscnovedad[$i]['id_causanovedad']==$V_datosnovedad['id_causanovedad']){

								$html='<div class="col-sm-10 col-xs-12">
									<div class="label  label--info">'; echo $V_datoscnovedad[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}

						$html='</div>

							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Descripcion: </div>
								</div>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info">'; echo $V_datosnovedad['descripcion']; $html='</div> 
								</div>
							</div>	
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">O. de producción: </div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datosnovedad['ordenproduccion']; $html='</div> 
								</div>
							</div>
						</div>		
							
						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tratamiento: </div>
								</div>';
								for($i=0;$i<$tamtratamiento;$i++){
										if($V_datostratamiento[$i]['id_tratamiento']==$V_datosnovedad['id_tratamiento']){
								
							$html='<div class="col-sm-6 col-xs-12">
									<div class="label  label--info">'; echo $V_datostratamiento[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}

							$html='</div>							
						</div>

						<div class="col-lg-5 col-sm-12">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="label">Tiempo Perdido: </div>
								</div>
								<div class="col-sm-6 col-xs-12">';
									$var_tperdido=(($V_datosnovedad['dias']*24)+$V_datosnovedad['horas']+($V_datosnovedad['minutos']/60));
									$html='<div class="label  label--info">'; echo $var_tperdido; $html='min.</div> 
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">
							<div class="row">
								<div class="col-sm-2 col-xs-12">
									<div class="label">Causa Detallada: </div>
								</div>';
								for($i=0;$i<$tamcdetallada;$i++){
										if($V_datoscdetallada[$i]['id_causadetallada']==$V_datosnovedad['id_causadetallada']){

							$html='<div class="col-sm-10 col-xs-12">
									<div class="label  label--info">'; echo $V_datoscdetallada[$i]['descripcion']; $html='</div> 
								</div>';
									} 
								}

							$html='</div>
						</div>	

						<div class="col-lg-12 col-sm-12">
							<div class="row">
								<div class="col-sm-2 col-xs-12 ">
									<div class="label">Observaciones: </div>
								</div>
								<div class="col-sm-10 col-xs-12">
									<div class="label  label--info">';echo $V_datosnovedad['observaciones']; $html='</div> 
								</div>
							</div>
						</div>					

			</div>
		</div>

</body>
</html>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('reporte.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>