@extends('admin.index')
@section('title', 'Surat Masuk')
@section('menu-bidang', 'active')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="ti ti-plus"></i> Tambah Surat Masuk</h5>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-block table-border-style" style="padding: 20px;">
            <form method="POST" action="{{ route('surat-admin.store') }}" onsubmit="return validateForm()"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-9">
                        <select name="jenis_surat" class="form-control" id="jenis_surat" required>
                            <option value="">Pilih</option>
                            @foreach ($jenis_surat as $jenis)
                                <option value="{{ $jenis['jenis_surat'] }}">{{ $jenis['jenis_surat'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dinas /Instansi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="dinas" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tangggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tgl_masuk" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_surat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tgl_surat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Uraian</label>
                    <div class="col-sm-9">
                        <textarea name="uraian" class="tinymce"></textarea>
                    </div>
                </div>
                <div class="form-group row" id="disposisi" hidden>
                    <label class="col-sm-3 col-form-label">Disposisi</label>
                    <div class="col-sm-9">
                        <textarea name="disposisi" class="tinymce" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penerima/Tgl Terima</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="penerima" placeholder="Nama Penerima Surat"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl_terima" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Distribusi Ke</label>
                    <div class="col-sm-9">
                        @foreach ($bidang as $bid)
                            {{ $bid->nama_bidang }} <input type="checkbox" class="form-control" name="distribusi[]"
                                value="{{ $bid->uuid }}">
                        @endforeach
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
    </script>
@endsection
