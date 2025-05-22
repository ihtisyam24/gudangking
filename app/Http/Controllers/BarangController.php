<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
class BarangController extends Controller
{
    public function index()
    {   
        $barang = Barang::join('kategoris', 'kategoris.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang.*', 'kategoris.nama_kategori')
                        ->get();

        $data = array(
            'title'          => 'Data Barang',
            'data_kategori'  => Kategori::all(),
            'data_barang'    => $barang,
        );

        return view ('admin.barang.list', $data);
    }

    public function store(Request $request)
    {
        Barang::create([
            'id_kategori'   => $request->id_kategori,
            'nama_barang'   => $request->nama_barang,
            'stok'          => $request->stok,
            'harga'         => $request->harga,
            
        ]);

        return redirect('/barang')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->update([
            'id_kategori'   => $request->id_kategori,
            'nama_barang'   => $request->nama_barang,
            'stok'          => $request->stok,
            'harga'         => $request->harga,
        ]);
        
        return redirect('/barang')->with('succes', 'Data Berhasil Diubah');
    }

    public function destroy( $id)
    {
        $barang = Barang::find($id);

        $barang->delete();
        
        return redirect('/barang')->with('succes', 'Data Berhasil Dihapus');
    }  
}
