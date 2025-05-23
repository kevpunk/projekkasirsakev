<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::withCount('detailTransaksi')
            ->orderByDesc('tanggal')
            ->get();

        return view('transaksi.index', compact('transaksi'));
    }


    public function store(Request $request)
{
    DB::beginTransaction();
    try {
        $total = 0;
        $total_diskon = 0;

       
        $transaksi = Transaksi::create([
            'tanggal' => now(),
            'total' => 0,
            'total_diskon' => 0
        ]);

        for ($i = 0; $i < count($request->barang_id); $i++) {
    $barang = Barang::findOrFail($request->barang_id[$i]);
    $jumlah = $request->jumlah[$i];

    if ($barang->stok <= 0) {
        DB::rollBack();
        return back()->with('error', "Barang '{$barang->nama}' stok habis dan tidak bisa dibeli.");
    }

    
    if ($jumlah > $barang->stok) {
        DB::rollBack();
        return back()->with('error', "Jumlah pembelian untuk '{$barang->nama}' melebihi stok yang tersedia ({$barang->stok}).");
    }

    $diskon = $barang->diskon;

    $harga_satuan = $barang->harga;
    $harga_total = $harga_satuan * $jumlah;
    $diskon_rp = ($diskon / 100) * $harga_total;
    $harga_setelah_diskon = $harga_total - $diskon_rp;

    DetailTransaksi::create([
        'transaksi_id' => $transaksi->id,
        'barang_id' => $barang->id,
        'jumlah' => $jumlah,
        'harga_satuan' => $harga_satuan,
        'diskon' => $diskon,
        'tanggal' => now(),
    ]);

    $barang->stok -= $jumlah;
    $barang->save();

    $total += $harga_setelah_diskon;
    $total_diskon += $diskon_rp;
}

        $transaksi->update([
            'total' => $total,
            'total_diskon' => $total_diskon
        ]);

        DB::commit();
        return redirect()->route('transaksi.show', $transaksi->id)->with('success', 'Transaksi berhasil!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.barang')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }
    public function create()
    {
        $barangs = Barang::all();
        return view('transaksi.create', compact('barangs'));
    }


    public function cetakNota($id)
    {
        
        $transaksi = Transaksi::with('detailTransaksi.barang')->findOrFail($id);

        
        $pdf = FacadePdf::loadView('transaksi.pdf', compact('transaksi'));

        return $pdf->download('nota_transaksi_' . $transaksi->id . '.pdf');
    }
}