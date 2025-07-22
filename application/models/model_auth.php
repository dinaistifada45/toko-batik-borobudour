<?php 

class Model_auth extends CI_Model {

    public function cek_login()
    {
        $username = $this->input->post('username'); // Use input->post to get the username
        $password = $this->input->post('password'); // Use input->post to get the password

        // It's recommended to hash the password before checking it in the database
        $result = $this->db->where('username', $username)
                           ->where('password', md5($password)) // Hashing the password for security
                           ->limit(1)
                           ->get('tb_user');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE; // Return FALSE instead of an empty array for better handling
        }
    }
}
