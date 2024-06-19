<?php

class Model_akun extends CI_Model {

    // Mendapatkan semua data akun pengguna dari tabel 'tb_user'
    public function get_data() {
        return $this->db->get('tb_user')->result_array(); // Menggunakan Active Record untuk query SELECT dan mengembalikan data sebagai array
    }

    // Mendapatkan data akun berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('tb_user', array('id' => $id))->row_array(); // Menggunakan Active Record untuk query SELECT dengan WHERE clause dan mengembalikan satu baris data sebagai array
    }

    // Memperbarui password akun berdasarkan ID
    public function update_password($id, $password) {
        $data = array(
            'password' => $password // Menyiapkan data password baru
        );
        $this->db->where('id', $id); // Menentukan akun yang akan diubah
        $this->db->update('tb_user', $data); // Menggunakan Active Record untuk query UPDATE
    }

    // Mendapatkan total jumlah akun customer (role_id = 2)
    public function get_total_customers() {
        $this->db->where('role_id', 2); // Hanya menghitung akun dengan role_id 2 (customer)
        return $this->db->count_all_results('tb_user'); // Menggunakan Active Record untuk menghitung jumlah baris yang sesuai
    }

    // Mencari akun berdasarkan nama atau username
    public function search_akun($keyword) {
        $this->db->like('nama', $keyword); // Mencari akun yang namanya mirip dengan kata kunci (LIKE)
        $this->db->or_like('username', $keyword); // Atau mencari akun yang username-nya mirip dengan kata kunci (LIKE)
        return $this->db->get('tb_user')->result_array(); // Mengembalikan hasil pencarian sebagai array
    }
}
?>
