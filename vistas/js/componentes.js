/*=============================================
EDITAR Componente
=============================================*/
$(".tablas").on("click", ".btnEditarComponente", function(){

	var idComponente = $(this).attr("idComponente");

	var datos = new FormData();
	datos.append("idComponente", idComponente);

	$.ajax({
		url: "ajax/componentes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarComponente").val(respuesta["componente"]);
     		$("#idComponente").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR Componente
=============================================*/
$(".tablas").on("click", ".btnEliminarComponente", function(){

	 var idComponente = $(this).attr("idComponente");

	 swal({
	 	title: '¿Está seguro de borrar la componente?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar componente!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=componentes&idComponente="+idComponente;

	 	}

	 })

})