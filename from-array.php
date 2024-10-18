<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Ods;

// Buat objek Spreadsheet
$spreadsheet = new Spreadsheet();

// Dapatkan lembar kerja aktif
$activeworksheet = $spreadsheet->getActiveSheet();

// Data penduduk
$dataPenduduk = [
    ['Nama', 'Usia', 'Alamat', 'Pekerjaan'],
    ['Alice', 30, 'Jl. Merdeka No.1', 'Programmer'],
    ['Bob', 25, 'Jl. Merdeka No.2', 'Desainer'],
    ['Charlie', 28, 'Jl. Merdeka No.3', 'Manajer'],
    ['Devi', 19, 'JL. Perintis', 'Web Developer'],
    ['Marannu', 29, 'JL. DG.Yusuf', 'Guru']
];

// Menambahkan data ke lembar kerja
$activeworksheet->fromArray($dataPenduduk, NULL, 'A1');

// Simpan ke file CSV
$writer = new Csv($spreadsheet);
$writer->save('data_penduduk.csv');

// Simpan ke file XLSX
$writerXlsx = new Xlsx($spreadsheet);
$writerXlsx->save('data_penduduk.xlsx');

// Simpan ke file ODS
$writerOds = new Ods($spreadsheet);
$writerOds->save('data_penduduk.ods');

// Fungsi untuk mencari data penduduk berdasarkan nama
function cariDataPenduduk($dataPenduduk, $nama) {
    foreach ($dataPenduduk as $penduduk) {
        if (strtolower($penduduk[0]) === strtolower($nama)) {
            return $penduduk;
        }
    }
    return null; // Jika tidak ditemukan
}

// Contoh penggunaan fitur pencarian
$namaDicari = 'Aulia'; 
$hasilPencarian = cariDataPenduduk($dataPenduduk, $namaDicari);

if ($hasilPencarian) {
    echo "Data ditemukan: " . implode(", ", $hasilPencarian);
} else {
    echo "Data tidak ditemukan.";
}
?>
