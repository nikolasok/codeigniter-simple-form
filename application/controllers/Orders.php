<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function index()
    {
        $this->load->helper('form');
        $this->load->model('CitiesModel','city');
        $cities = $this->city->all()->result();
        $cities_new = [];
        foreach ($cities as $city){
            $cities_new[$city->id] = $city->city;
        }
        $data['cities']=$cities_new;
        $this->load->view("order_view",$data);
    }

}
