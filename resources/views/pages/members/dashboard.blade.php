@extends('layouts.navbars.usersidebar', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h1>Upcoming Events</h1>
                     <p class="category">Upcoming Events for the next 3 Weeks</p>
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
                                    <th>
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($upcomingEvents as $event)
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $event->id }}
                                        </td>
                                        <td>
                                            {{ $event->ename }}
                                        </td>
                                        <td>
                                            {{ $event->location }}
                                        </td>
                                        <td>
                                            {{ $event->description }}
                                        </td>
                                        <td>
                                            {{ $event->start_date }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
     <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title">Announcements</h4>
        <p class="category">Announcements!Announcements!</p>
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
                  Title
                </th>
                <th>
                  Message
                </th>
                <th>
                  Created At
                </th>
                <th class="text-center"></th>
                
              </tr>
            </thead>
            @foreach ($announcements as $announcement)
            <tbody>
              <tr>
                <td>
                  {{$announcement->id}}
                </td>
                <td>
                  {{$announcement->title}}
                </td>
                <td>
                  {{$announcement->message}}
                </td>
                <td>
                  {{$announcement->created_at}}
                </td>
            </tbody>
             @endforeach
             {{ $announcements->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
