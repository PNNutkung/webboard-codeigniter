<?php
    class Board_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function getBoard($threadID = FALSE) {
            if($threadID === FALSE) {
                $query = $this->db->get('board');
                return $query->result_array();
            }

            $query = $this->db->get_where('board', array('threadID' => $threadID));
            return $query->result_array();
        }
    }

?>
