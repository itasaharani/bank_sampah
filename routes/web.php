<?php
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BankController;

Route::group(['middleware'=>['auth']],function (){

   

    
Route::post('/daftar_buang',[PetugasController::class,'store']);
Route::get('/titikjemput','PetugasController@titikjemput');


//role
    Route::get('/home', 'PageController@home');
    Route::get('/homepetugas', 'PageController@homepetugas');
    Route::get('/homepengepul', 'PageController@homepengepul');
    Route::get('/dashpengguna',function(){
        return view('dashpengguna');
    });
    Route::get('/dashpengguna', [GrafikController::class,'showChart']);
    Route::get('/homepetugas', [GrafikController::class,'showChartCount']);
    // Route::get('/homepetugas', [GrafikController::class,'date']);


    Route::get('/logout','AuthController@logout');

//pengguna
    Route::get('/profile', 'PageController@addprofile');
    Route::post('/save', 'PageController@save');
    Route::get('/edit-profile','PageController@editProfile');
    Route::post('/update-profile', 'PageController@updateProfile');
    
    Route::get('/langganan','PageController@viewPengguna');
    Route::post('/berlangganan', 'PageController@processForm');
    Route::get('/pengajuan', 'PageController@showForm')->name('pengajuan');
    Route::post('/ajukan-pengambilan', [PageController::class, 'ajukanPengambilan'])->name('ajukan-pengambilan');
    Route::get('/riwayat', 'PageController@riwayatTransaksi');

    Route::get('/buangmandiri','PageController@buangmandiri');
    Route::post('/savebuangmandiri','PageController@savebuang');
    // routes/web.ph
// Route::get('/download-pdf', [PageController::class, 'downloadPdf'])->name('download-pdf');
Route::get('/export-to-word', [PageController::class, 'exportToWord']);
// routes/web.php

Route::get('/generate-invoice/{langganan}', 'PageController@generateInvoice');



// Rute untuk petugas
    Route::get('/pengajuan-petugas', [PetugasController::class, 'showForPetugas'])->name('pengajuan-petugas');
    Route::post('/accPengajuan/{id}', 'PetugasController@accPengajuan');
    Route::post('/jemputSampah/{pengajuan_id}', 'PetugasController@jemputSampah');
    Route::post('/selesaiPengajuan/{pengajuan_id}', 'PetugasController@selesaiPengajuan');
    Route::post('/pengambilan/{id}/action', 'petugasController@aksiPengajuan')->name('pengambilan.action');
    Route::get('/all-locations', 'PetugasController@showAllLocations');
    Route::get('/profilepetugas', 'PetugasController@profilepetugas');
    Route::post('/savepetugas', 'PetugasController@savepetugas');
    Route::get('/edit-profilepetugas','PetugasController@editProfilePetugas');
    Route::post('/update-profilepetugas', 'PetugasController@updateProfilePetugas');
    Route::get('/petugaslang', 'PetugasController@showPetugasView');
    Route::post('/approvelang/{id}', 'PetugasController@approveLangganan');
    Route::get('/kelolalang', 'PetugasController@kelolalang');

// Bank 
Route::get('/profilebank', 'BankController@profilebank');
Route::post('/savebank', 'BankController@savebank');
Route::get('/pengajuanbank','BankController@ShowForBank');
Route::post('/ajukanbank/{id}/action', 'bankController@aksiPengajuan')->name('pengambilan.action');
Route::get('/pengajuanmandiribank','BankController@ShowBankMandiri');
Route::post('/ajukanbankmandiri/{id}/action', 'bankController@aksiPengajuanMandiri')->name('pengajuan.action');
Route::get('/prosesSampah','BankController@showProsesSampah');
Route::get('/timbang/{id}', [BankController::class, 'showForm'] )->name('timbang.showForm');
Route::post('/timbang', [BankController::class, 'timbang'])->name('timbang');
Route::post('/savetimbang', 'BankController@timbang');

Route::get('/gaji', 'BankController@ShowGaji');
Route::get('/gajibank', 'BankController@ShowGajiBank');
Route::post('/update-status/{id}/action', 'BankController@updateStatus')->name('update-status.action');


// routes/web.php
Route::post('/ajukan-penerima/{id}', [BankController::class, 'ajukanPenerima'])->name('ajukan-penerima');






    
});

Route::group(['middleware'=>['guest']],function (){
    Route::get('/register','AuthController@register');
    Route::post('/simpan','AuthController@simpan');
    Route::get('/','AuthController@login')->middleware('guest')->name('login');
    Route::post('/ceklogin','AuthController@ceklogin');
    
});

Route::get('/index', function(){
    return view('index');
})->middleware('guest');




 // Route::get('/profile', 'PageController@profile');
    // Route::get('/mahasiswa', 'PageController@mahasiswa');
    // Route::get('/contact', 'PageController@contact');
    // Route::get('/mahasiswa/pencarian', 'PageController@pencarian');
    // Route::get('/mahasiswa/formtambah', 'PageController@tambah');
    // Route::post('/mahasiswa/simpan', 'PageController@simpan');
    // Route::get('/mahasiswa/formedit/{nim}', 'PageController@edit');
    // Route::put('/mahasiswa/update/{nim}', 'PageController@update');
    // Route::get('/mahasiswa/delete/{nim}', 'PageController@delete');
 


    // Route::get('/jualsampah',function(){
    //     return view('jualsampah');
    // });
    // Route::get('/formeditsampah',function(){
    //     return view('formeditsampah');
    // });
    // Route::get('/saldoakun',function(){
    //     return view('saldoakun');
    // });
    // Route::get('/isisaldo',function(){
    //     return view('isisaldo');
    // });
    // Route::get('/tukarpoin', function(){
    //     return view('tukarpoin');
    // });
    // Route::get('/laporan', 'PageController@getLaporan');
    // Route::get('/kelolasampah','PageController@getSampah');
    // Route::post('/jualsampah/jual','PageController@jual');
    // Route::get('/jualsampah/index', 'PageController@index');

    // Route::post('/kelolasampah/kelola','PageController@kelola');
    // Route::post('/formeditsampah/jual','PageController@jual');
    // Route::post('/isisaldo/isiSaldoAkun','PageController@isiSaldoAkun');
    // Route::post('/tukarpoin/tukar','PageController@tukar');
