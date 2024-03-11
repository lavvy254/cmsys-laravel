@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Groups</h4>
         </div>
           <div class="card-body">
        <form action="{{route('groups.update',$groups->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="gname">Group Name</label>
            <input type="text" name="gname" id="GroupName" class="form-control" placeholder="Enter Group Name" value="{{$groups->gname}}">
            @error('GroupName')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="users" class="form-label">Group Leader</label>
               <select class="form-control bg-dark" name="leader_id" id="leader_id">
                <option value="">Select Leaders</option>
                    @foreach ($leaders as $leader)
                     <option value="{{ $leader->id }}">{{ $leader->fname }}</option>
                    @endforeach
               </select>
               @error('user_id')
                <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{$groups->description}}</textarea>
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
