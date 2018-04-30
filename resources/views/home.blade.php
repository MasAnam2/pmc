@extends('layouts.app', ['title'=>'Dasbor'])

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASBOR</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">group</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Supplier</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_supplier }}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">extension</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Material</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_material }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">receipt</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Purchase Order</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_po }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">money</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Pembayaran</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_pembayaran }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-teal hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">gavel</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Jurnal</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_jurnal }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-indigo hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">flight_land</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Perkiraan</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_perkiraan }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-deep-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">markunread_mailbox</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Penerimaan Material</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_penerimaan }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-amber hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">class</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">Permintaan Material</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_permintaan }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-grey hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">accessibility</i>
                    </div>
                    <div class="content">
                        <div class="text" style="text-transform: uppercase;">User</div>
                        <div class="number count-to" data-from="0" data-to="{{ $jml_user }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>PURCHASE ORDER</h2>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
    </div>
</section>
@endsection
@push('script')
<script>
    $(function () {
        $('.count-to').countTo();
    });
    $(function () {
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs());
    });

    function getChartJs() {
        var config = {
            type: 'bar',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: "Total Order",
                    data: [{{ implode(',', array_column($po_setahun, 'total_qty')) }}],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                    label: "Total Tagihan",
                    data: [{{ implode(',', array_column($po_setahun, 'total_tagihan')) }}],
                    backgroundColor: 'rgba(233, 30, 99, 0.8)'
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
        return config;
    }
</script>
@endpush
@push('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>
<!-- Chart Plugins Js -->
<script src="{{ asset('plugins/chartjs/Chart.bundle.js') }}"></script>
@endpush