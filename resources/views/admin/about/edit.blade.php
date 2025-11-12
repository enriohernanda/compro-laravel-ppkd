@extends('admin.app')
@section('title', 'About Edit')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h1 class="text-danger">{{ $error }}</h1>
    @endforeach
@endif
<form action="{{ route('aboutadmin.update', $about->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="" class="form-label">Image</label>
        <div class="my-2">
            <img src="{{ asset('storage/' . $about->image) }}" width="100" alt="">
        </div>
        <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Features</label>
        <input type="text" class="form-control" data-role="tagsinput" placeholder="Content Features" name="features" value="{{ implode(',', $about->features) }}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $about->title }}">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="5">{{ $about->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-info">Edit</button>
    <a href="{{ url('aboutadmin') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
