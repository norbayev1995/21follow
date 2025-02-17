@extends('layouts.app')
@section('title', 'Notifications')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Уведомления</h2>
            <div class="list-group">
                @foreach($allNotifications as $notification)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            {{ $notification->data['followed_name'] }}
                            <small class="text-muted d-block">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>

                        @if($notification->read_at === null)
                        <form action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Прочитано</button>
                        </form>
                        @else
                            <span class="text-muted">Прочитано</span>
                        @endif
                    </div>
                @endforeach
            </div>
        <a href="{{ route('users.index') }}" class="btn btn-">Back</a>
    </div>
@endsection
