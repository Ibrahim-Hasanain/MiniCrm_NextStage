@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employees</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email ??'N/A'}}</td>
                        <td>{{ $employee->phone ??'N/A'}}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post"
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
        {!! $employees->links() !!}
    </div>
@endsection
