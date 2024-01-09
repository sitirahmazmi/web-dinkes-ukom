@extends('layouts.template')
@section('title','Data Diri')
@section('head','Data Diri')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="align-items-center">
                    <h2>Tabel Data Diri</h2>
                    <a href="{{ route('siti.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                @if (session()->has('pesan'))
                    <div class="alert alert-success">{{ session()->get('pesan') }}</div>
                @endif
                <table class="table">
                    <tr>
                        <thead class="header">
                            <td>No</td>
                            <td>NIM</td>
                            <td>Telepon</td>
                            <td>Nama Lengkap</td>
                            <td>Kelas</td>
                            <td>Lulus</td>
                            <td>IPK</td>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->NIM }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->lulus }}</td>
                                    <td>{{ $item->IPK }}</td>
                                    <td><form method="POST" action="{{ route('siti.hapus', ['sitis'=> $item->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" role="button">Hapus</button>
                                        <a class="btn btn-success btn-sm" href="{{ url('/edit-siti/'.$item->id).'/edit' }}" role="button">Edit</a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                Data Kosong
                            @endforelse
                        </tbody>
                    </tr>
                </table>
            </div>
        </div>
        </table>
        {{-- Halaman : {{ $data->curretPage() }}<br>
        Jumlah Data : {{ $data->total() }}<br>
        Data per halaman : {{ $data->perPage() }}<br> --}}
    </div>
    </h1>
</body>
@endsection