<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\BarangMasuk;
// use App\Models\Msaid;

// class LpmsaidController extends Controller
// {
//     public function lapbarangkeluarmsaid()
//     {
//         $msaid = Msaid::join('tbl_barang', 'tbl_barang.id', '=', 'msaid.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('msaid.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->get();


//         $data = array(
//             'title'                     => 'Laporan Barang Keluar Msaid',
//             'data_barang_keluar_msaid'  =>  $msaid,
//         );
        
//         return view('admin.laporan.lpmsaid.list', $data);
//     }

//     public function cetakkeluarmsaid(Request $request)
//     {
//         $tgl_mulai   = $request->tgl_mulai;
//         $tgl_selesai = $request->tgl_selesai;

//         $msaid = Msaid::join('tbl_barang', 'tbl_barang.id', '=', 'msaid.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('msaid.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->whereBetween('msaid.tgl_keluar_msaid', [$tgl_mulai, $tgl_selesai])
//                                   ->get();

//         $total_barang_keluar = Msaid::whereBetween('tgl_keluar_msaid', [$tgl_mulai, $tgl_selesai])->sum('total_keluar_msaid');
        
//         $data = array(
//             'title'                            => 'Cetak Laporan',
//             'data_barang_keluar_msaid'         => $msaid,
//             'total_barang_keluar'              => $total_barang_keluar,
//         );

//         return view('admin.laporan.lpmsaid.cetak',$data);
//     }
// }
