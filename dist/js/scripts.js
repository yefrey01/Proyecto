// @codekit-prepend "datatables/datatables.min.js"
// @codekit-prepend "select/jquery.combo.select.js"
// @codekit-prepend "validate/jquery.validate.js"
// @codekit-prepend "jquery.steps.min.js"
// @codekit-prepend "icheck.js"

$(document).ready(function(){

	// Checkbox 
	$(".check_login").iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	// Checkbox 
	$(".formu .check").iCheck({
		checkboxClass: 'icheckbox_flat-green2',
		radioClass: 'iradio_flat-green2'
	});


	// Copiar #saludo en #saludo2
	var saludo = $("#saludo").html();
	$("#saludo2").prepend(saludo);

	// Datatables
	$('#tabla_menu').DataTable({
		"columnDefs": [
			{
				//"width": "30%",
				//"targets": 4 
			}
		    
		],
		//responsive: true,
		responsive: {
			details: {
				
			}
		},
		"language": {
			"url": "js/datatables/spanish.json"
		},
		"paging": false,
		"searching": false,
		"info":  false,

		"order": [[ 3, "desc" ]],

	});


	// Datatables
	$('#tabla_cotizacion').DataTable({
		"columnDefs": [
			{
				//"width": "30%",
				//"targets": 4 
				orderable: false, targets: [2,3],

			},
			/*{
				"width": "10%", "targets": [2,3]
			},
			{
				"width": "20%", "targets": [0]
			}*/
		    
		],
		//responsive: true,
		responsive: {
			details: {
				
			}
		},
		"language": {
			"url": "js/datatables/spanish.json"
		},
		"paging": true,
		"searching": false,
		"info":  false,
		"bLengthChange" : false,

		"order": [[ 0, "asc" ]],

	});



	// Validar campos
	var form = $(".pasos");
	var conten_errores = $('.errores');


	function errores(){

		var form = $(".pasos");
		var conten_errores = $('.errores');

		form.validate({
			errorContainer: conten_errores,
			errorLabelContainer: $("ul", conten_errores),
			wrapper: 'li',
			invalidHandler: function(){

				scrollToElement("#errores");

				setTimeout(function(){ 
					error_select();
				},100);

			},
			
		});




	}

	


	// Tabs
	$(".pasos").steps({
		headerTag: "h2",
		bodyTag: "section",
		transitionEffect: "fade",
		labels: {
			cancel: "Cancelar",
			current: "current step:",
			pagination: "Pagination",
			finish: "Finalizar",
			next: "Siguiente",
			previous: "Anterior",
			loading: "Cargando ..."
		},

		onInit: function () {

			// Checkbox 
			$(".check").iCheck({
				checkboxClass: 'icheckbox_flat-green2',
				radioClass: 'iradio_flat-green2'
			});	

			errores();

			


		},
		onStepChanged: function (event, currentIndex)
		{
			grupo();

			setTimeout(function(){ 
					error_select();
			},1000);

			setTimeout(function(){ 
				scrollToElement("#errores");
			},500);

			
		},

		onStepChanging: function (event, currentIndex, newIndex)
		{
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onFinishing: function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
			//autoFocus: true
		});

	// Detectar tamaño del tab mas alto y aplicarlo a todas las anclas del tab
	if($(window).width() > 767){

		var tab = $(".pasos .steps ul").innerHeight();
		$(".pasos .steps ul li a").css("height", tab);

	}

	
	$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '<Ant',
	nextText: 'Sig>',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	$(".fecha").datepicker({ 
		dateFormat: 'dd-mm-yy'
	});



	// Recorrer el alto de cada .grupo para aplicar ese alto a la clase .n_grupo y a las columnas internas
	function grupo(){
		$(".grupo").each(function(){

			var alto = $(this).innerHeight();

			$(this).find(".n_grupo").css("height", alto);

			$(this).find("[class*='col-']").css("height", alto);
			//console.log(alto);

		});
	}

	grupo();


	// Scroll
	function scrollToElement(target) {
		var topoffset = 10;
		var speed = 800;
		var destination = jQuery( target ).offset().top - topoffset;
		jQuery( 'html:not(:animated),body:not(:animated)' ).animate( { scrollTop: destination}, speed, function() {
			//window.location.hash = target;
		});
		return false;
	}


	function error_select(){

		$(".selec").each(function(){

			if($(this).hasClass('error')){

				$(this).parent(".combo").addClass("error");

			} else {
				$(this).parent(".combo").removeClass("error");
			}

		});


		$("[type='radio']").each(function(){

			if($(this).hasClass('error')){

				$(this).parent(".iradio_flat-green2").parent("label").next("span").addClass("error");

			} else {
				$(this).parent(".iradio_flat-green2").parent("label").next("span").removeClass("error");
			}

		});



		$("[type='checkbox']").each(function(){

			if($(this).hasClass('error')){

				$(this).parent(".icheckbox_flat-green2").parent("label").next("span").addClass("error");

			} else {
				$(this).parent(".icheckbox_flat-green2").parent("label").next("span").removeClass("error");
			}

		});


		
	}


	// Activar y desactivar campos segun checkbox o radio boton
	$(".activar").on("ifChecked",function(){

		var id = $(this).attr("id");

		$("#" + id + "_ref").addClass("mostrar");
	});

	$(".activar").on("ifUnchecked",function(){

		var id = $(this).attr("id");

		$("#" + id + "_ref").removeClass("mostrar");
	});


});