@extends('admin.index')
@section('title', 'Bidang')
@section('menu-bidang', 'active')
@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Plugins/DataTables/datatables.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="ti ti-id-badge"></i> Daftar Bidang</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="icofont icofont-simple-left "></i></li>
                    <li><i class="icofont icofont-maximize full-card"></i></li>
                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                    <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
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
                <table class="table table-hover bidang">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bidang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidang as $bid)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bid->nama_bidang }}</td>
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
            $('.bidang').DataTable();
        });
    </script>
@endsection
