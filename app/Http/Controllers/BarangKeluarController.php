<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                                    ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                    ->select('tbl_barang_keluar.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                    ->get();


        $data = array(
            'title'                 => 'Data Barang Keluar',
            'data_barang_keluar'    => $barangkeluar,
        );

       

        return view('gudang.barangkeluar.list', $data);
    }

    public function create()
    {
        //kode otomatis
        $brg_keluar = BarangKeluar::select(DB::raw('RIGHT(tbl_barang_keluar.no_transaksi_keluar,3) as no_transaksi_keluar', FALSE))
                               ->orderBy('no_transaksi_keluar', 'DESC')
                               ->limit(1)
                               ->get();

        if($brg_keluar->count() <> 0){
            $data = $brg_keluar->first();
            $kode = intval($data->no_transaksi_keluar) +1;
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

        $data_outlets = Outlet::get();


        $data = array(
            'title'                 => 'Create Data Barang Keluar',
            'no_transaksi_keluar'   => $kodetampil,
            'data_barang'           => $barang,
            'data_outlets'          => $data_outlets

        );

        return view('gudang.barangkeluar.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang  = $request->id_barang;
        $qty_keluar = $request->qty_keluar;

        $barang = Barang::find($id_barang);
        $stok = $barang->stok;

        if($qty_keluar > $stok)
        {
            return redirect()->back()->with('error', 'Qty Keluar Melebihi stok');
        }
        else
        {
            BarangKeluar::create([
                'no_transaksi_keluar' => $request->no_transaksi_keluar,
                'id_barang'           => $id_barang,
                'tgl_keluar'          => $request->tgl_keluar,
                'qty_keluar'          => $qty_keluar,
                'total_keluar'        => $request->total_keluar,
            ]);

            $barang->stok -= $request->qty_keluar;
            $barang->save();

            return redirect('/barangkeluar')->with('success', 'Data Berhasil Disimpan');
        }
    }

}
