@extends('layout')
@section('content')
<div class="max-w-3xl mx-auto p-4 pt-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">🗑️ Trash Bin</h1>
        <a href="/dashboard" class="bg-blue-600 text-white px-4 py-2 rounded">← Back To Todo</a>
    </div>

    <p class="mb-4 text-gray-600">⚠️ All items here will be AUTO DELETED permanently after 24 Hours</p>

    <div class="space-y-2">
        @foreach($trashed as $item)
        <div class="bg-white p-4 rounded shadow flex justify-between items-center">
            <div>
                <div>{{ $item->task }}</div>
                <div class="text-xs text-gray-500">Deleted: {{ $item->deleted_at->diffForHumans() }}</div>
            </div>
            <div class="flex gap-2">
                <form method="POST" action="/bin/{{$item->id}}/restore">@csrf <button class="bg-blue-500 text-white px-3 py-1 rounded">↩️ Restore</button></form>
                <form method="POST" action="/bin/{{$item->id}}/permanent-delete">@csrf <button class="bg-red-700 text-white px-3 py-1 rounded">❌ Delete Forever</button></form>
            </div>
        </div>
        @endforeach

        @if($trashed->count() == 0)
        <div class="text-center py-12 text-gray-500">Bin is empty</div>
        @endif
    </div>
</div>
@endsection