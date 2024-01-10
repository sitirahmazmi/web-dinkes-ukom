@extends('layouts.template')
@section('title','Lihat Data')
@section('head','Lihat Data')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="align-items-center">
                    <h2>Lihat Data</h2>
                    {{-- <a href="{{ route('siti.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                </div>
                @if (session()->has('pesan'))
                    <div class="alert alert-success">{{ session()->get('pesan') }}</div>
                @endif
                <table class="table">
                    <tr>
                        <thead class="header">
                            <td>No</td>
                            <td>Nama</td>
                            <td>NIP</td>
                            <td>Unit Kerja</td>
                            <td>Kabupaten/Kota</td>
                            <td>Jenis Jabatan Fungsional</td>
                            <td>Kategori</td>
                            <td>Jenjang Saat Ini</td>
                            <td>Jenjang yang Akan Diduduki</td>
                            <td>Nomor WhatsApp</td>
                            <td>Email</td>
                            <td>nomor sk pangkat terakhir</td>
                            <td>tanggal sk pangkat terakhir</td>
                            <td>nomor sk fungsional terakhir</td>
                            <td>tanggal sk fungsional terakhir</td>
                            <td>nomor sk atau surat pencantuman gelar</td>
                            <td>tanggal sk atau surat pencantuman gelar</td>
                            <td>nomor ijazah terakhir</td>
                            <td>tanggal ijazah terakhir</td>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->unit_kerja }}</td>
                                    <td>{{ $item->kab_kota }}</td>
                                    <td>{{ $item->jenis_jabatan_fungsional }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->jenjang_saat_ini }}</td>
                                    <td>{{ $item->jenjang_akan_diduduki }}</td>
                                    <td>{{ $item->nomor_wa }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_sk_pangkat_terakhir }}</td>
                                    <td>{{ $item->tgl_sk_pangkat_terakhir }}</td>
                                    <td>{{ $item->no_sk_fungsional_terakhir }}</td>
                                    <td>{{ $item->tgl_sk_fungsional_terakhir }}</td>
                                    <td>{{ $item->no_sk_pencatuman_gelar }}</td>
                                    <td>{{ $item->tgl_sk_pencatuman_gelar }}</td>
                                    <td>{{ $item->no_ijazah_terakhir }}</td>
                                    <td>{{ $item->tgl_ijazah_terakhir }}</td>
                                    {{-- <td><form method="POST" action="{{ route('siti.hapus', ['sitis'=> $item->id]) }}">
                                        @method('DELETE') --}}
                                        {{-- @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" role="button">Hapus</button>
                                        <a class="btn btn-success btn-sm" href="{{ url('/edit-siti/'.$item->id).'/edit' }}" role="button">Edit</a> --}}
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