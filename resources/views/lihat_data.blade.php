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
                </div>  
                @if (session()->has('pesan'))
                    <div class="alert alert-success">{{ session()->get('pesan') }}</div>
                @endif
                <table class="table table-striped">
                    <thead class="header">
                            <tr>
                                <th>Biodata</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                    </thead>
                        
                            @forelse ($data as $item)
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>{{ $item->nip }}</td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja</td>
                                    <td>{{ $item->unit_kerja }}</td>
                                </tr>
                                <tr>
                                    <td >Kabupaten/Kota</td>
                                    <td >{{ $item->kab_kota }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Jabatan Fungsional</td>
                                    <td>{{ $item->jenis_jabatan_fungsional }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>{{ $item->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Jenjang Saat Ini</td>
                                    <td>{{ $item->jenjang_saat_ini }}</td>
                                </tr>
                                <tr>
                                    <td>Jenjang yang Akan Diduduki</td>
                                    <td>{{ $item->jenjang_akan_diduduki }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor WhatsApp</td>
                                    <td>{{ $item->nomor_wa }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor SK Pangkat Terakhir</td>
                                    <td>{{ $item->no_sk_pangkat_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SK Pangkat Terakhir</td>
                                    <td>{{ $item->tgl_sk_pangkat_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor SK Fungsional Terakhir</td>
                                    <td>{{ $item->no_sk_fungsional_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SK Fungsional Terakhir</td>
                                    <td>{{ $item->tgl_sk_fungsional_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor SK Pencantuman Gelar</td>
                                    <td>{{ $item->no_sk_pencatuman_gelar }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SK Pencantuman Gelar</td>
                                    <td>{{ $item->tgl_sk_pencatuman_gelar }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Ijazah Terakhir</td>
                                    <td>{{ $item->no_ijazah_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Ijazah Terakhir</td>
                                    <td>{{ $item->tgl_ijazah_terakhir }}</td>
                                </tr>
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
@section('footer')