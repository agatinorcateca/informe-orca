

<!--=====================================
CONTENIDO cliente tres
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

										<h4 class="d-none d-lg-block">Informe Salmones Aysen</h4>

									
									
									<?php

										$curl = curl_init();

										curl_setopt_array($curl, array(
										CURLOPT_URL => "http://apirest-laravel.com/multi",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 0,
										CURLOPT_FOLLOWLOCATION => true,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_POSTFIELDS => "titulo=Barquillo&observacion=normal&estado=operativo&lugar=https%3A//i.imgur.com/zFhOn2R.png&grabacion=100",
										CURLOPT_HTTPHEADER => array(
											"Authorization: Basic YTJ5YTEwYXpFeUNGSEZWQVloekVPQ0ZhQ1lCTk9JbDhZQkxlRjhBZFZvOVJZZEJxb3FCWEhFa1NqOUxHOm8yeW8xMm9DTG9TL2JmdjB0YnFIUS9qWVhTMjN1cnJhYS51L1lHUGJoR0VoaXFKZlVSSzNQRUFPOW5FTw==",
											"Content-Type: application/x-www-form-urlencoded",
											"Cookie: XSRF-TOKEN=eyJpdiI6IkVvUEx0S3JTVGJlYkFselZpeWMvenc9PSIsInZhbHVlIjoibmsrblZLRytUaENJWFJLbi9TVllhYnBQeCtnWG52TkpGQ1l0UForY2NlNGdnUnFKMzZjZnhqenJWcUVhWmpuYkhVbk45YWlpQ1A2NXhBSkRwdWV2bUYrR1Vyc3M3cHhLeTFseFZNWFVHTFNjVnhlUW84ZEVJYW14a0pEMTB2UmkiLCJtYWMiOiI4MjY3MmU4ODRjNzNmMTY2MWFlYWNiYjYxOWYxY2M2NzZiMzdlNDVlMmVmNzIzNDZiM2QyY2M3M2FiZTBlNTc2In0%3D; laravel_session=eyJpdiI6IjBMdnRjd2x4cWxaSlFUTW4zVFB0K0E9PSIsInZhbHVlIjoidDhBUmZ4Wkt1MUVnUGs4Wk52WFJ0Uis4c3YyL1F3eXlwNkxNZGZybTljdjB2VEJMUTVWSkE3U1MrdjVIWFdEOTd1bjR1TnVPYlRnT3prdlF2ZnFTb2RaSW14L2d1QU1TM2xDK05yRUtJSndzNTVteU8vTUJsYUsxc1l3VTZnbkMiLCJtYWMiOiI2YzE0NmZlMGQ2NTQ5ZDI1Yjc4ZjJjYzQ3MGIxZmVhMThjNmYzZjI1ODE4NWJhNzE2YzliMTBkNDE1YTNiM2U1In0%3D"
										  ),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);

										curl_close($curl);

										if ($err){
											echo "cUrl Error #:" . $err;
										}else{

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
															<td><?php														 
																		if ($value["estado"] == "cese"){
																			echo '<span class="badge badge-danger">' .$value["estado"]. '</span>';
																		}else{
																			echo '<span class="badge badge-info">' .$value["estado"]. '</span>';
																		}
																		?>																
															</td>
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





