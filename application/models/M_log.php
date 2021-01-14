<?php
class M_log extends CI_Model
{
    public function showlog()
    {
        $this->db->from('tb_log_mt');
        $this->db->order_by('no_mt_log');
        return $this->db->get();
    }
    public function add_data_reprint($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function detail_data($where, $table)
    {
        return  $this->db->get_where($table, $where);
    }
    public function update_reprint()
    {
        $this->db->query('INSERT INTO tb_reprint (no_mt_rep, tgl_mt_rep, petugas1_rep, petugas2_rep, nama_barang_rep, kode_barang_rep, deskripsi_rep ) VALUES ( no_mt_log, tgl_mt_log, petugas1_log, petugas2_log, nama_barang_log, kode_barang_log, deskripsi_log  ) ');
    }
    public function update_log()
    {
        $this->db->query('UPDATE tb_log_mt JOIN tb_reprint
        SET 
        tb_log_mt.no_mt_log = tb_reprint.no_mt_rep, 
        tb_log_mt.tgl_mt_log = tb_reprint.tgl_mt_rep, 
        tb_log_mt.petugas1_log = tb_reprint.petugas1_rep, 
        tb_log_mt.petugas2_log = tb_reprint.petugas2_rep, 
        tb_log_mt.nama_barang_log=tb_reprint.nama_barang_rep, 
        tb_log_mt.kode_barang_log = tb_reprint.kode_barang_rep, 
        tb_log_mt.deskripsi_log= tb_reprint.deskripsi_rep
        WHERE tb_log_mt.no_mt_log = tb_reprint.no_mt_rep');
    }
}
