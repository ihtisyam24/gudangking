<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Juanda;

class LpjuandaController extends Controller
{
   
    public function lapbarangkeluarjuanda()
    {
        $juanda = Juanda::join('tbl_barang', 'tbl_barang.id', '=', 'juanda.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('juanda.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->get();


        $data = array(
            'title'                     => 'Laporan Barang Keluar Juanda',
            'data_barang_keluar_juanda' =>  $juanda,
        );
        
        return view('admin.laporan.lpjuanda.list', $data);
    }

    public function cetakkeluarjuanda(Request $request)
    {
        $tgl_mulai   = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        $juanda = Juanda::join('tbl_barang', 'tbl_barang.id', '=', 'juanda.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('juanda.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->whereBetween('juanda.tgl_keluar_juanda', [$tgl_mulai, $tgl_selesai])
                                  ->get();

        $total_barang_keluar = Juanda::whereBetween('tgl_keluar_juanda', [$tgl_mulai, $tgl_selesai])->sum('total_keluar_juanda');
        
        $data = array(
            'title'                            => 'Cetak Laporan',
            'data_barang_keluar_juanda'        => $juanda,
            'total_barang_keluar'              => $total_barang_keluar,
        );

        return view('admin.laporan.lpjuanda.cetak',$data);
    } 
}
