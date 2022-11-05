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

$var_fecha=$V_datosnovedad['fecha'];
for($i=0;$i<$tamtiponovedad;$i++){
	if($V_datostnovedad[$i]['id_tiponovedad']==$V_datosnovedad['id_tiponovedad']){
		$var_tnovedad=$V_datostnovedad[$i]['descripcion'];
	}
}
for($i=0;$i<$tamsecreporta;$i++){
	if($V_datossreporta[$i]['id_seccionreporta']==$V_datosnovedad['id_seccionreporta']){
		$var_sreporta=$V_datossreporta[$i]['descripcion'];
	}
}
for($i=0;$i<$tamporigen;$i++){
	if($V_datosporigen[$i]['id_procesoorigen']==$V_datosnovedad['id_procesoorigen']){
		$var_porigen=$V_datosporigen[$i]['descripcion'];
	}
}

for($i=0;$i<$tamsorigen;$i++){
	if($V_datossorigen[$i]['id_seccionorigen']==$V_datosnovedad['id_seccionorigen']){
		$var_sorigen=$V_datossorigen[$i]['descripcion'];
	}
}

for($i=0;$i<$tamrequipo;$i++){
	if($V_datosrequipo[$i]['id_referenciaequipo']==$V_datosnovedad['id_referenciaequipo']){
		$var_requipo=$V_datosrequipo[$i]['descripcion'];
	}
}

$var_npiezas=$V_datosnovedad['num_piezas'];

for($i=0;$i<$tamcnovedad;$i++){
	if($V_datoscnovedad[$i]['id_causanovedad']==$V_datosnovedad['id_causanovedad']){
		$var_cnovedad=$V_datoscnovedad[$i]['descripcion'];
	}
}

$var_descripcion=$V_datosnovedad['descripcion'];
$var_oproduccion=$V_datosnovedad['ordenproduccion'];

for($i=0;$i<$tamtratamiento;$i++){
	if($V_datostratamiento[$i]['id_tratamiento']==$V_datosnovedad['id_tratamiento']){
		$var_tratamiento=$V_datostratamiento[$i]['descripcion'];
	}
}

$var_tperdido=(($V_datosnovedad['dias']*24)+$V_datosnovedad['horas']+($V_datosnovedad['minutos']/60));

for($i=0;$i<$tamcdetallada;$i++){
	if($V_datoscdetallada[$i]['id_causadetallada']==$V_datosnovedad['id_causadetallada']){
		$var_cdetallada=$V_datoscdetallada[$i]['descripcion'];
	}
}

$var_observaciones=$V_datosnovedad['observaciones'];

// Include the main TCPDF library (search for installation path).
require_once('../../dist/tcpdf/tcpdf_include.php');
require_once('../../dist/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData('', '', '', 'Generado por:'.$_SESSION['ses_nombreuser']);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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

</head>

<body>
	<br>
	<br>
		<header>
			<table>
				<tr>
					<td>
						<div class="container" align="left">
							<img src="../../dist/css/images/logo-innove.png" width="90px" alt="Logo">
						</div>
					</td>
					<td align="center" style="font-weight: bold;"><h3>Informe Novedad</h3></td>
					<td>
						<div class="container" align="right">
							<img src="../../dist/css/images/logopenagos.png" width="100px" alt="Logo">
						</div>	
					</td>
				</tr>
			</table>			
		</header>	
			<br>
			<br>

		<div class="container">

			<table width="100%" cellspacing="2" cellpadding="1">
				<thead>
					<tr >
						<td width="38%" style="font-weight: bold;" colspan="4">Novedad: '. $var_idnovedad.'</td>
						<td width="5%"></td>
						<td style="font-weight: bold;" width="8%">Fecha: </td>
						<td width="12%">'. $var_fecha .'</td>
					</tr>

				</thead>
				<tbody>
					<tr>						
						<td style="font-weight: bold;" width="18%">Tipo Novedad: </td>
						<td width="20%">'. $var_tnovedad .'</td>
						<td width="5%"></td>
						<td style="font-weight: bold;" width="18%">Seccion Reporta: </td>
						<td width="20%">'. $var_sreporta.'</td>
					</tr>
					<tr>					
						<td style="font-weight: bold;" width="18%">Proceso Origen: </td>
						<td width="20%">'. $var_porigen .'</td>
						<td width="5%"></td>
						<td style="font-weight: bold;" width="18%">Sección Origen: </td>
						<td width="20%" >'. $var_sorigen .'</td>
					</tr>
					<tr>
						<td style="font-weight: bold;" width="18%">Ref. Equipo: </td>
						<td width="20%">'. $var_requipo .'</td>
						<td width="5%"></td>
						<td style="font-weight: bold;" width="18%">Num. Piezas: </td>
						<td width="20%">'. $var_npiezas .'</td>
					</tr>
					<tr> 
						<td style="font-weight: bold;" width="18%">Causa de Novedad: </td>
						<td width="60%">'. $var_cnovedad .'</td>
					</tr>
					<tr> 
						<td style="font-weight: bold;" width="18%">Descripción: </td>
						<td width="60%">'. $var_descripcion .'</td>
					</tr>
					<tr>
						<td style="font-weight: bold;" width="18%">Ord. Producción: </td>
						<td width="8%">'. $var_oproduccion .'</td>
						<td width="3%"></td>
						<td style="font-weight: bold;" width="14%">Tratamiento: </td>
						<td width="20%">'. $var_tratamiento .'</td>
						<td width="3%"></td>
						<td style="font-weight: bold;" width="15%">T. Perdido: </td>
						<td width="10%">'. number_format($var_tperdido,1) .' horas.</td>
					</tr>
					<tr> 
						<td style="font-weight: bold;" width="18%">Causa Detallada: </td>
						<td width="60%">'. $var_cdetallada .'</td>
					</tr>
					<tr> 
						<td style="font-weight: bold;" width="18%">Observaciones: </td>
						<td width="60%">'. $var_observaciones .'</td>
					</tr>
				</tbody>
			</table>

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