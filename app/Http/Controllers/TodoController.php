<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController
{
    public function index(){
        $todos = auth()->user()->todos()->whereNull('deleted_at')->latest()->get();
        return view('dashboard', compact('todos'));
    }

    public function store(Request $request){
        $request->validate(['task' => 'required|min:2']);
        auth()->user()->todos()->create($request->only('task'));
        return back()->with('success','✅ Task added!');
    }

    public function markDone($id){
        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->update(['status'=>'done']);
        $todo->delete();
        return back()->with('success','✅ Task completed, moved to bin');
    }

    public function destroy($id){
        auth()->user()->todos()->findOrFail($id)->delete();
        return back()->with('success','✅ Task moved to bin');
    }

    public function bin(){
        $trashed = auth()->user()->todos()->onlyTrashed()->latest()->get();
        return view('bin', compact('trashed'));
    }

    public function restore($id){
        auth()->user()->todos()->onlyTrashed()->findOrFail($id)->restore();
        return back()->with('success','✅ Task restored');
    }

    public function permanentDelete($id){
        auth()->user()->todos()->onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success','✅ Task deleted forever');
    }
    public function update(Request $request, $id){
    $request->validate(['task' => 'required|min:2']);
    auth()->user()->todos()->findOrFail($id)->update($request->only('task'));
    return back()->with('success','✅ Task updated!');
}

}