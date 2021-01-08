<?php namespace App\Controllers;

	use App\Models\LoginModel;

class Login extends BaseController
{
	public function index()
	{
		$mensaje = session('mensaje');
		return view('login', ["mensaje" => $mensaje]);
	}

	public function crud()
	{
		return view('crud');
	}

	public function login()
	{
		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');

		$Usuario = new LoginModel();

		$datosUsuario = $Usuario->obtenerUsuario(['correo'=>$usuario]);

		if(count($datosUsuario) > 0 && $password === $datosUsuario[0]['contrasena'])
		{
			$data = [
				"usuario" => $datosUsuario[0]['nombre'],
				"type" => 'admin',
				"id" => $datosUsuario[0]['id'],
			];
			$session = session();
			$session->set($data);
			return redirect()->to(base_url('/crud'))->with('mensaje','7');
		}
		else
		{
			return redirect()->to(base_url('/'))->with('mensaje','6');
		}
	}

	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}

	//--------------------------------------------------------------------

}