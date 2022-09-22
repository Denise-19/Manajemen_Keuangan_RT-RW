@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Kas Iuran Kondisional' : 'Create Kas Iuran Kondisional' )

@push('css')
<link href="{{ asset('/assets/plugins/smartwizard/dist/css/smart_wizard.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Master Data</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Master Data<small> @yield('title')</small></h1>
<!-- end page-header -->


<!-- begin panel -->
<form action="{{ isset($data) ? route('admin.kas-rt.kas-iurankondisional.update', $data->id) : route('admin.kas-rt.kas-iurankondisional.store') }}" id="form" name="form" method="POST" data-parsley-validate="true"  enctype="multipart/form-data">
    @csrf
    @if(isset($data))
    {{ method_field('PUT') }}
    @endif

    <div class="panel panel-inverse">
      <!-- begin panel-heading -->
      <div class="panel-heading">
        <h4 class="panel-title">Form @yield('title')</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
      </div>
      <!-- end panel-heading -->
      <!-- begin panel-body -->

            <div class="panel-body">
                <div class="form-group">
                <label for="name">jenis Iuran</label>
                <x-form.Dropdown name="kas_iuran_kondisionals_jenis_iuran_id" :options="$jenis_iurankondisional" selected="{{{ old('kas_iuran_kondisionals_jenis_iuran_id') ?? ($data['jenis_iuran_id'] ?? null) }}}" required />
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="kas_iuran_kondisionals_tanggal" class="form-control" autofocus data-parsley-required="true" value="{{{ $data->tanggal ?? old('kas_iuran_kondisionals_tanggal') }}}">
                </div>
                <div class="form-group">
                <label for="warga">Warga</label>
                <x-form.Dropdown name="kas_iuran_kondisionals_warga" :options="$warga" selected="{{{ old('kas_iuran_kondisionals_warga') ?? ($data['warga'] ?? null) }}}" required />
                </div>
                <div class="form-group">
                <label for="total_biaya">Total Biaya</label>
                <input type="text" id="total_biaya" name="kas_iuran_kondisionals_total_biaya" class="form-control" autofocus data-parsley-required="true" value="{{{ $data->total_biaya ?? old('kas_iuran_kondisionals_total_biaya') }}}">
                </div>
                <div class="form-group">
                <label for="status">Status</label>
                    <div class="col-md-8 col-sm-8">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="kas_iuran_kondisionals_status" value="1" id="radio-required" data-parsley-required="true" />
                            <label class="form-check-label">Sudah Bayar</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="kas_iuran_kondisionals_status" id="radio-required2" value="2" />
                            <label class="form-check-label">Belum Bayar</label>
                        </div>
                    </div>
            </div>
      {{-- <div class="form-group">
        <label for="foto_iurankondisional">Bukti Pembayaran</label>
        @php
                $imageSrc = null;
                if(isset($data->dokumen)){
                $imageSrc = $data->dokumen->toArray();
                }
                @endphp
                <div class="row">
                    <x-form.ImageUploader :imageSrc="isset($imageSrc) ? asset(DataHelper::filterDokumenData($imageSrc, 'nama', 'foto_iurankondisional')->first()['public_url']) : null" name="foto_iurankondisional" title="Foto Kondisional" value="{{{ $data->dokumen  ?? old('foto_iurankondisional') }}}" />
                </div>
      </div> --}}

    <!-- end panel-body -->
    <!-- begin panel-footer -->
    <div class="panel-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <!-- end panel-footer -->
  </div>
  <!-- end panel -->
</form>
<a href="javascript:history.back(-1);" class="btn btn-success">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</a>

@endsection

@push('scripts')
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
@endpush
