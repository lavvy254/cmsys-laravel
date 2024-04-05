@extends('layouts.navbars.usersidebar', ['page' => __('Giving'), 'pageSlug' => 'giving'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Contributions </h4>
        <p class="category"> Here is a table for contributions eg, tithes,offerings</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="{{route('mpesa.index')}}" class="btn btn-sm btn-primary">Contribute</a> 
          <table class="table tablesorter " id="">
            <a href="{{route('giving.print')}}" class="btn btn-sm btn-primary text-end">Download</a> 
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Transaction</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Created at</th>
              </tr>
            </thead>
            @foreach ($givings as $giving )
            <tbody>
              <tr>
              <th>{{$giving->id}}</th>
                <th>{{$giving->User->fname}}</th>
                <th>{{$giving->transaction}}</th>
                <th>{{$giving->type}}</th>
                <th>{{$giving->amount}}</th>
                <th>{{$giving->created_at}}</th>
                </td>
            </tbody>
             @endforeach 
             {{ $givings->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
