@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-3">Login</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('registerPage') }}">Register</a>
            </div>
        </div>
    </div>
@endsection
