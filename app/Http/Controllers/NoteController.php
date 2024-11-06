<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller{
    function index(){
        return Note::all();
    }
    function store(Request $request){
//        $validatedData = $request->validate([
//            'title' => 'required',
//            'content' => 'required'
//        ]);
        $colores = ['red', 'green', 'blue', 'grey', 'orange'];
        $color = $colores[array_rand($colores)];
        $date = date('Y-m-d H:i:s');
        $request->merge(['date' => $date]);
        $request->merge(['color' => $color]);
        return Note::create($request->all());
    }
    function show($id){
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        return $note;
    }
    function update(Request $request, $id){
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return $note;
    }
    function destroy($id){
        $note = Note::findOrFail($id);
        $note->delete();
        return $note;
    }
}
