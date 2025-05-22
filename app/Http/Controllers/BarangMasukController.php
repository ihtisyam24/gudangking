<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuk = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                                  ->join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                                  ->select('tbl_barang_masuk.*', 'kategoris.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                                  ->get();

        $data = array(
            'title'             => 'Data Barang Masuk',
            'data_barang_masuk' => $barangmasuk,
        );

        return view('gudang.barangmasuk.list', $data);
    }

    public function create()
    {
        // Kode Otomatis
        $brg_masuk = BarangMasuk::select(DB::raw('RIGHT(tbl_barang_masuk.no_transaksi_masuk,3) as no_transaksi_masuk', FALSE))
                               ->orderBy('no_transaksi_masuk', 'DESC')
                               ->limit(1)
                               ->get();

        if($brg_masuk->count() <> 0){
            $data = $brg_masuk->first();
            $kode = intval($data->no_transaksi_masuk) + 1;
        }
        else{
            $kode = 1;
        }

        $date = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "NT-".$date."-".$batas;

        // Tampil Barang
        $barang = Barang::join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang.*', 'kategoris.nama_kategori')
                        ->get();

        $data = array(
            'title'              => 'Crete Data Barang Masuk',
            'no_transaksi_masuk' => $kodetampil,
            'data_barang'        => $barang,
        );

        return view('gudang.barangmasuk.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang = $request->id_barang;

        BarangMasuk::create([
            'no_transaksi_masuk' => $request->no_transaksi_masuk,
            'id_barang'          => $id_barang,
            'tgl_masuk'          => $request->tgl_masuk,
            'qty_masuk'          => $request->qty_masuk,
            'total_masuk'        => $request->total_masuk,
        ]);

        $barang = Barang::find($id_barang);

        $barang->stok += $request->qty_masuk;
        $barang->save();

        return redirect('/barangmasuk')->with('success', 'Data Berhasil Disimpan');
    }
}
