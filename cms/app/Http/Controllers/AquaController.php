<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aqua;
Use App\Administradores;
use Illuminate\Support\Facades\Hash;

class AquaController extends Controller
{

	public function index(Request $request){

        if(request()->ajax()){

              // request from_date value
                if(!empty($request->from_date))
                {
                    if($request->from_date === $request->to_date){
                        $listaaqua = Aqua::whereDate('created_at','=', $request->from_date)->get();
                    
                    }else{
                        $listaaqua = Aqua::whereBetween('created_at', array($request->from_date, $request->to_date))->get();
                    }
                }//load_data default
                else
                {
                $listaaqua = Aqua::all();
                }

          return datatables()->of($listaaqua)
            ->addColumn('acciones', function($data){

                $acciones = '<div class="btn-group">
								
                <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt text-white"></i>
                </a>

                <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="aqua" token="'.csrf_token().'">
                <i class="fas fa-trash-alt"></i>
                </button>

              </div>';

          return $acciones;

            })
            ->rawColumns(['acciones'])
            ->addIndexColumn()
            -> make(true);

      }
            
        $administradores = Administradores::all();

        return view("paginas.aqua", array("administradores"=>$administradores));
    }
    /*mostrar total de registro
    public function index(){

		$aqua = Aqua::all();
		$administradores = Administradores::all();
		
		return view("paginas.aqua", array("aqua"=>$aqua, "administradores"=>$administradores));

	}
     */
	/*=============================================
	Mostrar un solo registro
	=============================================*/

	public function show($id){

		$aqua_s = Aqua::where("id", $id)->get();
		$administradores = Administradores::all();
		

		if(count($aqua_s) != 0){

			return view("paginas.aqua", array("status"=>200, "aqua_s"=>$aqua_s, "administradores"=>$administradores));
		
		}else{ 

			return view("paginas.aqua", array("status"=>404, "administradores"=>$administradores));
		}
	}

	/*=============================================
    Eliminar un registro
    =============================================*/

    public function destroy($id, Request $request){

    	$validar = Aqua::where("id", $id)->get();
    	
    	if(!empty($validar) && $id != 1){

    		if(!empty($validar[0]["lugar"])){

    			unlink($validar[0]["lugar"]);
    		
    		}
              
    		$aqua = Aqua::where("id",$validar[0]["id"])->delete();

    		 //return redirect("/aqua")->with("ok-eliminar", "");

    		//Responder al AJAX de JS
    		return "ok";
    	
    	}else{

    		return redirect("/aqua")->with("no-borrar", "");
    	

    	}

	}

	/*=============================================
    crear un registro
    =============================================*/

    public function store(Request $request){

		//recoger datos
		$datos = array("titulo"=>$request->input("titulo"),
					   "observacion"=>$request->input("observacion"),
				//	   "estado"=>$request->input("estado"),
					   "imagen_temporal"=>$request->file("lugar"));
			
		//validar datos
		if(!empty($datos)){

			$validar = \Validator::make($datos,[

    			"titulo"=> "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"observacion"=> "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    		//	"estado"=> "required|regex:/^[a-z0-9-]+$/i",
    			"imagen_temporal"=> "required|image|mimes:jpg,jpeg,png|max:2000000"

			]);
			
			//guardar registro aqua
			if(!$datos["imagen_temporal"] || $validar->fails()){

				return redirect("/aqua")->with("no-validacion", "");

			}else{

				$aleatorio = mt_rand(100,999);

				$ruta = "img/centrosaqua/".$aleatorio.".".$datos["imagen_temporal"]->guessExtension();

				//Redimensionar imagen

				list($ancho, $alto) = getimagesize($datos["imagen_temporal"]);

				$nuevoAncho = 1024;
				$nuevoAlto = 576;

				if($datos["imagen_temporal"]->guessExtension() == "jpeg"){

					$origen = imagecreatefromjpeg($datos["imagen_temporal"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				}

				if($datos["imagen_temporal"]->guessExtension() == "png"){

                    $origen = imagecreatefrompng($datos["imagen_temporal"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);

				}

				$aqua = new Aqua();
                $aqua->titulo = $datos["titulo"];
                $aqua->observacion = $datos["observacion"];
             //   $aqua->estado = $datos["estado"];                
                $aqua->lugar = $ruta;

                $aqua->save(); 

                return redirect("/aqua")->with("ok-crear", "");


			}
			
		}else{

			return redirect("/aqua")->with("error", "");
				
		}

	}

	/*=============================================
	editar un registro
	=============================================*/
	public function update($id, Request $request){

        // Recoger los datos
		$datos = array("titulo"=>$request->input("titulo"),
		               "observacion"=>$request->input("observacion"),
					   "estado"=>$request->input("estado"),
					   "grabacion"=>$request->input("grabacion"),
		               "imagen_actual"=>$request->input("imagen_actual"));

        // Recoger Imagen

        $imagen = array("imagen_temporal"=>$request->file("lugar"));

        // Validar los datos

        if(!empty($datos)){

            $validar = \Validator::make($datos,[

                "titulo" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "observacion" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "estado" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "grabacion" => "required|regex:/^[a-z0-9-]+$/i",
				"imagen_actual"=> "required"
				

            ]);

            if($imagen["imagen_temporal"] != ""){

                $validarImagen = \Validator::make($imagen,[

                    "imagen_temporal" => "required|image|mimes:jpg,jpeg,png|max:2000000"

                ]);

                if($validarImagen->fails()){
               
                    return redirect("/aqua")->with("no-validacion", "");

                }

            }

            if($validar->fails()){

                return redirect("/aqua")->with("no-validacion", "");

            }else{

                if($imagen["imagen_temporal"] != ""){

                    unlink($datos["imagen_actual"]);

                    $aleatorio = mt_rand(100,999);

                    $ruta = "img/centrosaqua/".$aleatorio.".".$imagen["imagen_temporal"]->guessExtension();

                    //Redimensionar Imágen

                    list($ancho, $alto) = getimagesize($imagen["imagen_temporal"]);

                    $nuevoAncho = 1024;
                    $nuevoAlto = 576;

                    if($imagen["imagen_temporal"]->guessExtension() == "jpeg"){

                        $origen = imagecreatefromjpeg($imagen["imagen_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);

                    }

                    if($imagen["imagen_temporal"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($imagen["imagen_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE); 
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                        
                    }

                }else{

                    $ruta = $datos["imagen_actual"];

                }

                $datos = array("titulo" => $datos["titulo"],
                                "observacion" => $datos["observacion"],
								"estado" => $datos["estado"],
								"grabacion" => $datos["grabacion"],
                                "lugar" => $ruta);

                $aqua = Aqua::where('id', $id)->update($datos); 

                return redirect("/aqua")->with("ok-editar", "");

            }

        }else{

           return redirect("/aqua")->with("error", ""); 

        }


    }
	

}





    


