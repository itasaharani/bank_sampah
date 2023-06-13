<div>
    <div>
        <form wire:submit.prevent="simpan">
            <div class="form-group">
                <label>Nama</label>
                <input wire:model="nama" type="text" name="" id="" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label>Judul</label>
                <input wire:model="judul_task" type="text" name="" id="" class="form-control" placeholder="Masukkan Judul">
            </div>
    
            <div class="form-group">
                <label>isi Task</label>
                <textarea wire:model="deskripsi_task" name="" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
    
</div>

