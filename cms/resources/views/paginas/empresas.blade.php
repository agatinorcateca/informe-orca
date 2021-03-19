@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Registro Centros</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Registro</li>

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

             {{--  <ul>

              @foreach ($articulos as $key => $value)
                 
                  <li>
                    
                    <h3>{{ $value["titulo_articulo"] }}</h3>
                    <h5>{{ $value->categorias["titulo_categoria"] }}</h5>
                  </li>

                @endforeach

              </ul> --}}

              <table class="table table-bordered table-striped dt-responsive" id="tablaCentrostotales" width="100%">

                <thead>

                  <tr>

                    <th width="10px">#</th>
                    <th>Nombre</th>
                    <th>Observacion</th>                    
                    <th>Ubicacion</th>
                    <th>Estado</th>
                    <th>Fecha inicio</th>
                    <th>cliente</th>
                    <th>Acciones</th>         

                  </tr> 

                </thead>  

              </table>

            </div>

            <!-- /.card-body -->
           
          </div>
          <!-- /.card -->
        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->
</div>

<!--=====================================
Crear Categorías
======================================-->

<div class="modal" id="crearCentro">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form action="{{url('/')}}/totalcentros" method="post" enctype="multipart/form-data">

        @csrf

        <div class="modal-header bg-info">
          <h4 class="modal-title">Crear Centro</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

           {{-- Título cliente --}}
           
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul"></i>
            </div>

            <select class="form-control"  name="id_cat" required>

              <option value="">Elige Categoría</option>
             
              @foreach ($emp as $key => $value)
              
                <option value="{{$value->id_emp}}">{{$value->nombre}}</option>

              @endforeach

            </select>
            
          </div>
        
          {{-- Título cliente --}}
                    
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul"></i>
            </div>

            <input type="text" class="form-control" name="titulo_centro" placeholder="Ingrese el titulo del centro" value="{{old("titulo_centro")}}" required> 

          </div> 

          {{-- Descripción --}}
                  
          <div class="input-group mb-3">
     
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>

            <input type="text" class="form-control" name="observacion_centro" placeholder="Ingrese la descripción del centro" value="{{old("observacion_centro")}}" maxlength="220"> 

          </div> 
           {{-- Ubicacion --}}
                  
           <div class="input-group mb-3">
     
            <div class="input-group-append input-group-text">
              
              <i class="fas fa-map-marked-alt"></i>
            </div>

            <input type="text" class="form-control" name="ubicacion" placeholder="Ingrese la ubicacion del centro" value="{{old("ubicacion")}}" maxlength="220" required> 

          </div> 


         
        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
Modal Editar Artículo
======================================-->

@if (isset($status))
                 
  @if ($status == 200)
    
    @foreach ($totalcentros as $key => $value)

      <div class="modal" id="editarCentro">

      <div class="modal-dialog modal-lg">

        <div class="modal-content">

           <form action="{{url('/')}}/totalcentros/{{$value->id_centro}}" method="post" enctype="multipart/form-data">

              @method('PUT')

              @csrf

            <div class="modal-header bg-info">
              <h4 class="modal-title">Editar Centro</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

               {{-- Título Cliente --}}
               
              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fas fa-list-ul"></i>
                </div>

                <select class="form-control"  name="id_cat">
               
                  @foreach ($emp as $key => $value2)

                    @if ($value2->id_emp == $value->id_cat)
                      <option value="{{$value->id_cat}}">{{$value2->nombre}}</option>
                    @endif
                  
                {{--     <option value="{{$value2->id_categoria}}">{{$value2->titulo_categoria}}</option> --}}

                 @endforeach

                @foreach ($emp as $key => $value2)
            
            @if ($value2->id_emp != $value->id_cat)

                      <option value="{{$value2->id_emp}}">{{$value2->nombre}}</option>

                  @endif

                  @endforeach

                </select>
                
              </div>
            
              {{-- Título centro --}}
                        
              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fas fa-list-ul"></i>
                </div>

                <input type="text" class="form-control" name="titulo_centro" placeholder="Ingrese el titulo del centro" value="{{$value->titulo_centro}}"> 

              </div> 

              {{-- Descripción centro --}}
                      
              <div class="input-group mb-3">
         
                <div class="input-group-append input-group-text">
                  <i class="fas fa-pencil-alt"></i>
                </div>

                <input type="text" class="form-control" name="observacion_centro" placeholder="Ingrese la descripción del centro" value="{{$value->observacion_centro}}" maxlength="220"> 

              </div> 

               {{-- ubicacion --}}
               <div class="input-group mb-3">
         
                <div class="input-group-append input-group-text">
                  <i class="fas fa-map-marked-alt"></i>
                </div>

                <input type="text" class="form-control" name="ubicacion" placeholder="Ingrese la Ubicacion" value="{{$value->ubicacion}}" maxlength="220"> 

              </div> 

              {{--estado--}}

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

               {{-- fecha --}}
               
                  <div class="input-group mb-3 input-daterange">
            
                    <div class="input-group-append input-group-text">
                      
                      <i class="fas fa-calendar-alt"></i>
                    </div>

                    <input type="text" class="form-control" name="created_at" placeholder="Ingrese la Ubicacion" value="{{$value->created_at}}" > 

                  </div> 
               

              
              
            </div>

            <!-- Modal footer -->
            <div class="modal-footer d-flex justify-content-between">

              <div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>

              <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  @endforeach

  <script>
  $("#editarCentro").modal()
  </script>

  @endif

@endif

@if (Session::has("ok-crear"))

  <script>
      notie.alert({ type: 1, text: '¡El centro ha sido creado correctamente!', time: 10 })
 </script>

@endif



@if (Session::has("no-validacion"))

  <script>
      notie.alert({ type: 2, text: '¡Hay campos no válidos en el formulario!', time: 10 })
 </script>

@endif

@if (Session::has("error"))

  <script>
      notie.alert({ type: 3, text: '¡Error en el gestor del centro!', time: 10 })
 </script>

@endif

@if (Session::has("ok-editar"))

  <script>
      notie.alert({ type: 1, text: '¡El centro ha sido actualizado correctamente!', time: 10 })
 </script>

@endif

@endsection