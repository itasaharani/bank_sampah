<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profilbank;
use App\BuangMandiri;
use App\AjukanBank;
use App\TimbangSampah;

class BankController extends Controller
{
   
    public function profilebank()
    {
        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $profilebank = Profilbank::where('id', $user->id)->first();

        if ($profilebank) {
            // Jika profil sudah diisi, tampilkan data profil
            return view('showProfileBank', compact('profilebank'));
        } else {
            // Jika profil belum diisi, tampilkan form
            return view('profilebank');
        }
    }

    public function savebank(Request $request)
    {
       
        $request->validate([
            'nama_instansi' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'kapasitas_penampungan' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

        ]);

        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $profilebank = Profilbank::updateOrCreate(
            ['id' => $user->id],
            $request->all()
        );

        return view('showProfileBank', compact('profilebank'));
    }

    public function showForBank()
    {
        $pengajuanbank = AjukanBank::all();

        // Mendapatkan daftar pengajuan yang perlu ditangani oleh petugas
        $pengajuanToHandle = AjukanBank::whereIn('status', ['menunggu'])->get();

        return view('pengajuanbank', compact('pengajuanToHandle'));
    }

    public function aksiPengajuan(Request $request, $id){
        
        $pengajuan = AjukanBank::find($id);
    
        if (!$pengajuan){
            return redirect('/pengajuanbank')->with('error', 'Pengajuan not found');
        }
    
        switch ($request->action){
            case 'acc':
                $pengajuan->status = 'di acc';
                break;
    
            case 'tolak':
                $pengajuan->status = 'di tolak';
                break;
    
            default:
            break;
        }
        $pengajuan->save();
        return redirect('/pengajuanbank')->with('success', 'Status berhasil di update');
    
    }

    public function showBankMandiri()
    {
        $pengajuanbank = BuangMandiri::all();

        // Mendapatkan daftar pengajuan yang perlu ditangani oleh petugas
        $mandiriToHandle = BuangMandiri::whereIn('status', ['menunggu'])->get();

        return view('pengajuanmandiribank', compact('mandiriToHandle'));
    }

    public function aksiPengajuanmandiri(Request $request, $id){
        
        $pengajuan = BuangMandiri::find($id);
    
        if (!$pengajuan){
            return redirect('/pengajuanmandiribank')->with('error', 'Pengajuan not found');
        }
    
        switch ($request->action){
            case 'acc':
                $pengajuan->status = 'di acc';
                break;
    
            case 'tolak':
                $pengajuan->status = 'di tolak';
                break;
    
            default:
            break;
        }
        $pengajuan->save();
        return redirect('/pengajuanmandiribank')->with('success', 'Status berhasil di update');
    
    }

    public function showProsesSampah()
    {
        $banks = Profilbank::all();
        $pengajuanbank = AjukanBank::all();
        $timbang = TimbangSampah::all();
        $mandiri = BuangMandiri::all();
        

        // Mendapatkan daftar pengajuan yang perlu ditangani oleh petugas
        $prosesToHandle = AjukanBank::whereIn('status', ['di acc','di tolak'])->get();

        return view('showProsesSampah', compact('prosesToHandle','timbang','banks','mandiri'));
    }

    public function showForm($id)
    {
        $banks = Profilbank::all();
        $timbang = TimbangSampah::all();
        $pengajuan = AjukanBank::findOrFail($id);
        return view('timbang.form', compact('pengajuan'));
    }

    public function timbang(Request $request)
    {
        TimbangSampah::create([
            'tanggal' =>$request->tanggal,
            'pengguna_id' =>$request->pengguna_id,
            'nama_pengguna' =>$request->nama_pengguna,
            'petugas_id' =>$request->petugas_id,
            'nama_petugas'=>$request->nama_petugas,
            'bank_id' =>$request->bank_id,
            'nama_instansi'=>$request->nama_instansi,
            'berat_organik'=>$request->berat_organik,
            'berat_anorganik'=>$request->berat_anorganik,
            ]);

        return redirect()->back()->with('success', 'Berat sampah berhasil ditambahkan');
    }

    // harusnya di petugas
    public function showGaji() 
    {
        $gaji = TimbangSampah::all();
        return view('gaji', compact('gaji'));
    }

    public function ajukanPenerima($id)
    {
        $timbangan = TimbangSampah::find($id);

        // Lakukan sesuatu dengan $timbangan, misalnya ubah status menjadi "Menunggu"
        $timbangan->status = 'Menunggu';
        $timbangan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Menunggu');
    }

    public function showGajiBank() 
    {
        $gaji = TimbangSampah::all();
        return view('gajibank', compact('gaji'));
    }

    public function updateStatus(Request $request, $id)
{

    $timbangan = TimbangSampah::findOrFail($id);
   
   

    switch ($request->action) {
        case 'acc':
            $timbangan->status = 'diterima';
    
            // Melakukan perhitungan untuk nilai gaji
            $gaji = ($timbangan->berat_anorganik + $timbangan->berat_organik) * 10000;
    
            // Menambahkan nilai gaji ke atribut gaji
            $timbangan->gaji = $gaji;
            break;
    
        case 'tolak':
            $timbangan->status = 'di tolak';
            break;
    
        default:
            break;
    }
    $timbangan->save();

    return redirect()->back()->with('success', 'Status berhasil diubah');

  
}


    



}