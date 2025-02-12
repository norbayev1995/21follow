@extends('layouts.app')
@section('title', 'Notifications')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Уведомления</h2>
        @if ($notifications->isEmpty())
            <div class="alert alert-info text-center">Нет новых уведомлений</div>
        @else
            <div class="list-group">
                @foreach($notifications as $notification)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            {{ $notification->data['followed_name'] }}
                            <small class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <form action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Прочитано</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="{{ route('users.index') }}" class="btn btn-">Back</a>
    </div>
@endsection
