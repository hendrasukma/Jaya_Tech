<?php

class Dashboard_admin extends CI_Controller {

    // Konstruktor: Melakukan inisialisasi dasar dan memuat model yang diperlukan
    public function __construct() {
        parent::__construct();

        // Memeriksa apakah pengguna sudah login dan memiliki role admin (role_id = 1)
        if ($this->session->userdata('role_id') != '1') {
            // Jika tidak, tampilkan pesan error dan redirect ke halaman login
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akses Ditolak! Silahkan Login Terlebih dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }

        // Memuat model-model yang akan digunakan untuk mengambil data
        $this->load->model('Model_invoice');
        $this->load->model('Model_barang');
        $this->load->model('Model_akun');
    }

    // Menampilkan halaman dashboard admin
    public function index() {
        // Mendapatkan data jumlah barang yang stoknya kosong
        $data['out_of_stock_count'] = $this->Model_barang->get_out_of_stock_count();
        
        // Mendapatkan data jumlah pesanan yang sedang diproses
        $data['processing_orders_count'] = $this->Model_invoice->get_processing_orders_count();

        // Mendapatkan data total penghasilan bulanan
        $data['monthly_income'] = $this->Model_invoice->get_monthly_income();

        // Mendapatkan data total jumlah akun customer
        $data['total_customers'] = $this->Model_akun->get_total_customers();

        // Mendapatkan bulan saat ini (dalam format angka 1-12)
        $data['current_month'] = date('n'); 

        // Memuat tampilan header admin
        $this->load->view('templates_admin/header');
        
        // Memuat tampilan sidebar admin
        $this->load->view('templates_admin/sidebar');
        
        // Memuat tampilan utama dashboard dengan data yang sudah disiapkan
        $this->load->view('admin/dashboard', $data);
        
        // Memuat tampilan footer admin
        $this->load->view('templates_admin/footer');
    }
}
