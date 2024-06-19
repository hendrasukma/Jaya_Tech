<?php

class Invoice extends CI_Controller {
    // Constructor: Memanggil constructor parent dan memeriksa apakah pengguna adalah admin
    public function __construct() {
        parent::__construct();
        
        // Memeriksa apakah pengguna memiliki role admin (1)
        if ($this->session->userdata('role_id') != '1') {
            // Jika bukan admin, set flashdata pesan error dan redirect ke halaman login
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akses Ditolak! Silahkan Login Terlebih dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }
    }

    // Method untuk menampilkan daftar invoice
    public function index() {
        // Mengambil data invoice dari model
        $data['invoice'] = $this->model_invoice->tampil_data(); 
        
        // Memuat view header, sidebar, invoice, dan footer untuk admin
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data); 
        $this->load->view('templates_admin/footer');
    }

    // Method untuk menampilkan detail dari invoice tertentu
    public function detail($id_invoice) {
        // Mengambil data invoice dan pesanan berdasarkan ID invoice
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        // Memuat view header, sidebar, detail_invoice, dan footer untuk admin
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    // Method untuk menghapus invoice
    public function delete($id_invoice) {
        // Menghapus invoice berdasarkan ID
        $this->model_invoice->delete_invoice($id_invoice);

        // Set flashdata pesan sukses dan redirect ke halaman daftar invoice
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Invoice berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/invoice');
    }

    // Method untuk mengupdate status pembayaran invoice
    public function update_status($id_invoice) {
        $status_pembayaran = $this->input->post('status_pembayaran'); // Mengambil inputan status pembayaran baru
        $data = array('status_pembayaran' => $status_pembayaran); // Membuat array data yang akan diupdate
        $this->model_invoice->update_invoice($id_invoice, $data); // Mengupdate invoice di database

        $this->session->set_flashdata('message', 'Status pembayaran berhasil diupdate.');
        redirect('admin/invoice');
    }

    // Method untuk memfilter invoice berdasarkan status pembayaran
    public function filter() {
        $filter_status = $this->input->get('filter_status'); // Mengambil parameter filter dari query string

        // Mengambil data invoice berdasarkan filter status, atau semua invoice jika filter kosong
        if ($filter_status == 'sedang diproses') {
            $data['invoice'] = $this->model_invoice->get_invoices_by_status('Sedang diproses');
        } elseif ($filter_status == 'sudah diproses') {
            $data['invoice'] = $this->model_invoice->get_invoices_by_status('Sudah Diproses dan Barang Sudah dikirim');
        } else {
            $data['invoice'] = $this->model_invoice->tampil_data(); 
        }

        // Memuat view header, sidebar, invoice (dengan data yang sudah difilter), dan footer
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data); 
        $this->load->view('templates_admin/footer');
    }

    // Method untuk mencari invoice berdasarkan kata kunci
    public function search_invoice() {
        $keyword = $this->input->get('keyword'); // Mengambil kata kunci pencarian dari query string
        $data['invoice'] = $this->model_invoice->search_invoice($keyword); // Mencari invoice berdasarkan kata kunci

        // Memuat view header, sidebar, invoice (dengan hasil pencarian), dan footer
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data); 
        $this->load->view('templates_admin/footer');
    }
}
