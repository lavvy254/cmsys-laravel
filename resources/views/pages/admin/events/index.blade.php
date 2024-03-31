@extends('layouts.app', ['page' => __('Events'), 'pageSlug' => 'events'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Event</h4>
      </div>
      @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
                    
        @if (session('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
           {{ session('error') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
          </div>
          @endif
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter" id="">
            <thead class="text-primary">
              <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Location</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
              <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->ename }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->description }}</td>
                <td>
                  @if (!auth()->user()->eventsAttended->contains($event))
                  @if (now() < $event->start_date)
                    <span class="text-warning">Event has not started yet</span>
                  @elseif (now() > $event->end_date)
                    <span class="text-danger">Event has ended</span>
                  @else
                    <form action="{{ route('events.attend', $event->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-primary">Attend</button>
                    </form>
                  @endif
                @else
                  <span class="text-success">Attended</span>
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
             {{ $events->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
