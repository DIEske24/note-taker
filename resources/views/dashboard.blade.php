<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
            <a href="{{ route('notes.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                + Create Note
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto px-4">

        <!-- Welcome Message -->
        <div class="mb-6">
            <h3 class="text-2xl font-bold text-gray-700">Welcome back, {{ auth()->user()->name }}! 👋</h3>
            <p class="text-gray-500 mt-1">Here are all your notes.</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Notes Grid -->
        @php
            $notes = auth()->user()->notes()->latest()->get();
        @endphp

        @if($notes->isEmpty())
            <div class="text-center py-20">
                <p class="text-gray-400 text-lg">No notes yet.</p>
                <a href="{{ route('notes.create') }}"
                   class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Create your first note
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($notes as $note)
                    <div class="bg-white shadow rounded-xl p-5 hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">{{ $note->title }}</h4>
                            <p class="text-gray-500 text-sm">{{ Str::limit($note->body, 120) }}</p>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xs text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
                            <div class="flex gap-3">
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
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>