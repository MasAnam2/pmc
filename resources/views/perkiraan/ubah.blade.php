@extends('layouts.app', ['title' => 'Ubah Data Perkiraan'])
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                UBAH DATA PERKIRAAN
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb breadcrumb-bg-pink">
                    <li><a href="{{ route('home') }}">Dasbor</a></li>
                    <li><a href="{{ route('perkiraan') }}">Data Perkiraan</a></li>
                    <li class="active">Ubah Data Perkiraan</li>
                </ol>
            </div>
            @include('alert')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UBAH DATA PERKIRAAN
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('perkiraan.perbarui', $d->no_perk) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">flight_land</i>
                                        </span>
                                        <div class="form-line">
                                            <input 
                                            @if($errors->has('nm_perk'))
                                            value="{{ old('nm_perk') }}"
                                            @else
                                            value="{{ $d->nm_perk }}"
                                            @endif
                                            required="required" name="nm_perk" type="text" class="form-control" placeholder="Nama Perkiraan">
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