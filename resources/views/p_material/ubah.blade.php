@extends('layouts.app', ['title' => 'Ubah Data Penerimaan Material'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA PENERIMAAN MATERIAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('p_material') }}">Data Penerimaan Material</a></li>
                    <li class="active">Ubah Data Penerimaan Material</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA PENERIMAAN MATERIAL
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('p_material.perbarui', $d->no_pen) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">book</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('no_sj'))
                                            value="{{ old('no_sj') }}" 
                                            @else
                                            value="{{ $d->no_sj }}" 
                                            @endif
                                            required="required" name="no_sj" type="text" class="form-control" placeholder="Nomor Surat Jalan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input required="required" readonly="readonly" name="tgl_pen" value="{{ $d->tgl_pen }}" type="text" class="form-control" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">receipt</i>
                                        </span>
                                        <div class="form-line">
                                            <input required="required" readonly="readonly" name="no_po" value="{{ $d->no_po }}" type="text" class="form-control" placeholder="No PO">
                                        </div>
                                        <small>No PO</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">done</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="{{ $d->jmlh_order }}" readonly="readonly" required="required" name="jmlh_order" type="number" class="form-control" placeholder="Jumlah Order">
                                        </div>
                                        <small>Jumlah Order</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">done_all</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('jmlh_diterima'))
                                            value="{{ old('jmlh_diterima') }}" 
                                            @else
                                            value="{{ $d->jmlh_diterima }}" 
                                            @endif
                                            required="required" name="jmlh_diterima" type="number" class="form-control" placeholder="Jumlah Diterima">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">PERBARUI</button>
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