@extends('admin.index')
@section('title', 'Ubah Surat Masuk')
@section('menu-surat', 'pcoded-trigger complete active')
@section('surat-masuk', 'active')
@section('additional-css')
<style>
    .image_upload>input {
        display: none;
    }

    .images {
        max-width: 100%;
        max-height: auto;
    }
</style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="ti ti-pencil"></i> Ubah Surat Masuk</h5>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-block table-border-style" style="padding: 20px;">
            <form method="POST" action="{{ route('surat-admin.update', $surat->id) }}" onsubmit="return validateForm()"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-9">
                        <select name="jenis_surat" class="form-control" id="jenis_surat" required>
                            <option value="">Pilih</option>
                            @foreach ($jenis_surat as $jenis)
                                <option value="{{ $jenis['jenis_surat'] }}" {{ $surat->jenis_surat == $jenis['jenis_surat'] ? 'selected' : '' }}>{{ $jenis['jenis_surat'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dinas /Instansi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="dinas" value="{{ $surat->dinas }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tangggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tgl_masuk" value="{{ Helpers::_resetTanggal($surat->tgl_masuk) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_surat" value="{{ $surat->no_surat }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tgl_surat" value="{{ Helpers::_resetTanggal($surat->tgl_surat) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Uraian</label>
                    <div class="col-sm-9">
                        <textarea name="uraian" class="tinymce">{{ $surat->uraian }}</textarea>
                    </div>
                </div>
                <div class="form-group row" id="disposisi" hidden>
                    <label class="col-sm-3 col-form-label">Disposisi</label>
                    <div class="col-sm-9">
                        <textarea name="disposisi" class="tinymce">{{ $surat->disposisi }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penerima/Tgl Terima</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="penerima" value="{{ $surat->penerima }}" placeholder="Nama Penerima Surat"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_terima" value="{{ Helpers::_resetTanggal($surat->tgl_terima) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Distribusi Surat</label>
                    <div class="col-sm-2">
                        <input type="checkbox" id="distribusi_surat"> Ya
                    </div>
                </div>
                <div class="form-group row" id="distribusi" hidden>
                    <label class="col-sm-3 col-form-label">Distribusi Ke</label>
                    <div class="col-sm-9">
                        @foreach ($bidang as $bid)
                            {{ $bid->nama_bidang }} <input type="checkbox" class="form-control" name="distribusi[]"
                                value="{{ $bid->id }}">
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">File Surat</label>
                    <div class="col-sm-9">
                        <p class="image_upload">
                            <label for="userImage">
                                <a class="btn btn-primary btn-sm" rel="nofollow"><span
                                        class='ti ti-upload'></span> Upload Surat</a>
                            </label>
                            <input type="file" name="file_surat" id="userImage" value="{{ $surat->file_surat }}" accept="image/*"
                                onchange="loadFile(event)">
                        </p>
                        {{-- {{ dd($surat->FileSurat) }} --}}
                        <img class="images" src="{{ asset($surat->FileSurat->file_surat) }}" id="surat">
                    </div>
                </div>
                <div>
                    <a href="{{ route('surat-admin.index') }}" class="btn btn-secondary">
                        <i class="ti-shift-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="ti ti-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('additional-js')
    <script src="{{ asset('assets/Plugins/DataTables/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.surat').DataTable();
        });

        $('#jenis_surat').change(function() {
            var jenis_surat = $('#jenis_surat').val();
            console.log(jenis_surat);

            if (jenis_surat == 'Disposisi') {
                $('#disposisi').attr('hidden', false);
            } else {
                $('#disposisi').attr('hidden', true);
            }
        });

        $('#distribusi_surat').click(function() {
            if ($(this).is(":checked")) {
                $('#distribusi').attr('hidden', false);
                $('#distribusi_surat').text('Tidak');
            } else {
                $('#distribusi').attr('hidden', true);
                $('#distribusi_surat').text('Ya');
            }
        });

        // preview image
        var loadFile = function(event) {
            var output = document.getElementById('surat');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
