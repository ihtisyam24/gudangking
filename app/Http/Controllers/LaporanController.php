<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class LaporanController extends Controller
{
    public function lapbarangmasuk()
    {
        $barangmasuk = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('tbl_barang_masuk.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->get();

        $data = array(
            'title'             => 'Laporan Barang Masuk',
            'data_barang_masuk' => $barangmasuk,
        );
        
        return view('admin.laporan.barangmasuk.list', $data);
    }

    public function lapbarangkeluar()
    {
        $barangkeluar = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('tbl_barang_keluar.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->get();


        $data = array(
            'title'              => 'Laporan Barang Keluar',
            'data_barang_keluar' => $barangkeluar,
        );
        
        return view('admin.laporan.barangkeluar.list', $data);
    }

    public function cetakmasuk(Request $request)
    {
        $tgl_mulai  = $request->tgl_mulai;
        $tgl_selesai  = $request->tgl_selesai;

        $barangmasuk = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('tbl_barang_masuk.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->whereBetween('tbl_barang_masuk.tgl_masuk', [$tgl_mulai,$tgl_selesai])
                                  ->get();

        $total_barang_masuk = BarangMasuk::whereBetween('tgl_masuk', [$tgl_mulai, $tgl_selesai])->sum('total_masuk');

        $data = array(
            'title'             => 'Cetak Laporan',
            'data_barang_masuk' => $barangmasuk,
            'total_barang_masuk'=> $total_barang_masuk,
        );

        return view('admin.laporan.barangmasuk.cetak', $data);
    }

    public function cetakkeluar(Request $request)
    {
        $tgl_mulai   = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        $barangkeluar = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('tbl_barang_keluar.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->whereBetween('tbl_barang_keluar.tgl_keluar', [$tgl_mulai, $tgl_selesai])
                                  ->get();

        $total_barang_keluar = BarangKeluar::whereBetween('tgl_keluar', [$tgl_mulai, $tgl_selesai])->sum('total_keluar');
        
        $data = array(
            'title'             => 'Cetak Laporan',
            'data_barang_keluar' => $barangkeluar,
            'total_barang_keluar'=> $total_barang_keluar,
        );

        return view('admin.laporan.barangkeluar.cetak',$data);
    } 
}
