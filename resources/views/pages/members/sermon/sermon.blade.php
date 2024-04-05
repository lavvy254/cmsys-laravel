@extends('layouts.navbars.usersidebar', ['page' => __('sermons'), 'pageSlug' => 'sermons'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Sermon </h4>
                    <p class="category"> Here is a table for Sermons</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
      
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Speaker</th>
                                    <th>Event Title</th>
                                    <th>Created at</th>
                                    
                                </tr>
                            </thead>
                            @foreach ($sermons as $sermon)
                                <tbody>
                                    <tr>
                                        <th>{{ $sermon->id }}</th>
                                        <th>{{ $sermon->title }}</th>
                                        <th>{{ $sermon->speaker }}</th>
                                        <th>{{ $sermon->Event->ename }}</th>
                                        <th>{{ $sermon->created_at }}</th>
                                        </td>
                                      
                                </tbody>
                            @endforeach
                            {{ $sermons->links('vendor.pagination.bootstrap-5') }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
