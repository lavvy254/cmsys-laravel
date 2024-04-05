@extends('layouts.app', ['page' => __('events'), 'pageSlug' => 'events'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Events</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('event.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Event Name</label>
                            <input type="text" name="ename" id="ename" class="form-control">
                            @error('event name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Location</label>
                            <input type="text" name="location" id="location" class="form-control">
                            @error('location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label for="title">Start Date</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control">
                            @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">End Date</label>
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                            @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
