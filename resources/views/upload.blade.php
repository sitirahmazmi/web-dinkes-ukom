@extends('layouts.template')
@section('title','Form Upload')
@section('head','Form Upload')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>
                <div class="card-body">
                    @if(session()->get('message'))
                        <div class="alert alert-success">
                        {{ session()->get('message') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('upload') }}" aria-label="{{ __('Upload') }}">
                        @csrf
                        <script>
                            var drop = new Dropzone('#file', {
                              createImageThumbnails: false,
                              addRemoveLinks: true,
                              url: "{{ route('upload') }}",
                              headers: {
                                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                              }
                            });
                          </script>
                        <br>
                        <h2>SK Pangkat Terakhir</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>SK Fungsional Terakhir</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>SK atau Surat Pencantuman Gelar</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>Ijazah Terakhir</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>Surat Tanda Registrasi (STR)</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>SK Pangkat Terakhir</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>Surat Izin Praktik (SIP)</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>Surat Rekomendasi</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <h2>Portofolio</h2>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')