@extends('layouts.app', ['title' => 'Data Pembayaran'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA PEMBAYARAN
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data Pembayaran</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA PEMBAYARAN
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
                                            <th>No Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Perusahaan</th>
                                            <th>Bank</th>
                                            <th>Alamat Bank</th>
                                            <th>No Rek.</th>
                                            <th>No Inv.</th>
                                            <th>No Pajak Faktur</th>
                                            <th>PPN</th>
                                            <th>Total Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Perusahaan</th>
                                            <th>Bank</th>
                                            <th>Alamat Bank</th>
                                            <th>No Rek.</th>
                                            <th>No Inv.</th>
                                            <th>No Pajak Faktur</th>
                                            <th>PPN</th>
                                            <th>Total Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->no_pb }}</td>
                                            <td>{{ tglIndo($d->tgl_pb) }}</td>
                                            <td>{{ $d->nm_peru }}</td>
                                            <td>{{ $d->bank }}</td>
                                            <td>{{ $d->almt_bank }}</td>
                                            <td>{{ $d->no_rek }}</td>
                                            <td>
                                                <a href="{{ route('pembayaran.ubah', $d->no_pen) }}" class="btn btn-warning">Ubah</a>
                                                <a onclick="hapus('{{ route('pembayaran.hapus', $d->no_pen) }}')" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('pembayaran.tambah') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">book</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('nm_peru') }}" required="required" name="nm_peru" type="text" class="form-control" placeholder="Nama Perusahaan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line">
                                                    <input required="required" readonly="readonly" name="tgl_pb" value="{{ date('Y-m-d') }}" type="text" class="form-control" placeholder="Tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">done</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('no_rek') }}" readonly="readonly" required="required" name="no_rek" type="text" class="form-control" placeholder="No Rekening">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Alamat Bank"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="aaa">
                                        <div class="col-md-4">
                                            <select required="required" name="no_po" class="form-control show-tick">
                                                <option value="">-- Pilih No Purchase Order --</option>
                                                @if(count($errors->all()) > 0)
                                                @foreach ($po as $s)
                                                <option @if($s->no_po == old('no_po')) selected @endif value="{{ $s->no_po }}">{{ $s->no_po }}</option>
                                                @endforeach
                                                @else
                                                @foreach ($po as $s)
                                                <option value="{{ $s->no_po }}">{{ $s->no_po }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="no_invoice" type="text" class="form-control" placeholder="No Invoice" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="no_fp" type="text" class="form-control" placeholder="No Faktur Pajak" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="tagihan" type="number" class="form-control" placeholder="Tagihan" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="ppn" type="number" class="form-control" placeholder="PPN" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="total_bayar" type="number" class="form-control" placeholder="Total Bayar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a onclick="tambah()" class="btn btn-danger">Tambah</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
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
@push('script')
<script>
    function tambah() {
        var aaa = document.getElementById('aaa').outerHTML;
        $('#aaa').after(aaa);
    }
</script>
@endpush