@extends('layouts.navbars.usersidebar', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h1>Upcoming Events</h1>
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
                            @foreach ($events as $event)
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
                                            {{ $event->starts_at }}
                                        </td>
                                    </tr>
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
