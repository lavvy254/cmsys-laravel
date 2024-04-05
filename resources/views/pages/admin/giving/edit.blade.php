@extends('layouts.app', ['page' => __('giving'), 'pageSlug' => 'giving'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Givings</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('giving.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $giving->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="card-body">
                            <form action="{{ route('giving.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" name="message" id="message" class="form-control"
                                        value="{{ $giving->message }}">
                                    @error('message')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
