@extends('layouts.template')
@section('title','Form Upload')
@section('head','Form Upload')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('uploads.store') }}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">@yield('head')</h3>
            @csrf

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Repeat this block for each file input -->
            @foreach(['SK Pangkat Terakhir', 'SK Fungsional Terakhir', 'SK atau Surat Pencantuman Gelar',
                'Ijazah Terakhir', 'Surat Tanda Registrasi (STR)', 'Surat Izin Praktik (SIP)', 'Surat Rekomendasi',
                'Portofolio', 'Sasaran Kerja Pegawai (SKP)'] as $fileType)
            <div class="mb-3">
                <label for="{{ strtolower(str_replace(' ', '_', $fileType)) }}" class="form-label">{{ $fileType }}</label>
                <div class="custom-file">
                    <input type="file" name="files[]" class="custom-file-input" id="{{ strtolower(str_replace(' ', '_', $fileType)) }}">
                    <label class="custom-file-label" for="{{ strtolower(str_replace(' ', '_', $fileType)) }}">Select file</label>
                </div>
            </div>
            @endforeach

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>
</body>
@endsection