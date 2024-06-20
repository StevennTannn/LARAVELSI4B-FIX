<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()-> role == 'D'){
            $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get();
        } else {
            $mahasiswa = Mahasiswa::all();
        }
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
        //dd($request);
        $val = $request->validate([
            'npm' => "required|unique:mahasiswas",
            'nama' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir' => "required|date",
            'alamat' => "required",
            'prodi_id' => "required",
            'url_foto' => "required|file|mimes:png,jpg|max:5000"
        ]);

        // esktensi file yang diupload
        $ext = $request->url_foto->getClientOriginalExtension();
        // rename npm.ekstensi 2226240001.png
        $val['url_foto'] = $request->npm.".".$ext;
        // upload ke folder public/foto
        $request->url_foto->move('foto', $val['url_foto']);

        Mahasiswa::create($val);

        return redirect()->route('mahasiswa.index')->with('success', $val['nama'].' Berhasil di Simpan');
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
        if(auth()->user()->cannot('update', $mahasiswa)){
            abort(403);
        }
        // dd($request);
        if($request->url_foto){
            $val = $request->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir' => "required|date",
                'alamat' => "required",
                'prodi_id' => "required",
                'url_foto' => "required|file|mimes:png,jpg|max:5000"
            ]);

            // esktensi file yang diupload
            $ext = $request->url_foto->getClientOriginalExtension();
            // rename npm.ekstensi 2226240001.png
            $val['url_foto'] = $request->npm.".".$ext;
            // upload ke folder public/foto
            $request->url_foto->move('foto', $val['url_foto']);

        }else{
            $val = $request->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir' => "required|date",
                'alamat' => "required",
                'prodi_id' => "required",
                // 'url_foto' => "required|file|mimes:png,jpg|max:5000"
            ]);
        }

        Mahasiswa::where('id', $mahasiswa['id'])->update($val);

        return redirect()->route('mahasiswa.index')->with('success', $val['nama'].' Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if(auth()->user()->cannot('delete', $mahasiswa)){
            abort(403);
        }
        //dd($mahasiswa);
        File::delete('foto/'. $mahasiswa['url_foto']);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
