<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Task;

class IndexTask extends Component
{
    protected $listeners = [
        'indexTask'
    ];
    
    public function render()
    {
        $task = Task::orderBy('id','desc')->paginate(10); //pengurutan data menggunakan descending dari yang terbesar dan menampilkan data dengan metode limit ditambahkan metode get
        return view('livewire.index-task', ['task'=> $task]);//untuk memanggil variabel $art
    }

    public function indexTask($task)
    {

    }

}
