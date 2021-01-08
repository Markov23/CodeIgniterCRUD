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

	public function registro()
	{
		return view('registrar');
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

	public function registrar()
	{
		$datos = [
			"nombre" => $_POST['nombre'],
			"region" => $_POST['region'],
			"correo" => $_POST['correo'],
			"contrasena" => $_POST['contrasena']
		];

		$Usuario = new LoginModel();

		$respuesta = $Usuario->insertar($datos);

		if($respuesta > 0)
		{
			return redirect()->to(base_url().'/')->with('mensaje','9');
		}
		else
		{
			return redirect()->to(base_url().'/registro')->with('mensaje','8');
		}
	}

	public function recuperar()
	{
		return view('recuperar');
	}

	public function enviar()
	{
		$usuario = $this->request->getPost('correo');

		$Usuario = new LoginModel();

		$datosUsuario = $Usuario->obtenerUsuario(['correo'=>$usuario]);

		if(count($datosUsuario) > 0)
		{
			$name = "Marco";
            $asunto = "Recuperacion pokemon";
            $msg = "Tu contraseña es: ".$datosUsuario[0]['contrasena'];
            $email = $datosUsuario[0]['correo'];

            $header = "From: marcobdac@gmail.com" . "\r\n";
            $header.= "Reply-To: marcobdac@gmail.com" . "\r\n";
            $header.= "X-Mailer: PHP/". phpversion();
            $mail = mail($email,$asunto,$msg,$header);
			
			return redirect()->to(base_url('/'))->with('mensaje','7');
		}
		else
		{
			return redirect()->to(base_url('/'))->with('mensaje','6');
		}
	}

	//--------------------------------------------------------------------

}