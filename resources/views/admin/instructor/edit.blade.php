@extends('admin.app')
@section('title', 'Instructor Edit')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h1 class="text-danger">{{ $error }}</h1>
    @endforeach
@endif
<form action="{{ route('instructoradmin.update', $instructor->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="" class="form-label">Image</label>
        <div class="my-2">
            <img src="{{ asset('storage/' . $instructor->image) }}" width="100" alt="">
        </div>
        <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $instructor->name }}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Major</label>
        <input type="text" class="form-control" name="major" value="{{ $instructor->major }}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Social</label>
        <input type="text" class="form-control" data-role="tagsinput" placeholder="Content Social" name="social" value="{{ implode(',', $instructor->social) }}">
    </div>
    <button type="submit" class="btn btn-info">Add</button>
    <a href="{{ url('instructoradmin') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
