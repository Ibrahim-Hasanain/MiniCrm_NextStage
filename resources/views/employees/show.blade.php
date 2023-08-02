@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Employee Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Employee Name</b></label>
                <div class="col-sm-10">
                    {{ $employee->first_name }} {{ $employee->last_name }}
                     </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Company name</b></label>
                <div class="col-sm-10">
                    {{ $employee->company->name??'N/A' }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Employee Email</b></label>
                <div class="col-sm-10">
                    {{ $employee->email ??'N/A'}}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Employee Phone</b></label>
                <div class="col-sm-10">
                    {{ $employee->phone ??'N/A'}}
                </div>
            </div>
        </div>
    </div>
@endsection
