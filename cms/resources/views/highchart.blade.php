@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 173px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>.:::Registros Orca Tecnologia Spa:::.</h1>
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
              
              <div class="card-body">
               <div class="row mb-3 btn btn-outline-info">
                <h4>Total de Centros:  
                              
                  <?php
                    $totalcentros = DB::table('totalcentros')->count();
                    echo $totalcentros;
                    ?>
                </h4>
               
               </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-info">
                          <?php
                           //   $totalcentros = DB::table('totalcentros')->count();
                              $totalcentros = DB::table('totalcentros')
                                      ->whereIn('id_cat', [1])
                                      ->count();
                             echo $totalcentros;
                              ?>
                        </span>
                        <div class="info-box-content">
                          <span class="info-box-text">Centros AquaChile</span>
                          
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-primary">
                          <?php
                               $multi = DB::table('totalcentros')
                                      ->whereIn('id_cat', [2])
                                      ->count();
                             echo $multi;
                            ?>  
                        </span>

                        <div class="info-box-content">
                          <span class="info-box-text">Multiexportfoods</span>
                          
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-secondary">
                          <?php
                          $austral = DB::table('totalcentros')
                                 ->whereIn('id_cat', [4])
                                 ->count();
                        echo $austral;
                       ?> 

                        </span>

                        <div class="info-box-content">
                          <span class="info-box-text">Salmoes Austral</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-light">
                          <?php
                          $aysen = DB::table('totalcentros')
                                 ->whereIn('id_cat', [3])
                                 ->count();
                        echo $aysen;
                       ?> 
                        </span>

                        <div class="info-box-content">
                          <span class="info-box-text">Salmones Aysen</span>
                          
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                          
              </div>

                <!--detalles activos y con cese-->
                <div class="card-body">

                  <h5 class="mb-2">    Activos /cese servicio</h5>
                    <div class="row">
                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                             <div class="info-box-content">
                                <span class="info-box-icon bg-success">
                                  <?php
                                      
                                      $aqua = DB::table('totalcentros')
                                        ->where( 'estado', 'operativo')
                                        ->whereIn('id_cat', [1])
                                        ->count();
                                  
                                      echo $aqua;
                                      ?>
                                </span>
                             </div>
                             <div class="info-box-content">
                                  <span class="info-box-icon bg-danger">
                                    <?php
                                         // Sql::SELECT * FROM `tdaqua` WHERE estado = "cese"  
                                                                             
                                        $aqua = DB::table('totalcentros')
                                        ->where( 'estado', 'cese')
                                        ->whereIn('id_cat', [1])
                                        ->count();
                                      echo $aqua;
                                        ?>
                                  </span>
                             </div>
                          
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            
                          
                            <div class="info-box-content">
                              <span class="info-box-icon bg-success">
                                <?php
                                    
                                    $multi = DB::table('totalcentros')
                                        ->where( 'estado', 'operativo')
                                        ->whereIn('id_cat', [2])
                                        ->count();
                                    
                                    echo $multi;
                                    ?>
                              </span>
                           </div>
                           <div class="info-box-content">
                                <span class="info-box-icon bg-danger">
                                  <?php
                                      $multi = DB::table('totalcentros')
                                        ->where( 'estado', 'cese')
                                        ->whereIn('id_cat', [2])
                                        ->count();
                                    
                                    echo $multi;
                                      ?>
                                </span>
                           </div>
                            
                          
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <div class="info-box-content">
                            <span class="info-box-icon bg-success">
                              <?php
                                  //llamada desde la base de datos filtrando id_cat cese
                                  $austral = DB::table('totalcentros')
                                        ->where( 'estado', 'operativo')
                                        ->whereIn('id_cat', [4])
                                        ->count();
                                  echo $austral;
                                  ?>
                            </span>
                         </div>
                         <div class="info-box-content">
                              <span class="info-box-icon bg-danger">
                                <?php
                                    $austral = DB::table('totalcentros')
                                        ->where( 'estado', 'cese')
                                        ->whereIn('id_cat', [4])
                                        ->count();
                                  echo $austral;
                                    ?>
                              </span>
                         </div>
  
                          
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <div class="info-box-content">
                            <span class="info-box-icon bg-success">
                              <?php
                                  $aysen = DB::table('totalcentros')
                                        ->where( 'estado', 'operativo')
                                        ->whereIn('id_cat', [3])
                                        ->count();
                                  echo $aysen;
                                  ?>
                            </span>
                         </div>
                         <div class="info-box-content">
                              <span class="info-box-icon bg-danger">
                                <?php
                                    $aysen = DB::table('totalcentros')
                                        ->where( 'estado', 'cese')
                                        ->whereIn('id_cat', [3])
                                        ->count();
                                  echo $aysen;
                                    ?>
                              </span>
                         </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!--fin detalles activos y con cese-->
                            
                
                    <!-- chars(grafico lineal) -->
                  <br>
                  <div class="card card-primary card-outline col-12">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Grafico total centros.
                      </h3>
      
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                          </button>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div id="highchart"></div>
                    </div>
                    
                  </div> 
                
                <!-- chars(grafico) -->
                  <div class="row">
                    <br>
                      <div class="card card-primary container-fluid card-outline col-md-8">
                        <div class="card-header">
                          <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Clima.
                          </h3>
          
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                              </button>
                            </div>
                        </div>

                        <div class="card-body">
                          <!-- windy -->
                          <div class="contenedor-responsivo">
                            <iframe class="iframe-responsivo" src="https://embed.windy.com/embed2.html?lat=-44.371&lon=-72.949&detailLat=-41.471&detailLon=-72.944&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=true&calendar=now&pressure=&type=map&location=coordinates&detail=true&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
                            
                          </div>  
                          
                        </div>
                        
                      </div>
                      <div class="card card-primary container-fluid card-outline col-md-4 col-sm-6 col-12">
                        <div class="card-header">
                          <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Cantidad por cliente.
                          </h3>
          
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                              </button>
                            </div>
                        </div>

                        <div class="card-body">
                          <!-- Torta-->                          
                            <canvas id="myChart" width="400" height="260"></canvas>                        
                          
                        </div>
                        
                      </div>
                  </div>
                   

                    <!-- fin chars(grafico) -->
                  </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Informe diario
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<style>

.contenedor-responsivo {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
}
.iframe-responsivo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

</style>

  <!--grafico-->
 
  
     
     <script>
        $(function () { 
            var dataClick = {{ json_encode($click,JSON_NUMERIC_CHECK) }};
            var dataViewer = {{ json_encode($viewer,JSON_NUMERIC_CHECK) }};
            $('#highchart').highcharts({
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Grafico'
                },
                xAxis: {
                    categories: ['Ene','Feb','Mar', 'Abr','May', 'Jun','Jul','Ago','Sep','Oct', 'Nov','Dic']
                },
                colors: ['rgba(234, 33, 46, 0.4)'],
                yAxis: {
                    title: {
                        text: 'Cantidad'
                    }
                },
                series: [{
                    name: 'centros',
                    data: dataClick
                }
                //, {
                //    name: 'prueba',
                //    data: dataViewer
                //}
              ]
            });
        });
    </script>
   
   <script> 
      

       var total_c = <?php $totalcentros = DB::table('totalcentros')                                 
                                        ->count();
                              echo $totalcentros;
                                ?>;
      var aquadona =  <?php $totalcentros = DB::table('totalcentros')
                                        ->whereIn('id_cat', [1])
                                        ->count();
                              echo $totalcentros;
                                ?>;
      var multidona =  <?php $totalcentros = DB::table('totalcentros')
                                        ->whereIn('id_cat', [2])
                                        ->count();
                              echo $totalcentros;
                                ?>;
      var aysendona =  <?php $totalcentros = DB::table('totalcentros')
                                        ->whereIn('id_cat', [3])
                                        ->count();
                              echo $totalcentros;
                                ?>;
      var australdona =  <?php $totalcentros = DB::table('totalcentros')
                                        ->whereIn('id_cat', [4])
                                        ->count();
                              echo $totalcentros;
                                ?>;                      

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: ['Aqua', 'Multi', 'Aysen', 'Austral'],
          datasets: [{
              label: '# centros',
              data: [aquadona, multidona, aysendona, australdona],
              backgroundColor: [
                  'rgba(106, 172, 234, 0.4)',
                  'rgba(32, 32, 171, 0.4)',
                  'rgba(234, 33, 46, 0.4)',
                  'rgba(248, 241, 18, 0.4)'
              ],
              borderColor: [
                  'rgba(106, 172, 234, 1)',
                  'rgba(32, 32, 171, 1)',
                  'rgba(234, 33, 46, 1)',
                  'rgba(248, 241, 18, 1)'
              ],
              borderWidth: 1
          }]
      }
      
    });

  </script>
@endsection