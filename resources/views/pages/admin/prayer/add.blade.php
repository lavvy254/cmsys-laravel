@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add types Prayer</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('prayer.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
            @error('title')
              <p class="text-danger">{{$message}}</p>
          </div>
          @enderror
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>
            @error('description')
              <p class="text-danger">{{$message}}</p>
          </div>
          @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
