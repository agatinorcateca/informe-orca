<?php 

$blog = ControladorBlog::ctrMostrarBlog();
$categorias = ControladorBlog::ctrMostrarCategorias(null, null); 
$articulos =  ControladorBlog::ctrMostrarConInnerJoin(0, 5, null, null);
$totalArticulos = ControladorBlog::ctrMostrarTotalArticulos(null, null);

#$totalPaginas = ceil(count($totalArticulos)/5);
#mostrar datos al traer en array
#echo '<pre>'; print_r($blog); echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Informe Orca</title>

	<link rel="icon" href="vistas/img/ball.png">

	<!--=====================================
	PLUGINS DE CSS
	======================================-->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<link rel="stylesheet" href="<?php echo $blog["dominio"];?>vistas/css/plugins/jquery.jdSlider.css">

	<link rel="stylesheet" href="<?php echo $blog["dominio"];?>vistas/css/style.css">
	<!--css modal conectado con -->
    <!--<link rel=StyleSheet href="vistas/css/plugins/modal_imagenes.css" type="text/css">-->
	
	<!--=====================================
	PLUGINS DE JS
	======================================-->
    
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="<?php echo $blog["dominio"];?>vistas/js/plugins/jquery.jdSlider-latest.js"></script>
	
	<!-- pagination -->
	<!-- http://josecebe.github.io/twbs-pagination/ -->
	<script src="<?php echo $blog["dominio"];?>vistas/js/plugins/pagination.min.js"></script>

	<!-- scrollup -->
	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<!-- https://easings.net/es# -->
	<script src="<?php echo $blog["dominio"];?>vistas/js/plugins/scrollUP.js"></script>
	<script src="<?php echo $blog["dominio"];?>vistas/js/plugins/jquery.easing.js"></script>

</head>

<body>

<?php 

	/*=============================================
	Módulos fijos superiores
	=============================================*/	

	include "paginas/modulos/cabecera.php";
   #include "paginas/modulos/redes-sociales-movil.php";	
   #include "paginas/modulos/buscador-movil.php";	
   include "paginas/modulos/menu.php";	

	/*=============================================
	Navegar entre páginas
	=============================================*/	
	$validarRuta = "";
	
	if(isset($_GET["pagina"])){

		$rutas = explode("/", $_GET["pagina"]);

		foreach ($categorias as $key => $value){
			if($rutas[0] == $value["ruta_categoria"]){

				$validarRuta = "categorias";

			break;
			}
		}
	/*=============================================
	rutas de articulos
	=============================================*/	
	  
	/*if(isset($rutas[1])){*/
		if($rutas[0]){
			
		/**/
				
			foreach ($totalArticulos as $key => $value) {
		           if($rutas[0] == $value["ruta_articulo"]){

					$validarRuta = "articulos";
				   break;
		        } else if($rutas[0] == "cliente-tres"){

						$validarRuta = "cliente-tres";
					   break;
					
				}
			
			}
		}
	   /* }*/
    /*}*/
	/*=============================================
	validar las rutas
	=============================================*/	
	  if($validarRuta == "categorias"){

				include "paginas/categorias.php";

			}else if($validarRuta == "articulos"){

				include "paginas/articulos.php";

			}else if($validarRuta == "cliente-tres"){

				include "paginas/cliente-tres.php";

			}else{
				include "paginas/404.php";
			
			}
		
	}else{

				include "paginas/inicio.php";
	}
	

	/*=============================================
	Módulos fijos inferiores
	=============================================*/	

	include "paginas/modulos/footer.php";


?>

<script src="<?php echo $blog["dominio"];?>vistas/js/script.js"></script>
<script src="<?php echo $blog["dominio"];?>vistas/js/plugins/modal_image.js"></script>

</body>
</html>