/*=============================================
Inicio calendario
=============================================*/
$(document).ready(function () {
    load_data();
    
    $('.input-daterange').datepicker({
      todayBtn:'linked',
      format:'yyyy-mm-dd',
      autoclose:true
   });
   
    
   $('#filter').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
        $('#tablaMultiexport').DataTable().destroy();
        load_data(from_date, to_date);
        } else {
            alert('Both Date is required');
        }
   });
  
   $('#refresh').click(function(){
      $('#from_date').val('');
      $('#to_date').val('');
      $('#tablaMultiexport').DataTable().destroy();
      load_data();
   });


   //Load datatable
   
   function load_data(from_date = '', to_date = ''){ 
var TablaMultiexport = $("#tablaMultiexport").DataTable({
	destroy: true,
    searching: false,
	processing: true,
  	serverSide: true,

  	ajax:{
          url: ruta+"/cliente_dos",
          type: 'GET',          
          data:{from_date:from_date, to_date:to_date}		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'titulo',
	    	name: 'titulo'
	  	},
	  	{
	  		data: 'observacion',
	    	name: 'observacion'
          },
        {
            data: 'estado',
            name: 'estado'
        },
        {
            data: 'grabacion',
            name: 'grabacion'
        },
	  	{
	  		data: 'lugar',
	    	name: 'lugar',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return '<img src="'+ruta+'/img/administradores/admin.png" class="img-fluid rounded-circle">'

	    		}else{

	    			return '<img src="'+ruta+'/'+data+'" class="img-fluid">'
	    		}

	    	},

	    	orderable: false
          },
          {
            data:'created_at',name:'created_at'
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
//dentro de la funcion fecha
//});

TablaMultiexport.on('order.dt search.dt', function(){

	TablaMultiexport.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();
} 
});