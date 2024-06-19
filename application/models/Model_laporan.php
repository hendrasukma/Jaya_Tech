<?php

class Model_laporan extends CI_Model{
    public function get_laporan_bulanan($tahun) {
        $this->db->select('MONTH(tgl_pesan) as bulan, SUM(total_bayar) as penghasilan');
        $this->db->from('tb_invoice');
        $this->db->where('YEAR(tgl_pesan)', $tahun);
        $this->db->where('status_pembayaran', 'Sudah Diproses dan Barang Sudah dikirim');
        $this->db->group_by('MONTH(tgl_pesan)');
    
        $query = $this->db->get();
        $result = $query->result();
    
        // Pastikan semua bulan ada dalam hasil, jika tidak ada isi dengan 0
        $laporanBulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            $laporanBulanan[$i] = (object) ['bulan' => $i, 'penghasilan' => 0];
        }
        foreach ($result as $row) {
            $laporanBulanan[$row->bulan] = $row;
        }
    
        return $laporanBulanan;
    }
    
    public function get_invoices_by_month($tahun, $bulan, $status = null, $keyword = null) {
        $this->db->where('MONTH(tgl_pesan)', $bulan);
        $this->db->where('YEAR(tgl_pesan)', $tahun);
    
        if ($status) {
            $this->db->where('status_pembayaran', $status);
        }
    
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('id', $keyword); 
        }
    
        return $this->db->get('tb_invoice')->result();
    }
    
    
}
