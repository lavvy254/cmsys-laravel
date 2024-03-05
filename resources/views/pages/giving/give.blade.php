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
        <div class="table-responsive">
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
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
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
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
