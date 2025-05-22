<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Msaid;
// use App\Models\Barang;
// use Illuminate\Support\Facades\DB;

// class MsaidController extends Controller
// {
//     public function index()
//     {
//         $msaid = Msaid::join('tbl_barang', 'tbl_barang.id', '=', 'msaid.id_barang')
//                                     ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
//                                     ->select('msaid.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
//                                     ->get();


//         $data = array(
//             'title'                  => 'Data Barang Keluar Msaid',
//             'data_msaid'             => $msaid,
//         );

       

//         return view('gudang.msaid.list', $data);
//     }

//     public function create()
//     {
//         //kode otomatis
//         $brg_msaid = Msaid::select(DB::raw('RIGHT(msaid.no_transaksi_keluar_msaid,3) as no_transaksi_keluar_msaid', FALSE))
//                                ->orderBy('no_transaksi_keluar_msaid', 'DESC')
//                                ->limit(1)
//                                ->get();

//         if($brg_msaid->count() <> 0){
//             $data = $brg_msaid->first();
//             $kode = intval($data->no_transaksi_keluar_msaid) +1;
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
//             'title'                        => 'Create Data Barang Keluar Msaid',
//             'no_transaksi_keluar_msaid'     => $kodetampil,
//             'data_barang'                  => $barang,

//         );

//         return view('gudang.msaid.add', $data);
//     }

//     public function store(Request $request)
//     {
//         $id_barang  = $request->id_barang;
//         $qty_keluar_msaid = $request->qty_keluar_msaid;

//         $barang = Barang::find($id_barang);
//         $stok = $barang->stok;

//         if($qty_keluar_msaid > $stok)
//         {
//             return redirect()->back()->with('error', 'Qty Keluar Melebihi stok');
//         }
//         else
//         {
//             Msaid::create([
//                 'no_transaksi_keluar_msaid' => $request->no_transaksi_keluar_msaid,
//                 'id_barang'                => $id_barang,
//                 'tgl_keluar_msaid'          => $request->tgl_keluar_msaid,
//                 'qty_keluar_msaid'          => $qty_keluar_msaid,
//                 'total_keluar_msaid'        => $request->total_keluar_msaid,
//             ]);

//             $barang->stok -= $request->qty_keluar_msaid;
//             $barang->save();

//             return redirect('/msaid')->with('success', 'Data Berhasil Disimpan');
//         }
//     } 
// }
