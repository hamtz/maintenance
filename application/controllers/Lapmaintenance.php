<?php
class Lapmaintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_mt');
    }

    function index()
    {
    }

    public function Print()
    {
        //$data = array('id_mt', 'no_mt', 'tgl_mt', 'petugas1', 'petugas2', 'nama_barang', 'kode_barang', 'deskripsi');

        $datapegawai = $this->db->get('tb_form_mt')->result();
        foreach ($datapegawai as $row) {

            $pdf = new FPDF('P', 'mm', 'A4');
            $pdf->SetMargins(25, 5);
            //$pdf->SetLeftMargin(25);
            //$pdf->SetRightMargin(25);
            // membuat halaman baru
            $pdf->AddPage();

            $pdf->SetLeftMargin(25);
            $pdf->SetRightMargin(25);
            $cellWidth = 95;
            $cellHeight = 7;

            setlocale(LC_ALL, 'id-ID', 'id_ID');
            $tgl_srt = $row->tgl_mt;
            // $tgl_kmbl = $row->tgl_kembali7;

            $tgl_perawatan = strftime("%A, %d %B %Y", strtotime($tgl_srt));
            //  $tgl_kembali = strftime("%A, %d %B %Y", strtotime($tgl_kmbl));


            // setting jenis font yang akan digunakan
            $pdf->SetFont('Times', '', 16);

            $pdf->Cell(100, 5, ' ', 0, 1);
            $pdf->Cell(100, 5, ' ', 0, 1);
            $pdf->Cell(100, 5, ' ', 0, 1);
            $pdf->Image('assets/dist/img/logolapan.png', 13, 20, 30);
            $pdf->Cell(20, 5, ' ', 0, 0);
            $pdf->Cell(1, 5, 'LEMBAGA PENERBANGAN DAN ANTARIKSA NASIONAL', 0, 0);

            $pdf->SetFont('Times', '', 12);

            $pdf->Cell(10, 3, '', 0, 1); //spasi
            $pdf->Cell(10, 5, '', 0, 1); //spasi
            $pdf->Cell(45, 5, ' ', 0, 0);
            $pdf->Cell(1, 5, 'Jl. Jend. A. Yani km. 6, Parepare, Sulawesi Selatan 91112', 0, 0);

            $pdf->Cell(10, 5, '', 0, 1); //spasi
            $pdf->Cell(38, 5, ' ', 0, 0);
            $pdf->Cell(1, 5, 'Telepon (0421) 22288 (Hunting), Faksimil (0421) 3311663, 22270', 0, 0);

            $pdf->Cell(10, 5, '', 0, 1); //spasi
            $pdf->Cell(37, 5, ' ', 0, 0);
            $pdf->Cell(1, 5, 'e-mail : lapan.parepare@lapan.go.id, Laman : www.rsgs.lapan.go.id', 0, 0);

            $pdf->SetLeftMargin(13);
            $pdf->Cell(10, 4, '', 0, 1); //spasi
            $pdf->Cell(182, 5, ' ', 'B', 0);
            $pdf->Cell(10, 2, '', 0, 1); //spasi
            $pdf->Cell(182, 4, ' ', 'B', 0);

            $pdf->SetLeftMargin(25);
            $pdf->SetFont('Times', 'B', 15);
            $pdf->Cell(100, 5, '', 0, 0);
            $pdf->Cell(10, 5, '', 0, 1); //spasi
            $pdf->Cell(10, 5, '', 0, 1); //spasi
            $pdf->Cell(170, 7, 'LAPORAN MAINTENANCE STASIUN BUMI', 0, 0, 'C');
            $pdf->Cell(10, 4, '', 0, 1); //spasi
            // Set Font
            $pdf->SetFont('Times', '', 13);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'No', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->MultiCell(95, ($cellHeight), $row->no_mt, 0, 'L');

            //tinggi cell maksud perjalanan
            $cellWidth = 95;
            $cellHeight = 7;
            if ($pdf->GetStringWidth($row->petugas2) < $cellWidth) {
                $line = 1;
            } else {
                $textLength = strlen($row->petugas2);    //total panjang teks
                $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
                $startChar = 0;        //posisi awal karakter untuk setiap baris
                $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                $textArray = array();    //untuk menampung data untuk setiap baris
                $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)

                while ($startChar < $textLength) { //perulangan sampai akhir teks
                    //perulangan sampai karakter maksimum tercapai
                    while (
                        $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                        ($startChar + $maxChar) < $textLength
                    ) {
                        $maxChar++;
                        $tmpString = substr($row->petugas2, $startChar, $maxChar);
                    }
                    //pindahkan ke baris berikutnya
                    $startChar = $startChar + $maxChar;
                    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                    array_push($textArray, $tmpString);
                    //reset variabel penampung
                    $maxChar = 0;
                    $tmpString = '';
                }
                //dapatkan jumlah baris
                $line = count($textArray);
            }

            $pdf->Cell(10, 0, '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'Tanggal', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->Cell(95, ($cellHeight), $tgl_perawatan, 0, 0);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'Nama Petugas', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->Cell(5, ($cellHeight), '1.', 0, 0);
            $pdf->Cell(95, ($cellHeight), $row->petugas1, 0, 0);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), '', 0, 0);
            $pdf->Cell(3, ($cellHeight), '', 0, 0);
            $pdf->Cell(5, ($cellHeight), '2.', 0, 0);
            $pdf->Cell(95, ($cellHeight), $row->petugas2, 0, 0);

            $pdf->Cell(10, (3), '', 0, 1); //spasi
            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'Nama Barang', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->Cell(95, ($cellHeight), $row->nama_barang, 0, 0);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'Kode Barang', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->Cell(95, ($cellHeight), $row->kode_barang, 0, 0);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(40, ($cellHeight), 'Deskripsi Kegiatan', 0, 0);
            $pdf->Cell(3, ($cellHeight), ':', 0, 0);
            $pdf->Cell(95, ($cellHeight), '', 0, 0);

            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(10, ($cellHeight), '', 0, 1); //spasi
            $pdf->Cell(15, ($cellHeight), '', 0, 0);
            $pdf->MultiCell(140, ($cellHeight), $row->deskripsi, 0, 'J');
        }

        $pdf->Output('D', 'Logbook Perawatan Alat.pdf');

        $this->M_maintenance->after_print_update();
        $this->M_maintenance->after_print();
        //   redirect('dashboard/index');
    }
}
