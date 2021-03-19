<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Blog;
Use App\Administradores;

use Illuminate\Support\Facades\Hash;


class BlogController extends Controller
{
    
    /*=========================
    Mostrar todos los registros
    ==========================*/
    public function index(){

        $blog = Blog::all();
        $administradores = Administradores::all();

        return view("paginas.blog", array("blog"=>$blog, "administradores"=>$administradores));
    }

    /*=========================
    Actualizar un registros
    ==========================*/
    public function update($id, Request $request){

      //recoger datos
      $datos = array("dominio"=>$request->input("dominio"),
                     "servidor"=>$request->input("servidor"),
                     "portada_actual"=>$request->input("portada_actual")
                    
                    );

      //recoger imagenes
      $portada = array("portada_temporal"=>$request->file("portada"));
      
      //validar los datos
      if(!empty($datos)){

        $validar = \Validator::make($datos, [

            "dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
            "servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
            "portada_actual" => 'required'
            ]);

            //Validar imagenes
            if($portada["portada_temporal"] != ""){

                $validarPortada = \Validator::make($portada, [
                "portada_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000']);

                if($validarPortada->fails()){

                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }

            //revisar la validacion
            if($validar->fails()){

                return redirect("/")->with("no-validacion","");

            }else{
                //Subir al servidor la imagen portada

                if($portada["portada_temporal"] != ""){

                    unlink($datos["portada_actual"]);

                    $aleatorio = mt_rand(100,999);

                    $rutaPortada ="img/blog/".$aleatorio.".".$portada["portada_temporal"]->guessExtension();

                    move_uploaded_file($portada["portada_temporal"], $rutaPortada);
                }else{
                    $rutaPortada = $datos["portada_actual"];
                }

                $actualizar = array("dominio"=> $datos["dominio"],
                                    "servidor"=> $datos["servidor"],
                                    "portada"=> $rutaPortada
                                     );

                $blog = Blog::where("id", $id)->update($actualizar);

                return redirect("/")->with("ok-editor", "");
            }

        }else{

                return redirect("/")->with("error", "");
      }

    }

}
