@extends('layout')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">🔐 Login</h2>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Username</label>
                <input type="text" name="username" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-5">
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded font-bold">Login</button>
            <p class="mt-4 text-center">No account? <a href="/signup" class="text-blue-600 font-medium">Sign Up here</a></p>
        </form>
    </div>
</div>
@endsection