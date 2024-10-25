<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class CreateKanban extends Component
{

    public $title;

    /**
     * destroy function
     */
    

    public function store()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $task = Task::create([
            'title' => $this->title,
        ]);
        session()->flash('message', 'Data Berhasil Disimpan.');

        return redirect()->route('kanban');
    }
    public function render()
    {
        return view('livewire.create-kanban');
    }
}
