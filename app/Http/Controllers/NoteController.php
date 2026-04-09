<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        auth()->user()->notes()->create($request->only('title', 'body'));

        return redirect()->route('notes.index')->with('success', 'Note created!');
    }

    public function show(Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);

        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        $note->update($request->only('title', 'body'));

        return redirect()->route('notes.index')->with('success', 'Note updated!');
    }

    public function destroy(Note $note)
    {
        abort_if($note->user_id !== auth()->id(), 403);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted!');
    }
}