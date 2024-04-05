@extends('layouts.app', ['page' => __('Giving'), 'pageSlug' => 'giving'])

@section('content')
<div class="row">
   <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Contributions </h4>
        <p class="category"> Here is a table for contributions eg, tithes,offerings</p>
      </div>
      <div class="card-body">
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

        <div class="table-responsive">
          <a href="{{route('mpesa.index')}}" class="btn btn-sm btn-primary">Contribute</a> 
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Transaction</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Created at</th>
                <th class="align-middle">Action</th>
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
                <td class="align-middle">

                  <form action="{{route('givings.delete',$giving->id)}}" method="POST"
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
             {{ $givings->links('vendor.pagination.bootstrap-5') }}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
