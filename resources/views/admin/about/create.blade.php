@extends('admin.app')
@section('title', 'About Create')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h1 class="text-danger">{{ $error }}</h1>
    @endforeach
@endif
<form action="{{ route('aboutadmin.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Features</label>
        <input type="text" class="form-control" data-role="tagsinput" placeholder="Content Features" name="features">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-info">Add</button>
    <a href="{{ url('aboutadmin') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
