<?php
class Auth extends CI_Controller {
    // Method untuk menangani proses login pengguna
    public function login() {
        // Menentukan aturan validasi form login (username dan password harus diisi)
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib Diisi!']);

        // Memeriksa validasi form
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login kembali
            $this->load->view('form_login');
        } else {
            // Jika validasi berhasil, lakukan proses pengecekan login di model_auth
            $auth = $this->model_auth->cek_login();

            // Jika login gagal
            if ($auth == FALSE) {
                // Set flashdata dengan pesan error dan redirect ke halaman login
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Anda Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            } else {
                // Jika login berhasil
                // Simpan data pengguna ke dalam session
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('user_id', $auth->id); 

                // Arahkan pengguna berdasarkan role_id (1 = admin, 2 = customer)
                switch ($auth->role_id) {
                    case 1 : redirect('admin/dashboard_admin'); break;
                    case 2 : redirect('welcome'); break;
                    default: break; 
                }
            }
        }
    }

    // Method untuk menangani proses logout pengguna
    public function logout() {
        // Menghapus semua data session
        $this->session->sess_destroy();

        // Redirect ke halaman login setelah logout
        redirect('auth/login'); 
    }
}
