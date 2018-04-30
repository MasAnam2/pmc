@extends('layouts.app', ['title' => 'Ubah Data Jurnal'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA JURNAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('jurnal') }}">Data Jurnal</a></li>
                    <li class="active">Ubah Data Jurnal</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA JURNAL
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('jurnal.perbarui', $d->no_jurnal) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <select required="required" name="no_perkiraan" class="form-control show-tick">
                                        <option value="">-- Pilih Perkiraan --</option>
                                        @if(count($errors->all()) > 0)
                                        @foreach ($perkiraan as $s)
                                        <option @if($s->no_perk == old('no_perkiraan')) selected @endif value="{{ $s->no_perk }}">{{ $s->nm_perk }}</option>
                                        @endforeach
                                        @else
                                        @foreach ($perkiraan as $s)
                                        <option {{ $d->no_perkiraan == $s->no_perk ? 'selected' : '' }} value="{{ $s->no_perk }}">{{ $s->nm_perk }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select required="required" name="no_pb" class="form-control show-tick">
                                        <option value="">-- Pilih No Pembayaran --</option>
                                        @if(count($errors->all()) > 0)
                                        @foreach ($pembayaran as $s)
                                        <option @if($s->no_pb == old('no_pb')) selected @endif value="{{ $s->no_pb }}">{{ $s->no_pb }}</option>
                                        @endforeach
                                        @else
                                        @foreach ($pembayaran as $s)
                                        <option {{ $d->no_pb == $s->no_pb ? 'selected' : '' }} value="{{ $s->no_pb }}">{{ $s->no_pb }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input required="required" readonly="readonly" name="tgl_jurnal" value="{{ date('Y-m-d') }}" type="text" class="form-control" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('kredit'))
                                            value="{{ old('kredit') }}" 
                                            @else
                                            value="{{ $d->kredit }}"
                                            @endif
                                            required="required" name="kredit" type="number" class="form-control" placeholder="Kredit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('debet'))
                                            value="{{ old('debet') }}" 
                                            @else
                                            value="{{ $d->debet }}"
                                            @endif
                                            required="required" name="debet" type="number" class="form-control" placeholder="Debet">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('saldo'))
                                            value="{{ old('saldo') }}" 
                                            @else
                                            value="{{ $d->saldo }}"
                                            @endif
                                            required="required" name="saldo" type="number" class="form-control" placeholder="Saldo">
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
@include('load_bs_select')