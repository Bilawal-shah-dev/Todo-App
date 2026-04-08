@extends('layout')
@section('content')
<div class="max-w-3xl mx-auto p-4 pt-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📋 My Todo List</h1>
        <div class="flex gap-2">
            <a href="/bin" class="bg-gray-700 text-white px-4 py-2 rounded">🗑️ Bin</a>
            <form method="POST" action="/logout">@csrf <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button></form>
        </div>
    </div>

    {{-- Add Task Form --}}
    <form method="POST" action="/todo/add" class="bg-white p-4 rounded shadow mb-6 flex gap-2">
        @csrf
        <input type="text" name="task" placeholder="Enter new task..." class="flex-1 p-2 border rounded" required>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold">+ Add</button>
    </form>

    {{-- Tasks List --}}
    <div class="space-y-2">
        @foreach($todos as $todo)
        <div class="bg-white p-4 rounded shadow flex justify-between items-center">
            <div>{{ $todo->task }}</div>
            <div class="flex gap-2">
                <form method="POST" action="/todo/{{$todo->id}}/done">@csrf <button class="bg-green-500 text-white px-3 py-1 rounded">✅ Done</button></form>
                <form method="POST" action="/todo/{{$todo->id}}/delete">@csrf <button class="bg-red-500 text-white px-3 py-1 rounded">🗑️ Delete</button></form>
            </div>
        </div>
        @endforeach

        @if($todos->count() == 0)
        <div class="text-center py-12 text-gray-500">✅ No pending tasks! Great job.</div>
        @endif
    </div>

    <div class="mt-10 text-center">
        <form method="POST" action="/delete-account" onsubmit="return confirm('Are you sure? All data will be deleted forever!')">
            @csrf
            <button class="text-red-600 text-sm underline">⚠️ Delete My Account Permanently</button>
        </form>
    </div>
</div>
@endsection