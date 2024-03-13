@extends('layouts.app', ['page' => __('announcemets'), 'pageSlug' => 'announcements'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Announcements</h4>
         </div>
           <div class="card-body">
        <form action="{{route('sermon.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
            @error('title')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="Speaker">Speaker</label>
            <input type="text" name="speaker" id="speaker" class="form-control" placeholder="Enter Speaker">
            @error('speaker')
              <p class="text-danger">{{$message}}</p>
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
