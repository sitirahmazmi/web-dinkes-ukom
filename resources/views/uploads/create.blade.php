@extends('layouts.template')
@section('title','Upload File')
@section('head','Upload File')
@section('content')
    <div class="container">
        <h1>Create Upload</h1>

        <form action="{{ route('uploads.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="files[]" multiple required>
            <button type="submit">Upload Files</button>
        </form>
    </div>
@endsection