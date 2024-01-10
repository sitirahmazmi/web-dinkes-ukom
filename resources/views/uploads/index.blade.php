@extends('layouts.template')
@section('title','File')
@section('head','File')
@section('content')
<h1>Uploaded Files</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>File Name</th>
            <th>File Version</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($uploads as $upload)
            <tr>
                <td>{{ $upload->id }}</td>
                <td>{{ $upload->user->name }}</td>
                <td>{{ $upload->file_name }}</td>
                <td>{{ $upload->file_version }}</td>
                <td>
                    <!-- Add links/buttons for editing, deleting, etc. -->
                    <a href="{{ asset($upload->file_path) }}" target="_blank">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection