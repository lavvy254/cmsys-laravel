@extends('layouts.app', ['page' => __('attendance'), 'pageSlug' => 'attendance'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Attendance</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('attendance.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="users" class="form-label">Users</label>
                            <select class="form-control bg-dark" name="user_id" id="user_id">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fname }}</option>
                                @endforeach
                            </select>
                            @error('User')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="users" class="form-label">Events</label>
                            <select class="form-control bg-dark" name="event_id" id="event_id">
                                <option value="">Select Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->ename }}</option>
                                @endforeach
                            </select>
                            @error('Event')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
