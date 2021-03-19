

<!--=====================================
CONTENIDO INICIO
======================================-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("vistas/img/fondo_orca.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}
</style>
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
  <h2>Sistema de soporte</h2>
  <h1 style="font-size:50px">Orca Tecnologias</h1>
  <p>.::Vemos lo invisible::.</p>
  <button type="button" class="btn btn-outline-light">
  	<a href="http://orcatecnologias.cl/admin/?view=dashboard">Soporte Tickets</a>
  </button>

  <button type="button" class="btn btn-outline-light ">
	<a href="http://localhost/informe-cliente/cms/public">Informe Diario</a>
  </button>
	
  
</div>

</body>
</html>


