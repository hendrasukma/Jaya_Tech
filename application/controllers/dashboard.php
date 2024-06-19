<?php 
class Dashboard extends CI_Controller {

    // Konstruktor: Inisialisasi dan pengecekan hak akses pelanggan
    public function __construct() {
        parent::__construct();

        // Memeriksa apakah pengguna telah login dan memiliki role pelanggan (role_id 2)
        if ($this->session->userdata('role_id') != '2') {
            // Jika tidak, tampilkan pesan error dan alihkan ke halaman login
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login! Silahkan Login Terlebih dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
        }
    }

    // Menambahkan barang ke keranjang
    public function tambah_ke_keranjang($id) {
        $barang = $this->model_barang->find($id); // Mengambil data barang berdasarkan ID
        
        // Menyiapkan data barang untuk ditambahkan ke keranjang
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga, 
            'name'    => $barang->nama_brg  
        );
        $this->cart->insert($data); // Memasukkan barang ke dalam keranjang
        redirect('welcome'); // Mengarahkan kembali ke halaman utama
    }

    // Menampilkan detail keranjang belanja
    public function detail_keranjang() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang'); 
        $this->load->view('templates/footer'); 
    }

    // Menghapus semua item dalam keranjang
    public function hapus_keranjang() {
        $this->cart->destroy(); // Mengosongkan keranjang
        redirect('welcome/index'); // Kembali ke halaman utama
    }

    // Menampilkan halaman pembayaran
    public function pembayaran() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran'); 
        $this->load->view('templates/footer'); 
    }

    // Memproses pesanan
    public function proses_pesanan() {
        // Memproses data pesanan melalui model
        $is_processed = $this->model_invoice->index();

        // Jika pemrosesan berhasil
        if ($is_processed) {
            $this->cart->destroy(); // Menghapus keranjang setelah pesanan diproses
            
            // Memuat tampilan header, sidebar, proses_pesanan, dan footer
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer'); 
        } else {
            // Jika pemrosesan gagal, tampilkan pesan error
            echo "Pesanan anda gagal diproses.";
        }
    }

    // Menampilkan detail barang
    public function detail($id_brg) {
        // Mengambil data detail barang berdasarkan ID dari model
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        
        // Memuat view header, sidebar, detail_barang (dengan data barang), dan footer
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer'); 
    }

    // Menghapus item dari keranjang
    public function hapus_item_keranjang($rowid) {
        $this->cart->remove($rowid); // Menghapus item berdasarkan rowid
        $this->session->set_flashdata('sukses', 'Item berhasil dihapus dari keranjang'); // Set flashdata
        redirect('dashboard/detail_keranjang'); // Arahkan ke halaman detail keranjang
    }
}
