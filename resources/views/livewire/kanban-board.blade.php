<div>
    <h1 class="mt-4 ml-12 mb-4 text-3xl font-bold text-gray-900">
        Kanban Board by Laravel Livewire
    </h1>
    @livewire('create-kanban')
    @if (session()->has('message'))
        <div class="mb-4 text-sm text-green-600 bg-green-100 rounded-lg p-4 ml-12 mr-12 mt-4" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex space-x-4 ml-12 mr-12 mt-4">
        @foreach (['Queue', 'In Progress', 'Completed'] as $status)
            <div class="w-1/3 bg-black text-white p-4 rounded" ondrop="drop(event, '{{ $status }}')"
                ondragover="allowDrop(event)">
                <h2 class="font-bold mb-2">{{ $status }}</h2>
                <div class="space-y-2 bg-black">
                    @foreach ($tasks->where('status', $status) as $task)
                        <div class="bg-gray-800 p-2 rounded shadow-lg justify-between items-center" draggable="true"
                            ondragstart="drag(event, {{ $task->id }})">
                            <span class="space-x-4 space-y-4 flex mb-4">{{ $task->title }}</span>
                            <a href="{{ route('editkanban', $task->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">EDIT</a>
                            <button onclick="confirmDelete({{ $task->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">DELETE</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev, taskId) {
        ev.dataTransfer.setData("taskId", taskId);
    }

    function drop(ev, newStatus) {
        ev.preventDefault();
        var taskId = ev.dataTransfer.getData("taskId");
        @this.updateTaskStatus(taskId, newStatus);
    }

    function confirmDelete(taskId) {
        if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
            @this.call('destroy', taskId);
        }
    }
</script>
