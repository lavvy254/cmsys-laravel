@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Prayers</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('prayerrequest.update', $prayer_request->id) }}" method="POST">
            <div class="row">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-3">
             <label for="prayer" class="form-label">Prayer Name</label>
                <select class="form-control bg-dark" name="prayer_id" id="prayer_id">
                 <option value="">Select Prayer</option>
                     @foreach ($prayers as $prayer)
                      <option value="{{ $prayer->id }}">{{ $prayer->title }}</option>
                     @endforeach
                </select>
                @error('prayer_id')
                 <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
             <label for="users" class="form-label">Full Name</label>
                <select class="form-control bg-dark " name="user_id" id="user_id">
                 <option value="">Select Users</option>
                     @foreach ($users as $user)
                      <option value="{{ $user->id }}">{{ $user->fname }}</option>
                     @endforeach
                </select>
                @error('user_id')
                 <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
               <select class="form-control bg-dark" name="status" id="status">
                 <option value="pending">Pending</option>
                 <option value="Answered">Answered</option>
              </select>
            </div>
            @error('status')
             <span class="text-danger">{{ $message}}</span>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection
