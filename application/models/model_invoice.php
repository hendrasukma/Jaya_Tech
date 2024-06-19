<?php

class Model_invoice extends CI_Model{
    // Fungsi untuk membuat invoice baru dan menyimpan detail pesanan
    public function index() {
        date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu

        // Mengambil data dari formulir pembayaran
        $nama             = $this->input->post('nama');
        $alamat           = $this->input->post('alamat');
        $no_telp          = $this->input->post('no_telp');
        $jasa_pengiriman  = $this->input->post('jasa_pengiriman');
        $metode_pembayaran= $this->input->post('metode_pembayaran');
        $no_rekening      = $this->input->post('no_rekening');
        $user_id          = $this->session->userdata('user_id');

        // Validasi user_id
        if ($user_id === null) {
            show_error('User ID is required for creating an invoice.');
            return false;
        }

        // Menghitung total harga dari keranjang belanja
        $total_bayar = 0;
        foreach ($this->cart->contents() as $item) {
            $total_bayar += $item['subtotal'];
        }

        // Membuat array data untuk tabel invoice
        $invoice = array(
            'nama'               => $nama,
            'alamat'             => $alamat,
            'no_telp'            => $no_telp,
            'jasa_pengiriman'    => $jasa_pengiriman,
            'metode_pembayaran'  => $metode_pembayaran,
            'no_rekening'        => $no_rekening,
            'user_id'            => $user_id,
            'tgl_pesan'          => date('Y-m-d H:i:s'),
            'batas_bayar'        => date('Y-m-d H:i:s', strtotime('+1 day')),
            'total_bayar'        => $total_bayar // Menambahkan total bayar
        );

        // Menyimpan data invoice ke tabel 'tb_invoice'
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id(); // Mendapatkan ID invoice yang baru dibuat

        // Menyimpan detail pesanan ke tabel 'tb_pesanan'
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice'  => $id_invoice,
                'id_brg'      => $item['id'],
                'nama_brg'    => $item['name'],
                'jumlah'      => $item['qty'],
                'harga'       => $item['price']
            );
            $this->db->insert('tb_pesanan', $data); 
        }

        return true; // Mengembalikan nilai true jika proses berhasil
    }

    // Fungsi untuk menampilkan semua data invoice, termasuk data pengguna yang terkait
    public function tampil_data() {
        $this->db->select('tb_invoice.*, tb_user.id as user_id'); // Memilih kolom dari tabel invoice dan user_id dari tabel user
        $this->db->from('tb_invoice');
        $this->db->join('tb_user', 'tb_user.id = tb_invoice.user_id', 'left'); // Melakukan left join untuk mendapatkan semua invoice, meskipun tidak ada pengguna terkait
        $result = $this->db->get(); // Menjalankan query

        // Mengembalikan hasil query, jika ada data, maka dikembalikan sebagai array of object, jika tidak ada dikembalikan false
        if ($result->num_rows() > 0) {
            return $result->result(); 
        } else {
            return false;
        }
    }

    // Fungsi untuk mengambil data invoice berdasarkan ID
    public function ambil_id_invoice($id_invoice) {
        $result = $this->db->where('id', $id_invoice)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row(); // Mengembalikan satu baris data invoice sebagai object
        } else {
            return false;
        }
    }

    // Fungsi untuk mengambil detail pesanan berdasarkan ID invoice
    public function ambil_id_pesanan($id_invoice) {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result(); // Mengembalikan detail pesanan sebagai array of object
        } else {
            return false;
        }
    }

    // Fungsi untuk menghapus invoice berdasarkan ID
    public function delete_invoice($id_invoice) {
        $this->db->where('id', $id_invoice);
        $this->db->delete('tb_invoice');
    }


    // Fungsi untuk mendapatkan status pembayaran dari pengguna tertentu
    public function get_payment_status($user_id) {
        $this->db->where('user_id', $user_id); 
        $result = $this->db->get('tb_invoice'); 
        return $result->result(); 
    }

    // Fungsi untuk mengambil semua invoice milik pengguna tertentu, dengan opsi pengurutan dan filter status
    public function get_user_invoices($user_id, $sort = 'desc', $status = null) {
        $this->db->where('user_id', $user_id);
        if ($status) {
            $this->db->where('status_pembayaran', $status);
        }
        $this->db->order_by('tgl_pesan', $sort); 
        $result = $this->db->get('tb_invoice');
        return $result->result();
    }

    // Fungsi untuk mengupdate bukti pembayaran pada invoice
    public function update_bukti_pembayaran($id_invoice, $file_name) {
        $this->db->where('id', $id_invoice);
        $this->db->update('tb_invoice', array('bukti_pembayaran' => $file_name));
    }

    // Fungsi untuk mendapatkan status pembayaran invoice berdasarkan user_id, dengan opsi pengurutan dan filter status
    public function get_payment_status_by_user($user_id, $sort = 'desc', $status = null) {
        $this->db->select('id, nama, alamat, tgl_pesan, batas_bayar, status_pembayaran, bukti_pembayaran');
        $this->db->from('tb_invoice');
        $this->db->where('user_id', $user_id);

        // Menerapkan filter status jika ada
        if ($status) {
            $this->db->where('status_pembayaran', $status);
        }

        // Menerapkan pengurutan berdasarkan tanggal pesan
        $this->db->order_by('tgl_pesan', $sort);

        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mengupdate data invoice berdasarkan ID
    public function update_invoice($id_invoice, $data) {
        $this->db->where('id', $id_invoice);
        return $this->db->update('tb_invoice', $data);
    }

    // Fungsi untuk menghitung jumlah pesanan yang sedang diproses (status_pembayaran = 'Sedang diproses')
    public function get_processing_orders_count() {
        $this->db->where('status_pembayaran', 'Sedang diproses');
        return $this->db->count_all_results('tb_invoice');
    }

    // Fungsi untuk mengambil data invoice berdasarkan status pembayaran
    public function get_invoices_by_status($status) {
        $this->db->where('status_pembayaran', $status);
        $result = $this->db->get('tb_invoice');
        return $result->result();
    }

    // Fungsi untuk menghitung total penghasilan per bulan berdasarkan invoice yang sudah selesai
    public function get_monthly_income() {
        $this->db->select('MONTH(tgl_pesan) as month, SUM(total_bayar) as income');
        $this->db->from('tb_invoice');
        $this->db->where('status_pembayaran', 'Sudah Diproses dan Barang Sudah dikirim'); 
        $this->db->group_by('MONTH(tgl_pesan)'); 
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mencari invoice berdasarkan kata kunci pada nama pemesan, ID invoice, atau nomor telepon
    public function search_invoice($keyword) {
        $this->db->like('nama', $keyword); // Cari berdasarkan nama pemesan
        $this->db->or_like('id', $keyword);  // Cari berdasarkan ID invoice
        $this->db->or_like('no_telp', $keyword); // Cari berdasarkan nomor telepon
    
        $result = $this->db->get('tb_invoice');
        return $result->result();
    }    
    
}
