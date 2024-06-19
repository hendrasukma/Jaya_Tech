<?php

class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Memastikan user adalah admin
        if ($this->session->userdata('role_id') != '1') {
            // ... (kode flashdata dan redirect)
        }
        $this->load->model('Model_laporan');
        $this->load->model('Model_invoice'); 
    }

    public function bulanan() {
        $tahun = $this->input->get('tahun', true) ?: date('Y'); // Ambil tahun dari filter atau tahun saat ini
        $data['laporan_bulanan'] = $this->Model_laporan->get_laporan_bulanan($tahun);
        $data['tahun_filter'] = $tahun;

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan_bulanan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_bulanan($tahun, $bulan) {
        $filter_status = $this->input->get('filter_status', true);
        $keyword = $this->input->get('keyword', true);

        $data['invoice'] = $this->Model_laporan->get_invoices_by_month($tahun, $bulan, $filter_status, $keyword);
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;

        foreach ($data['invoice'] as &$inv) {
            if ($inv !== null) {  // Tambahkan pengecekan null
                $inv->pesanan = $this->Model_invoice->ambil_id_pesanan($inv->id);
            }
        }

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_laporan_bulanan', $data);
        $this->load->view('templates_admin/footer');
    }
    

        
}
