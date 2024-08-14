<?php

namespace App\Http\Controllers;
use App\BuangMandiri;
use App\Profilbank;
use Illuminate\Support\Facades\Auth;


use App\Langganan;
use App\Pengajuan;
use App\ProfilePetugas;
use App\profile;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;



class PageController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    public function homepetugas()
    {
        return view('homepetugas');
    }

    public function homepengepul()
    {
        return view('homepengepul');
    }


    public function addprofile()
    {
        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $profile = Profile::where('id', $user->id)->first();

        if ($profile) {
            // Jika profil sudah diisi, tampilkan data profil
            return view('showProfile', compact('profile'));
        } else {
            // Jika profil belum diisi, tampilkan form
            return view('profile');
        }

        
    }


    public function save(Request $request)
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
        $profile = Profile::updateOrCreate(
            ['id' => $user->id],
            $request->all()
        );

        return view('showProfile', compact('profile'));
    }

    public function showProfile($id)
    {
        $profile = Profile::find($id);

        return view('showProfile', compact('profile'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        $profile = Profile::where('id', $user->id)->first();

        return view('editProfile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $user = auth()->user();
        $profile = Profile::where('id', $user->id)->first();

        if ($profile) {
            $profile->update($request->all());
            return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect('/profile')->with('error', 'Profil tidak ditemukan.');
        }
    }

    public function viewPengguna()
    {
        $paketHarga = ['Paket A', 'Paket B', 'Paket C']; // Contoh paket harga
       
        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $langganan = Langganan::where('id', $user->id)->first();
        $profilepetugas = ProfilePetugas::all(); // Tambahkan ini untuk mendapatkan data petugas
        $locations = ProfilePetugas::all();

        if ($langganan) {
            // Jika profil sudah diisi, tampilkan data profil
            return view('showInfo', compact('langganan'));
        } else {
            // Jika profil belum diisi, tampilkan form
            return view('langganan', compact('profilepetugas', 'locations'));
        }
    }

    public function processForm(Request $request)
    {

        $profilepetugas = ProfilePetugas::all();
        $request->validate([
            'nama' => 'required|string',
            'jenis_sampah' => 'required|string',
            'paket_harga' => 'required|string',
            'masa_berlaku' => 'required|integer', // Mengganti menjadi integer
            'petugas_id' => 'required|exists:profile_petugas,id', // Validasi bahwa petugas_id harus ada di tabel profile_petugas
           
        ]);

        $user = auth()->user(); // Mendapatkan objek pengguna yang sedang login
        $langganan = Langganan::updateOrCreate(
            ['id' => $user->id],
            $request->all()
        );

         // Hitung tanggal berakhir langganan
        $tanggalMulai = now();
        $masaBerlaku = $langganan->masa_berlaku;
        $akhir_langganan = $tanggalMulai->addDays($masaBerlaku);

        // Simpan informasi tanggal berakhir langganan ke dalam model Langganan
        $langganan->akhir_langganan = $akhir_langganan ;
        $langganan->save();


        return redirect('/langganan')->with('status', 'Menunggu persetujuan petugas.');
    }

    public function showForm()
    {
        $user = auth()->user();
    
        // Periksa apakah pengguna memiliki profil
        if ($user->profile) {
            $profileId = $user->profile->id;
            $namaPengguna = $user->profile->nama_lengkap;
            $long = $user->profile->longitude;
            $lat = $user->profile->latitude;
    
            // Ambil informasi Langganan
            $langganan = Langganan::where('id', $profileId)->first();
    
            if ($langganan) {
                // Anggap Langganan memiliki kunci asing 'petugas_id'
                $petugasId = $langganan->petugas_id;
    
                // Ambil transaksi dengan status 'menunggu', 'diacc', atau 'diproses'
                $riwayatTransaksi = Pengajuan::where('pengguna_id', $profileId)
                    ->whereIn('status', ['menunggu', 'diacc', 'diproses'])
                    ->get();
    
                return view('pengajuan', compact('riwayatTransaksi', 'namaPengguna', 'petugasId','long','lat'));
            } else {
                // Handle jika langganan tidak ditemukan
                return view('/langganan_not_found'); // Sesuaikan dengan view yang sesuai
            }
        } else {
            // Handle jika pengguna tidak memiliki profil
            return view('/profile'); // Anda dapat membuat view khusus untuk kasus ini
        }
    }
    


public function ajukanPengambilan(Request $request)
{
    $request->validate([
        'jenis_sampah' => 'required',
    ]);

    // Mendapatkan pengguna yang sedang login
    $pengguna = Auth::user();

    // Mendapatkan ID profil pengguna
    $idProfilPengguna = $pengguna->profile->id;
    $namaPengguna = $pengguna->profile->nama_lengkap;
    $long = $pengguna->profile->longitude;
    $lat = $pengguna->profile->latitude;

    // Membaca nilai petugas_id dari request
    $petugasId = $request->input('petugas_id');

    $profilePetugas = ProfilePetugas::find($petugasId);

    // Membuat pengajuan dengan ID profil yang sesuai dan petugas_id yang didapat dari request
    Pengajuan::create([
        'jenis_sampah' => $request->jenis_sampah,
        'status' => 'menunggu',
        'pengguna_id' => $idProfilPengguna,
        'nama_pengguna' => $namaPengguna,
        'longitude' => $long,
        'latitude' => $lat,
        'petugas_id' => $petugasId,
        'nama_petugas' => $profilePetugas->nama_lengkap,
    ]);

    return redirect()->route('pengajuan')->with('success', 'Pengajuan berhasil diajukan.');
}


    public function riwayatTransaksi(){
        $user = auth()->user();

        // Check if user has a profile
      
            $profileId = $user->profile->id;
            $namaPengguna = $user->profile->nama_lengkap;
            $profiles = Profile::all(); // Mendapatkan data profil
            $banks = Profilbank::all(); // 
            $riwayatMandiri = BuangMandiri::where('nama_lengkap', $namaPengguna)
                        ->whereIn('status', ['menunggu', 'di acc', 'di tolak'])
                        ->get();
            $riwayatTransaksi = Pengajuan::where('pengguna_id', $profileId)->get();
            return view('riwayatTransaksi', compact('riwayatTransaksi', 'namaPengguna','riwayatMandiri'));

    }

    public function buangmandiri(){
        $user = auth()->user();

        // Check if user has a profile
      
            $profileId = $user->profile->id;
            $namaPengguna = $user->profile->nama_lengkap;
        $profiles = Profile::all(); // Mendapatkan data profil
        $banks = Profilbank::all(); // Mendapatkan data bank
        $locations = Profilbank::all();
        $riwayatMandiri = BuangMandiri::where('nama_lengkap', $namaPengguna)
                    ->whereIn('status', ['menunggu'])
                    ->get();
            return view('BuangSampahMandiri', compact('locations','banks','profiles', 'namaPengguna','riwayatMandiri'));

    }

    public function savebuang(Request $request){

        // Simpan data pengajuan sampah ke dalam database
        BuangMandiri::create([
            'nama_lengkap' =>$request->nama_lengkap,
            'jenis_sampah' =>$request->jenis_sampah, 
            'bank_id' => $request->bank_id,
            'nama_instansi' => $request->nama_instansi,
            'status' => 'menunggu',
            // ... tambahkan kolom lain sesuai kebutuhan
        ]);

        // Redirect atau tampilkan pesan sukses, sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Pengajuan sampah berhasil diajukan!');
    }

    public function exportToWord(Request $request)
{
    $user = auth()->user();
    $profileId = $user->profile->id;

    $riwayatTransaksi = Pengajuan::where('pengguna_id', $profileId)->get();
    $namaPengguna = $user->profile->nama_lengkap;

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    // Add content to the Word document
    $section->addText('Riwayat Transaksi', ['bold' => true, 'size' => 16]);
    $section->addText('Nama Pengguna: ' . $namaPengguna, ['bold' => true, 'size' => 12]);


    if ($riwayatTransaksi && count($riwayatTransaksi) > 0) {
        $table = $section->addTable();
        $table->addRow();
        $cellStyle = ['borderSize' => 6, 'borderColor' => '000000']; // Set your border properties here

        $table->addCell(2000, $cellStyle)->addText('Tanggal', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Nama Petugas', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Jenis Sampah', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Status', ['bold' => true]);

        foreach ($riwayatTransaksi as $transaksi) {
            $table->addRow();
            $table->addCell(2000, $cellStyle)->addText($transaksi->tanggal);
            $table->addCell(2000, $cellStyle)->addText($transaksi->nama_petugas);
            $table->addCell(2000, $cellStyle)->addText($transaksi->jenis_sampah);
            $table->addCell(2000, $cellStyle)->addText($transaksi->status);
        }
    } else {
        $section->addText('Tidak ada riwayat transaksi.');
    }

    // Save the Word document
    $filename = 'riwayat_transaksi.docx';
    $path = storage_path('app/public/' . $filename);
    $phpWord->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
}

public function generateInvoice(Request $request)
{
    $user = auth()->user();

    // Assuming you have a one-to-one relationship between User and Profile
    $profileId = $user->profile->id;

    // Fetch Langganan data for the authenticated user
    $langganan = Langganan::where('id', $user->id)->first();

    // If Langganan data exists, proceed with creating the invoice
    if ($langganan) {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
    
        // Add content to the Word document
        $section->addText('Invoice Pembayaran Langganan', ['bold' => true, 'size' => 16]);
        $section->addText('Nama Pengguna: ' . $user->profile->nama_lengkap, ['bold' => true, 'size' => 12]);
    
        // Add Langganan data to the table
        $table = $section->addTable();
        $table->addRow();
        $cellStyle = ['borderSize' => 6, 'borderColor' => '000000']; // Set your border properties here
    
        $table->addCell(2000, $cellStyle)->addText('Jenis Paket', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Harga', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Masa Berlaku', ['bold' => true]);
        $table->addCell(2000, $cellStyle)->addText('Akhir Langganan', ['bold' => true]);
    
        $packages = [
            'Paket A' => 440000, // Package A with a price of 440,000
            'Paket B' => 600000,
            'Paket C' => 800000, // Package C with a price of 800,000
            // Add more packages as needed
        ];
    
        if (isset($packages[$langganan->nama])) {
            $harga = number_format($packages[$langganan->nama]) . ' IDR';
        } else {
            $harga = 'N/A';
        }
    
        // Add a row with Langganan data
        $table->addRow();
        $table->addCell(2000, $cellStyle)->addText($langganan->nama);
        $table->addCell(2000, $cellStyle)->addText($harga);
        $table->addCell(2000, $cellStyle)->addText($langganan->masa_berlaku);
        $table->addCell(2000, $cellStyle)->addText($langganan->akhir_langganan);
        $section->addText('Lunas,Cash ',['bold' => true, 'size' => 12]);
        // Save the Word document
        $filename = 'invoice_' . $user->id . '.docx';
        $path = storage_path('app/public/' . $filename);
        $phpWord->save($path);
    
        return response()->download($path)->deleteFileAfterSend(true);
    } else {
        return response()->json(['message' => 'Langganan data not found.'], 404);
    }
}    




    


    // public function printTransaksi()
    // {
    //     // Ambil data transaksi dari database (misalnya dari model Transaksi)
    //     $datapengajuan = Pengajuan::all();

    //     // Load view print.blade.php dan passing data
       

    //     // Atur nama file PDF yang akan dihasilkan
    //     $filename = 'data_transaksi_' . date('YmdHis') . '.pdf';

    //     // Download file PDF atau tampilkan di browser
    //     return $pdf->download($filename);
    // }
}

   
    

    


    

    
// use App\Mahasiswa; //untuk menghubungkan controller dengan model
// use App\SaldoModel;
// use App\SampahModel;
// use App\TukarPoinModel;
// use Illuminate\Support\Facades\DB;
// use App\LaporanModel;



// public function jual(Request $request){
//     $sampah = SampahModel::create([
//         'nama'=>$request->nama,
//         'alamat'=>$request->alamat,
//         'jenis'=>$request->jenis,
//         'banyak'=>$request->banyak,
//         'telepon'=>$request->telepon,
//         'driver'=>$request->driver,
//         'harga'=>$request->harga,
//         'poin'=>$request->poin,
//     ]);
//     return redirect('jualsampah')->with('alert','data berhasil disimpan');
// }


// public function index()
// {

// // Get all locations from the locations table
// $lokasi = DB::table('lokasi')->get();
// // Send all locations to the view named maps
// dd($lokasi);
// return view('jualsampah', ['lokasi' => $lokasi]);

// }


// public function isiSaldoAkun(Request $request){
//     $saldo = SaldoModel::create([
//         'no_akun'=>$request->no_akun,
//         'saldo'=>$request->saldo,
//         'pembayaran'=>$request->pembayaran,
//         'no_pembayaran'=>$request->no_pembayaran,
//     ]);
//     return redirect('home')->with('alert','data berhasil disimpan');
// }

// public function getSampah(){
//     $sampah =SampahModel::orderBy('id','desc')->paginate(10);
//     return view('kelolasampah', ['key' => 'kelolasampah', 'sampah' =>$sampah]);
// }

// public function getLaporan(){
//     $sampah =SampahModel::orderBy('id','desc')->paginate(10);
//     return view('laporan', ['key' => 'laporan', 'sampah' =>$sampah]);
// }

// public function editSampah($id,Request $request){
//         $sampah = SampahModel::find($id);
//         $sampah->no_akun=$request->no_akun;
//         $sampah->nama=$request->nama;
//         $sampah->alamat=$request->alamat;
//         $sampah->jenis=$request->jenis;
//         $sampah->banyak=$request->banyak;
//         $sampah->telepon=$request->telepon;
//         $sampah->driver=$request->driver;
//         $sampah->harga=$request->harga;
//         $sampah->poin=$request->poin;
//         $sampah->pembayaran->$request->pembayaran;
//         $sampah->tpu->$request->tpu;


//     return redirect('kelolasampah')->with('alert','data berhasil disimpan');
// }
// public function deleteSampah ($id){
//     $sampah = SampahModel::find($id);
//     $sampah->delete();
//     return redirect('home')->with('danger', 'Berhasil dihapus');
// }

// public function tukar(Request $request){
//     $tukar=TukarPoinModel::create([
//         'no_akun','pilihan','poin'
//     ]);
//     return redirect('saldoakun');
// }
// public function profile()
// {
//     return view('profile', ['key' => 'profile']);
// }

// public function mahasiswa()
// {
//     $mhs = Mahasiswa::orderBy('nim', 'desc')->paginate(10); 
//     return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]); 
// }

// public function pencarian(Request $request)
// {
//     $cari = $request->q;
//     $mhs = Mahasiswa::where('nim', 'like', '%' .$cari.'%')->orWhere('nama', 'like', '%' .$cari.'%')->paginate(10);
//     $mhs->appends($request -> all()); 
//     return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);

// }

// public function tambah()
// {
//     return view('formtambah', ['key' => 'mahasiswa']);
// }

// public function contact()
// {
//     return view('contact', ['key' => 'contact']);
// }

// public function simpan(Request $request)
// {
//     $bidang_minat = implode(',',$request->get('bidang_minat'));
//     Mahasiswa::create([
//         'nim' => $request->nim,
//         'nama' => $request->nama,
//         'gender' => $request->gender,
//         'jurusan' => $request->prodi,
//         'bidang_minat' => $bidang_minat
//     ]);
//     return redirect('mahasiswa')->with('flash', 'Berhasil disimpan');
    
//     //redirect untuk mengecek apakah data sudah ditambahkan atau belum
// }

// public function edit ($nim){
//     $mhs = Mahasiswa::find($nim);
//     return view('formedit', ['key' => 'mahasiswa', 'mhs' => $mhs]);
// }

// public function update ($nim, Request $request){
    
//     $bidang_minat = implode(',',$request->get('bidang_minat'));
//     $mhs = Mahasiswa::find($nim);
//     $mhs->nim = $request->nim;
//     $mhs->nama = $request->nama;
//     $mhs->gender = $request->gender;
//     $mhs->jurusan = $request->jurusan;
//     $mhs->bidang_minat=$bidang_minat;
//     $mhs->save();
//     return redirect('mahasiswa')->with('dark', 'Berhasil diupdate');
// }

// public function delete ($nim){
//     $mhs = Mahasiswa::find($nim);
//     $mhs->delete();
//     return redirect('mahasiswa')->with('danger', 'Berhasil dihapus');

// }
    

