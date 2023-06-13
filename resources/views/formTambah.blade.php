@extends('layouts.main') 
@section('title','mahasiswa')
@section('content')
<div class="card mt-4">
    <div class="class card-header">
        <div class="class card-body">
            <form action="/mahasiswa/simpan" method="POST">
                @csrf
                <div class="form-group w-25">
                  <label>NIM</label>
                  <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM">
                </div>
                <div class="form-group w-50">
                  <label>Nama Mahasiswa</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                </div>
    
        <label>Gender</label>
        <div class="form-check">
            <input type="radio" value="pria" name="gender" class="form-check-input" >
            <label> Pria </label>
        </div>
        <div class="form-check">
            <input type="radio" value="wanita" name="gender" class="form-check-input" >
            <label> Wanita </label>
        </div>

                <div class="form-group w-50">
                    <label>Jurusan</label>
                    <select name="prodi" class="form-control">
                        <option value="0">-Pilih Program Studi-</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teologi">Teologi</option>
                        <option value="Arsitektur">Arsitektur</option>
                    </select>                   
                </div>

                <label>Bidang minat</label>
                  <div class="form-check">
                    <input type="checkbox" name="bidang_minat[]" value="Design" class="form-check-input">
                  <label>Design</label>
                  </div>
                <div class="form-check">
                  <input type="checkbox" name="bidang_minat[]" value="Writer" class="form-check-input">
                  <label>Writer</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" name="bidang_minat[]" value="Database" class="form-check-input">
                  <label>Database</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
