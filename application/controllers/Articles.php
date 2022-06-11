<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Articles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); // loading this for the entire class/controller
        $this->load->library('form_validation'); // loading this for the entire class/controller
        $this->load->database(); // ummm…ditto
    }

    public function index()
    {
        $this->load->model('article_model');
        $data['results'] = $this->article_model->get_articles();
        $this->load->view('includes/header', $data);
        $this->load->view('article_read_view', $data);
        $this->load->view('includes/footer');
    }

    public function detail($id)
    {
        /* We need to add some security and a "graceful exit: in case of a URL manipulation or other 
error that prevents us from getting the required $id */
        if (!is_numeric($id)) { /* if this parameter is missing, or wrong format...*/
            /* best to just redirect*/
            redirect('/', 'location');
        }
        $this->load->library('typography');
        $this->load->model('article_model');
        $data['results'] = $this->article_model->get_article_detail($id);
        $this->load->view('includes/header', $data);
        $this->load->view('article_detail_view', $data);
        $this->load->view('includes/footer');
    } // \ detail

    public function write()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['author_id'] = $this->ion_auth->user()->row()->id;
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required|min_length[20]|max_length[5000]'
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header');
            $this->load->view('article_write_view');
            $this->load->view('includes/footer');
        } else {
            //echo "SUCCESS";
            // retrieve POSTED form data
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $this->load->model('article_model');
            $this->article_model->insert_article($data);
            $this->session->set_flashdata('message', 'Insert Successful');
            redirect("articles/index", 'location');
        }
    } // \ write

    public function edit($id) // we change the name to edit from write and we add the $id parameter
    {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required|min_length[20]|max_length[5000]'
        );
        $this->load->model('article_model');
        if ($this->form_validation->run() == FALSE) {
            $data['results'] = $this->article_model->get_article_detail($id);
            $this->load->view('includes/header');
            $this->load->view('article_edit_view', $data); // a new view here
            $this->load->view('includes/footer');
        } else {
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $this->article_model->edit_article($data, $id);
            $this->session->set_flashdata('message', 'Edit Successful');
            redirect('articles/edit/' . $id, 'location');

            //$this->crud_model->insert_animal($data); // make sure we remove this from our copy/paste of write
            // and comment out or remove any redirects, etc. so we can see errors as we test
            //$this->session->set_flashdata('message', 'Insert Successful');
            //redirect('crud/index', 'location');
        }
    } // \ edit

    public function delete($id)
    {
        $this->load->model('article_model');
        $this->article_model->delete_article($id);
        $this->session->set_flashdata('message', 'Delete Successful');
        redirect('articles/', 'location');
    }
}
