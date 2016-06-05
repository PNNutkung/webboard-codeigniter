<?php
    class Board extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('board_model');
            $this->load->helper('url_helper');
        }

        public function index() {
            $data['board'] = $this->board_model->getBoard();
            $data['title'] = 'All threads';

            $this->load->view('templates/header', $data);
            $this->load->view('board/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($threadID = NULL) {
            $data['board_item'] = $this->board_model->getBoard($threadID);

            if(empty($data['board_item'])) {
                show_404();
            }

            $data['title'] = $data['board_item']['title'];

            $this->load->view('templates/header', $data);
            $this->load->view('board/view', $data);
            $this->load->view('templates/footer');
        }
    }

?>
