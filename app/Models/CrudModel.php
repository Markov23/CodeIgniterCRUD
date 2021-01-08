<?php namespace App\Models;

    use CodeIgniter\Model;    

    class CrudModel extends Model {

        public function listarPokemones($data){
            $Pokemon = $this->db->query("SELECT * FROM pokemon WHERE entrenador = $data");
            return $Pokemon->getResult();
        }

        public function insertar($datos)
        {
            $Pokemon = $this->db->table('pokemon');
            $Pokemon->insert($datos);

            return $this->db->insertID();
        }

        public function obtenerPokemon($data)
        {
            $Pokemon = $this->db->table('pokemon');
            $Pokemon->where($data);
            return $Pokemon->get()->getResultArray();
        }

        public function actualizar($data,$id)
        {
            $Pokemon = $this->db->table('pokemon');
            $Pokemon->set($data);
            $Pokemon->where('id',$id);
            return $Pokemon->update();
        }

        public function eliminar($data)
        {
            $Pokemon = $this->db->table('pokemon');
            $Pokemon->where($data);
            return $Pokemon->delete();
        }

    }