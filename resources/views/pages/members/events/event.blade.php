@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Prayer Table</h4>
        <a href="{{route('prayer.add')}}"class="btn btn-sm btn-primary">Add Prayer</a>
      </div>
    
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  ID
                </th>
                <th>
                  Event Name
                </th>
                <th>
                  Location
                </th>
                <th>
                   Description
                  </th>
              </tr>
            </thead>
            @foreach ($events as $event)
            <tbody>
              <tr>
                <td>
                  {{$event->id}}
                </td>
                <td>
                  {{$event->ename}}
                </td>
                <td>
                    {{$event->location}}
                  </td>
                <td>
                  {{$event->description}}
                </td>
              </tr>
            </tbody>
            @endforeach
            {{ $event->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
