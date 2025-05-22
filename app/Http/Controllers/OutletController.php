<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'outlet',
            'data_outlet'  => Outlet::all(),
        );

        

        return view ('admin.outlet.list', $data);
    }

    public function store(Request $request)
    {
        Outlet::create([
            'nama'      => $request->nama,
            'alamat'     => $request->alamat,
        ]);

        return redirect('/outlet')->with('succes', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $outlet = Outlet::find($id);

        $outlet->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        
        return redirect('/outlet')->with('succes', 'Data Berhasil Diubah');
    }

    public function destroy( $id)
    {
        $outlet = Outlet::find($id);

        $outlet->delete();
        
        return redirect('/outlet')->with('succes', 'Data Berhasil Dihapus');
    }
}
