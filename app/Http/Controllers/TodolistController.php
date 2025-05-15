<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index(){
        $tasks = Task::all();

        return view('home',[
            'tasks'=>$tasks
        ]);
    }

    public function create(){
        return view('tambah');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
        'task'=>'required|min:5|max:255',
    ]);

    Task::create([
        'task'=> $validation['task'],
        'tanggal'=>now()
    ]);

    return redirect('/');
    }

    public function destroy($id)
    {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect('/')->with('success', 'Task berhasil dihapus!');
    }

    public function edit(Request $request){
        $task= Task::find($request->id);

        return view('edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request){
        $validation = $request->validate([
            'task'=>'required|min:5|max:255',
        ]);

        Task::where('id', $request->id)->update([
            'task'=> $validation['task'],
            'tanggal'=>now()
        ]);

        return redirect('/');
    }
}
