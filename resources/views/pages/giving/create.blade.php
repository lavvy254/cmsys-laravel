@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Prayers</h4>
      </div>
      <div class="card-body">
        <form action="" method="POST">
            <div class="row">
            @csrf
            @method('PUT')
            <div class=" col-md-6 mb-3">
             <label for="prayer" class="form-label">First Name</label>
                <select class="form-control text-white bg-dark" name="user_id" id="user_id">
                 <option value="">Select Member</option>
                     @foreach ($members as $member)
                      <option value="{{ $member->id }}">{{ $member->fname }}</option>
                     @endforeach
                </select>
                @error('user_id')
                 <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          
       
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection
