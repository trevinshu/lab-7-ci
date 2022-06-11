<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); // loading this for the entire class/controller
        $this->load->library('form_validation'); // loading this for the entire class/controller
        $this->load->database(); // ummm…ditto
    }
    public function index()
    {
        // echo "this is home";
        $this->load->view("includes/header");
        $this->load->view("home_view");
        $this->load->view("includes/footer");
    }

    public function test()
    {
        $this->load->view('includes/header');
        $this->load->view('test_view');
        $this->load->view('includes/footer');
        //echo "<h1>This is TEST function in Home controller</h1>";
    }
}
