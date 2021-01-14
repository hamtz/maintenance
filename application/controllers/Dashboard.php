<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['listpegawai'] = $this->M_pegawai->get_nama_pegawai();
        $data['listbarang'] = $this->M_barang->get_nama_barang();
        $data['autonumber'] = $this->M_maintenance->get_number();

        $this->load->view('dashboard', $data);
    }

    public function list()
    {
        $data['listlogbook'] = $this->M_maintenance->showlogbook()->result();
        $this->load->view('dashlogbook', $data);
    }

    /*
    public function pegawai()
    {
        $data['datapegawai'] = $this->M_pegawai->show()->result();

        $this->load->view('dashpegawai', $data);
    }*/


    public function insert()
    {
        $nomor = $this->input->post('no_mt');
        $tanggal = $this->input->post('tgl_mt');
        $petugas1 = $this->input->post('petugas1');
        $petugas2 = $this->input->post('petugas2');
        $nama_barang = $this->input->post('nama_barang');
        $kode_barang = $this->input->post('kode_barang');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'no_mt' => $nomor,
            'tgl_mt' => $tanggal,
            'petugas1' => $petugas1,
            'petugas2' => $petugas2,
            'nama_barang' => $nama_barang,
            'kode_barang' => $kode_barang,
            'deskripsi' => $deskripsi,
        );
        $this->db->query('TRUNCATE tb_form_mt');
        $this->M_maintenance->add_data($data, 'tb_form_mt');
        redirect('dashboard/list');
    }

    public function edit_data($id)
    {
        $where = array('id_mt' => $id);
        $data['listpegawai'] = $this->M_pegawai->get_nama_pegawai();
        $data['listbarang'] = $this->M_barang->get_nama_barang();
        $data['dataform'] = $this->M_maintenance->edit_data($where, 'tb_form_mt')->result();

        $this->load->view('form_edit_data', $data);
        // $this->load->view('template/footer');
    }

    public function deletelist($id)
    {
        $where = array('id_mt' => $id);
        $this->M_maintenance->delete_data($where, 'tb_form_mt');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         Data berhasil dihapus.  
        </div>');
        redirect('dashboard/list');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_barang->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'         => $row->nama_barang,
                        'description'   => $row->kode_barang,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
