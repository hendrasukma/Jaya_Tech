<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    // Method index: Menampilkan halaman utama (dashboard) dengan daftar barang
    public function index() {
        // Mengambil data barang dari model
        $data['barang'] = $this->model_barang->tampil_data()->result(); 

        // Memuat tampilan header, sidebar, dashboard (dengan data barang), dan footer
        $this->load->view('templates/header', $data); 
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');        
    }

    // Method search: Menangani pencarian barang
    public function search() {
        $this->load->database(); // Memastikan koneksi database tersedia

        // Mengambil kata kunci pencarian dari input pengguna
        $keyword = $this->input->get('keyword');
        
        // Melakukan pencarian barang melalui model_barang dengan kata kunci tersebut
        $data['barang'] = $this->model_barang->search($keyword); 

        // Memuat tampilan header, sidebar, search_results (dengan hasil pencarian), dan footer
        $this->load->view('templates/header', $data); 
        $this->load->view('templates/sidebar');
        $this->load->view('search_results', $data); 
        $this->load->view('templates/footer');
    }
}
