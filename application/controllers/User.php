<?php
    class User extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            $this0->load->model('user_model');
        }

        public function index(){
            //Do nothing.
        }

        public function register() {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Registration';

            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ( $this->form_validation->run() === FALSE ) {
                $this->call_header($data);
                $this->load->view('user/register');
                $this->call_footer();
            } else {
                $this->user_model->create_user();
                $this->call_header($data);
                $this->load->view('user/success');
                $this->call_footer();
            }
        }

        public function call_header($data) {
            $this->load->view('templates/header', $data);
        }

        public function call_footer() {
            $this->load->view('templates/footer');
        }
    }

?>
