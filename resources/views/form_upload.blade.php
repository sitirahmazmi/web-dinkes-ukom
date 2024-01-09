@extends('layouts.template')
@section('title','Form Upload')
@section('head','Form Upload')
@section('content')
<body>
    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File Pendaftaran UKOM</h3>
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
        <div class="mb-3">
            <br><label for="sk_pangkat_terakhir" class="form-label">SK Pangkat Terakhir</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="sk_fungsional_terakhir" class="form-label">SK Fungsional Terakhir</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="sk_pencantuman_gelar" class="form-label">SK Pencantuman Gelar</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
           
        <div class="mb-3">
            <br><label for="ijazah_terakhir" class="form-label">Ijazah Terakhir</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="str" class="form-label">Surat Tanda Registrasi (STR)</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="sip" class="form-label">Surat Izin Praktik (SIP)</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
           
        <div class="mb-3">
            <br><label for="surat_rekomendasi" class="form-label">Surat Rekomendasi</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="portofolio" class="form-label">Portofolio</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            
        <div class="mb-3">
            <br><label for="skp" class="form-label">Sasaran Kerja Pegawai (SKP)</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
        </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>
</body>
</html>
@endsection