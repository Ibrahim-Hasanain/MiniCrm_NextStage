@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Employee</h2>
        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        @error('first_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        @error('last_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company</strong>
                        <select class="form-control" id="company_id" name="company_id" placeholder="Company">
                            <option value="" selected disabled>Select Company</option>
                            @foreach ($companies as $key => $name)
                                <option value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="text" class="form-control" name="phone" placeholder="phone">
                        @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br> <br>
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
