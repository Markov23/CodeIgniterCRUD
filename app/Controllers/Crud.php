<?php namespace App\Controllers;

	use App\Models\CrudModel;

class Crud extends BaseController
{
	public function index()
	{
		$Crud = new CrudModel();
		$datos = $Crud->listarPokemones(session('id'));

		$mensaje = session('mensaje');

		$data = [
			"datos" => $datos,
			"mensaje" => $mensaje
		];

		return view('listado',$data);
	}

	public function crear()
	{
		$datos = [
			"mote" => $_POST['mote'],
			"nivel" => $_POST['nivel'],
			"entrenador" => session('id')
		];

		$Crud = new CrudModel();

		$respuesta = $Crud->insertar($datos);

		if($respuesta > 0)
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','1');
		}
		else
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','0');
		}
	}

	public function actualizar()
	{
		$datos = [
			"mote" => $_POST['mote'],
			"nivel" => $_POST['nivel'],
		];

		$id = $_POST['id'];

		$Crud = new CrudModel();

		$respuesta = $Crud->actualizar($datos,$id);

		if($respuesta)
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','2');
		}
		else
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','3');
		}
	}

	public function obtenerPokemon($idPokemon)
	{
		$data = ["id" => $idPokemon];

		$Crud = new CrudModel();
		$respuesta = $Crud->obtenerPokemon($data);

		$datos = ["datos" => $respuesta];

		return view('actualizar',$datos);
	}

	public function eliminar($idPokemon)
	{
		$Crud = new CrudModel();

		$data = ["id" => $idPokemon];

		$respuesta = $Crud->eliminar($data);

		if($respuesta)
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','4');
		}
		else
		{
			return redirect()->to(base_url().'/crud')->with('mensaje','5');
		}
	}

	//--------------------------------------------------------------------

}
