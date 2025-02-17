@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <a href="{{ route('logout') }}" class="btn btn-warning col-md-2">Logout</a>
            @if(auth()->user()->unreadNotifications())
                <a href="{{route('notifications.index')}}" class="btn btn-primary col-md-2 mx-1">Notification</a>
            @endif
        </div>
        <h2 class="text-center mb-4">Список пользователей</h2>
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <h6 class="card-subtitle text-muted">{{ $user->username }}</h6>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <a href="{{ route('users.show', $user->username) }}" class="btn btn-primary">Профиль</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
