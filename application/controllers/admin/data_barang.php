<?php

class Data_barang extends CI_Controller {

    // Konstruktor: Inisialisasi dan pengecekan hak akses
    function __construct() {
        parent::__construct();

        // Memeriksa apakah pengguna memiliki hak akses sebagai admin (role_id 1)
        if ($this->session->userdata('role_id') != '1') {
            // Jika tidak, tampilkan pesan error dan alihkan ke halaman login
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akses Ditolak! Silahkan Login Terlebih dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }
    }

    // Menampilkan daftar barang
    public function index() {
        $data['barang'] = $this->model_barang->tampil_data()->result(); // Mengambil data barang dari model
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data); // Melempar data ke view untuk ditampilkan
        $this->load->view('templates_admin/footer');
    }

    // Menambahkan barang baru
    public function tambah_aksi() {
        // Mengambil data inputan dari form
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name']; 

        // Jika ada gambar yang diupload
        if ($gambar != '') {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config); // Memuat library upload

            // Jika upload gambar gagal, tampilkan pesan error
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal di Upload!";
            } else {
                // Jika upload berhasil, simpan nama file gambar
                $gambar = $this->upload->data('file_name');
            }
        }

        // Menyiapkan data untuk disimpan ke database
        $data = array(
            'nama_brg'       => $nama_brg,
            'keterangan'     => $keterangan,
            'kategori'       => $kategori,
            'harga'          => $harga,
            'stok'           => $stok,
            'gambar'         => $gambar // Menggunakan nama file gambar yang sudah diupload
        );

        $this->model_barang->tambah_barang($data, 'tb_barang'); // Menyimpan data barang ke database
        redirect('admin/data_barang/index'); // Mengarahkan ke halaman daftar barang
    }

    // Menampilkan detail barang
    public function detail($id_brg) {
        $data['barang'] = $this->model_barang->detail_brg($id_brg); // Mengambil detail barang berdasarkan id
        if (!$data['barang']) {
            show_404(); // Tampilkan halaman 404 jika barang tidak ditemukan
        }
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_barang', $data); // Melempar data ke view untuk ditampilkan
        $this->load->view('templates_admin/footer');
    }

    // Method untuk menampilkan form edit barang
    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->row(); // Ambil satu baris data sebagai object
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    // Method untuk mengupdate data barang
    public function update() {
        $id         = $this->input->post('id_brg');
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');
        $gambar     = $_FILES['gambar']['name']; // Ambil nama file gambar baru
    
        $data = array(
            'nama_brg'       => $nama_brg,
            'keterangan'     => $keterangan,
            'kategori'       => $kategori,
            'harga'          => $harga,
            'stok'           => $stok
        );
    
        // Jika ada gambar yang diunggah
        if (!empty($gambar)) {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
    
            $this->load->library('upload', $config); // Muat library upload
    
            // Jika upload gambar gagal, tampilkan pesan error
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/data_barang/edit/' . $id); // Kembali ke halaman edit dengan pesan error
            } else {
                // Jika upload berhasil, simpan nama file gambar
                $gambar = $this->upload->data('file_name');
                $data['gambar'] = $gambar; // Update data gambar
    
                // Hapus gambar lama jika ada (kecuali gambar default)
                $old_image = $this->model_barang->get_gambar_by_id($id);
                if ($old_image && $old_image != 'default.jpg' && file_exists('./uploads/' . $old_image)) {
                    unlink('./uploads/' . $old_image);
                }
            }
        }
    
        $where = array(
            'id_brg' => $id
        );
    
        $this->model_barang->update_data($where, $data, 'tb_barang'); // Melakukan update data
        redirect('admin/data_barang/index'); // Redirect setelah update
    }
    
    // Menghapus barang
    public function hapus ($id){
        $where = array('id_brg' => $id); // Kondisi where untuk menghapus barang
        $this->model_barang->hapus_data($where, 'tb_barang'); // Menghapus data barang
        redirect('admin/data_barang/index'); // Mengarahkan ke halaman daftar barang
    }

    // Melakukan filter barang berdasarkan stok
    public function filter_barang() {
        $filter_stok = $this->input->get('filter_stok');

        if ($filter_stok == 'all') {
            $data['barang'] = $this->model_barang->tampil_data()->result();
        } elseif ($filter_stok == '0') {
            $data['barang'] = $this->model_barang->get_barang_by_stok(0);
        } elseif ($filter_stok == '3') {
            $data['barang'] = $this->model_barang->get_barang_by_stok(3, '<=');
        } 

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }
}
