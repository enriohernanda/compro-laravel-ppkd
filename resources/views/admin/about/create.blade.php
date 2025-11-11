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
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Features</label>
        <div id="featurewrap">
            <div class="feature-item d-flex mb-2">
                <input type="text" class="form-control feature" placeholder="Content Features" name="features[]">
                <button type="button" class="btn btn-danger btn-sm ms-1 removeFeature">Remove</button>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm ms-2" id="addFeature">Add</button>
    </div>
    <div class="mb-2">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-info">Add</button>
    <a href="{{ url('aboutadmin') }}" class="btn btn-secondary">Back</a>
</form>

<script>
    const wraper = document.querySelector('#featurewrap');
    const addBtn = document.querySelector('#addFeature');

    addBtn.addEventListener('click', function() {
        const newInput = document.createElement('div');
        newInput.classList.add('feature-item', 'd-flex', 'mb-2');
        newInput.innerHTML = `
            <input type="text" class="form-control feature" placeholder="Content Features" name="features[]">
            <button type="button" class="btn btn-danger btn-sm ms-1 removeFeature">Remove</button>
        `;
        wraper.appendChild(newInput);
    });

    wraper.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeFeature')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection
