@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>reportes</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active"><a href="{{url('/reportes')}}">Reportes</a></li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCentro">Crear nuevo centro</button>

             
            </div>

            <div class="card-body">
          {{--date rango fecha--}}
              <div class="row input-daterange">
                <div class="col-md-4">
                  <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Desde"
                   readonly />

                </div>

                <div class="col-md-4">
                  <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Hasta"
                   readonly />

                </div>
                <div class="col-md-4">
                  <button type="button" name="filter" id="filter" class="btn btn-primary">Buscar</button>
                  <button type="button" name="refresh" id="refresh" class="btn btn-default">Refrescar</button>
                </div>

              </div>
              <br>

              <table class="table table-bordered table-striped dt-responsive" with="100%" id="tablaReportes">

                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Observacion</th>
                    <th>Estado</th>
                    <th>Grabacion</th>
                   <th width="150px">Imagen</th>
                    <th>fecha</th>
                    
                    
                  </tr>
                </thead>

              </table>
              <!-- chars(grafico) -->
              
              <br>
              <div class="card col-12">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                     Prueba base datos pyton
                  </h3>
  
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                </div>

                <div class="card-body">
                  <canvas id="myLine" width="487" height="230"></canvas>
                </div>
                
              </div>  
              <br>
                           

            
                <!-- fin chars(grafico) -->

                <!--grafica prueba-->
              
                <!-- fin grafico-->
              
            </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>



  <script>
    
    $(document).ready(function () {
      load_data();

      //inicio calendario
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
          $('#tablaReportes').DataTable().destroy();
          load_data(from_date, to_date);
          } else {
              alert('Both Date is required');
          }
    });
    
    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#tablaReportes').DataTable().destroy();
        load_data();
    });

    //Load datatable
    
    function load_data(from_date = '', to_date = ''){   
        $("#tablaReportes").DataTable({
          processing: true,
          serverSide: true,
          ajax : {
            url: "{{ route('reportes.index')}}",
            type: 'GET',
            data:{from_date:from_date, to_date:to_date}
          },
          columns: [
            {
              data:'id',name:'id'
            },
            {
              data:'titulo',name:'titulo'
            },
            {
              data:'observacion',name:'observacion'
            },
            {
              data:'estado',name:'estado'
            },
            {
              data:'grabacion',name:'grabacion'
            },
            {
              data:'lugar',name:'lugar',
              render: function(data, type, full, meta){

              if(data == null){

                return '<img src="'+ruta+'/img/administradores/admin.png">'

              }else{

                return '<img src="'+ruta+'/'+data+'" class="img-responsive" width="150">'
              }
            },
            orderable: false 
          },   

            {
              data:'created_at',name:'created_at'
            },

          ],
          order: [[0,'asc']]
        });
      }

    });
  </script>

     
   
        
        
   


@endsection