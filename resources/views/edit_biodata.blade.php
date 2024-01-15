@extends('layouts.template')
@section('title','Edit Biodata')
@section('head','Biodata')
@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <h1>Form Biodata</h1>
            <hr>
            <form action="{{ route('biodata.update') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ $biodata->nama }}"
                    class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="nip">NIP</label>
            <input type="text" id="nip" name="nip" value="{{ $biodata->nip }}"
            class="form-control @error('nip') is-invalid @enderror">
            @error('nip')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="unit_kerja">Unit Kerja</label>
            <input type="text" id="unit_kerja" name="unit_kerja" value="{{ $biodata->unit_kerja }}"
            class="form-control @error('unit_kerja') is-invalid @enderror">
            @error('unit_kerja')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="kab_kota">Kabupaten/Kota</label>
            <select class="form-select" name="kab_kota" id="kab_kota" value="{{ $biodata->kab_kota }}">
                <option value="Kabupaten Sambas" {{ old('kab_kota')=='Kabupaten Sambas' ? 'selected': '' }}>
                Kabupaten Sambas
                </option>
                <option value="Kabupaten Mempawah" {{ old('kab_kota')=='Kabupaten Mempawah' ? 'selected': '' }}>
                Kabupaten Mempawah
                </option>
                <option value="Kabupaten Sanggau" {{ old('kab_kota')=='Kabupaten Sanggau' ? 'selected': '' }}>
                Kabupaten Sanggau
                </option>
                <option value="Kabupaten Ketapang" {{ old('kab_kota')=='Kabupaten Ketapang' ? 'selected': '' }}>
                Kabupaten Ketapang
                </option>
                <option value="Kabupaten Sintang" {{ old('kab_kota')=='Kabupaten Sintang' ? 'selected': '' }}>
                Kabupaten Sintang
                </option>
                <option value="Kabupaten Kapuas Hulu" {{ old('kab_kota')=='Kabupaten Kapuas Hulu' ? 'selected': '' }}>
                Kabupaten Kapuas Hulu
                </option>
                <option value="Kabupaten Bengkayang" {{ old('kab_kota')=='Kabupaten Bengkayang' ? 'selected': '' }}>
                Kabupaten Bengkayang
                </option>
                <option value="Kabupaten Landak" {{ old('kab_kota')=='Kabupaten Landak' ? 'selected': '' }}>
                Kabupaten Landak
                </option>
                <option value="Kabupaten Sekadau" {{ old('kab_kota')=='Kabupaten Sekadau' ? 'selected': '' }}>
                Kabupaten Sekadau
                </option>
                <option value="Kabupaten Melawi" {{ old('kab_kota')=='Kabupaten Melawi' ? 'selected': '' }}>
                Kabupaten Melawi
                </option>
                <option value="Kabupaten Kayong Utara" {{ old('kab_kota')=='Kabupaten Kayong Utara' ? 'selected': '' }}>
                Kabupaten Kayong Utara
                </option>
                <option value="Kabupaten Kubu Raya" {{ old('kab_kota')=='Kabupaten Kubu Raya' ? 'selected': '' }}>
                Kabupaten Kubu Raya
                </option>
                <option value="Kota Pontianak" {{ old('kab_kota')=='Kota Pontianak' ? 'selected': '' }}>
                Kota Pontianak
                </option>
                <option value="Kota Singkawang" {{ old('kab_kota')=='Kota Singkawang' ? 'selected': '' }}>
                Kota Singkawang
                </option>
            </select>
            @error('kab_kota')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenis_jabatan_fungsional">Jenis Jabatan Fungsional</label>
            <select class="form-select" name="jenis_jabatan_fungsional" id="jenis_jabatan_fungsional" value="{{ $biodata->jenis_jabatan_fungsional }}">
                <option value="Jabatan Fungsional Administrator Kesehatan" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Administrator Kesehatan' ? 'selected': '' }}>
                Jabatan Fungsional Administrator Kesehatan
                </option>
                <option value="Jabatan Fungsional Apoteker" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Apoteker' ? 'selected': '' }}>
                Jabatan Fungsional Apoteker
                </option>
                <option value="Jabatan Fungsional Asisten Apoteker" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Asisten Apoteker' ? 'selected': '' }}>
                Jabatan Fungsional Asisten Apoteker
                </option>
                <option value="Jabatan Fungsional Asisten Penata Anestesi" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Asisten Penata Anestesi' ? 'selected': '' }}>
                Jabatan Fungsional Asisten Penata Anestesi
                </option>
                <option value="Jabatan Fungsional Bidan" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Bidan' ? 'selected': '' }}>
                Jabatan Fungsional Bidan
                </option>
                <option value="Jabatan Fungsional Dokter Gigi" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Dokter Gigi' ? 'selected': '' }}>
                Jabatan Fungsional Dokter Gigi
                </option>
                <option value="Jabatan Fungsional Dokter" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Dokter' ? 'selected': '' }}>
                Jabatan Fungsional Dokter
                </option>
                <option value="Jabatan Fungsional Dokter Pendidik Klinik" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Dokter Pendidik Klinik' ? 'selected': '' }}>
                Jabatan Fungsional Dokter Pendidik Klinik
                </option>
                <option value="Jabatan Fungsional Epidemiologi Kesehatan" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Epidemiologi Kesehatan' ? 'selected': '' }}>
                Jabatan Fungsional Epidemiologi Kesehatan
                </option>
                <option value="Jabatan Fungsional Fisioterapi" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Fisioterapi' ? 'selected': '' }}>
                Jabatan Fungsional Fisioterapi
                </option>
                <option value="Jabatan Fungsional Nutrisonis" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Nutrisonis' ? 'selected': '' }}>
                Jabatan Fungsional Nutrisonis
                </option>
                <option value="Jabatan Fungsional Pembimbing Kesehatan Kerja" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Pembimbing Kesehatan Kerja' ? 'selected': '' }}>
                Jabatan Fungsional Pembimbing Kesehatan Kerja
                </option>
                <option value="Jabatan Fungsional Penata Anestesi" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Penata Anestesi' ? 'selected': '' }}>
                Jabatan Fungsional Penata Anestesi
                </option>
                <option value="Jabatan Fungsional Penyuluh Kesehatan Masyarakat" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Penyuluh Kesehatan Masyarakat' ? 'selected': '' }}>
                Jabatan Fungsional Penyuluh Kesehatan Masyarakat
                </option>
                <option value="Jabatan Fungsional Perawatan" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Perawatan' ? 'selected': '' }}>
                Jabatan Fungsional Perawatan
                </option>
                <option value="Jabatan Fungsional Perekam Medis" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Perekam Medis' ? 'selected': '' }}>
                Jabatan Fungsional Perekam Medis
                </option>
                <option value="Jabatan Fungsional Pranata Laboratorium Kesehatan" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Pranata Laboratorium Kesehatan' ? 'selected': '' }}>
                Jabatan Fungsional Pranata Laboratorium Kesehatan
                </option>
                <option value="Jabatan Fungsional Psikolog Klinis" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Psikolog Klinis' ? 'selected': '' }}>
                Jabatan Fungsional Psikolog Klinis
                </option>
                <option value="Jabatan Fungsional Radiografer" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Radiografer' ? 'selected': '' }}>
                Jabatan Fungsional Radiografer
                </option>
                <option value="Jabatan Fungsional Sanitarian" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Sanitarian' ? 'selected': '' }}>
                Jabatan Fungsional Sanitarian
                </option>
                <option value="Jabatan Fungsional Teknisi Elektromedis" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Teknisi Elektromedis' ? 'selected': '' }}>
                Jabatan Fungsional Teknisi Elektromedis
                </option>
                <option value="Jabatan Fungsional Terapis Gigi dan Mulut" {{ old('jenis_jabatan_fungsional')=='Jabatan Fungsional Terapis Gigi dan Mulut' ? 'selected': '' }}>
                    Jabatan Fungsional Terapis Gigi dan Mulut
                </option>
            </select>
            @error('jenis_jabatan_fungsional')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <div class="d-flex">
            <div class="form-check me-3">
                <input class="form-check-input" type="radio" name="kategori" id="keterampilan" value={{ $biodata->kategori }}
                {{ old('kategori')=='keterampilan' ? 'checked': '' }}>
                <label class="form-check-label" for="keterampilan">Keterampilan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kategori" id="keahlian" value={{ $biodata->kategori }}
                {{ old('kategori')=='keahlian' ? 'checked': '' }}>
                <label class="form-check-label" for="keahlian">Keahlian</label>
            </div>
            </div>
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenjang_saat_ini">Jenjang Saat ini</label>
            <select class="form-select" name="jenjang_saat_ini" id="jenjang_saat_ini" value="{{ $biodata->jenjang_saat_ini }}">
                <option value="JFU" {{ old('jenjang_saat_ini')=='JFU' ? 'selected': '' }}>
                JFU
                </option>
                <option value="Terampil/Pelaksana" {{ old('jenjang_saat_ini')=='Terampil/Pelaksana' ? 'selected': '' }}>
                Terampil/Pelaksana
                </option>
                <option value="Mahir/Pelaksana Lanjutan" {{ old('jenjang_saat_ini')=='Mahir/Pelaksana Lanjutan' ? 'selected': '' }}>
                Mahir/Pelaksana Lanjutan
                </option>
                <option value="Penyelia" {{ old('jenjang_saat_ini')=='Penyelia' ? 'selected': '' }}>
                Penyelia
                </option>
                <option value="Ahli Pertama" {{ old('jenjang_saat_ini')=='Ahli Pertama' ? 'selected': '' }}>
                Ahli Pertama
                </option>
                <option value="Ahli Muda" {{ old('jenjang_saat_ini')=='Ahli Muda' ? 'selected': '' }}>
                Ahli Muda
                </option>
            </select>
            @error('jenjang_saat_ini')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenjang_akan_diduduki">Jenjang yang Akan Diduduki</label>
            <select class="form-select" name="jenjang_akan_diduduki" id="jenjang_akan_diduduki" value="{{ $biodata->jenjang_akan_diduduki }}">
                <option value="Mahir/Pelaksana Lanjutan" {{ old('jenjang_akan_diduduki')=='Mahir/Pelaksana Lanjutan' ? 'selected': '' }}>
                Mahir/Pelaksana Lanjutan
                </option>
                <option value="Penyelia" {{ old('jenjang_akan_diduduki')=='Penyelia' ? 'selected': '' }}>
                Penyelia
                </option>
                <option value="Ahli Pertama" {{ old('jenjang_akan_diduduki')=='Ahli Pertama' ? 'selected': '' }}>
                Ahli Pertama
                </option>
                <option value="Ahli Muda" {{ old('jenjang_akan_diduduki')=='Ahli Muda' ? 'selected': '' }}>
                Ahli Muda
                </option>
                <option value="Ahli Madya" {{ old('jenjang_akan_diduduki')=='Ahli Madya' ? 'selected': '' }}>
                Ahli Madya
                </option>
            </select>
            @error('jenjang_akan_diduduki')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomor_wa">Nomor WhatsApp</label>
            <input type="text" id="nomor_wa" name="nomor_wa" value="{{ $biodata->nomor_wa }}"
            class="form-control @error('nomor_wa') is-invalid @enderror">
            @error('nomor_wa')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ $biodata->email }}"
            class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="no_sk_pangkat_terakhir">Nomor SK Pangkat Terakhir</label>
            <input type="text" id="no_sk_pangkat_terakhir" name="no_sk_pangkat_terakhir" value="{{ $biodata->no_sk_pangkat_terakhir }}"
            class="form-control @error('no_sk_pangkat_terakhir') is-invalid @enderror">
            @error('no_sk_pangkat_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="tgl_sk_pangkat_terakhir">Tanggal SK Pangkat Terakhir</label>
            <input type="date" id="tgl_sk_pangkat_terakhir" name="tgl_sk_pangkat_terakhir" value="{{ $biodata->tgl_sk_pangkat_terakhir }}"
            class="form-control @error('tgl_sk_pangkat_terakhir') is-invalid @enderror">
            @error('tgl_sk_pangkat_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="no_sk_fungsional_terakhir">Nomor SK Fungsional Terakhir</label>
            <input type="text" id="no_sk_fungsional_terakhir" name="no_sk_fungsional_terakhir" value="{{ $biodata->no_sk_fungsional_terakhir }}"
            class="form-control @error('no_sk_fungsional_terakhir') is-invalid @enderror">
            @error('no_sk_fungsional_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="tgl_sk_fungsional_terakhir">Tanggal SK Fungsional Terakhir</label>
            <input type="date" id="tgl_sk_fungsional_terakhir" name="tgl_sk_fungsional_terakhir" value="{{ $biodata->tgl_sk_fungsional_terakhir }}"
            class="form-control @error('tgl_sk_fungsional_terakhir') is-invalid @enderror">
            @error('tgl_sk_fungsional_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="no_sk_pencatuman_gelar">Nomor SK atau Surat Pencantuman Gelar</label>
            <input type="text" id="no_sk_pencatuman_gelar" name="no_sk_pencatuman_gelar" value="{{ $biodata->no_sk_pencatuman_gelar }}"
            class="form-control @error('no_sk_pencatuman_gelar') is-invalid @enderror">
            @error('no_sk_pencatuman_gelar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="tgl_sk_pencatuman_gelar">Tanggal SK atau Surat Pencantuman Gelar</label>
            <input type="date" id="tgl_sk_pencatuman_gelar" name="tgl_sk_pencatuman_gelar" value="{{ $biodata->tgl_sk_pencatuman_gelar }}"
            class="form-control @error('tgl_sk_pencatuman_gelar') is-invalid @enderror">
            @error('tgl_sk_pencatuman_gelar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="no_ijazah_terakhir">Nomor Ijazah Terakhir</label>
            <input type="text" id="no_ijazah_terakhir" name="no_ijazah_terakhir" value="{{ $biodata->no_ijazah_terakhir }}"
            class="form-control @error('no_ijazah_terakhir') is-invalid @enderror">
            @error('no_ijazah_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="tgl_ijazah_terakhir">Tanggal Ijazah Terakhir</label>
            <input type="date" id="tgl_ijazah_terakhir" name="tgl_ijazah_terakhir" value="{{ $biodata->tgl_ijazah_terakhir }}"
            class="form-control @error('tgl_ijazah_terakhir') is-invalid @enderror">
            @error('tgl_ijazah_terakhir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-1">Daftar</button>
        <a href="{{ url()->previous() }}" class="btn btn-success mb-1">Kembali</a>
    </form>
    </div>
</div>
@endsection