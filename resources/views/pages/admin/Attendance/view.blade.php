@extends('layouts.app', ['page' => __('attendance'), 'pageSlug' => 'attendance'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="button-close" data-bs-dismiss="alert" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  
  @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="button-close" data-bs-dismiss="alert" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
      <div class="card-header">
        <h4 class="card-title"> Attendance</h4>
        <p class="category"> Here is a table for attendance</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="{{route('attendance.create')}}" class="btn btn-sm btn-primary">Add Attendance</a> 
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Event Name</th>
                <th class="align-middle">Action</th>
              </tr>
            </thead>
            @foreach ($attendance as $attend )
            <tbody>
              <tr>
              <th>{{$attend->id}}</th>
                <th>{{$attend->User->fname}}</th>
                <th>{{$attend->Event->ename}}</th>
                </td>
                <td class="align-middle">
                  
                  <form action="{{route('attendance.delete',$attend->id)}}" method="POST"
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
             {{ $attendance->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
