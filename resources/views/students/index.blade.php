@extends('component.layout')

@section('content')
    <h2>Students list</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Do you want to delete this student?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
@endsection
