@extends('admin.app')
@section('title', 'Home Update')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <h1 class="text-danger">{{ $error }}</h1>
    @endforeach
@endif
    <form action="{{ route('homeadmin.update', $home->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="" class="form-label">Image</label>
            <div class="mb-3">
                <img src="{{ asset('storage/' . $home->image) }}" alt="" width="100">
            </div>
            <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Subtitle</label>
            <input type="text" class="form-control" name="subtitle" value="{{ $home->subtitle }}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $home->title }}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="5" id="">{{ $home->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-info">Save Change</button>
        <a href="{{ url('homeadmin') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
