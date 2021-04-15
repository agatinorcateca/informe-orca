@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>.::<i class="fas fa-clipboard-list">    Salmones Austral</i></h1>
            <!--barra totales, operativos y cese-->

            <span class="btn btn-outline-info">Total centros    
              <?php
              //   $totalcentros = DB::table('totalcentros')->count();
                $totalcentros = DB::table('totalcentros')
                        ->whereIn('id_cat', [4])
                        ->count();
                echo $totalcentros;
                ?>
            </span>
            <span class="btn btn-outline-success" data-toggle="modal" data-target="#mostrarOperativo">
              Operativos   
              <?php
              $austral = DB::table('totalcentros')
                                        ->where( 'estado', 'operativo')
                                        ->whereIn('id_cat', [4])
                                        ->count();
                                      echo $austral;
                ?>  
            </span>
            <span class="btn btn-outline-danger" data-toggle="modal" data-target="#mostrarCese">
              Cese   
              <?php
              $austral = DB::table('totalcentros')
                                        ->where( 'estado', 'cese')
                                        ->whereIn('id_cat', [4])
                                        ->count();
                                      echo $austral;
                ?> 
            </span>
  

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Austral</li>

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
              
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCentro">
                <i class="fas fa-plus-circle"></i>    Crear nuevo centro</button>

              <a href="{{ route('descargarPDFaustral')}}" target="blank">
                <button class="btn btn-danger btn-sm">Informe PDF
                  <i class="fas fa-file-pdf"></i>
                </button>
              </a>

              <a href="{{ route('enviarPDFaustral')}}" target="blank">
                <button class="btn btn-warning btn-sm">
                   <i class="fas fa-mail-bulk"></i>
                </button>
                
              </a>
              
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
                  <button type="button" name="filter" id="filter" class="btn btn-primary">Buscar
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" name="refresh" id="refresh" class="btn btn-default">
                    <i class="fas fa-sync"></i>
                  </button>
                </div>

              </div>
              <br>

              <table class="table table-bordered table-striped" with="100%" id="Australtabla">

                <thead>
                  <tr>

                    <th>#</th>
                    <th>Nombre</th>
                    <th>Observacion</th>
                    <th>Estado</th>
                    <th>Grabacion</th>
                    <th width="150px">Imagen</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>
                  {{--
                  @foreach ($austral as $key => $value)
              
                   <tr>

                    <td>{{($key+1)}}</td>
                    <td>{{($value["titulo"])}}</td>
                    <td>{{($value["observacion"])}}</td>
                    <td>{{($value["estado"])}}</td>
                    <td>{{($value["grabacion"])}}</td>
                    <td><img src="{{($value["lugar"])}}" class="img-fluid" ></td>
                    <td>
                      <div class="btn-group">

                        <a href="{{url('/')}}/cliente_cuatro/{{$value["id"]}}" class="btn btn-warning btn-sm">
                          
                          <i class="fas fa-pencil-alt text-white"></i>
                        
                        </a>

                        {{--borrar sin filtro--
                        <form method="POST" action="{{url('/')}}/cliente_cuatro/{{$value["id"]}}">
                         
                          <input type="hidden" name="_method" value="DELETE">
                           @csrf
                         
                           <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                           </button>

                        </form>

                      </div>

                    </td>

                    </tr>                  
                                
                  @endforeach--}}
                </tbody>

              </table>
              
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<!--============================
  Crear Centro nuevo
  =============================-->
  <div class="modal" id="crearCentro">

    <div class="modal-dialog">

      <div class="modal-content">
        <form action="{{ url('/')}}/cliente_cuatro" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header bg-info">
            <h4 class="modal-title">Crear Centro</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">

            {{--Nombre centro--}}
            <div class="input-group mb-3">
              <div class="input-group-append input-group-text">
                <i class="fas fa-clipboard-list"></i>
              </div>

              <input type="text" class="form-control" name="titulo"
               value="{{ old('titulo') }}" placeholder="Ingrese Nombre centro" required>

            </div>

            {{--Observacion centro--}}
            <div class="input-group mb-3">
              <div class="input-group-append input-group-text">
                <i class="fas fa-pencil-alt"></i>
              </div>

              <input type="text" class="form-control" name="observacion"
               value="{{ old('observacion') }}" placeholder="Ingrese Observacion">

            </div>


            {{--estado-- 
                     
            <div class="input-group mb-3">
                      
              <div class="input-group-append input-group-text">
                <i class="fas fa-list-ul"></i>
              </div>

              <select class="form-control"  name="estado" required>

                @if ($value["estado"] == "operativo" || $value["estado"] == "")

                  <option value="operativo">operativo</option>
                  <option value="cese">cese</option>

                @else

                  <option value="cese">cese</option>
                  <option value="operativo">operativo</option>
                  
                @endif

              </select>

            </div>--}}

            {{--imagen--}}   
                     
            <div class="pb-2">
                      
              <div class="form-group my-2 text-center">

                <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip"></i> Adjuntar imagen
                  <input type="file" name="lugar">

                </div>

                <img class="previsualizarImg_lugar img-fluid py-2">
                <p class="help-block small">Dimensiones: 1024px * 576px | Max. 2MB| JPG o PNG</p>

              </div>

            </div>

           

            
          </div>


          <div class="modal-footer d-flex justify-content-between">

            <div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

            <div>
              <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
          </div>

        </form>

      </div>
    </div>

  </div>
  <!--============================
  Editar Centro 2021
  =============================-->
  @if(isset($status))
  
    @if($status == 200)

      @foreach ($australs as $key => $value)

        <div class="modal" id="editarCentro">

          <div class="modal-dialog">
      
            <div class="modal-content">
              <form action="{{ url('/')}}/cliente_cuatro/{{$value->id}}" method="POST" enctype="multipart/form-data">
               
                  @method('PUT')
                @csrf
      
                <div class="modal-header bg-info">
                  <h4 class="modal-title">Editar Centro</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
      
                <div class="modal-body">
      
                  {{--editar Nombre centro--}}
                  <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                      <i class="fas fa-clipboard-list"></i>
                    </div>
      
                    <input type="text" class="form-control" name="titulo"
                    value="{{ $value->titulo}}" placeholder="Editar Nombre centro">
      
                  </div>
      
                  {{--Observacion centro--}}
                  <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                      <i class="fas fa-pencil-alt"></i>
                    </div>
      
                    <input type="text" class="form-control" name="observacion"
                    value="{{ $value->observacion}}" placeholder="Editar Observacion">
      
                  </div>
      
      
                  {{--estado--}}
                          
                  <div class="input-group mb-3">
                            
                    <div class="input-group-append input-group-text">
                      <i class="fas fa-list-ul"></i>
                    </div>
      
                    <select class="form-control"  name="estado" required>
      
                      @if ($value["estado"] == "operativo" || $value["estado"] == "")
      
                        <option value="operativo">operativo</option>
                        <option value="cese">cese</option>
      
                      @else
      
                        <option value="cese">cese</option>
                        <option value="operativo">operativo</option>
                        
                      @endif
      
                    </select>
      
                  </div>

                   {{--grabacion centro--}}
                  <div class="input-group mb-3">
                     <div class="input-group-append input-group-text">
                        <i class="fas fa-pencil-alt"></i>
                     </div>
                          
                     <input type="text" class="form-control" name="grabacion"
                       value="{{ $value->grabacion}}" placeholder="Modificar grabacion">
                          
                  </div>
      
                  {{--imagen--}}   
                          
                  <div class="pb-2">
                              
                    <div class="form-group my-2 text-center">
      
                      <div class="btn btn-default btn-file">
      
                        <i class="fas fa-paperclip"></i> Adjuntar imagen
                        <input type="file" name="lugar" >
      
                      </div>
      
                    <img src="{{url('/')}}/{{$value->lugar}}" class="previsualizarImg_lugar img-fluid py-2">
                     
                    <input type="hidden" value="{{$value->lugar}}" name="imagen_actual">

                    <p class="help-block small">Dimensiones: 1024px * 576px | Max. 2MB| JPG o PNG</p>
      
                    </div>
      
                  </div>
      
                
      
                  
                </div>
      
      
                <div class="modal-footer d-flex justify-content-between">
      
                  <div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
      
                  <div>
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                  </div>
                </div>
      
              </form>
      
            </div>
          </div>
      
        </div>
          
      @endforeach

      <script>$("#editarCentro").modal()</script>

    @endif
      
  @endif

      <!--============================
  Editar Centro
  =============================-->
{{--
  @if (isset($status))

      @if($status == 200)

         @foreach ($austral as $key => $value)

          <div class="modal" id="editarCentro">

            <div class="modal-dialog">
        
              <div class="modal-content">
              <form action="{{ url('/')}}/cliente_cuatro/{{$value["id"]}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
        
                  <div class="modal-header bg-info">
                    <h4 class="modal-title">Editar Centro</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
        
                  <div class="modal-body">
        
                    {{--Nombre centro--
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-clipboard-list"></i>
                      </div>
        
                      <input type="text" class="form-control" name="titulo"
                      value="{{ $value->titulo}}" placeholder="Editar Nombre centro" required>
        
                    </div>
        
                    {{--Observacion centro--
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-pencil-alt"></i>
                      </div>
        
                      <input type="text" class="form-control" name="observacion"
                      value="{{ $value->observacion}}" placeholder="Editar Observacion" required>
        
                    </div>
        
        
                    {{--estado--
                            
                    <div class="input-group mb-3">
                              
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-list-ul"></i>
                      </div>
        
                      <select class="form-control"  name="estado">
        
                        @if ($value["estado"] == "operativo" || $value["estado"] == "")
        
                          <option value="operativo">operativo</option>
                          <option value="cese">cese</option>
        
                        @else
        
                          <option value="cese">cese</option>
                          <option value="operativo">operativo</option>
                          
                        @endif
        
                      </select>
        
                    </div>

                    {{--grabacion centro--
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-pencil-alt"></i>
                      </div>
        
                      <input type="text" class="form-control" name="grabacion"
                      value="{{ $value->grabacion}}" placeholder="Modificar grabacion">
        
                    </div>
        
                    {{--imagen--  
                            
                    <div class="pb-2">
                              
                      <div class="form-group my-2 text-center">
        
                        <div class="btn btn-default btn-file">
        
                          <i class="fas fa-paperclip"></i> Adjuntar imagen
                          <input type="file" name="lugar" >
        
                        </div>
        
                      <img src="{{url('/')}}/{{$value->lugar}}" class="previsualizarImg_lugar img-fluid py-2">
                       
                      <input type="hidden" value="{{$value->lugar}}" name="imagen_actual">

                      <p class="help-block small">Dimensiones: 1024px * 576px | Max. 2MB| JPG o PNG</p>
        
                      </div>
        
                    </div>
        
                  
        
                    
                  </div>
        
        
                  <div class="modal-footer d-flex justify-content-between">
        
                    <div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
        
                    <div>
                      <button type="submit" class="btn btn-primary" >Guardar</button>
                    </div>
                  </div>
        
                </form>
        
              </div>
            </div>
        
          </div>


             
         @endforeach

         <script>$("#editarCentro").modal()</script>

      @endif

  @endif
        --}}
 <!--============================
  mostrar datos operativos
  =============================-->
  
  <div class="modal" id="mostrarOperativo">

    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        
          <div class="modal-header bg-gradient-success">
            <h4 class="modal-title">Centros Operativos</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">

            {{--mostrar operativos--}}
            <div class="input-group mb-3">                  
               <?php                                                        
                 $operativos = DB::table('totalcentros')
                          ->where( 'estado', 'operativo')
                          ->whereIn('id_cat', [4])
                          ->get('titulo_centro');                                      
                ?>                            
                  @foreach ($operativos as $element => $value)
                                  
                     {{$value->titulo_centro}} <br>                                  
                                    
                  @endforeach                                 
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-between">

            <div>
              <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Cerrar</button>
            </div>

          </div>     

      </div>
    </div>

  </div>

    <!--============================
  mostrar datos en cese
  =============================-->
  
  <div class="modal" id="mostrarCese">

    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        
          <div class="modal-header bg-gradient-danger">
            <h4 class="modal-title">Cese de Servicio</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">

            {{--mostrar cese--}}
            <div class="input-group mb-3">                  
               <?php                                                        
                 $cese = DB::table('totalcentros')
                          ->where( 'estado', 'cese')
                          ->whereIn('id_cat', [4])
                          ->get('titulo_centro');                                      
                ?>                            
                  @foreach ($cese as $element => $value)
                                  
                     {{$value->titulo_centro}} <br>                                  
                                    
                  @endforeach                                 
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-between">

            <div>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

          </div>     

      </div>
    </div>

  </div>

  @if (Session::has("ok-crear"))

    <script>
        notie.alert({ type: 1, text: '¡El registro ha sido creada correctamente!', time: 10 })
    </script>

  @endif

  @if (Session::has("ok-email"))

  <script>
      notie.alert({ type: 1, text: '¡Correo enviado correctamente!', time: 05 })
  </script>

  @endif

  @if (Session::has("no-validacion"))

    <script>
        notie.alert({ type: 2, text: '¡Hay campos no válidos en el formulario!', time: 10 })
    </script>

  @endif

  @if (Session::has("error"))

    <script>
        notie.alert({ type: 3, text: '¡Error en el gestor de registro!', time: 10 })
    </script>

  @endif

  @if (Session::has("ok-editar"))

    <script>
        notie.alert({ type: 1, text: '¡El registro ha sido actualizado!', time: 10 })
    </script>

  @endif

@endsection