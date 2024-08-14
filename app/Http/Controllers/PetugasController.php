<?php

namespace App\Http\Controllers;
use App\Langganan;
use App\AjukanBank;
use App\ProfilePetugas;
use App\Profilbank;
use App\profile;
use App\Pengajuan;
use Illuminate\Http\Request;


class PetugasController extends Controller
{

    public function profilepetugas()
    {
        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $profilepetugas = ProfilePetugas::where('id', $user->id)->first();

        if ($profilepetugas) {
            // Jika profil sudah diisi, tampilkan data profil
            return view('showProfilePetugas', compact('profilepetugas'));
        } else {
            // Jika profil belum diisi, tampilkan form
            return view('profilepetugas');
        }

        
    }


    public function savepetugas(Request $request)
    {
       
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $profilepetugas = ProfilePetugas::updateOrCreate(
            ['id' => $user->id],
            $request->all()
        );

        return view('showProfilePetugas', compact('profilepetugas'));
    }

    public function showProfilePetugas($id)
    {
        $profilepetugas = ProfilePetugas::find($id);

        return view('showProfilePetugas', compact('profilepetugas'));
    }

    public function editProfilePetugas()
    {
        $user = auth()->user();
        $profilepetugas = ProfilePetugas::where('id', $user->id)->first();

        return view('editProfilePetugas', compact('profilepetugas'));
    }

    public function updateProfilePetugas(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $user = auth()->user();
        $profilepetugas = ProfilePetugas::where('id', $user->id)->first();

        if ($profilepetugas) {
            $profilepetugas->update($request->all());
            return redirect('/profilepetugas')->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect('/profilepetugas')->with('error', 'Profil tidak ditemukan.');
        }
    }
    public function showPetugasView()
    {
        $langganansPending = Langganan::where('status', 'pending')->get();

        return view('view-petugas', compact('langganansPending'));
    }

    public function approveLangganan($id)
    {
        $langganan = Langganan::find($id);
        $langganan->status = 'approved';
        $langganan->save();

        $langganansPending = Langganan::where('status', 'pending')->get();

        return view('view-petugas', compact('langganansPending'))->with('status', 'Berlangganan disetujui.');
    }

    public function kelolalang()
    {
        $langganan = Langganan::all();
        $profil = Profile::all();
        return view('kelolalangganan', compact('langganan', 'profil'));
    }

    public function showAllLocations()
{
    $locations = ProfilePetugas::all();
    return view('allLocations', compact('locations'));
}

public function showForPetugas()
    {
        $profilbank = Profilbank::all();
        $profilepetugas = ProfilePetugas::all();
        $user = auth()->user();

            $profileId = $user->profile->id;
            $namaPengguna = $user->profile->nama_lengkap;

        // Mendapatkan daftar pengajuan yang perlu ditangani oleh petugas
        $pengajuanToHandle = Pengajuan::whereIn('status', ['menunggu', 'di acc','diproses', 'selesai'])->get();

        return view('pengajuanpetugas', compact('pengajuanToHandle','namaPengguna','profilbank'));
    }


public function aksiPengajuan(Request $request, $id){
        
    $pengajuan = Pengajuan::find($id);

    if (!$pengajuan){
        return redirect('/pengajuan-petugas')->with('error', 'Pengajuan not found');
    }

    switch ($request->action){
        case 'acc':
            $pengajuan->status = 'di acc';
            break;

        case 'jemput_sampah':
            $pengajuan->status = 'diproses';
            break;

        case 'ambil_sampah':
            $pengajuan->status = 'selesai';
            break;

        default:
        break;
    }
    $pengajuan->save();
    return redirect('/pengajuan-petugas')->with('success', 'Status berhasil di update');

}

public function store(Request $request)
    {
        AjukanBank::create([
            'pengguna_id' =>$request->pengguna_id,
            'nama_pengguna' =>$request->nama_pengguna,
            'petugas_id' =>$request->petugas_id,
            'nama_petugas'=>$request->nama_petugas,
            'jenis_sampah' =>$request->jenis_sampah, 
            'bank_id' =>$request->bank_id,
            'nama_instansi'=>$request->nama_instansi,
            'status' => 'menunggu',
            ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    
    }


    public function showDaftarBuangModal($id) {
        $pengajuan = Pengajuan::find($id);
        $petugas = $pengajuan->petugas;

        return view('daftar_buang_modal', compact('petugas', 'pengajuan'));
    }

    public function titikjemput(){
        $locations = Pengajuan::all();
        return view('titikjemput',compact( 'locations'));

    }

    // ... (method dan logika lainnya)
}






// use App\SaldoModel;
// use App\SampahModel;
// use App\TukarPoinModel;
// use Illuminate\Support\Facades\DB;
// use App\LaporanModel;


