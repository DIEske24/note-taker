<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">{{ $note->title }}</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4">
        <div class="bg-white shadow rounded p-6">
            <p class="text-gray-700 whitespace-pre-line">{{ $note->body }}</p>
            <div class="mt-6 flex gap-3">
                <a href="{{ route('notes.edit', $note) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST"
                      onsubmit="return confirm('Delete this note?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                </form>
                <a href="{{ route('notes.index') }}" class="text-gray-500 hover:underline self-center ml-2">← Back</a>
            </div>
        </div>
    </div>
</x-app-layout>