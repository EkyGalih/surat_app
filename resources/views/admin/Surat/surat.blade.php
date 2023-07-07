@extends('admin.index')
@section('title', 'Surat Masuk')
@section('menu-bidang', 'active')
@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Plugins/DataTables/datatables.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="ti ti-envelope"></i> Surat Masuk</h5>
            <div class="card-header-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSurat"><i
                        class="ti ti-plus"></i> Tambah Surat</button>
                    @include('admin.Surat.addons._add')
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-block table-border-style" style="padding: 20px;">
            <div class="table-responsive">
                <table class="table table-hover surat">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>DINAS /INSTANSI</th>
                            <th>TGL. MASUK</th>
                            <th>NO.SURAT</th>
                            <th>TGL. SURAT</th>
                            <th>URAIAN</th>
                            <th>DILANJUTKAN KE SEKERTARIS BIDANG UPTB</th>
                            <th>TANDA TERIMA</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->dinas }}</td>
                                <td>{{ $item->tgl_masuk }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->tgl_surat }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td></td>
                                <td>{{ $item->tanda_terima }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('additional-js')
    <script src="{{ asset('assets/Plugins/DataTables/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.surat').DataTable();
        });
    </script>
@endsection
