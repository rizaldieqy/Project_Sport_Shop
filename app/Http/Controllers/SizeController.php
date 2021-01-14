<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Product;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_size = Size::all();
        return view('admin.size.index', ['daftar_size' => $daftar_size]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar_size = Size::all();
        return view('admin.size.create', ['daftar_size' => $daftar_size]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_size' => 'required',
        ]);
        Size::create($validateData);
        return redirect("/admin/sizeadmin");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar_size = Size::all();
        return view('admin.size.edit', ['daftar_size' => $daftar_size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $daftar_size)
    {
        $validateData = $request->validate([
            'jenis_size' => 'required',
        ]);
        $daftar_size->update($validateData);
        $daftar_size->save();
        return redirect("/admin/sizeadmin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftar_size = Size::findorFail($id);
        $daftar_size->delete();
        // session()->flash('pesan',"Data {$item['nama_produk']} Berhasil Di Hapus!");
        return redirect()->route('sizeadmin.index');
    }
}
