@extends('layouts.app', ['title' => 'Laporan Pembayaran'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                LAPORAN PEMBAYARAN
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="active">Laporan Pembayaran</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LAPORAN PEMBAYARAN
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="tgl_mulai" type="text" class="datepicker form-control" placeholder="Mulai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="tgl_sampai" type="text" class="datepicker form-control" placeholder="Sampai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                @if(config('app.button_type') == 'text')
                                <button onclick="cetak()" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
                                    {{ config('app.print_button') }}
                                </button>
                                @else
                                <button onclick="cetak()" class="btn btn-default {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
                                    <i class="material-icons">{{ config('app.print_button') }}</i>
                                </button>
                                @endif
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
    $(document).ready(function(){
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            clearButton: true,
            weekStart: 1,
            time: false
        });
    });
    function cetak() {
        if($('#tgl_mulai').val() == ''){
            alert('Tanggal mulai tidak boleh kosong')
            return
        }
        if($('#tgl_sampai').val() == ''){
            alert('Tanggal sampai tidak boleh kosong')
            return
        }
        window.open('{{ url('laporan/pembayaran/cetak') }}'+'?tgl_mulai='+$('#tgl_mulai').val()+'&tgl_sampai='+$('#tgl_sampai').val());
    }
</script>
@endpush
@push('js')
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endpush
@push('css')
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@endpush