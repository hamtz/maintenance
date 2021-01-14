<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Datadata extends CI_Controller
{
    public function pegawai()
    {
        $data['datapegawai'] = $this->M_pegawai->show()->result();
        $this->load->view('dashpegawai', $data);
    }
    public function barang()
    {
        $data['databarang'] = $this->M_barang->showbarang()->result();
        $this->load->view('dashbarang', $data);
    }
    public function log()
    {
        //$this->db->query('TRUNCATE tb_reprint');
        $data['datalog'] = $this->M_log->showlog()->result();
        $this->load->view('dashlog', $data);
    }


    public function insert_pegawai()
    {

        $nama = $this->input->post('nama_pegawai');
        $nip = $this->input->post('nip_pegawai');


        $data = array(
            'nama_pegawai' => $nama,
            'nip_pegawai' => $nip,

        );
        $this->M_pegawai->inputpegawai($data, 'tb_pegawai');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil disimpan.  
        </div>');

        redirect('datadata/pegawai');
    }
    public function insert_barang()
    {
        $nama = $this->input->post('nama_barang');
        $kode = $this->input->post('kode_barang');

        $data = array(
            'nama_barang' => $nama,
            'kode_barang' => $kode,

        );
        $this->M_barang->inputbarang($data, 'tb_barang');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil disimpan.  
        </div>');

        redirect('datadata/barang');
    }


    public function delete_pegawai($id)
    {
        $where = array('id_pegawai' => $id);
        $this->M_pegawai->deletepegawai($where, 'tb_pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil dihapus.  
        </div>');
        redirect('datadata/pegawai');
    }
    public function delete_barang($id)
    {
        $where = array('id_barang' => $id);
        $this->M_barang->deletebarang($where, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil dihapus.  
        </div>');
        redirect('datadata/barang');
    }


    public function edit_pegawai($id)
    {
        $where = array('id_pegawai' => $id);
        $data['datapegawai'] = $this->M_pegawai->editpegawai($where, 'tb_pegawai')->result();

        $this->load->view('form_edit_pegawai', $data);
        // $this->load->view('template/footer');
    }
    public function edit_barang($id)
    {
        $where = array('id_barang' => $id);
        $data['databarang'] = $this->M_barang->editbarang($where, 'tb_barang')->result();

        $this->load->view('form_edit_barang', $data);
        // $this->load->view('template/footer');
    }


    public function update_pegawai()
    {
        $id = $this->input->post('id_pegawai');
        $nama = $this->input->post('nama_pegawai');
        $nip = $this->input->post('nip_pegawai');

        $data = array(
            'id_pegawai' => $id,
            'nama_pegawai' => $nama,
            'nip_pegawai' => $nip
        );
        $where = array(
            'id_pegawai' => $id
        );
        $this->M_pegawai->updatepegawai($where, $data, 'tb_pegawai');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil diupdate.  
        </div>');
        redirect('datadata/pegawai');
    }
    public function update_barang()
    {
        $id = $this->input->post('id_barang');
        $nama = $this->input->post('nama_barang');
        $kode = $this->input->post('kode_barang');

        $data = array(
            'id_barang' => $id,
            'nama_barang' => $nama,
            'kode_barang' => $kode
        );
        $where = array(
            'id_barang' => $id
        );
        $this->M_barang->updatebarang($where, $data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil diupdate.  
        </div>');
        redirect('datadata/barang');
    }

    public function detail_print($id)
    {
        $where = array('no_mt_log' => $id);
        $data['detaildata'] = $this->M_log->detail_data($where, 'tb_log_mt')->result();

        $this->db->query('TRUNCATE tb_reprint');
        $this->load->view('detail_log', $data);
        //$this->insert_print($data);
    }


    public function insert_print()
    {
        $nomor = $this->input->post('no_mt_rep');
        $tanggal = $this->input->post('tgl_mt_rep');
        $petugas1 = $this->input->post('petugas1_rep');
        $petugas2 = $this->input->post('petugas2_rep');
        $nama_barang = $this->input->post('nama_barang_rep');
        $kode_barang = $this->input->post('kode_barang_rep');
        $deskripsi = $this->input->post('deskripsi_rep');

        $data = array(
            'no_mt_rep' => $nomor,
            'tgl_mt_rep' => $tanggal,
            'petugas1_rep' => $petugas1,
            'petugas2_rep' => $petugas2,
            'nama_barang_rep' => $nama_barang,
            'kode_barang_rep' => $kode_barang,
            'deskripsi_rep' => $deskripsi,
        );

        $this->M_log->add_data_reprint($data, 'tb_reprint');
        $this->M_log->update_log();

        //$this->controller->Laporan($data);
        redirect('Laporan/print');
    }
}
