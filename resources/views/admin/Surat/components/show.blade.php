@extends('admin.index')
@section('title', 'Lihat Surat Masuk')
@section('menu-surat', 'pcoded-trigger complete active')
@section('surat-masuk', 'active')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="ti ti-envelope"></i> Surat Masuk</h5>
        </div>
        <div class="card-block">
            <table border="1">
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{ $surat->no_surat }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{ $surat->no_surat }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{ $surat->no_surat }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{ $surat->no_surat }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
