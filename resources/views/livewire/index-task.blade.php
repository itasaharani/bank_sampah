<div>
    <div>
        @foreach ($task as $t)
        <div class="card">
          <div class="card-header bg-info">
            <strong class="text-light">Data Terbaru</strong>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $t->nama }}</h5>
            <h5 class="card-title">{{ $t->judul_task }}</h5>
            <p class="card-text">{{ $t->deskripsi_task }}</p>
          </div>
        </div>
        @endforeach
      
      </div>      
</div>
