@extends('layouts.navbars.usersidebar', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Prayer Request</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('prayerrequest.store') }}" method="POST">
          @csrf
          <div class=" col-md-6 mb-3">
            <label for="prayer" class="form-label">Prayer</label>
               <select class="form-control text-white bg-dark" name="prayer_id" id="prayer_id">
                <option value="">Select Prayer</option>
                    @foreach ($prayers as $prayer)
                     <option value="{{ $prayer->id }}">{{ $prayer->title }}</option>
                    @endforeach
               </select>
               @error('user_id')
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
