<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;


class EditKanban extends Component
{

    public $taskId;
    public $title;

    public function mount($id)
    {
        $task = Task::findOrFail($id);

        if ($task) {
            $this->taskId = $task->id;
            $this->title = $task->title;
        }
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
        ]);

        if ($this->taskId) {

            $task = Task::find($this->taskId);

            if ($task) {
                $task->update([
                    'title' => $this->title,
                ]);
            }
        }
        session()->flash('message', 'Data Berhasil Diubah.');
        return redirect()->route('kanban');
    }
    public function render()
    {
        return view('livewire.edit-kanban')
            ->title('Edit Kanban');
    }
}
