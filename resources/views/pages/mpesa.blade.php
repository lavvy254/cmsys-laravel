  <style>
    @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap");

    body {
      background-color: #eaedf4;
      font-family: "Rubik", sans-serif;
    }

    .card {
      width: 310px;
      border: none;
      border-radius: 15px;
    }

    .justify-content-around div {
      border: none;
      border-radius: 20px;
      background: #f3f4f6;
      padding: 5px 20px 5px;
      color: #8d9297;
    }

    .justify-content-around span {
      font-size: 12px;
    }

    .justify-content-around div:hover {
      background: #545ebd;
      color: #fff;
      cursor: pointer;
    }

    .justify-content-around div:nth-child(1) {
      background: #545ebd;
      color: #fff;
    }

    span.mt-0 {
      color: #8d9297;
      font-size: 12px;
    }

    h6 {
      font-size: 15px;
    }

    .mpesa {
      background-color: green !important;
    }

    img {
      border-radius: 15px;
    }
  </style>
 @if(Auth()->user()->roles == "admin")
    @extends('layouts.app', ['page' => __('Mpesa'), 'pageSlug' => 'Mpesa'])
@else
    @extends('layouts.navbars.usersidebar', ['page' => __('Mpesa'), 'pageSlug' => 'Mpesa'])
@endif
@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="{{ asset('images/1200px-M-PESA_LOGO-01.svg.png') }}" alt="M-PESA Logo" class="mr-3" height="75">
          </div>
          <div class="col-md-6">
            <h4 class="card-title text-right">Mpesa Payment</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="mt-4">
          <form action="stk_initiate.php" method="POST">
            <div class="form-group">
              <label for="amount">Amount to be paid (Ksh)</label>
              <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
            </div>
            <button type="submit" class="btn btn-success">Pay</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
