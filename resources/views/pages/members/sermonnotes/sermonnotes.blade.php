@extends('layouts.navbars.usersidebar', ['page' => __('sermons'), 'pageSlug' => 'sermons'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Sermon Notes</h4>
        <p class="category"> Here is a table for Sermon Notes</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Notes</th>
                <th>Created at</th>
                
              </tr>
            </thead>
            @foreach ($snotes as $snote )
            <tbody>
              <tr>
                <th>{{$snote->id}}</th>
                <th>{{$snote->Sermon->title}}</th>
                <th>{{$snote->notes}}</th>
                <th>{{$snote->created_at}}</th>
                </td>
               
            </tbody>
             @endforeach 
             {{ $snotes->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
