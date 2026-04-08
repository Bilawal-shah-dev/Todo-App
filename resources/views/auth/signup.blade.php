@extends('layout')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">📝 Sign Up</h2>
        <form method="POST" action="/signup">
            @csrf
            <div class="mb-3">
                <label class="block mb-1 font-medium">Full Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 font-medium">Username</label>
                <input type="text" name="username" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-5">
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required minlength="4">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white p-2 rounded font-bold">Create Account</button>
            <p class="mt-4 text-center">Already have account? <a href="/" class="text-blue-600 font-medium">Login here</a></p>
        </form>
    </div>
</div>
@endsection