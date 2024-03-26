@extends('layouts.app', ['page' => __('gmembers'), 'pageSlug' => 'gmembers'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Group members</h4>
         </div>
           <div class="card-body">
        <form action="{{route('gmembers.store')}}" method="POST">
          @csrf
          <div class="col-md-6 mb-3">
            <label for="users" class="form-label">Group Name</label>
               <select class="form-control bg-dark" name="group_id" id="group_id">
                <option value="">Select Group</option>
                    @foreach ($groups as $group)
                     <option value="{{ $group->id }}">{{ $group->gname }}</option>
                    @endforeach
               </select>
               @error('user_id')
                <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
          <div class="col-md-6 mb-3">
            <label for="users" class="form-label">Group Members</label>
               <select class="form-control bg-dark" name="user_id" id="user_id">
                <option value="">Select Member</option>
                    @foreach ($members as $member)
                     <option value="{{ $member->id }}">{{ $member->fname }}</option>
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
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
