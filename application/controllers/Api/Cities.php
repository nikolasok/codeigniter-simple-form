<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller
{
    public function store(){
        $this->load->helper('form');
        $this->load->view("city_view");
        $this->load->model('CitiesModel');

        $data = $this->input->post(array('city'));

        if($this->CitiesModel->role_exists($data['city'])) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(406)
                ->set_output(json_encode([
                    'errors' => ['message' => 'Данный город был уже добавлен!'],
                    'status' => 406,
                    'title' => 'Ошибка!'
                ]));
        }

        if($data['city']) {
            $this->CitiesModel->insert($data);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'data' => ['message' => 'Город был успешно добавлен!'],
                    'status' => 200,
                    'title' => 'Успех!'
                ]));
        }
    }


}