@extends('layouts.template')
@section('title','Lihat Data')
@section('head','Lihat Data')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="align-items-center">
                    <h2>Lihat Data</h2>
                </div>
                @forelse ($data as $item)  
                <div class="align-items-right">
                    <a href="{{ url('/user/biodata/'.$item->id).'/edit' }}" class="btn btn-primary" role="button">Edit Biodata</a>
                    <a href="{{ url('/user/file/'.$item->id).'/edit' }}" class="btn btn-primary" role="button">Edit File</a>
                </div>  
                @if (session()->has('pesan'))
                    <div class="alert alert-success">{{ session()->get('pesan') }}</div>
                @endif
                <table border="1" class="table table-striped" >
                    <thead class="header">
                            <tr>
                                <th>Biodata</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                    </thead>
                        
                            
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
                            
                        </tbody>
                    </tr>
                </table>
                @endforelse
                <br>
                <table border="1" class="table table-striped" >
                    <thead class="header">
                            <tr>
                                <th>Dokumen</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                    </thead>
                        
                            @forelse ($files as $item)
                                <tr>
                                    <td>SK Pangkat Terakhir</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->sk_pangkat_terakhir }}">Lihat</a>
                                        <br>{{ $item->sk_pangkat_terakhir }}</td> 
                                </tr>
                                <tr>
                                    <td>SK Fungsional Terakhir</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->sk_fungsional_terakhir }}">Lihat</a>
                                        <br>{{ $item->sk_fungsional_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>SK atau Surat Pencantuman Gelar</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->sk_pencantuman_gelar }}">Lihat</a>
                                        <br>{{ $item->sk_pencantuman_gelar }}</td>
                                </tr>
                                <tr>
                                    <td >Ijazah Terakhir</td>
                                    <td ><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->ijazah_terakhir }}">Lihat</a>
                                        <br>{{ $item->ijazah_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Surat Tanda Registrasi (STR)</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->str }}">Lihat</a>
                                        <br>{{ $item->str }}</td>
                                </tr>
                                <tr>
                                    <td>Surat Izin Praktik (SIP)</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->sip }}">Lihat</a>
                                        <br>{{ $item->sip }}</td>
                                </tr>
                                <tr>
                                    <td>Surat Rekomendasi</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->surat_rekomendasi }}">Lihat</a>
                                        <br>{{ $item->surat_rekomendasi }}</td>
                                </tr>
                                <tr>
                                    <td>Portofolio</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->portofolio }}">Lihat</a>
                                        <br>{{ $item->portofolio }}</td>
                                </tr>
                                <tr>
                                    <td>Sasaran Kerja Pegawai (SKP)</td>
                                    <td><a href="{{asset('/')}}upload_file_peserta/{{ $item->user_id }}/{{ $item->skp }}">Lihat</a>
                                        <br>{{ $item->skp }}</td>
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