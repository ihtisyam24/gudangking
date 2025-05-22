<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juanda;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class JuandaController extends Controller
{
    public function index()
    {
        $juanda = Juanda::join('tbl_barang', 'tbl_barang.id', '=', 'juanda.id_barang')
                                    ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                    ->select('juanda.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                    ->get();


        $data = array(
            'title'                 => 'Data Barang Keluar Juanda',
            'data_juanda'           => $juanda,
        );

       

        return view('gudang.juanda.list', $data);
    }

    public function create()
    {
        //kode otomatis
        $brg_juanda = Juanda::select(DB::raw('RIGHT(juanda.no_transaksi_keluar_juanda,3) as no_transaksi_keluar_juanda', FALSE))
                               ->orderBy('no_transaksi_keluar_juanda', 'DESC')
                               ->limit(1)
                               ->get();

        if($brg_juanda->count() <> 0){
            $data = $brg_juanda->first();
            $kode = intval($data->no_transaksi_keluar_juanda) +1;
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
            'title'                        => 'Create Data Barang Keluar Juanda',
            'no_transaksi_keluar_juanda'   => $kodetampil,
            'data_barang'                  => $barang,

        );

        return view('gudang.juanda.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang  = $request->id_barang;
        $qty_keluar_juanda = $request->qty_keluar_juanda;

        $barang = Barang::find($id_barang);
        $stok = $barang->stok;

        if($qty_keluar_juanda > $stok)
        {
            return redirect()->back()->with('error', 'Qty Keluar Melebihi stok');
        }
        else
        {
            Juanda::create([
                'no_transaksi_keluar_juanda' => $request->no_transaksi_keluar_juanda,
                'id_barang'                  => $id_barang,
                'tgl_keluar_juanda'          => $request->tgl_keluar_juanda,
                'qty_keluar_juanda'          => $qty_keluar_juanda,
                'total_keluar_juanda'        => $request->total_keluar_juanda,
            ]);

            $barang->stok -= $request->qty_keluar_juanda;
            $barang->save();

            return redirect('/juanda')->with('success', 'Data Berhasil Disimpan');
        }
    }
}
