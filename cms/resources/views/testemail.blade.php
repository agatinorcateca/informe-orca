<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centros Aquachile</title>
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
  <h4>Estado centros Orca 
    <?php
  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('d-m-Y');
    echo $fechaActual;
  ?>
  </h4>
  

</body>
</html>