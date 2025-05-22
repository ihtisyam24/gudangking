<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MYamin;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class MyaminController extends Controller
{
    public function index()
    {
        $myamin = Myamin::join('tbl_barang', 'tbl_barang.id', '=', 'myamin.id_barang')
                                    ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                    ->select('myamin.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                    ->get();


        $data = array(
            'title'                 => 'Data Barang Keluar Myamin',
            'data_myamin'           => $myamin,
        );

       

        return view('gudang.myamin.list', $data);
    }

    public function create()
    {
        //kode otomatis
        $brg_myamin = Myamin::select(DB::raw('RIGHT(myamin.no_transaksi_keluar_myamin,3) as no_transaksi_keluar_myamin', FALSE))
                               ->orderBy('no_transaksi_keluar_myamin', 'DESC')
                               ->limit(1)
                               ->get();

        if($brg_myamin->count() <> 0){
            $data = $brg_myamin->first();
            $kode = intval($data->no_transaksi_keluar_myamin) +1;
        }
        else{
            $kode = 1;
        }
        
        $date = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "BK-".$date."-".$batas;

        //Tampil Barang
        $barang = Barang::join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang.*', 'kategoris.nama_kategori')
                        ->get();



        $data = array(
            'title'                        => 'Create Data Barang Keluar Myamin',
            'no_transaksi_keluar_myamin'   => $kodetampil,
            'data_barang'                  => $barang,

        );

        return view('gudang.myamin.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang  = $request->id_barang;
        $qty_keluar_myamin = $request->qty_keluar_myamin;

        $barang = Barang::find($id_barang);
        $stok = $barang->stok;

        if($qty_keluar_myamin > $stok)
        {
            return redirect()->back()->with('error', 'Qty Keluar Melebihi stok');
        }
        else
        {
            Myamin::create([
                'no_transaksi_keluar_myamin' => $request->no_transaksi_keluar_myamin,
                'id_barang'                  => $id_barang,
                'tgl_keluar_myamin'          => $request->tgl_keluar_myamin,
                'qty_keluar_myamin'          => $qty_keluar_myamin,
                'total_keluar_myamin'        => $request->total_keluar_myamin,
            ]);

            $barang->stok -= $request->qty_keluar_myamin;
            $barang->save();

            return redirect('/myamin')->with('success', 'Data Berhasil Disimpan');
        }
    }
}
