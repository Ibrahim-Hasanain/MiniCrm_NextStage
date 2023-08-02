@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Edit Company</h2>
        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                            placeholder="Company name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email"
                            value="{{ $company->email }}">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Address:</strong>
                        <input type="text" name="address" value="{{ $company->address }}" class="form-control"
                            placeholder="Company Address">
                        @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Logo:</strong>
                        <input type="file" name="logo" class="form-control" placeholder="Company logo">
                        @if ($company->logo)
                            <div class="mt-2">
                                <img src="{{ asset($company->logo) }}" alt="Company Logo" width="50">
                            </div>
                        @endif
                        @error('logo')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Website:</strong>
                        <input type="text" name="website" value="{{ $company->website }}" class="form-control"
                            placeholder="Company website">
                        @error('website')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button style="margin-top:10px " ="submit" class="btn btn-primary">Update</button>
            </div>
       </div>
    </form>
  </div>
@endsection
