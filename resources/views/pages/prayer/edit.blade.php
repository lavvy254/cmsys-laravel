@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Prayers</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('prayer.update',$prayer->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"  value="{{$prayer->title}}">
            @error('title')
             <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" >{{$prayer->description}}</textarea>
            @error('description')
              <p class="text-danger">{{$message}}</p>
          </div>
          @enderror
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
