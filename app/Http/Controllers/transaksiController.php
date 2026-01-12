<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('barang')->latest()->get();
        // dd($transaksi);
        return view('Transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('Transaksi.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'diskon' => 'required|numeric|min:0|max:100',
        ]);
        $barang = Barang::find($request->barang_id);
        // dd($barang);
        $harga = $barang->harga;
        $diskon = $request->diskon;
        $total_harga = $harga - ($harga * ($diskon / 100));

        Transaksi::create([
             'barang_id' => $barang->id,
            'diskon' => $diskon,
            'harga' => $harga,
            'total_harga' => $total_harga,
        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Transaksi::findOrFail($id);
        $barangs = Barang::all();
        return view('transaksi.edit', compact('edit', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Transaksi::findOrFail($id);
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'diskon' => 'required|numeric|min:0|max:100',
        ]);
       $update->update([
        'barang_id' => $request->barang_id,
        'diskon' => $request->diskon,
    ]);

    return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}
