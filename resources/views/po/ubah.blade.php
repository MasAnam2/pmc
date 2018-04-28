@extends('layouts.app', ['title' => 'Ubah Data Purchase Order'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA PURCHASE ORDER
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('po') }}">Data Purchase Order</a></li>
                    <li class="active">Ubah Data Purchase Order</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA PURCHASE ORDER
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('po.perbarui', $d->no_po) }}" method="post">
                            @csrf
                            @method('put')
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
                                        <option {{ $s->kd_supplier == $d->kd_supplier ? 'selected' : '' }} value="{{ $s->kd_supplier }}">{{ $s->nm_supplier }}</option>
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
                            @foreach ($d->detail as $p)
                            <div class="row" id="mmm">
                                <div class="col-md-4">
                                    <select required="required" name="material[]" class="form-control show-tick material-select">
                                        <option value="">-- Pilih Material --</option>
                                        @foreach ($material as $s)
                                        <option {{ $s->kd_material == $p->kd_material ? 'selected' : '' }} value="{{ $s->kd_material }}">{{ $s->nm_material }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">label</i>
                                        </span>
                                        <div class="form-line">
                                            <input value="{{ $p->qty }}" required="required" name="qty[]" type="number" class="form-control" placeholder="Kuantiti">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-12" id="tambahan"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a onclick="tambah()" class="btn btn-danger">Tambah</a>
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