<?php
    class User_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function create_user($username, $email, $password) {
            $data = array(
                'username' => $username,
                'password' => $this->hash_password($password),
                'email' => $email
            );

            return $this->db->insert('user', $data);
        }

        public function resolve_user_login($username, $password) {
            $this->db->select('password');
            $this->db->from('user');
            $this->db->where('username', $username);
            $hash = $this->db->get()->row('password');
            return $this->verify_password_hash($password, $hash);
        }

        public function get_user($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            return $this->db->get()->row();
        }

        private function hash_password($password, $hash){
            return password_verify($password, $hash);
        }
    }

?>