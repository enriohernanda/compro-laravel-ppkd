@extends('admin.app')
@section('title', 'Instructor Menu')
@section('content')
<div class="table-responsive">
    <div class="d-flex justify-content-end">
        <a href="{{ route('instructoradmin.create') }}" class="btn btn-info my-2">Add</a>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Major</th>
                <th>Social</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $index => $v)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><img src="{{ asset('storage/' . $v->image) }}" alt="" width="100"></td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->major }}</td>
                <td>
                    <ul>
                        @foreach ($v->social as $i)
                        <li>{{ $i }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('instructoradmin.edit', $v->id) }}" class="btn btn-success">Edit</a>
                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
