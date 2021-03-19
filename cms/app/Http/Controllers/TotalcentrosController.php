<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TotalCentros;
Use App\Administradores;

use Illuminate\Support\Facades\DB;
use App\Empresas;

class TotalcentrosController extends Controller
{
    //mostrar total de registro
    public function index(){
		
    	$join = DB::table('empresas')->join('totalcentros','empresas.id_emp','=','totalcentros.id_cat')->select('empresas.*','totalcentros.*')->get();       

        if(request()->ajax()){

            // return datatables()->of(Articulos::all())  
            return datatables()->of($join)
            ->addColumn('nombre', function($data){

              $emp = $data->nombre;

              return $emp;

            })
            
            
            ->addColumn('acciones', function($data){

                $botones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id_centro.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id_centro.'" method="DELETE" token="'.csrf_token().'" pagina="empresas"> <i class="fas fa-trash-alt"></i></button>

                          </div>';
               
                return $botones;

            })
            ->rawColumns(['emp','acciones'])
            ->make(true);

        }

		
		$administradores = Administradores::all();
		$emp = Empresas::all();

		return view("paginas.empresas", array("emp"=>$emp, "administradores"=>$administradores));

	}
    

	/*=============================================
	Mostrar un solo registro
	=============================================*/

    public function show($id){    

        $totalcentros = TotalCentros::where('id_centro', $id)->get();
        $emp = Empresas::all();
        $administradores = Administradores::all();

        if(count($totalcentros) != 0){

            return view("paginas.empresas", array("status"=>200, "totalcentros"=>$totalcentros, "emp"=>$emp, "administradores"=>$administradores));
        
        }else{
            
            return view("paginas.empresas", array("status"=>404, "administradores"=>$administradores));
        
        }

    }

	/*=============================================
    Eliminar un registro
    =============================================*/

    public function destroy($id, Request $request){

    	$validar = TotalCentros::where("id_centro", $id)->get();
    	
    	if(!empty($validar) && $id != 1){

    		if(!empty($validar[0]["lugar"])){

    			unlink($validar[0]["lugar"]);
    		
    		}
              
    		$totalcentros = TotalCentros::where("id_centro",$validar[0]["id_centro"])->delete();

    		 //return redirect("/aqua")->with("ok-eliminar", "");

    		//Responder al AJAX de JS
    		return "ok";
    	
    	}else{

    		return redirect("/empresas")->with("no-borrar", "");
    	

    	}

	}


	/*=============================================
    crear un registro
    =============================================*/

    public function store(Request $request){

        // Recoger los datos

        $datos = array( "id_cat"=>$request->input("id_cat"),
                        "titulo_centro"=>$request->input("titulo_centro"),
                        "observacion_centro"=>$request->input("observacion_centro"),
                        "ubicacion"=>$request->input("ubicacion"));  

        // Recoger datos de la BD blog para las rutas de imágenes 


         // Validar los datos
        // https://laravel.com/docs/5.7/validation
        if(!empty($datos)){
            
            $validar = \Validator::make($datos,[

                "titulo_centro" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "observacion_centro" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i' ,
                "ubicacion" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                
                         
            ]);

            //Guardar artículo

            if(!$datos["titulo_centro"] || $validar->fails()){
   
                return redirect("empresas")->with("no-validacion", "");

            }else{


           
                $totalcentros = new TotalCentros();
                $totalcentros->id_cat = $datos["id_cat"];
                $totalcentros->titulo_centro = $datos["titulo_centro"];
                $totalcentros->observacion_centro = $datos["observacion_centro"];
                $totalcentros->ubicacion = $datos["ubicacion"];
            

                $totalcentros->save();    

                return redirect("empresas")->with("ok-crear", "");
            }

        }else{
         
            return redirect("empresas")->with("error", "");

        }

    }


	/*=============================================
	editar un registro
	=============================================*/
	public function update($id, Request $request){

        // Recoger los datos

        $datos = array("id_cat"=>$request->input("id_cat"),
                        "titulo_centro"=>$request->input("titulo_centro"),
                        "observacion_centro"=>$request->input("observacion_centro"),
                        "ubicacion"=>$request->input("ubicacion"),
                        "estado"=>$request->input("estado"),
                        "created_at"=>$request->input("created_at"));
                    

        // Validar los datos
        // https://laravel.com/docs/5.7/validation
        if(!empty($datos)){
            
           $validar = \Validator::make($datos,[

                "titulo_centro" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "observacion_centro" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "ubicacion" => 'required|regex:/^[,\\"\\[\\]\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "estado" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                //"created_at" => "required|regex:/^[a-z0-9-]+$/i"
               
               
         
            ]);

            //Guardar articulo

            if($validar->fails()){
               
                return redirect("empresas")->with("no-validacion", "");

            }else{

                
                $datos = array("id_cat" => $datos["id_cat"],
                                "titulo_centro" => $datos["titulo_centro"],
                                "observacion_centro" => $datos["observacion_centro"],                            
                                "ubicacion" => $datos["ubicacion"],
                                "estado" => $datos["estado"],
                                "created_at" => $datos["created_at"]);
                                
                                

                $totalcentros = TotalCentros::where('id_centro', $id)->update($datos); 

                return redirect("empresas")->with("ok-editar", "");
            }

        }else{

             return redirect("empresas")->with("error", "");

        }

    }
	

}





    


