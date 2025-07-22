<?php

class Auth extends CI_Controller {

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cari user berdasarkan username
            $user = $this->db->get_where('tb_user', ['username' => $username])->row();

            // Cek apakah user ditemukan
            if ($user) {
                // Cek apakah password terenkripsi atau tidak
                if (password_verify($password, $user->password) || $password == $user->password) {
                    // Simpan data ke session
                    $this->session->set_userdata('username', $user->username);
                    $this->session->set_userdata('role_id', $user->role_id);

                    // Redirect berdasarkan role
                    switch ($user->role_id) {
                        case 1:
                            redirect('admin/dashboard_admin');
                            break;
                        case 2:
                            redirect('dashboard');
                            break;
                        default:
                            redirect('auth/login');
                            break;
                    }
                } else {
                    // Password tidak cocok
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Password salah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
                    redirect('auth/login');
                }
            } else {
                // Username tidak ditemukan
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username tidak ditemukan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Anda berhasil logout!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

        redirect('auth/login');
    }
}
