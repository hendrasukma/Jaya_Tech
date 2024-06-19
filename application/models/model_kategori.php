<?php

class Model_kategori extends CI_Model{
    
    // Fungsi untuk mengambil data barang dengan kategori 'laptop' dari tabel 'tb_barang'
    public function data_laptop() {
        return $this->db->get_where("tb_barang", array('kategori' => 'laptop')); 
    }

    // Fungsi untuk mengambil data barang dengan kategori 'komponen pc' dari tabel 'tb_barang'
    public function data_komponen_pc() {
        return $this->db->get_where("tb_barang", array('kategori' => 'komponen pc')); 
    }

    // Fungsi untuk mengambil data barang dengan kategori 'aksesoris' dari tabel 'tb_barang'
    public function data_aksesoris() {
        return $this->db->get_where("tb_barang", array('kategori' => 'aksesoris')); 
    }

    // Fungsi untuk mengambil data barang dengan kategori 'konsol game' dari tabel 'tb_barang'
    public function data_konsol_game() {
        return $this->db->get_where("tb_barang", array('kategori' => 'konsol game')); 
    }
}
