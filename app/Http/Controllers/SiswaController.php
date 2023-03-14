<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\spp;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::orderBy('created_at', 'desc')->get();
// dd($siswas);
        return view('siswa.index', compact('siswas'))
            ->with('i', (request()->input('siswa', 1) - 1) * 5);
            // $totalsiswa = Siswa::count();
            // return view('dashboard')
    }

    public function import_excel(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/siswa');
     
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       $tahun = Spp::all();
       $kelas = Kelas::all();
       $spp = spp::all();
       return view('siswa.create', compact('tahun','kelas','spp'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

    // dd($request->all());
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tahun' => 'required',
            'id_spp' => 'required',
            'id_kelas' => 'required',
        ]);

        
        Siswa::create($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Menyimpan !');
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
    public function edit(Siswa $siswa)

    {   
        // $siswa = Siswa::find($id);
        // return view('siswa.edit',compact('siswa'));
        // $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $tahun = Spp::all();
        // $spp = spp::find($id);
        $spp = Spp::all();
        return view('siswa.edit', compact('kelas','spp','siswa'));
     }
    // {
    //     $siswa = Siswa::find($id);
    //     return view('siswa.edit',compact('siswa'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tahun' => 'required',
            'id_spp' => 'required',
            'id_kelas' => 'required',
        ]);

        Siswa::find($id)->update($request->all());
        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Di Edit !');
    }
        // $siswa::update($request->all());
        // return redirect()->route('siswa.index')
        //     ->with('success', 'Berhasil Di Edit !');


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($siswa)
    {
        $siswaid = Siswa::find($siswa);
        $siswaid->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Hapus !');
    }
}
