@extends('layouts.app', ['title' => 'Ubah Data Pembayaran'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA PEMBAYARAN
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('pembayaran') }}">Data Pembayaran</a></li>
                    <li class="active">Ubah Data Pembayaran</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA PEMBAYARAN
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('pembayaran.perbarui', $d->no_pb) }}" method="post">
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
                                            @if($errors->has('nm_peru'))
                                            value="{{ old('nm_peru') }}" 
                                            @else
                                            value="{{ $d->nm_peru }}" 
                                            @endif
                                            required="required" name="nm_peru" type="text" class="form-control" placeholder="Nama Perusahaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input required="required" readonly="readonly" name="tgl_pb" value="{{ $d->tgl_pb }}" type="text" class="form-control" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">done</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('no_rek'))
                                            value="{{ old('no_rek') }}" 
                                            @else
                                            value="{{ $d->no_rek }}" 
                                            @endif required="required" name="no_rek" type="text" class="form-control" placeholder="No Rekening">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">credit_card</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="bank" 
                                            @if($errors->has('bank'))
                                            value="{{ old('bank') }}" 
                                            @else
                                            value="{{ $d->bank }}" 
                                            @endif type="text" class="form-control" placeholder="Nama Bank" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="almt_bank" rows="4" class="form-control no-resize" placeholder="Alamat Bank">{{ $errors->has('almt_bank') ? old('almt_bank') : $d->almt_bank }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($d->detail as $dt)
                            <div class="row" id="aaa">
                                <div class="col-md-4">
                                    <select required="required" name="no_po[]" class="form-control show-tick material-select">
                                        <option value="">-- Pilih No Purchase Order --</option>
                                        @if(count($errors->all()) > 0)
                                        @foreach ($po as $s)
                                        <option @if($s->no_po == old('no_po')) selected @endif value="{{ $s->no_po }}">{{ $s->no_po }}</option>
                                        @endforeach
                                        @else
                                        @foreach ($po as $s)
                                        <option {{ $dt->no_po == $s->no_po ? 'selected' : '' }} value="{{ $s->no_po }}">{{ $s->no_po }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{ $dt->no_invoice }}" name="no_invoice[]" type="text" class="form-control" placeholder="No Invoice" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{ $dt->no_fp }}" name="no_fp[]" type="text" class="form-control" placeholder="No Faktur Pajak" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{ $dt->tagihan }}" min="0" name="tagihan[]" type="number" class="form-control" placeholder="Tagihan" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{ $dt->ppn }}" min="0" name="ppn[]" type="number" class="form-control" placeholder="PPN" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{ $dt->total_bayar }}" min="0" name="total_bayar[]" type="number" class="form-control" placeholder="Total Bayar" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
@push('script')
<script>
    function tambah() {
        $('.material-select').selectpicker('destroy');
        setTimeout(function(){
            var aaa = document.getElementById('aaa').outerHTML;
            var b = $(aaa).append('<div class="col-md-12"><button class="btn btn-warning" onclick="hapus(this, event)">Hapus</button></div>');
            $('#bbb').append(b);
            setTimeout(function(){
                $('.material-select').selectpicker('refresh');
            }, 200);
        }, 200);
    }
    function hapus(el, e) {
        e.preventDefault();
        $(el).parents('#aaa').remove();
    }
</script>
@endpush