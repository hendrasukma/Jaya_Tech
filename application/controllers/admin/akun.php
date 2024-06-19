<?php

class Akun extends CI_Controller {

    // Konstruktor: Memuat model, library, dan helper yang dibutuhkan
    public function __construct() {
        parent::__construct();
        $this->load->model('model_akun'); // Memuat model untuk operasi database terkait akun
        $this->load->database();  
        $this->load->helper('url');
        $this->load->library('form_validation'); // Memuat library untuk validasi form
    }

    // Menampilkan daftar akun pengguna (untuk admin)
    public function index() {
        $data['akun'] = $this->model_akun->get_data(); // Mendapatkan semua data akun dari model
        $this->load->view('templates_admin/header'); // Memuat bagian header dari template admin
        $this->load->view('templates_admin/sidebar'); // Memuat bagian sidebar dari template admin
        $this->load->view('admin/akun', $data); // Memuat tampilan utama daftar akun, dengan data akun
        $this->load->view('templates_admin/footer'); // Memuat bagian footer dari template admin
    }

    // Menangani proses ganti password akun
    public function ganti_password($id) {
        // Menentukan aturan validasi untuk password
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        // Memeriksa apakah validasi berhasil
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form ganti password lagi
            $data['akun'] = $this->model_akun->get_by_id($id);
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/ganti_password', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // Jika validasi berhasil, update password di database
            $password = $this->input->post('password');
            $this->model_akun->update_password($id, $password);
            redirect('admin/akun'); // Arahkan kembali ke halaman daftar akun
        }
    }

    // Menangani pencarian akun
    public function search() {
        $keyword = $this->input->get('keyword'); // Mendapatkan kata kunci pencarian dari query string
        $data['akun'] = $this->model_akun->search_akun($keyword); // Mencari akun berdasarkan kata kunci

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/akun', $data); // Menampilkan hasil pencarian di view akun
        $this->load->view('templates_admin/footer');
    }
}

?>
