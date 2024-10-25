<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\Title;


#[Title('Kanban Board')]
class KanbanBoard extends Component
{
    public $tasks;

    public function destroy($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //refresh data
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
        $this->tasks = Task::orderBy('updated_at', 'desc')->get();
    }

    public function mount()
    {
        // Ambil data yang sudah diurutkan
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
        $this->tasks = Task::orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.kanban-board', ['tasks' => $this->tasks]); // kirim data ke view
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::find($taskId);
        $task->status = $newStatus;
        $task->save();

        // Refresh task list
        $this->tasks = Task::orderBy('created_at', 'desc')->get();  // refresh data setelah update
        $this->tasks = Task::orderBy('updated_at', 'desc')->get();  // refresh data setelah update
    }
}
