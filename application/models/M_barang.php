<?php
class M_barang extends CI_Model
{

    public function showbarang()
    {
        $this->db->from('tb_barang');
        $this->db->order_by('nama_barang');
        return $this->db->get();
    }

    public function inputbarang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function deletebarang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function editbarang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updatebarang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_nama_barang()
    {
        $query = $this->db->query('SELECT nama_barang FROM tb_barang ORDER BY nama_barang');
        return $query->result();
    }
    function search_blog($nama_barang)
    {
        $this->db->like('nama_barang', $nama_barang, 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_barang')->result();
    }
}
