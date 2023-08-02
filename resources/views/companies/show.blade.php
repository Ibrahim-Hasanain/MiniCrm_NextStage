@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Company Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('companies.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Company Name</b></label>
                <div class="col-sm-10">
                    {{ $company->name ??'N/A'}}
                 </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Company Email</b></label>
                <div class="col-sm-10">
                    {{ $company->email ??'N/A' }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Company Address</b></label>
                <div class="col-sm-10">
                    {{ $company->address ??'N/A'}}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Company Logo</b></label>
                <div class="col-sm-10">
                    @if ($company->logo)
                    <img src="{{ asset($company->logo) }}" alt="Company Logo" class="img-fluid rounded">
                @else
                    <p class="card-text">No logo available</p>
                @endif
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Company Website</b></label>
                <div class="col-sm-10">
                    {{ $company->website ??'N/A'}}
                </div>
            </div>
        </div>
    </div>
@endsection
