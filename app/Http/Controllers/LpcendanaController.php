<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\BarangMasuk;
// use App\Models\Cendana;

// class LpcendanaController extends Controller
// {

//     public function lapbarangkeluarcendana()
//     {
//         $cendana = Cendana::join('tbl_barang', 'tbl_barang.id', '=', 'cendana.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('cendana.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->get();


//         $data = array(
//             'title'                      => 'Laporan Barang Keluar Cendana',
//             'data_barang_keluar_cendana' =>  $cendana,
//         );
        
//         return view('admin.laporan.lpcendana.list', $data);
//     }

//     public function cetakkeluarcendana(Request $request)
//     {
//         $tgl_mulai   = $request->tgl_mulai;
//         $tgl_selesai = $request->tgl_selesai;

//         $cendana = Cendana::join('tbl_barang', 'tbl_barang.id', '=', 'cendana.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('cendana.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->whereBetween('cendana.tgl_keluar_cendana', [$tgl_mulai, $tgl_selesai])
//                                   ->get();

//         $total_barang_keluar = Cendana::whereBetween('tgl_keluar_cendana', [$tgl_mulai, $tgl_selesai])->sum('total_keluar_cendana');
        
//         $data = array(
//             'title'                             => 'Cetak Laporan',
//             'data_barang_keluar_cendana'        => $cendana,
//             'total_barang_keluar'               => $total_barang_keluar,
//         );

//         return view('admin.laporan.lpcendana.cetak',$data);
//     } 
// }
