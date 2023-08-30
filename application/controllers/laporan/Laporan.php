<?php
defined('BASEPATH') or exit('No direct script access allowed');
class laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function laporanGaji($bulan, $tahun, $id_pegawai)
    {
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->SetTitle('Data Gaji');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'LAPORAN GAJI PEGAWAI', 0, 1, 'C');


        $potonganAlpha = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Alpha'")->result();
        $potonganIzin = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Izin'")->result();

        foreach ($potonganAlpha as $potonganGaji) {
            $alpha = $potonganGaji->nominal;
        }
        foreach ($potonganIzin as $potonganGaji) {
            $izin = $potonganGaji->nominal;
        }

        $pegawai = $this->db->query("SELECT * FROM data_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan
        INNER JOIN data_kehadiran ON data_pegawai.id_pegawai=data_kehadiran.id_pegawai
        WHERE data_kehadiran.id_pegawai=$id_pegawai AND data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun ORDER BY data_jabatan.nama_jabatan ASC
        ")->result();

        //memberikan space ke bawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        foreach ($pegawai as $tes) {
            //UNTUK TH TABLE

            switch ($bulan) {
                case '01':
                    $bulan = 'Januari';
                    break;
                case '02':
                    $bulan = 'Februari';
                    break;
                case '03':
                    $bulan = 'Maret';
                    break;
                case '04':
                    $bulan = 'April';
                    break;
                case '05':
                    $bulan = 'Mei';
                    break;
                case '06':
                    $bulan = 'Juni';
                    break;
                case '07':
                    $bulan = 'Juli';
                    break;
                case '08':
                    $bulan = 'Agustus';
                    break;
                case '09':
                    $bulan = 'September';
                    break;
                case '10':
                    $bulan = 'Oktober';
                    break;
                case '11':
                    $bulan = 'November';
                    break;
                case '12':
                    $bulan = 'Desember';
                    break;
                default:
                    $bulan = 'Terjadi Kesalahan';
                    break;
            }

            $pdf->SetFont('Arial', 'B', 10);

            $pdf->Cell(28, 6, 'Nama Pegawai', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nama_pegawai, 0, 1);

            $pdf->Cell(28, 6, 'NIK', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nik, 0, 1);

            $pdf->Cell(28, 6, 'Jabatan', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nama_jabatan, 0, 1);

            $pdf->Cell(28, 6, 'Bulan', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $bulan, 0, 1);

            $pdf->Cell(28, 6, 'Tahun', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tahun, 0, 1);
            $pdf->Cell(10, 5, '', 0, 1);

            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(15, 10, 'No', 1, 0, 'C');
            $pdf->Cell(120, 10, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(80, 10, 'Jumlah', 1, 1, 'C');
            $pdf->SetFont('Arial', '', 10);
        }

        $no = 0;
        foreach ($pegawai as $lap) {
            $pot_alpha = $lap->alpha * $alpha;
            $pot_izin = $lap->izin * $izin;

            $gajiKotor     = $lap->gaji_pokok + $lap->tunjangan  + $lap->bonus;
            $totalPotongan = $pot_alpha + $pot_izin;
            $gajiBersih    = $gajiKotor - $totalPotongan;

            $pdf->Cell(15, 6, '1', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Gaji Pokok', 1, 0);
            $pdf->Cell(80, 6, 'Rp. ' . number_format($lap->gaji_pokok, 0, ',', '.'), 1, 1);

            $pdf->Cell(15, 6, '2', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Tunjangan ', 1, 0);
            $pdf->Cell(80, 6, 'Rp. ' . number_format($lap->tunjangan, 0, ',', '.'), 1, 1);

            $pdf->Cell(15, 6, '3', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Bonus ', 1, 0);
            $pdf->Cell(80, 6, 'Rp. ' . number_format($lap->bonus, 0, ',', '.'), 1, 1);

            $pdf->Cell(15, 6, '4', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Potongan ', 1, 0);
            $pdf->Cell(80, 6, 'Rp. ' . number_format($totalPotongan, 0, ',', '.'), 1, 1);

            $pdf->Cell(135, 6, 'Total Gaji ', 1, 0, 'R');
            $pdf->Cell(80, 6, 'Rp. ' . number_format($gajiBersih, 0, ',', '.'), 1, 1,);
        }
        $pdf->Output();
    }

    function laporanAbsensi($bulan, $tahun, $id_pegawai)
    {
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->SetTitle('Data Gaji');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'LAPORAN ABSENSI PEGAWAI', 0, 1, 'C');

        $absensi = $this->db->query("SELECT*FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai=data_pegawai.id_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE data_kehadiran.id_pegawai=$id_pegawai AND data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun ORDER BY data_kehadiran.tahun, data_kehadiran.bulan ASC")->result();

        //memberikan space ke bawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        foreach ($absensi as $tes) {
            //UNTUK TH TABLE

            switch ($bulan) {
                case '01':
                    $bulan = 'Januari';
                    break;
                case '02':
                    $bulan = 'Februari';
                    break;
                case '03':
                    $bulan = 'Maret';
                    break;
                case '04':
                    $bulan = 'April';
                    break;
                case '05':
                    $bulan = 'Mei';
                    break;
                case '06':
                    $bulan = 'Juni';
                    break;
                case '07':
                    $bulan = 'Juli';
                    break;
                case '08':
                    $bulan = 'Agustus';
                    break;
                case '09':
                    $bulan = 'September';
                    break;
                case '10':
                    $bulan = 'Oktober';
                    break;
                case '11':
                    $bulan = 'November';
                    break;
                case '12':
                    $bulan = 'Desember';
                    break;
                default:
                    $bulan = 'Terjadi Kesalahan';
                    break;
            }

            $pdf->SetFont('Arial', 'B', 10);

            $pdf->Cell(28, 6, 'Nama Pegawai', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nama_pegawai, 0, 1);

            $pdf->Cell(28, 6, 'NIK', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nik, 0, 1);

            $pdf->Cell(28, 6, 'Jabatan', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tes->nama_jabatan, 0, 1);

            $pdf->Cell(28, 6, 'Bulan', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $bulan, 0, 1);

            $pdf->Cell(28, 6, 'Tahun', 0, 0);
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(10, 6, $tahun, 0, 1);
            $pdf->Cell(10, 5, '', 0, 1);

            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(15, 10, 'No', 1, 0, 'C');
            $pdf->Cell(120, 10, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(80, 10, 'Jumlah', 1, 1, 'C');
            $pdf->SetFont('Arial', '', 10);
        }

        $no = 0;
        foreach ($absensi as $lap) {

            $pdf->Cell(15, 6, '1', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Hadir', 1, 0);
            $pdf->Cell(80, 6, $lap->hadir, 1, 1);

            $pdf->Cell(15, 6, '2', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Izin ', 1, 0);
            $pdf->Cell(80, 6, $lap->izin, 1, 1);

            $pdf->Cell(15, 6, '3', 1, 0, 'C');
            $pdf->Cell(120, 6, 'Alpha ', 1, 0);
            $pdf->Cell(80, 6, $lap->alpha, 1, 1);
        }
        $pdf->Output();
    }
}
