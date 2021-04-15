@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">
         <h1>
          <i class="fas fa-clipboard-list">  Reportes</i>
          
          </h1>
        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Reportes</li>

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
               <h4>Registro de Datos por Cliente.</h4>
              
            </div>

            <div class="card-body">
              {{--
              <div class="info-box">
              {{--date rango fecha
                  <br>
                      <form action="ViewPages" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="container">
                              <div class="row">
                                <label for="from" class="col-form-label">Filtrar Fecha desde</label>
                                    <div class="col-md-2">
                                    <input type="date" class="form-control input-sm" id="from" name="from">
                                    </div>
                                  <label for="from" class="col-form-label">a</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control input-sm" id="to" name="to">
                                    </div>
                                  
                                      <div class="col-md-4">
                                                                                   
                                          <button type="submit" class="btn btn-success btn-sm" name="exportExcel" >Exportar Reporte Prueba
                                            <i class="fas fa-file-excel"></i>
                                          </button>

                                          
                                      </div>
                              </div>
                          </div>
                      </form>
                  <br>

              </div>
               --}}

              {{--Busqueda Aqua--}}
              <div class="info-box bg-info">
                {{--date rango fecha--}}
                    <br>
                        <form action="excelAqua" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                  <label for="from" class="col-form-label">Filtrar Fecha desde</label>
                                      <div class="col-md-2">
                                      <input type="date" class="form-control input-sm" id="from" name="from">
                                      </div>
                                    <label for="from" class="col-form-label">a</label>
                                      <div class="col-md-2">
                                          <input type="date" class="form-control input-sm" id="to" name="to">
                                      </div>
                                    
                                        <div class="col-md-4">
                                                                                     
                                            <button type="submit" class="btn btn-success btn-sm" name="exportExcel" >Exportar Reporte Aqua
                                              <i class="fas fa-file-excel"></i>
                                            </button>
  
                                            
                                        </div>
                                </div>
                            </div>                            
                        </form>
                        <img src="vistas/img/aqua.png" class="img-thumbnail" alt="aquachile" width="150px">                         
                    <br>  
                </div>
              {{--fin busqueda aqua--}}

              {{--Busqueda multi--}}
              <div class="info-box bg-info">
                {{--date rango fecha--}}
                    <br>
                        <form action="excelMulti" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                  <label for="from" class="col-form-label">Filtrar Fecha desde</label>
                                      <div class="col-md-2">
                                      <input type="date" class="form-control input-sm" id="from" name="from">
                                      </div>
                                    <label for="from" class="col-form-label">a</label>
                                      <div class="col-md-2">
                                          <input type="date" class="form-control input-sm" id="to" name="to">
                                      </div>
                                    
                                        <div class="col-md-4">
                                                                                     
                                            <button type="submit" class="btn btn-success btn-sm" name="exportExcel" >Exportar Reporte Multi
                                              <i class="fas fa-file-excel"></i>
                                      
                                            </button>
  
                                            
                                        </div>
                                </div>
                            </div>                            
                        </form>
                        <img src="vistas/img/multie.png" class="img-thumbnail" alt="aquachile" width="150px" height="200px">                         
                    <br>  
                </div>
              {{--fin busqueda multi--}}

              {{--Busqueda aysen--}}
              <div class="info-box bg-info">
                {{--date rango fecha--}}
                    <br>
                        <form action="excelAysen" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                  <label for="from" class="col-form-label">Filtrar Fecha desde</label>
                                      <div class="col-md-2">
                                      <input type="date" class="form-control input-sm" id="from" name="from">
                                      </div>
                                    <label for="from" class="col-form-label">a</label>
                                      <div class="col-md-2">
                                          <input type="date" class="form-control input-sm" id="to" name="to">
                                      </div>
                                    
                                        <div class="col-md-4">
                                                                                     
                                            <button type="submit" class="btn btn-success btn-sm" name="exportExcel" >Exportar Reporte Aysen
                                              <i class="fas fa-file-excel"></i>
                                            </button>
  
                                            
                                        </div>
                                </div>
                            </div>                            
                        </form>
                        <img src="vistas/img/aysenn.jpg" class="img-thumbnail" alt="aquachile" width="150px">                         
                    <br>  
                </div>
              {{--fin busqueda aysen--}}
                     
            </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection