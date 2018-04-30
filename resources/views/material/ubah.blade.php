@extends('layouts.app', ['title' => 'Ubah Data Material'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA MATERIAL
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('material') }}">Data Material</a></li>
                    <li class="active">Ubah Data Material</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA MATERIAL
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('material.perbarui', $d->kd_material) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">extension</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('nm_material'))
                                            value="{{ old('nm_material') }}"
                                            @else
                                            value="{{ $d->nm_material }}"
                                            @endif
                                            required="required" name="nm_material" type="text" class="form-control" placeholder="Nama Material">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('hrg_stn'))
                                            value="{{ old('hrg_stn') }}"
                                            @else
                                            value="{{ $d->hrg_stn }}"
                                            @endif
                                            required="required" name="hrg_stn" type="number" class="form-control" placeholder="Harga Satuan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @include('update_button')
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