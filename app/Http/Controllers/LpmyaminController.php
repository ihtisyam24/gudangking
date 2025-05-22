<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\BarangMasuk;
// use App\Models\MYamin;

// class LpmyaminController extends Controller
// {
//     public function lapbarangkeluarmyamin()
//     {
//         $myamin = Myamin::join('tbl_barang', 'tbl_barang.id', '=', 'myamin.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('myamin.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->get();


//         $data = array(
//             'title'                     => 'Laporan Barang Keluar Myamin',
//             'data_barang_keluar_myamin' =>  $myamin,
//         );
        
//         return view('admin.laporan.lpmyamin.list', $data);
//     }

//     public function cetakkeluarmyamin(Request $request)
//     {
//         $tgl_mulai   = $request->tgl_mulai;
//         $tgl_selesai = $request->tgl_selesai;

//         $myamin = Myamin::join('tbl_barang', 'tbl_barang.id', '=', 'myamin.id_barang')
//                                   ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                   ->select('myamin.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                   ->whereBetween('myamin.tgl_keluar_myamin', [$tgl_mulai, $tgl_selesai])
//                                   ->get();

//         $total_barang_keluar = Myamin::whereBetween('tgl_keluar_myamin', [$tgl_mulai, $tgl_selesai])->sum('total_keluar_myamin');
        
//         $data = array(
//             'title'                            => 'Cetak Laporan',
//             'data_barang_keluar_myamin'        => $myamin,
//             'total_barang_keluar'              => $total_barang_keluar,
//         );

//         return view('admin.laporan.lpmyamin.cetak',$data);
//     } 
// }
