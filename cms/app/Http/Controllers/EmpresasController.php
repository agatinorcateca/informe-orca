<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
Use App\Administradores;

class EmpresasController extends Controller
{
    //mostrar total de registro
    public function index(){

		$emp = Empresas::all();
		$administradores = Administradores::all();
		
		return view("paginas.empresas", array("emp"=>$emp, "administradores"=>$administradores));

    }
    

	/*=============================================
	Mostrar un solo registro
	=============================================*/

	public function show($id){

		
	}

	/*=============================================
    Eliminar un registro
    =============================================*/

    public function destroy($id, Request $request){

    	

    }

	/*=============================================
    crear un registro
    =============================================*/

    public function store(Request $request){

	
	}

	/*=============================================
	editar un registro
	=============================================*/
	public function update($id, Request $request){

        


    }
	

}





    


