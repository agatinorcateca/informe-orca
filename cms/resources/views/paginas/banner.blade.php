@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Banner</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">blog</li>

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
                        
            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped" with="100%">

                <thead>
                  <tr>

                    <th>#</th>
                    <th>Dinamica y fija</th>
                    <th width="500px">Imagen</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>
                  @foreach ($banner as $key => $value)
              
                   <tr>

                    <td>{{($key+1)}}</td>
                    <td>{{($value["pagina_banner"])}}</td>
                    <td><img src="{{($value["img_banner"])}}" class="img-fluid" ></td>
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning btn-sm">
                          <i class="fas fa-pencil-alt text-white"></i>
                        </button>

                        <button class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </button>

                      </div>

                    </td>

                    </tr>                  
                                
                  @endforeach
                </tbody>

              </table>
              
            </div>
            <!-- /.card-body -->
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



@endsection