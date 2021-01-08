<?php namespace App\Models;

    use CodeIgniter\Model;    

    class LoginModel extends Model {

        public function obtenerUsuario($data)
        {
            $Usuario = $this->db->table('usuarios');
            $Usuario->where($data);
            return $Usuario->get()->getResultArray();
        }

    }