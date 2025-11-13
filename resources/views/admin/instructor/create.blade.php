@extends('admin.app')
@section('title', 'Instructor Menu')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h1 class="text-danger">{{ $error }}</h1>
    @endforeach
@endif
<form action="{{ route('instructoradmin.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Major</label>
        <input type="text" class="form-control" name="major">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Social Icons</label>
        <input type="text" class="form-control" data-role="tagsinput" placeholder="Social Icons" name="social">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Social Url</label>
        <input type="text" class="form-control" data-role="tagsinput" placeholder="Social Urls" name="sosmed_urls">
    </div>
    <button type="submit" class="btn btn-info">Add</button>
    <a href="{{ url('instructoradmin') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
