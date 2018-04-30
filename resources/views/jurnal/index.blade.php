@extends('layouts.app', ['title' => 'Data Jurnal'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA JURNAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data Jurnal</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA JURNAL
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
                                            <th>No Jurnal</th>
                                            <th>Tanggal</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                            <th>No Pembayaran</th>
                                            <th>Perkiraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Jurnal</th>
                                            <th>Tanggal</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
                                            <th>No Pembayaran</th>
                                            <th>Perkiraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->no_jurnal }}</td>
                                            <td>{{ tglIndo($d->tgl_jurnal) }}</td>
                                            <td>{{ $d->debet }}</td>
                                            <td>{{ $d->kredit }}</td>
                                            <td>{{ $d->saldo }}</td>
                                            <td>{{ $d->no_pb }}</td>
                                            <td>{{ $d->perkiraan->nm_perk }}</td>
                                            <td>
                                                @include('edit_button', ['link'=>route('jurnal.ubah', $d->no_jurnal)])
                                                @include('delete_button', ['link'=>route('jurnal.hapus', $d->no_jurnal)])
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('jurnal.tambah') }}" method="post">
                                    @csrf
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
                                                <option value="{{ $s->no_perk }}">{{ $s->nm_perk }}</option>
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
                                                <option value="{{ $s->no_pb }}">{{ $s->no_pb }}</option>
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
                                                    <input value="{{ old('kredit') }}" required="required" name="kredit" type="number" class="form-control" placeholder="Kredit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input value="{{ old('debet') }}" required="required" name="debet" type="number" class="form-control" placeholder="Debet">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input value="{{ old('saldo') }}" required="required" name="saldo" type="number" class="form-control" placeholder="Saldo">
                                                </div>
                                            </div>
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
@include('load_bs_select')