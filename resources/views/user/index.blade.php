@extends('layouts.app', ['title' => 'Data User'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA USER
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data User</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA USER
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#data_tab" data-toggle="tab">
                                    <i class="material-icons">insert_drive_file</i> DATA
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tambah_tab" data-toggle="tab">
                                    <i class="material-icons">add</i> TAMBAH
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="data_tab">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->id_user }}</td>
                                            <td>{{ $d->username }}</td>
                                            <td>{{ $d->hak_akses }}</td>
                                            <td>
                                                @include('edit_button', ['link'=>route('user.ubah', $d->id_user)])
                                                @include('delete_button', ['link'=>route('user.hapus', $d->id_user)])
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('user.tambah') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('username') }}" required="required" name="username" type="text" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('password') }}" required="required" name="password" type="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select required="required" name="hak_akses" class="form-control show-tick">
                                                @if(count($errors->all()) > 0)
                                                <option value="">-- Pilih Hak Akses --</option>
                                                <option @if(old('hak_akses') == 'Semua') selected @endif value="Semua">Semua</option>
                                                <option @if(old('hak_akses') == 'Gudang') selected @endif value="Gudang">Gudang</option>
                                                <option @if(old('hak_akses') == 'Departemen') selected @endif value="Departemen">Departemen</option>
                                                <option @if(old('hak_akses') == 'Purchasing') selected @endif value="Purchasing">Purchasing</option>
                                                <option @if(old('hak_akses') == 'Accounting') selected @endif value="Accounting">Accounting</option>
                                                <option @if(old('hak_akses') == 'Direktur') selected @endif value="Direktur">Direktur</option>
                                                @else
                                                <option value="">-- Pilih Hak Akses --</option>
                                                <option value="Semua">Semua</option>
                                                <option value="Gudang">Gudang</option>
                                                <option value="Departemen">Departemen</option>
                                                <option value="Purchasing">Purchasing</option>
                                                <option value="Accounting">Accounting</option>
                                                <option value="Direktur">Direktur</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            @include('save_button')
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
@include('form-hapus')
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush