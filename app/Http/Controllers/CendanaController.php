<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Cendana;
// use App\Models\Barang;
// use Illuminate\Support\Facades\DB;

// class CendanaController extends Controller
// {
//     public function index()
//     {
//         $cendana = Cendana::join('tbl_barang', 'tbl_barang.id', '=', 'cendana.id_barang')
//                                     ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                     ->select('cendana.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                     ->get();


//         $data = array(
//             'title'                  => 'Data Barang Keluar Cendana',
//             'data_cendana'           => $cendana,
//         );

       

//         return view('gudang.cendana.list', $data);
//     }

//     public function create()
//     {
//         //kode otomatis
//         $brg_cendana = Cendana::select(DB::raw('RIGHT(cendana.no_transaksi_keluar_cendana,3) as no_transaksi_keluar_cendana', FALSE))
//                                ->orderBy('no_transaksi_keluar_cendana', 'DESC')
//                                ->limit(1)
//                                ->get();

//         if($brg_cendana->count() <> 0){
//             $data = $brg_cendana->first();
//             $kode = intval($data->no_transaksi_keluar_cendana) +1;
//         }
//         else{
//             $kode = 1;
//         }
        
//         $date = date('dmY');
//         $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
//         $kodetampil = "BK-".$date."-".$batas;

//         //Tampil Barang
//         $barang = Barang::join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                         ->select('tbl_barang.*', 'kategoris.nama_kategori')
//                         ->get();



//         $data = array(
//             'title'                        => 'Create Data Barang Keluar Cendana',
//             'no_transaksi_keluar_cendana'   => $kodetampil,
//             'data_barang'                  => $barang,

//         );

//         return view('gudang.cendana.add', $data);
//     }

//     public function store(Request $request)
//     {
//         $id_barang  = $request->id_barang;
//         $qty_keluar_cendana = $request->qty_keluar_cendana;

//         $barang = Barang::find($id_barang);
//         $stok = $barang->stok;

//         if($qty_keluar_cendana > $stok)
//         {
//             return redirect()->back()->with('error', 'Qty Keluar Melebihi stok');
//         }
//         else
//         {
//             Cendana::create([
//                 'no_transaksi_keluar_cendana' => $request->no_transaksi_keluar_cendana,
//                 'id_barang'                  => $id_barang,
//                 'tgl_keluar_cendana'          => $request->tgl_keluar_cendana,
//                 'qty_keluar_cendana'          => $qty_keluar_cendana,
//                 'total_keluar_cendana'        => $request->total_keluar_cendana,
//             ]);

//             $barang->stok -= $request->qty_keluar_cendana;
//             $barang->save();

//             return redirect('/cendana')->with('success', 'Data Berhasil Disimpan');
//         }
//     }
// }
