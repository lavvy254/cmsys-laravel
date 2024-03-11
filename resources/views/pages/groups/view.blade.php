@extends('layouts.app', ['page' => __('gmembers'), 'pageSlug' => 'gmembers'])

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
          <a href="" class="btn btn-sm btn-primary">Add Group</a> 
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>Group Name</th>
                <th>Leader fname</th>
                <th>Leader lname</th>
                <th>Description</th>
                <th>Created at</th>
                <th class="align-middle">Action</th>
              </tr>
            </thead>
            @foreach ($groups as $group )
            <tbody>
              <tr>
              <th>{{$group->id}}</th>
                <th>{{$group->gname}}</th>
                <th>{{$group->User->fname}}</th>
                <th>{{$group->User->lname}}</th>
                <th>{{$group->description}}</th>
                <th>{{$group->created_at}}</th>
                </td>
                <td class="align-middle">
                  <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                  </a>
                  <form action="" method="POST"
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
             {{ $groups->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
