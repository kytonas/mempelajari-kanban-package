<div class="ml-12 mt-6">
    <!-- Tombol untuk membuka modal -->
    <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Add task
    </button>

    <!-- Modal -->
    <div id="taskModal" class="fixed inset-0 flex items-center justify-center z-50 hidden" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg font-bold mb-4">Create New Task</h2>
            <form wire:submit.prevent="store">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">TITLE</label>
                    <input type="text" wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" placeholder="Insert Title" required>
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        SAVE
                    </button>
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        CANCEL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('taskModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
    }
</script>
