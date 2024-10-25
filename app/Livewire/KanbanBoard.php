<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class KanbanBoard extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function render()
    {
        return view('livewire.kanban-board');
    }

     public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::find($taskId);
        $task->status = $newStatus;
        $task->save();

        // Refresh task list
        $this->tasks = Task::all();
    }
}
