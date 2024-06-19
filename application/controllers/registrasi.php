<?php

class Registrasi extends CI_Controller {

    // Method untuk menampilkan formulir registrasi dan memproses data registrasi
    public function index() {

        // Menentukan aturan validasi form registrasi
        // Nama, username, dan password (2 kali) wajib diisi
        // Password harus cocok dengan konfirmasi password
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Wajib Diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', [
            'required' => 'Password Wajib Diisi!',
            'matches'  => 'Password tidak cocok'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        // Memeriksa validasi form
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form registrasi kembali (dengan pesan error)
            $this->load->view('templates/header');
            $this->load->view('registrasi');
        } else {
            // Jika validasi berhasil, siapkan data pengguna yang akan disimpan
            $data = array(
                'id'       => '', // ID kosong karena akan otomatis terisi oleh database
                'nama'     => $this->input->post('nama'), // Mengambil nilai 'nama' dari input form
                'username' => $this->input->post('username'), // Mengambil nilai 'username' dari input form
                'password' => $this->input->post('password_1'), // Mengambil nilai 'password_1' dari input form
                'role_id'  => 2, // Role ID 2 menandakan pengguna sebagai pelanggan (customer)
            );

            // Menyimpan data pengguna baru ke dalam tabel 'tb_user'
            $this->db->insert('tb_user', $data);

            // Setelah berhasil registrasi, arahkan pengguna ke halaman login
            redirect('auth/login'); 
        }
    }
}
