@extends('layouts.navbars.usersidebar', ['page' => __('groups'), 'pageSlug' => 'groups'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Groups</h4>
                    <p class="category"> Here is a table for groups</p>
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
                                        <td>{{ $group->created_at }}</td>
                                        <td>
                                            @if ($group->isMember(auth()->id()))
                                            <span class="text-success">You are a member</span>
                                        @else
                                            <form action="{{ route('group.join') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                                <button type="submit" class="btn btn-sm btn-primary">Join Group</button>
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
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
