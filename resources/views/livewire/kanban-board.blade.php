<div>
    <h1 class="mt-4 ml-12"><b>Kanban Board by Laravel Livewire</b></h1>
<div class="flex space-x-4 ml-12 mr-12 rounded">
    @foreach (['Queue', 'In Progress', 'Completed'] as $status)
        <div class="w-1/3 bg-black text-white p-4 rounded">
            <h2 class="font-bold mb-2">{{ $status }}</h2>
            <div class="space-y-2 bg-black" ondrop="drop(event, '{{ $status }}')" ondragover="allowDrop(event)">
                @foreach ($tasks->where('status', $status) as $task)
                    <div class="bg-gray-800 p-2 rounded shadow" draggable="true" ondragstart="drag(event, {{ $task->id }})">
                        {{ $task->title }}
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
</script>
