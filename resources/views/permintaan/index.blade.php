@extends('layouts.app', ['title' => 'Data Permintaan Material'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DATA PERMINTAAN MATERIAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Data Permintaan Material</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA PERMINTAAN MATERIAL
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
                                            <th>No Permintaan</th>
                                            <th>Supplier</th>
                                            <th>Tanggal</th>
                                            <th>Alamat</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Permintaan</th>
                                            <th>Supplier</th>
                                            <th>Tanggal</th>
                                            <th>Alamat</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->no_pm }}</td>
                                            <td>{{ $d->supplier->nm_supplier }}</td>
                                            <td>{{ tglIndo($d->tgl_pm) }}</td>
                                            <td>{{ $d->almt_pm }}</td>
                                            <td>{{ $d->total }}</td>
                                            <td>
                                                <a href="{{ route('permintaan.ubah', $d->no_pm) }}" class="btn btn-warning">Ubah</a>
                                                <a onclick="hapus('{{ route('permintaan.hapus', $d->no_pm) }}')" class="btn btn-danger">Hapus</a>
                                                <a target="_blank" href="{{ route('permintaan.cetak', $d->no_pm) }}" class="btn btn-default">Cetak</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tambah_tab">
                                <form action="{{ route('permintaan.tambah') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select required="required" name="kd_supplier" class="form-control show-tick material-select">
                                                <option value="">-- Pilih Supplier --</option>
                                                @if(count($errors->all()) > 0)
                                                @foreach ($supplier as $s)
                                                <option @if($s->kd_supplier == old('kd_supplier')) selected @endif value="{{ $s->kd_supplier }}">{{ '('.$s->kd_supplier.') '.$s->nm_supplier }}</option>
                                                @endforeach
                                                @else
                                                @foreach ($supplier as $s)
                                                <option value="{{ $s->kd_supplier }}">{{ '('.$s->kd_supplier.') '.$s->nm_supplier }}</option>
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
                                                    <input required="required" readonly="readonly" name="tgl_pm" value="{{ date('Y-m-d') }}" type="text" class="form-control" placeholder="Tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea required="required" name="almt_pm" rows="4" class="form-control no-resize" placeholder="Alamat Permintaan">{{ old('almt_pm') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($errors->all()) > 0)
                                    @foreach (old('kd_material') as $mat)
                                    <div class="row" id="aaa">
                                        <div class="col-md-4">
                                            <select required="required" name="kd_material[]" class="form-control show-tick material-select">
                                                <option value="">-- Pilih Material --</option>
                                                @foreach ($material as $s)
                                                <option @if($s->kd_material == $mat) selected @endif value="{{ $s->kd_material }}">{{ '('.$s->kd_material.') '.$s->nm_material }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required="required" value="{{ old('qty')[$loop->index] }}" name="qty[]" type="number" min="1" class="form-control" placeholder="Kuantitas" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input value="{{ old('ket')[$loop->index] }}" name="ket[]" type="text" class="form-control" placeholder="Keterangan" />
                                                </div>
                                            </div>
                                        </div>
                                        @if(!$loop->first)
                                        <div class="col-md-12">
                                            <button class="btn btn-warning" onclick="hapusD(this, event)">Hapus</button>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row" id="aaa">
                                        <div class="col-md-4">
                                            <select required="required" name="kd_material[]" class="form-control show-tick material-select">
                                                <option value="">-- Pilih Material --</option>
                                                @foreach ($material as $s)
                                                <option value="{{ $s->kd_material }}">{{ '('.$s->kd_material.') '.$s->nm_material }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="qty[]" type="number" min="1" class="form-control" placeholder="Kuantitas" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="ket[]" type="text" class="form-control" placeholder="Keterangan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12" id="bbb">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
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
        $('.material-select').selectpicker('destroy');
        setTimeout(function(){
            var aaa = document.getElementById('aaa').outerHTML;
            var b = $(aaa).append('<div class="col-md-12"><button class="btn btn-warning" onclick="hapusD(this, event)">Hapus</button></div>');
            $('#bbb').append(b);
            setTimeout(function(){
                $('.material-select').selectpicker('refresh');
            }, 200);
        }, 200);
    }
    function hapusD(el, e) {
        e.preventDefault();
        $(el).parents('#aaa').remove();
    }
</script>
@endpush