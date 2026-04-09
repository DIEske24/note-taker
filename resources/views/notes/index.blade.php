<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">My Notes</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('notes.create') }}"
           class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + New Note
        </a>

        @forelse($notes as $note)
            <div class="bg-white shadow rounded p-4 mb-4">
                <h3 class="text-lg font-bold">{{ $note->title }}</h3>
                <p class="text-gray-600 mt-1">{{ Str::limit($note->body, 100) }}</p>
                <div class="mt-3 flex gap-2">
                    <a href="{{ route('notes.show', $note) }}"
                       class="text-blue-600 hover:underline text-sm">View</a>
                    <a href="{{ route('notes.edit', $note) }}"
                       class="text-yellow-600 hover:underline text-sm">Edit</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST"
                          onsubmit="return confirm('Delete this note?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline text-sm">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No notes yet. Create one!</p>
        @endforelse
    </div>
</x-app-layout>