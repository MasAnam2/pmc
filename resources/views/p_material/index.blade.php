@extends('layouts.app', ['title' => 'Data Penerimaan Material'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA PENERIMAAN MATERIAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data Penerimaan Material</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA PENERIMAAN MATERIAL
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
                                            <th>No Penerimaan Material</th>
                                            <th>No Surat Jalan</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Order</th>
                                            <th>Jumlah Diterima</th>
                                            <th>No PO</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Penerimaan Material</th>
                                            <th>No Surat Jalan</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Order</th>
                                            <th>Jumlah Diterima</th>
                                            <th>No PO</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->no_pen }}</td>
                                            <td>{{ $d->no_sj }}</td>
                                            <td>{{ tglIndo($d->tgl_pen) }}</td>
                                            <td>{{ $d->jmlh_order }}</td>
                                            <td>{{ $d->jmlh_diterima }}</td>
                                            <td>{{ $d->no_po }}</td>
                                            <td>
                                                @include('edit_button', ['link'=>route('p_material.ubah', $d->no_pen)])
                                                @include('delete_button', ['link'=>route('p_material.hapus', $d->no_pen)])
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('p_material.tambah') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">book</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('no_sj') }}" required="required" name="no_sj" type="text" class="form-control" placeholder="Nomor Surat Jalan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line">
                                                    <input required="required" readonly="readonly" name="tgl_pen" value="{{ date('Y-m-d') }}" type="text" class="form-control" placeholder="Tanggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">done</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('jmlh_order') }}" readonly="readonly" required="required" name="jmlh_order" type="number" class="form-control" placeholder="Jumlah Order">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">done_all</i>
                                                </span>
                                                <div class="form-line">
                                                    <input value="{{ old('jmlh_diterima') }}" required="required" name="jmlh_diterima" type="number" class="form-control" placeholder="Jumlah Diterima">
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
@push('script')
<script>
    $('[name="no_po"]').on('changed.bs.select', function(e){
        if($(this).val() != ''){
            $.ajax({
                url : '{{ url('purchase-order/total-order') }}/'+$(this).val(),
                type : 'get',
                success : function(response, b){
                    $('[name="jmlh_order"]').val(response)
                }
            })
        }
    });
</script>
@endpush