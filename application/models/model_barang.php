<?php

class Model_barang extends CI_Model{

    // Fungsi untuk mengambil semua data barang dari tabel 'tb_barang'
    public function tampil_data() {
        return $this->db->get('tb_barang'); // Menggunakan Active Record untuk mengambil semua data
    }

    // Fungsi untuk menambah barang baru ke tabel 'tb_barang'
    public function tambah_barang($data, $table) {
        $this->db->insert($table, $data); // Menggunakan Active Record untuk memasukkan data baru
    }

    // Fungsi untuk mengambil data barang yang akan diedit berdasarkan kondisi tertentu
    public function edit_barang($where, $table) {
        return $this->db->get_where($table, $where); // Menggunakan Active Record untuk mengambil data dengan kondisi WHERE
    }

    // Fungsi untuk memperbarui data barang pada tabel 'tb_barang'
    public function update_data($where, $data, $table) {
        $this->db->where($where); // Menentukan kondisi WHERE untuk data yang akan diupdate
        $this->db->update($table, $data); // Menggunakan Active Record untuk melakukan update
    }

    // Fungsi untuk menghapus data barang dari tabel 'tb_barang'
    public function hapus_data($where, $table) {
        $this->db->where($where); // Menentukan kondisi WHERE untuk data yang akan dihapus
        $this->db->delete($table); // Menggunakan Active Record untuk melakukan penghapusan
    }

    // Fungsi untuk mencari barang berdasarkan ID
    public function find($id) {
        $result = $this->db->where('id_brg', $id) 
                            ->limit(1) // Membatasi hasil query hanya 1 baris
                            ->get('tb_barang'); 

        // Jika data ditemukan, kembalikan sebagai object
        if ($result->num_rows() > 0) {
            return $result->row();
        } else { // Jika tidak ditemukan, kembalikan array kosong
            return array();
        }   
    }

    // Fungsi untuk mendapatkan detail barang berdasarkan ID
    public function detail_brg($id_brg) {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');

        // Jika data ditemukan, kembalikan sebagai array of object (bisa lebih dari 1 baris)
        if ($result->num_rows() > 0) {
            return $result->result(); 
        } else {
            return false; // Jika tidak ditemukan, kembalikan false
        }
    }

    // Fungsi untuk mendapatkan jumlah barang yang stoknya kosong
    public function get_out_of_stock_count() {
        $this->db->where('stok', 0); // Mencari barang dengan stok = 0
        return $this->db->count_all_results('tb_barang'); // Menghitung jumlah baris yang sesuai
    }

    // Fungsi untuk mencari barang berdasarkan kata kunci (nama, keterangan, atau kategori)
    public function search($keyword) {
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('keterangan', $keyword);
        $this->db->or_like('kategori', $keyword);
        return $this->db->get('tb_barang')->result();
    }

    // Fungsi untuk mengambil data barang berdasarkan stok dan operator perbandingan
    public function get_barang_by_stok($stok, $operator = '=') {
        $this->db->where('stok ' . $operator, $stok);
        return $this->db->get('tb_barang')->result();
    }

    // Fungsi untuk mencari barang (digunakan oleh admin)
    public function search_barang($keyword) {
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('keterangan', $keyword); 
        $this->db->or_like('kategori', $keyword);
        return $this->db->get('tb_barang')->result();
    }
    

    public function get_gambar_by_id($id) {
        $this->db->select('gambar');
        $this->db->from('tb_barang');
        $this->db->where('id_brg', $id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row()->gambar;
        } else {
            return null;
        }
    }
    
}
