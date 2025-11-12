@extends('admin.app')
@section('title', 'About Menu')
@section('content')
<div class="table-responsive">
    <div class="d-flex justify-content-end">
        <a href="{{ route('aboutadmin.create') }}" class="btn btn-info my-2">Add</a>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Features</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $index => $v)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><img src="{{ asset('storage/' . $v->image) }}" alt="" width="100"></td>
                <td>{{ $v->title }}</td>
                <td>
                    <ul>
                        @foreach ($v->features as $i)
                        <li>{{ $i }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('aboutadmin.edit', $v->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('aboutadmin.destroy', $v->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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
