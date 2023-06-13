<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa; //untuk menghubungkan controller dengan model

class PageController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    public function profile()
    {
        return view('profile', ['key' => 'profile']);
    }

    public function mahasiswa()
    {
        $mhs = Mahasiswa::orderBy('nim', 'desc')->paginate(10); 
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]); 
    }

    public function pencarian(Request $request)
    {
        $cari = $request->q;
        $mhs = Mahasiswa::where('nim', 'like', '%' .$cari.'%')->orWhere('nama', 'like', '%' .$cari.'%')->paginate(10);
        $mhs->appends($request -> all()); 
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);

    }

    public function tambah()
    {
        return view('formtambah', ['key' => 'mahasiswa']);
    }

    public function contact()
    {
        return view('contact', ['key' => 'contact']);
    }

    public function simpan(Request $request)
    {
        $bidang_minat = implode(',',$request->get('bidang_minat'));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'jurusan' => $request->prodi,
            'bidang_minat' => $bidang_minat
        ]);
        return redirect('mahasiswa')->with('flash', 'Berhasil disimpan');
        
        //redirect untuk mengecek apakah data sudah ditambahkan atau belum
    }

    public function edit ($nim){
        $mhs = Mahasiswa::find($nim);
        return view('formedit', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function update ($nim, Request $request){
        
        $bidang_minat = implode(',',$request->get('bidang_minat'));
        $mhs = Mahasiswa::find($nim);
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->gender = $request->gender;
        $mhs->jurusan = $request->jurusan;
        $mhs->bidang_minat=$bidang_minat;
        $mhs->save();
        return redirect('mahasiswa')->with('dark', 'Berhasil diupdate');
    }

    public function delete ($nim){
        $mhs = Mahasiswa::find($nim);
        $mhs->delete();
        return redirect('mahasiswa')->with('danger', 'Berhasil dihapus');

    }
}
