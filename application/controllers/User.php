<?php
    class User extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('url_helper');
            $this->load->model('user_model');
        }

        public function index(){
            //Do nothing.
        }

        public function load_form_validation() {
            $this->load->helper('form');
            $this->load->library('form_validation');
        }

        public function register() {
            $this->load_form_validation();

            $data['title'] = 'Registration';

            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ( $this->form_validation->run() === FALSE ) {
                $this->call_header($data);
                $this->load->view('user/register/register');
                $this->call_footer();
            } else {
                $this->user_model->create_user();
                $this->call_header($data);
                $this->load->view('user/register/register_success');
                $this->call_footer();
            }
        }

        public function call_header($data) {
            $this->load->view('templates/header', $data);
        }

        public function call_footer() {
            $this->load->view('templates/footer');
        }

        public function login() {
            $this->load_form_validation();
            $data['title'] = 'Login';

            $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if(!$this->form_validation->run()) {
                $this->call_header($data);
                $this->load->view('user/login/login');
                $this->call_footer();
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                if( $this->user_model->resolve_user_login($username, $password) ) {
                    $user_id = $this->user_model->get_user_id_from_username($username);
                    $user = $this->user_model->get_user($user_id);

                    $_SESSION['userID'] = $user->userID;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['isAdmin'] = $user->isAdmin;

                    $this->call_header($data);
                    $this->load->view('user/login/login_success', $data);
                    $this->call_footer();
                } else {
                    $data['error'] = 'Wrong username of password.';

                    $this->call_header($data);
                    $this->load->view('user/login/login');
                    $this->call_footer();
                }
            }
        }

        public function logout() {
            $data['title'] = 'Logout';
            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }

                $this->call_header($data);
                $this->load->view('user/logout/logout_success', $data);
                $this->call_footer();
            } else {
                redirect('/');
            }
        }
    }

?>
