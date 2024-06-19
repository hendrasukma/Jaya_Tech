<?php

class Kategori extends CI_Controller{

    // Method untuk menampilkan halaman produk kategori laptop
    public function laptop() {
        $data['laptop'] = $this->model_kategori->data_laptop()->result(); // Mengambil data laptop dari model
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laptop', $data); // Menampilkan view 'laptop' dengan data produk laptop
        $this->load->view('templates/footer');
    }

    // Method untuk menampilkan halaman produk kategori komponen PC
    public function komponen_pc() {
        $data['komponen_pc'] = $this->model_kategori->data_komponen_pc()->result(); // Mengambil data komponen PC dari model
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komponen_pc', $data); // Menampilkan view 'komponen_pc' dengan data produk komponen PC
        $this->load->view('templates/footer');
    }

    // Method untuk menampilkan halaman produk kategori aksesoris
    public function aksesoris() {
        $data['aksesoris'] = $this->model_kategori->data_aksesoris()->result(); // Mengambil data aksesoris dari model
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('aksesoris', $data); // Menampilkan view 'aksesoris' dengan data produk aksesoris
        $this->load->view('templates/footer');
    }

    // Method untuk menampilkan halaman produk kategori konsol game
    public function konsol_game() {
        $data['konsol_game'] = $this->model_kategori->data_konsol_game()->result(); // Mengambil data konsol game dari model
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('konsol_game', $data); // Menampilkan view 'konsol_game' dengan data produk konsol game
        $this->load->view('templates/footer');
    }
}
