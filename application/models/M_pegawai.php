<?php
class M_pegawai extends CI_Model
{
    public function show()
    {
        $this->db->from('tb_pegawai');
        $this->db->order_by('nama_pegawai');
        return $this->db->get();
    }
    public function inputpegawai($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function deletepegawai($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function editpegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updatepegawai($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        $this->db->like('nama', $keyword);

        return $this->db->get()->result();
    }


    function search_nama($nama)
    {
        $this->db->from('tb_pegawai');
        $this->db->like('nama', $nama, 'both');
        $this->db->order_by('nama');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    public function get_nama_pegawai()
    {
        $query = $this->db->query('SELECT nama_pegawai FROM tb_pegawai ORDER BY nama_pegawai');
        return $query->result();
    }
}
