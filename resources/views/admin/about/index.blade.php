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
            {{-- @foreach ($homes as $index => $v) --}}
            <tr>
                <td></td>
                <td><img src="" alt="" width="100"></td>
                <td></td>
                <td></td>
                <td>
                    <a href="" class="btn btn-success">Edit</a>
                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
