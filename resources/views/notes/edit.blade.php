<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Note</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4">
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $note->title) }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Body</label>
                <textarea name="body" rows="5"
                          class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">{{ old('body', $note->body) }}</textarea>
                @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600">
                Update Note
            </button>
            <a href="{{ route('notes.index') }}" class="ml-3 text-gray-500 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>