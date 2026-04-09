<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Note</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Body</label>
                <textarea name="body" rows="5"
                          class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">{{ old('body') }}</textarea>
                @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Save Note
            </button>
            <a href="{{ route('notes.index') }}" class="ml-3 text-gray-500 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>