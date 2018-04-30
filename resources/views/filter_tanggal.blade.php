<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                {{ $judul }}
            </h2>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{ request()->query('tgl_mulai') }}" id="tgl_mulai" type="text" class="datepicker form-control" placeholder="Mulai">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <input value="{{ request()->query('tgl_sampai') }}" id="tgl_sampai" type="text" class="datepicker form-control" placeholder="Sampai">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    @include('see_button')
                </div>
            </div>
        </div>
    </div>
</div>