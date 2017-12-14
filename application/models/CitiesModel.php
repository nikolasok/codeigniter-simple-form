<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class CitiesModel extends CI_Model
{
    public $city;

    public function all(){
        return $this->db->get('cities');
    }

    public function insert($data){
        $this->city = $data['city'];
        return $this->db->insert('cities',$this);
    }

    function role_exists($key)
    {
        $this->db->where('city',$key);
        $query = $this->db->get('cities');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

}