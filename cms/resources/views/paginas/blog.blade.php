@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Blog</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Blog</li>

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
          @foreach ($blog as $element)
           
          @endforeach

        <form action="{{url('/')}}/blog/{{$element->id}}" method="POST" enctype="multipart/form-data">

          @method('PUT')

          @csrf

          <!-- Default box -->
          <div class="card">
           
            <div class="card-header">
             
             <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>

            </div>

            <div class="card-body">

              

              <div class="row">

                <div class="col-lg-7">

                  <div class="card">

                    <div class="card-body">

                      {{--dominio--}}
                      <div class="input-group mb-3">

                        <div class="input-group-append">

                          <span class="input-group-text">Dominio</span>

                        </div>

                        <input type="text" class="form-control" name="dominio" value="{{ $element->dominio}}" required>

                      </div>
                      {{--servidor--}}
                      <div class="input-group mb-3">

                        <div class="input-group-append">

                          <span class="input-group-text">Servidor</span>

                        </div>

                        <input type="text" class="form-control" name="servidor" value="{{ $element->servidor}}" required>
                        
                      </div>

                      


                    </div>
                  </div>
                </div>
              

              
              <div class="col-lg-5">

                <div class="card">

                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">

                    
                        {{--cambiar portada--}}
                        <div class="form-group my-2 text-center">

                          <div class="btn btn-default btn-file mb-3">

                            <i class="fas fa-paperclip"></i> Adjuntar portada
                            <input type="file" name="portada">
                            <input type="hidden" name="portada_actual" value="{{$element->portada}}" required>

                          </div>

                          <br>

                          <img src="{{url('/')}}/{{$element->portada}}" class="img-fluid py-2  previsualizarImg_portada">
                          
                          
                          <p class="help-block small mt-3">Dimensiones: 700px * 420px | Peso max. 2MB | Formato: JPG, PNG</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
           
              
            </div>
          </div>
            <!-- /.card-body -->
          </form>
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
          
        </div>
      </div>
    </div>
  </section>
</div>

    @if (Session::has("no-validacion"))

      <script>
        
        notie.alert({

          type: 2,
          text: '¡Hay campos no válidos en el formulario!',
          time: 7

        })

      </script>

    @endif

    @if (Session::has("no-validacion-imagen"))

      <script>
        
        notie.alert({

          type: 2,
          text: '¡Alguna de las imágenes no tiene el formato correcto!',
          time: 7

        })

      </script>

    @endif

  @if (Session::has("error"))

      <script>
        
        notie.alert({

          type: 3,
          text: '¡Error en el gestor de blog!',
          time: 7

        })

      </script>

  @endif

  @if (Session::has("ok-editar"))

    <script>
      
      notie.alert({

        type: 1,
        text: '¡El blog ha sido actualizado correctamente!',
        time: 7

      })

    </script>

  @endif



@endsection
