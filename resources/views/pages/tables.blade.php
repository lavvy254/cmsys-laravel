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
                  Title
                </th>
                <th>
                  Description
                </th>
                <th class="text-center">
                  
                </th>
              </tr>
            </thead>
            @foreach ($prayers as $prayer)
            <tbody>
              <tr>
                <td>
                  {{$prayer->id}}
                </td>
                <td>
                  {{$prayer->title}}
                </td>
                <td>
                  {{$prayer->description}}
                </td>
                  <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="">Edit</a>
                            <form action="" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item" >Delete</button>
                            </form>
                          </div>
                      </div>
                </td>
              </tr>
            </tbody>
            @endforeach
            {{ $prayers->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> REQUESTED PRAYES</h4>
        <p class="category"> Here is a table for prayer requests</p>
        <a href="#" class="btn btn-sm btn-primary">Add Request</a>
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
                  Prayer Name
                </th>
                <th>
                  First Name
                </th>
                <th>
                  Status
                </th>
                <th class="text-center"></th>
                
              </tr>
            </thead>
            @foreach ($prayerrequests as $prayerrequest)
            <tbody>
              <tr>
                <td>
                  {{$prayerrequest->id}}
                </td>
                <td>
                  {{$prayerrequest->Prayer->title}}
                </td>
                <td>
                  {{$prayerrequest->User->fname}}
                </td>
                <td>
                  {{$prayerrequest->status}}
                </td>
                </td>
                  <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <form action="" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item" >Delete</button>
              </tr>
              <td class="text-center">

              </td>
            </tbody>
             @endforeach
             {{ $prayerrequests->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
