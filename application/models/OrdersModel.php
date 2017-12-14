<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model
{
    public $city_id;
    public $street;
    public $house_number;
    public $apartment_number;

    public function insert($data){
        $this->city_id = $data['city_id'];
        $this->street = $data['street'];
        $this->house_number = $data['house'];
        $this->apartment_number = $data['apartment'];

        return $this->db->insert('orders',$this);
    }

}