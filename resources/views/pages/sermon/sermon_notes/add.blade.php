@extends('layouts.app', ['page' => __('sermons'), 'pageSlug' => 'sermons'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add Sermon Notes</h4>
         </div>
           <div class="card-body">
        <form action="{{route('snote.store')}}" method="POST">
          @csrf
          <div class="col-md-6 mb-3">
            <label for="users" class="form-label">Sermon</label>
               <select class="form-control bg-dark" name="sermon_id" id="sermon_id">
                <option value="">Select Sermon</option>
                    @foreach ($sermons as $sermon )
                     <option value="{{ $sermon->id }}">{{ $sermon->title}}</option>
                    @endforeach
               </select>
               @error('Sermon')
                <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
          <div class="form-group">
            <label for="Speaker">Notes</label>
            <textarea name="notes" id="notes" class="form-control" placeholder="Enter Notes"></textarea>
            @error('Notes')
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
