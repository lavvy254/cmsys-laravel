@extends('layouts.navbars.usersidebar', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Prayer Request</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('prayer.store') }}" method="POST">
          @csrf
          <div class=" col-md-6 mb-3">
            <label for="prayer" class="form-label">Prayer</label>
               <select class="form-control text-white bg-dark" name="user_id" id="user_id">
                <option value="">Select Prayer</option>
                    @foreach ($prayers as $prayer)
                     <option value="{{ $prayer->id }}">{{ $prayer->title }}</option>
                    @endforeach
               </select>
               @error('user_id')
                <span class="text-danger">{{ $message }}</span>
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
