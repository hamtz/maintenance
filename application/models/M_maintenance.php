<?php
class M_maintenance extends CI_Model
{
    public function show()
    {
        $this->db->from('tb_form_mt');
        return $this->db->get();
    }

    public function showlogbook()
    {
        $this->db->from('tb_form_mt');
        return $this->db->get();
    }

    public function add_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function after_print()
    {
        $this->db->query('INSERT INTO tb_log_mt (no_mt_log, tgl_mt_log, petugas1_log, petugas2_log, nama_barang_log, kode_barang_log, deskripsi_log ) SELECT no_mt, tgl_mt, petugas1, petugas2, nama_barang, kode_barang, deskripsi FROM tb_form_mt');
    }
    public function after_print_update()
    {
        $this->db->query('UPDATE tb_log_mt JOIN tb_form_mt
        SET 
        tb_log_mt.no_mt_log = tb_form_mt.no_mt, 
        tb_log_mt.tgl_mt_log = tb_form_mt.tgl_mt, 
        tb_log_mt.petugas1_log = tb_form_mt.petugas1, 
        tb_log_mt.petugas2_log = tb_form_mt.petugas2, 
        tb_log_mt.nama_barang_log=tb_form_mt.nama_barang, 
        tb_log_mt.kode_barang_log = tb_form_mt.kode_barang, 
        tb_log_mt.deskripsi_log= tb_form_mt.deskripsi 
        WHERE tb_log_mt.no_mt_log = tb_form_mt.no_mt');
    }


    public function get_number()
    {
        $this->db->select('RIGHT(tb_log_mt.no_mt_log,3) as kode', FALSE);
        $this->db->order_by('no_mt_log', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_log_mt');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 0, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }
}
