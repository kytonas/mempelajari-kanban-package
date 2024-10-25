<div class="max-w-md mx-auto mt-6">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form wire:submit.prevent="update">
            <input type="hidden" wire:model="taskId">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">TITLE</label>
                <input type="text" wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" placeholder="Insert Title">
                @error('title')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    UPDATE
                </button>

                <a href="{{ route('kanban') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        BACK
                </a>
            </div>
        </form>
    </div>
</div>
