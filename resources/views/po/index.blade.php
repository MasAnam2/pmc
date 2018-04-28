@extends('layouts.app', ['title' => 'Data Purchase Order'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA PURCHASE ORDER
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data Purchase Order</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA PURCHASE ORDER
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
                                            <th>No PO</th>
                                            <th>Supplier</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No PO</th>
                                            <th>Supplier</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->no_po }}</td>
                                            <td>{{ $d->supplier->nm_supplier }}</td>
                                            <td>{{ tglIndo($d->tgl_po) }}</td>
                                            <td>{{ rupiah($d->total) }}</td>
                                            <td>
                                                <a href="{{ route('po.ubah', $d->no_po) }}" class="btn btn-warning">Ubah</a>
                                                <a onclick="hapus('{{ route('po.hapus', $d->no_po) }}')" class="btn btn-danger">Hapus</a>
                                                <a href="{{ route('po.cetak', $d->no_po) }}" class="btn btn-default">Cetak</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('po.tambah') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select required="required" name="supplier" class="form-control show-tick">
                                                <option value="">-- Pilih Supplier --</option>
                                                @if(count($errors->all()) > 0)
                                                @foreach ($supplier as $s)
                                                <option @if($s->kd_supplier == old('supplier')) selected @endif value="{{ $s->kd_supplier }}">{{ $s->nm_supplier }}</option>
                                                @endforeach
                                                @else
                                                @foreach ($supplier as $s)
                                                <option value="{{ $s->kd_supplier }}">{{ $s->nm_supplier }}</option>
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
                                                    <input readonly="readonly" value="{{ $errors->has('tgl_po') ? old('tgl_po') : date('Y-m-d') }}" required="required" name="tgl_po" type="text" class="form-control" placeholder="Tanggal PO">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="mmm">
                                        <div class="col-md-4">
                                            <select required="required" name="material[]" class="form-control show-tick material-select">
                                                <option value="">-- Pilih Material --</option>
                                                @foreach ($material as $s)
                                                <option value="{{ $s->kd_material }}">{{ $s->nm_material }}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">label</i>
                                                </span>
                                                <div class="form-line">
                                                    <input required="required" name="qty[]" type="number" class="form-control" placeholder="Kuantiti">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" id="tambahan"></div>
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

@push('script')
<script>
    function tambah() {
        $('.material-select').selectpicker('destroy');
        setTimeout(function(){
            var mmm = document.getElementById('mmm');
            $('#tambahan').append(mmm.outerHTML);
            setTimeout(function(){
                $('.material-select').selectpicker('refresh');
            }, 200);
        }, 200);
    }
</script>
@endpush

@include('load_bs_select')