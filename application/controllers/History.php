<?php

class History extends CI_Controller {

    // Method untuk menampilkan status pembayaran pengguna
    public function payment_status() {
        $user_id = $this->session->userdata('user_id'); // Mengambil ID pengguna dari session

        // Mengambil parameter filter (sort dan status) dari query string atau menggunakan nilai default
        $sort = $this->input->get('sort', TRUE) ?: 'desc'; 
        $status = $this->input->get('status', TRUE);

        // Mengambil data status pembayaran pengguna dari model, berdasarkan filter
        $data['payment_status'] = $this->model_invoice->get_payment_status_by_user($user_id, $sort, $status);

        // Memuat view header, sidebar, payment_status_view (dengan data), dan footer
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history/payment_status_view', $data); 
        $this->load->view('templates/footer');
    }


    // Method untuk menampilkan detail invoice tertentu
    public function invoice_detail($id_invoice) {
        $user_id = $this->session->userdata('user_id'); // Mengambil ID pengguna dari session
        $invoice = $this->model_invoice->ambil_id_invoice($id_invoice); // Mengambil data invoice berdasarkan ID

        // Memeriksa apakah invoice yang diakses milik pengguna yang sedang login
        if ($invoice->user_id != $user_id) {
            show_error('You are not authorized to view this invoice.', 403); // Tampilkan error jika bukan pemilik invoice
        }

        // Menyiapkan data invoice dan pesanan untuk ditampilkan di view
        $data['invoice'] = $invoice;
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        // Memuat view header, sidebar, detail_invoice (dengan data), dan footer
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history/detail_invoice', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk menghapus bukti pembayaran
    public function delete_payment_proof($id_invoice) {
        // Mengambil data invoice berdasarkan ID
        $invoice = $this->model_invoice->ambil_id_invoice($id_invoice);

        // Jika invoice memiliki bukti pembayaran
        if ($invoice->bukti_pembayaran) {
            // Menghapus file bukti pembayaran dari folder uploads
            $file_path = './uploads/' . $invoice->bukti_pembayaran;
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Mengupdate data invoice di database, menghapus informasi bukti pembayaran
            $this->model_invoice->update_invoice($id_invoice, array('bukti_pembayaran' => null));
        }

        // Redirect ke halaman detail invoice setelah penghapusan
        redirect('history/invoice_detail/' . $id_invoice);
    }

    // Method untuk menampilkan daftar invoice pengguna
    public function invoice() {
        $user_id = $this->session->userdata('user_id'); // Mengambil ID pengguna dari session
        
        // Mengambil parameter filter (sort dan status) dari query string atau menggunakan nilai default
        $sort = $this->input->get('sort', TRUE) ?: 'desc'; 
        $status = $this->input->get('status', TRUE);

        // Mengambil data invoice pengguna dari model, berdasarkan filter
        $data['invoices'] = $this->model_invoice->get_user_invoices($user_id, $sort, $status);

        // Memuat view header, sidebar, invoice_view (dengan data), dan footer
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history/invoice_view', $data); 
        $this->load->view('templates/footer');
    }

    // Method untuk mengupdate status pembayaran invoice
    public function update_status($id_invoice) {
        $status = $this->input->post('status_pembayaran'); // Mengambil inputan status pembayaran baru
        $this->model_invoice->update_status($id_invoice, $status); // Mengupdate status di model
        redirect('history/invoice'); // Mengarahkan ke halaman invoice setelah update
    }

    // Method untuk mengupload bukti pembayaran
    public function upload_payment_proof($id_invoice) {
        // Konfigurasi upload gambar
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('payment_proof')) {
            // Jika upload berhasil, simpan data dan update invoice
            $file_data = $this->upload->data();
            $data = array(
                'payment_proof' => $file_data['file_name'],
                'status_pembayaran' => 'Sudah Diproses dan Barang Sudah dikirim'
            );
            $this->model_invoice->update_invoice($id_invoice, $data);
            $this->session->set_flashdata('message', 'Bukti pembayaran berhasil diupload.');
        } else {
            $this->session->set_flashdata('message', 'Gagal mengupload bukti pembayaran.');
        }
        redirect('history/payment_status'); 
    }

    // Method untuk mengupload bukti pembayaran, dengan penanganan error dan penghapusan bukti lama
    public function upload_bukti($id_invoice) {
        // Konfigurasi upload bukti pembayaran
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; 
        $this->load->library('upload', $config);

        // Jika upload gagal
        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
        } else { // Jika upload berhasil
            $data = $this->upload->data();
            $file_name = $data['file_name'];

            // Menghapus bukti pembayaran lama jika ada
            $invoice = $this->model_invoice->ambil_id_invoice($id_invoice);
            if ($invoice->bukti_pembayaran) {
                $old_file_path = './uploads/' . $invoice->bukti_pembayaran;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
            }
            // Mengupdate bukti pembayaran pada invoice di database
            $this->model_invoice->update_bukti_pembayaran($id_invoice, $file_name);
        }

        // Redirect ke halaman status pembayaran setelah proses upload selesai
        redirect('history/payment_status'); 
    }
}
