<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index')
            ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'npm' => "required|unique:mahasiswas",
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg|max:5005'
        ]);

        // ekstensi file yg diupload
        $ext =
        $request->url_foto->getClientOriginalExtension();
        // rename misal : npm.extensi 2226240065.jpg
        $val['url_foto'] = $request->npm.".".$ext;
        // upload ke dalam folder public/foto
        $request->url_foto->move('foto', $val['url_foto']);


        // simpan ke tabel mahasiswa
        Mahasiswa::create($val);
    
        return redirect()->route('mahasiswa.index')->with('success', $val['nama'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        $prodi = Prodi::all();
        return view('mahasiswa.edit')
            ->with('prodi', $prodi)
            ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if($request->url_foto){
             $val = $request->validate([
            // 'npm' => "required|unique:mahasiswas",
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg|max:5005'
        ]);

        // ekstensi file yg diupload
        $ext =
        $request->url_foto->getClientOriginalExtension();
        // rename misal : npm.extensi 2226240065.jpg
        $val['url_foto'] = $request->npm.".".$ext;
        // upload ke dalam folder public/foto
        $request->url_foto->move('foto', $val['url_foto']);

        } else {
             $val = $request->validate([
            // 'npm' => "required|unique:mahasiswas",
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
            // 'url_foto' => 'required|file|mimes:png,jpg|max:5005'
        ]);
        }

        // simpan ke tabel mahasiswa
        Mahasiswa::where('id', $mahasiswa['id'])->update($val);
        
        // redirect ke halaman list mahasiswa
        return redirect()->route('mahasiswa.index')->with('success', $val['nama'].'berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        $mahasiswa->delete(); //hapus data mahasiswa
        return redirect()->route('mahasiswa.index')->with('success', "Data berhasil dihapus");
    }
}
