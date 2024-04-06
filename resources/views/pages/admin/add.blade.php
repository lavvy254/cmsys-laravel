@extends('layouts.app', ['page' => __('announcemets'), 'pageSlug' => 'announcements'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Announcements</h4>
         </div>
           <div class="card-body">
        <form action="{{route('announcement.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
            @error('title')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="Message">Message</label>
            <input type="text" name="message" id="message" class="form-control" placeholder="Enter Message">
            @error('message')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
