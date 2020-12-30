<?php namespace App\Controllers;

	use App\Models\CrudModel;

class Crud extends BaseController
{
	public function index()
	{
		$Crud = new CrudModel();
		$datos = $Crud->listarPokemones();

		$data = [
			"datos" => $datos
		];

		return view('listado',$data);
	}

	public function crear()
	{
		$datos = [
			"mote" => $_POST['mote'],
			"nivel" => $_POST['nivel']
		]
	}

	public function actualizar()
	{

	}

	public function obtenerPokemon($idPokemon)
	{

	}

	public function eliminar($idPokemon)
	{

	}

	//--------------------------------------------------------------------

}
