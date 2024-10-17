@extends('welcome')
@section('main_content')

<div class="container">
<form action="upload_pdf" enctype="multipart/form-data" method="post" class="mt-4">
    <h3>to upload pdf and move to folder</h3>
    @csrf
    <div class="mb-3">
        <label for="file" class="form-label">Choose file</label>
        <input type="file" name="file" id="file" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
    <div class="mt-2 text-danger">
        @error('file')
            {{ $message }}
        @enderror
    </div>
</form>
</div>
@if (isset($file_name))
    {{ $file_name }} Uploaded
@endif
@endsection