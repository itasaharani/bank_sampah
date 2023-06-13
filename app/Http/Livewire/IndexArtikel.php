<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Artikel;

class IndexArtikel extends Component
{
    protected $listeners = [
        'indexArtikel'
    ];

    public function render()
    {
        $art = Artikel::orderBy('id', 'desc')->limit(1)->get(); 
        return view('livewire.index-artikel',['art' => $art]);
    }

    public function indexArtikel($artikel)
    {

    }
}
