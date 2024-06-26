<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // ambil data yang mau ditampilkan
            $data = Order::all()->toArray();

            return ApiFormatter::sendResponse(200, 'success', $data);
        } catch (\Exception $err) {
            return ApiFormatter::sendResponse(400, 'bad request', $err->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $produks = Produk::all();
        return view('transaksi.create', compact('orders', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'nama' => 'required',
            'produk_id' => 'required',
            'jumlah_beli' => 'required',
            'tgl_pembelian' => 'required'
        ]);

        Order::create([
            'nama' => $request->nama,
            'produk_id' => $request->produk_id,
            'jumlah_beli' => $request->jumlah_beli,
            'tgl_pembelian' => $request->tgl_pembelian,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
    }

    public function ttlharga(Request $request)
    {
    
    }
}
