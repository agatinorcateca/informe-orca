<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centros Aysen</title>
  <!--=====================================
	PLUGINS DE CSS
	======================================-->

	{{-- BOOTSTRAP 4 --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/estilospdf.css')}}" >
  
  <!--=====================================
	PLUGINS DE JS
	======================================-->

	{{-- Fontawesome --}}
  <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
  <style>
    .page-break {
       page-break-after: always;
    }
  </style>
</head>
<body>
    <header>
          <div class="col-12">
           
              <h4>
                <br>
                <img src="{{url('/')}}/vistas/img/logotipo_orca_white.png" alt="AdminLTE Logo"  width="125px" >
                     
                <small class="float-right">Fecha: 
                          
                    <?php
                    // Obteniendo la fecha actual del sistema con PHP
                    $fechaActual = date('d-m-Y');
                      echo $fechaActual;
                    ?>
                </small>
              </h4>
          </div>
    </header>
      <div class="col-12">
        <h3>
           Informe Diario Orca.
           <small class="float-right">Salmones Aysen</small>
        </h3>
    </div>
 

    <div class="card-body">

        <table class="table table-bordered table-striped" with="100%">

          <thead class="thead-dark">
            <tr>

              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Observacion</th>
              <th scope="col">Grabacion</th>
             
              
            </tr>

          </thead>

          <tbody>
            @foreach ($aysen as $key => $value)
        
             <tr>

              <td>{{($key+1)}}</td>
              <td>{{($value["titulo"])}}</td>
              <td>{{($value["observacion"])}}</td>
              <td>{{($value["grabacion"])}}</td>
             {{-- <td><img src="{{($value["lugar"])}}" class="img-fluid" width="50%" ></td>--}}
              
              </tr>    
                            
                          
            @endforeach
          </tbody>

        </table>
        
    </div>

    <hr class="mb-2 mb-lg-4" style="border: 1px solid #79FF39">
     
    <div class="page-break"></div>
    <h3>Imagen de centro</h3>
    <div class="row">
      <div class="col-12">
        
          
            @foreach ($aysen as $key => $value)


            
                <div class="text-center">
                    
                  <img src="{{($value["lugar"])}}" class="img-fluid"   alt="Responsive image">
                  
                    <div class="my-1">
                      <span class="btn btn-info">{{($key+1)}}.{{($value["titulo"])}}</span>
                    </div>
                                                                  
                </div>
                        
            @endforeach
            
      </div>
          
    </div>

    <footer>
      <p>.::Estados Centros 2020::.</p>
    </footer>
</body>
</html>