<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller
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
    public function index()
    {
        $data['heading'] = "Error 404 - Page Not Found";
        $data['picture'] = "owl.jpg";
        $data['message'] = "<p>Sorry the page you requested cannot be found.</p>";
        $this->load->view('includes/header');
        $this->load->view('birds_view', $data); // we need to pass the array to the view
        $this->load->view('includes/footer');
    }
}
