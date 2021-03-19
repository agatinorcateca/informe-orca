<!--=====================================
CONTENIDO cliente cuatro
======================================-->

<div class="container-fluid bg-white contenidoInicio pb-4">
	
	<div class="container">
		
		<div class="row">
			
			<!-- COLUMNA td-->

			<div class="col-4 col-md-8 col-lg-12 p-0 pr-lg-5">
				
				

				<div class="row">
									        	
                             <!--   Tdaqua -->
							    <div class="col-12 col-lg-12">
							       	<!--linea verde separacion-->	
								  <hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">

										<h4 class="d-none d-lg-block">Informe Aqua</h4>

									
									
									<?php

										$curl = curl_init();

										curl_setopt_array($curl, array(
										CURLOPT_URL => "http://apirest-laravel.com/aqua",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 0,
										CURLOPT_FOLLOWLOCATION => true,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
											"Authorization: Basic YTJ5YTEwYXpFeUNGSEZWQVloekVPQ0ZhQ1lCTk9JbDhZQkxlRjhBZFZvOVJZZEJxb3FCWEhFa1NqOUxHOm8yeW8xMm9DTG9TL2JmdjB0YnFIUS9qWVhTMjN1cnJhYS51L1lHUGJoR0VoaXFKZlVSSzNQRUFPOW5FTw==",
											"Cookie: XSRF-TOKEN=eyJpdiI6Ik9ReTJ2eEIzMHlYejNyTnF3Z0d1NHc9PSIsInZhbHVlIjoiMEdqZG9jOFhRWVBtQ3E3YVIvemxzQ2xYMHhUUm5sVC94eEhJSDZFOG9pandWUGJVN0tPUHNJcHFibDB2QzFJSm5wbGtzMVZ5SnBLbzNaS0pzWWJmSGFxY0RWY2sySWhYdE9QdHNyWjVrQ0N2aHQ5M2hIaDhXQlZkWlRkVGZNY1IiLCJtYWMiOiJjZDMwMDk4OWYyNTYwMDNlNDYzNjcxZmI1YzRhOTI1YTkyNTY5ZTE0YmQzNTgwYmMxYTlhNTRmMWExM2NjMmVmIn0%3D; laravel_session=eyJpdiI6IkxERTFJOFNBOVF3VENKUnZFQ0UrWnc9PSIsInZhbHVlIjoicmZadnBDNGJySE1BSU5NcGQ2TnJKMW9yMVFHSGhGdTcyZGo1TWhnUGFUb1huWFhjZ1JQTHpiM2VmT0NPdHhINHRaQXNlRnJFY3BiUWhmbVRjVFN4K3NsMGJoeFhlUlpreGlDK2FXNFp5WWVSRmpSdXdoZWYyL3Z3OEp4elJVYTYiLCJtYWMiOiIwZWFlOTQyMjQ3NzUzNzE2YjdhNTgyNzYzOGIyMzA3ZWEzZWY3MzYyOWI4YzEwMzcxOGVjNGJmYTJlYzk5ZmJlIn0%3D"
										),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);

										curl_close($curl);

										if ($err){
											echo "cUrl Error #:" . $err;
										}else{

										#   echo $response;


										$json = json_decode($response, true);
										}
										?>

										<div class="col-lg-12">
												<table class="table">
												<thead class="thead-dark">
													<tr>
													<th scope="col">#</th>
													<th scope="col">Nombre</th>
													<th scope="col">Observacion</th>
													<th scope="col">Estado</th>
													<th scope="col">Grabacion</th>
													<th scope="col">imagen</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach ($json["detalle"] as $key => $value): ?>
														<tr>
															<td><?php echo ($key+1); ?></td>
															<td><?php echo $value["titulo"] ?></td>
															<td><?php echo $value["observacion"] ?></td>
															<td><span class="badge badge-info"><?php echo $value["estado"] ?></span></td>
															<td><?php echo $value["grabacion"] ?></td>
															<td><div class="modal-container"><img src="<?php echo $value["lugar"];?>" alt="Responsive image" style="width:100%;max-width:120px"></div></td>
                                                           															
														</tr>  
														
														<?php endforeach ?>
														
														</tbody>

												</table>

												
										</div>

								</div>
								<!-- fin prueba informe-->
				
				</div>

				<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">

				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center"></ul>

				</div>

			</div>
						

		</div>

	</div>

</div>