@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Companies</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                    <th>Company Logo</th>
                    <th>Company Website</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email ??'N/A'}}</td>
                        <td>{{ $company->address ??'N/A' }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset($company->logo) }}" alt="Company Logo" width="100" height="100">
                            @else
                                No Logo
                            @endif
                        </td>
                        <td>{{ $company->website ??'N/A' }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    </div>
@endsection
