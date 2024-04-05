@extends('layouts.app', ['page' => __('events'), 'pageSlug' => 'events'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Event </h4>
        <p class="category"> Here is a table for Events</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="{{route('event.create')}}" class="btn btn-sm btn-primary"> Add Event</a> 
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>EVENT NAME</th>
                <th>LOCATION</th>
                <th>DESCRIPTION</th>
                <th class="align-middle">ACTION</th>
              </tr>
            </thead>
            @foreach ($events as $event )
            <tbody>
              <tr>
                <th>{{$event->id}}</th>
                <th>{{$event->event name}}</th>
                <th>{{$event->location}}</th>
                <th>{{$event->description}}</th>
                
                </td>
                <td class="align-middle">
                  <a rel="tooltip" class="btn btn-success btn-link" href="{{route('event.edit',$event->id)}}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                  </a>
                  <form action="{{route('events.delete',$event->id)}}" method="POST"
                      class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-link"
                          data-original-title="Delete" title="Delete">
                          <i class="material-icons">close</i>
                          <div class="ripple-container"></div>
          
                      </button>
                  </form>
              </td>
            </tbody>
             @endforeach 
             {{ $events->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
