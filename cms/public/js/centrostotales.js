/*=============================================
DataTable Servidor de artículos
=============================================*/

// $.ajax({

// 	url: ruta+"/articulos",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
//         console.error(textStatus + " " + errorThrown);
//     }

// })

/*=============================================
DataTable de artículos
=============================================*/

var tablaCentros = $("#tablaCentrostotales").DataTable({
    
	
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/totalcentros"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	 columns: [{
	    data: 'id_centro',
	    name: 'id_centro'

	  }, 
	  	   
	  {
	    data: 'titulo_centro',
	    name: 'titulo_centro'

      }, 
      {
	    data: 'observacion_centro',
	    name: 'observacion_centro'

	  }, 
	  {
	    data: 'ubicacion',
	    name: 'ubicacion'

	  }, 
	  {
	    data: 'estado',
	    name: 'estado'

	  }, 
	  
	  {
	    data: 'created_at',
	    name: 'created_at',

      }, 
      {
	    data: 'nombre',
	    name: 'nombre'

	  },
	  {
	    data: 'acciones',
	    name: 'acciones'

   	  }

	],
 	"language": {

	    "sProcessing": "Procesando...",
	    "sLengthMenu": "Mostrar _MENU_ registros",
	    "sZeroRecords": "No se encontraron resultados",
	    "sEmptyTable": "Ningún dato disponible en esta tabla",
	    "sInfo": "Mostrando registros del _START_ al _END_",
	    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
	    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sSearch": "Buscar:",
	    "sUrl": "",
	    "sInfoThousands": ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	      "sFirst": "Primero",
	      "sLast": "Último",
	      "sNext": "Siguiente",
	      "sPrevious": "Anterior"
	    },
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }

  	}

});

tablaCentros.on('order.dt search.dt', function(){

	tablaCentros.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();