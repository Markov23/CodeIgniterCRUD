<?php namespace App\Controllers;

	use App\Models\CrudModel;

	use \Mpdf\Mpdf;

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

	function reporte($nombre){
		$mpdf = new \Mpdf\Mpdf;
		$connect = mysqli_connect("localhost", "root", "", "registro-pokemon");
		$query ="SELECT * FROM pokemon JOIN usuarios ON pokemon.entrenador = usuarios.id WHERE nombre ='".$nombre."'";
		$result = $connect->query($query);
		$html= '<!DOCTYPE html>
		<html lang="en">
		  <head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="http://localhost/CodeIgniterCRUD/css/style.css" media="all" />
		  </head>
		  <body>
			<header class="clearfix">
			  <h1>Reporte de Pokemon Registrados</h1>
			</header>
			<main>
			  <table>
				<thead>
				  <tr>
					<th class="service">ID</th>
					<th class="desc">NOMBRE</th>
					<th>NIVEL</th>					
				  </tr>
				</thead>
				<tbody>';
		while($fila = $result->fetch_assoc()){
			$html .='<tr>
					<td class="service">'.$fila['id'].'</td>
					<td class="desc">'.$fila['mote'].'</td>
					<td class="unit">'.$fila['nivel'].'</td>					
				  </tr>
				';
		
		}
		$html .='</tbody>
		</table>		
	  </main>
	  </body>
		</html>';
		$mpdf->WriteHTML($html);
		return redirect()->to($mpdf->Output('archivo.pdf','I'));
	}

	//--------------------------------------------------------------------

}
