<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function store(){
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_message('required', 'Поле "{field}" обязательно для заполнения!');
        $this->form_validation->set_message('is_natural_no_zero', 'В поле "{field}" должно быть число!');
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules('street','Улица' , 'required');
        $this->form_validation->set_rules('house','Дом' , 'required');
        $this->form_validation->set_rules('city_id','Город' , 'required|is_natural_no_zero');
        $this->form_validation->set_rules('apartment','Квартира' , 'required|is_natural_no_zero');

        if ($this->form_validation->run() == FALSE) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(406)
                ->set_output(json_encode([
                    'errors'=>$this->form_validation->error_array(),
                    'status' => 406,
                    'title' => 'Ошибка'
                ]));
        }
        else {
            $data = $this->input->post(array('city_id', 'street', 'house', 'apartment'));
            $this->load->model('OrdersModel');
            $this->OrdersModel->insert($data);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'data'=>['message' => 'Поле успешно добавлено!'],
                    'status' => 200,
                    'title' => 'Успех!'
                ]));
        }
    }

}