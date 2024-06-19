<?php

class Model_auth extends CI_Model {
    // Method untuk memeriksa validitas login pengguna
    public function cek_login() {
        $username = set_value('username'); // Mengambil username dari input form (setelah di-escape)
        $password = set_value('password'); // Mengambil password dari input form (setelah di-escape)

        // Query database untuk mencari pengguna dengan username dan password yang sesuai
        $result = $this->db->where('username', $username)
                            ->where('password', $password) 
                            ->limit(1) 
                            ->get('tb_user');

        // Memeriksa apakah ada data pengguna yang ditemukan
        if ($result->num_rows() > 0) {
            // Jika ditemukan, kembalikan objek data pengguna
            return $result->row(); 
        } else {
            // Jika tidak ditemukan, kembalikan array kosong (menandakan login gagal)
            return array(); 
        }
    }
}
