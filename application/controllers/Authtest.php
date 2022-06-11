<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Authtest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth');
    }
    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->ion_auth->user()->row()->id;
            $data['username'] = $this->ion_auth->user()->row()->username;
        }
        $this->load->view('includes/header');
        $this->load->view('authtest_view', $data);
        $this->load->view('includes/footer');
    }
}
