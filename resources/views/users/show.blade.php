@extends('layouts.app')
@section('title', 'Users Profile')
@section('content')
    <div class="container mt-5">

        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $user->name }}</h3>
                <h5 class="card-subtitle text-muted">{{ $user->username }}</h5>
                <p class="mt-3"><strong>Email:</strong> {{ $user->email }}</p>
                @if(auth()->user()->isFollowing($user))
                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Follow</button>
                    </form>
                @endif
                <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Назад</a>
            </div>
        </div>
    </div>
@endsection
