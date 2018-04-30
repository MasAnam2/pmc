@extends('layouts.app', ['title' => 'Ubah Data Supplier'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA SUPPLIER
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('supplier') }}">Data Supplier</a></li>
                    <li class="active">Ubah Data Supplier</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA SUPPLIER
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('supplier.perbarui', $d->kd_supplier) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('nm_supplier'))
                                            value="{{ old('nm_supplier') }}"
                                            @else
                                            value="{{ $d->nm_supplier }}"
                                            @endif
                                            required="required" name="nm_supplier" type="text" class="form-control" placeholder="Nama Supplier">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('no_telp'))
                                            value="{{ old('no_telp') }}"
                                            @else
                                            value="{{ $d->no_telp }}"
                                            @endif
                                            required="required" name="no_telp" type="text" class="form-control" placeholder="No Telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('email'))
                                            value="{{ old('email') }}"
                                            @else
                                            value="{{ $d->email }}"
                                            @endif
                                            name="email" type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">contacts</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('fax'))
                                            value="{{ old('fax') }}"
                                            @else
                                            value="{{ $d->fax }}"
                                            @endif
                                            required="required" name="fax" type="text" class="form-control" placeholder="Fax">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="almat" rows="4" class="form-control no-resize" placeholder="Alamat">{{ $errors->has('almat') ? old('almat') : $d->almat }}</textarea>
                                        </div>
                                    </div>
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