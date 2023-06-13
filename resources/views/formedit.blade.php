@extends('layouts.main') 
@section('title','mahasiswa')
@section('content')
<div class="card mt-4">
    <div class="class card-header">
        <div class="class card-body">
            @php 
                $bidang_minat = explode(',', $mhs->bidang_minat);
            @endphp 
            <form action="/mahasiswa/update/{{$mhs->nim}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group w-25">
                  <label>NIM</label>
                  <input type="number" name="nim" class="form-control" value="{{$mhs->nim}}">
                </div>
                <div class="form-group w-50">
                  <label>Nama Mahasiswa</label>
                  <input type="text" name="nama" class="form-control" value="{{$mhs->nama}}">
                </div>
    
        <label>Gender</label>
        <div class="form-check">
            <input type="radio" value="pria" name="gender" class="form-check-input" {{ ( $mhs->gender =='pria') ?'checked':''}}>
            <label> Pria </label>
        </div>
        <div class="form-check">
            <input type="radio" value="wanita" name="gender" class="form-check-input"  {{ ( $mhs->gender =='wanita') ?'checked':''}} >
            <label> Wanita </label>
        </div>

                <div class="form-group w-50">
                    <label>Jurusan</label>
                    <select name="jurusan" class="form-control">
                        <option value="0">-Pilih Program Studi-</option>
                        <option value="Sistem Informasi"  {{ ( $mhs->jurusan =='Sistem Infromasi') ?'Selected':''}} >Sistem Informasi</option>
                        <option value="Teknik Informatika"  {{ ( $mhs->jurusan =='Teknik Informatika') ?'Selected':''}}>Teknik Informatika</option>
                        <option value="Teologi" {{ ( $mhs->jurusan =='Teologi') ?'Selected':''}}>Teologi</option>
                        <option value="Arsitektur" {{ ( $mhs->jurusan =='Arsitektur') ?'Selected':''}}>Arsitektur</option>
                    </select>                   
                </div>

                <label>Bidang minat</label>
                  <div class="form-check">
                    <input type="checkbox" name="bidang_minat[]" value="Design" class="form-check-input" {{in_array('Design', $bidang_minat) ? 'checked':'' }}>
                  <label>Design</label>
                  </div>
                <div class="form-check">
                  <input type="checkbox" name="bidang_minat[]" value="Writer" class="form-check-input" {{in_array('Writer', $bidang_minat) ? 'checked':'' }}>
                  <label>Writer</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" name="bidang_minat[]" value="Database" class="form-check-input"{{in_array('Database', $bidang_minat) ? 'checked':'' }}>
                  <label>Database</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
