@extends('layouts.navbars.usersidebar', ['page' => __('groups'), 'pageSlug' => 'groups'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Groups</h4>
                    <p class="category"> Here is a table for groups</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="" class="btn btn-sm btn-primary">Join Group</a>
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Group Name</th>
                                    <th>Leader fname</th>
                                    <th>Leader lname</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($groups as $group)
                                <tbody>
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->gname }}</td>
                                        <td>{{ $group->User->fname }}</td>
                                        <td>{{ $group->User->lname }}</td>
                                        <td>{{ $group->description }}</td>
                                d       <td>{{ $group->created_at }}</td>
                                        </td>
                                        
                                        
                                        </td>
                                </tbody>
                            @endforeach
                            {{ $groups->links('vendor.pagination.bootstrap-5') }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
