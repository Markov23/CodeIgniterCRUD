<?php namespace App\Models;

    use CodeIgniter\Model;    

    class CrudModel extends Model {

        public function listarPokemones(){
            $Pokemones = $this->db->query("SELECT * FROM pokemones");
            return $Pokemones->getResult();
        }

    }