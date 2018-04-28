@extends('layouts.app', ['title'=>'Dasbor'])

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DASBOR
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li class="active">Dasbor</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DASBOR
                        </h2>
                    </div>
                    <div class="body"></div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
@endsection
