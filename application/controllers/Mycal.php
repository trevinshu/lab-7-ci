<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mycal extends CI_Controller
{

    public function index($year = NULL, $month = NULL)
    {
        $this->load->model('Mycal_model');
        $data['calender'] = $this->Mycal_model->getcalender($year, $month);
        $this->load->view('includes/header', $data);
        $this->load->view('calview', $data);
        $this->load->view('includes/footer');
    }
}
