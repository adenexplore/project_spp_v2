<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use PDF; //library pdf

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('laporan.index', compact('laporans'))
            ->with('i', (request()->input('laporan', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function struk() 
    {
        $laporans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('laporan.struk', compact('laporans'));
    }

    public function exportpdf()
    {
        // $data = PDF::loadview('laporan_pdf', ['data' => 'ini adalah contoh laporan PDF']);
        // //mendownload laporan.pdf
    	// return $data->download('laporan.pdf');
        // $laporans = Laporan::all();
 
        // $pdf = PDF::loadview('laporan.cetak', ['laporan' => $laporans ]);
        // return $pdf->download('laporan.pdf');
    }
}
