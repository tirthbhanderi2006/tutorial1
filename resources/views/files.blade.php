@extends('welcome')
@section('main_content')

<div class="container">
    <form action="{{ URL::to('/') }}/upload_file" enctype="multipart/form-data" method="post" class="mt-4">
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

    <table class="table">
        <thead>
            <tr>
                <th>File name</th>
                <th>Download</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files_name as $file)
            <tr>
                <td>{{ $file->getfilename() }}</td>
                <td><a href="{{ route('download_file', $file->getfilename()) }}" class="btn btn-primary">Download</a>
                </td>
                <td><a href="{{ route('delete_file', $file->getfilename()) }}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection