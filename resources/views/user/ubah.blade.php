@extends('layouts.app', ['title' => 'Ubah Data User'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA USER
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('user') }}">Data User</a></li>
                    <li class="active">Ubah Data User</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA USER
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('user.perbarui', $d->id_user) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="username_lama" value="{{ $d->username }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('username'))
                                            value="{{ old('username') }}"
                                            @else
                                            value="{{ $d->username }}"
                                            @endif
                                            required="required" name="username" type="text" class="form-control" placeholder="Username">
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
                                        <option @if($d->hak_akses == 'Semua') selected @endif value="Semua">Semua</option>
                                        <option @if($d->hak_akses == 'Gudang') selected @endif value="Gudang">Gudang</option>
                                        <option @if($d->hak_akses == 'Departemen') selected @endif value="Departemen">Departemen</option>
                                        <option @if($d->hak_akses == 'Purchasing') selected @endif value="Purchasing">Purchasing</option>
                                        <option @if($d->hak_akses == 'Accounting') selected @endif value="Accounting">Accounting</option>
                                        <option @if($d->hak_akses == 'Direktur') selected @endif value="Direktur">Direktur</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    @include('update_button')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush