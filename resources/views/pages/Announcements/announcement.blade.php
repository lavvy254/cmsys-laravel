@extends('layouts.app', ['page' => __('announcements'), 'pageSlug' => 'announcemens'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Announcement </h4>
        <p class="category"> Here is a table for Announcements</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="{{route('sermon.create')}}" class="btn btn-sm btn-primary"> Add Announcement</a> 
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>message</th>
                <th class="align-middle">Action</th>
              </tr>
            </thead>
            @foreach ($announcements as $announcement )
            <tbody>
              <tr>
                <th>{{$announcement->id}}</th>
                <th>{{$announcement->title}}</th>
                <th>{{$announcement->message}}</th>
                
                </td>
                <td class="align-middle">
                  <a rel="tooltip" class="btn btn-success btn-link" href="{{route('announcement.edit',$announcement->id)}}" data-original-title="" title="">
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
             {{ $announcements->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
